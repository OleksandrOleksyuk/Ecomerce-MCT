<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mct/wp-load.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/mct/wp-content/plugins/woocommerce/woocommerce.php";
function handle_error($message)
{
    // Puoi personalizzare come gestire gli errori, ad esempio registrandoli o restituendo un messaggio di errore
    die($message);
}

function validate_json_data($data)
{
    if (empty($data->first_name) || empty($data->last_name) || empty($data->email)) {
        handle_error("Missing required data.");
    }
}

function add_products_to_order($order, $products)
{
    foreach ($products as $value) {
        $product_id = $value->productId;
        $quantity = $value->productQnt;
        $variation_id = $value->variantId;
        $variation_attributes = [$value->productColor];
        $product_description = $value->productDescription;
        $product_name = $value->productName;
        $product = wc_get_product($product_id);
        $item_id = $order->add_product($product, $quantity, [$variation_id, $variation_attributes]);
        $variation_image_id = $value->imageSrc;
        $description = $product_name . " - " . implode(", ", $variation_attributes) . " - " . $product_description;
        wc_update_order_item_meta($item_id, "Product Description", $description);
        wc_update_order_item_meta($item_id, "_thumbnail_id", $variation_image_id);
        $quantity = 10; // Nuova quantità di magazzino
        // Aggiorna la quantità di magazzino del prodotto
        wc_update_product_stock($variation_id, $quantity);
    }
}

function sanitize_user_data($data)
{
    return [
        "first_name" => sanitize_text_field($data->first_name),
        "last_name" => sanitize_text_field($data->last_name),
        "email" => sanitize_email($data->email),
        "phone" => sanitize_text_field($data->phone),
        "address_1" => sanitize_text_field($data->address_1 . $data->address_1_number),
        "address_2" => sanitize_text_field($data->address_2 . $data->address_2_number),
        "city" => sanitize_text_field($data->city),
        "state" => sanitize_text_field($data->state),
        "postcode" => sanitize_text_field($data->postcode),
        "country" => sanitize_text_field($data->country),
    ];
}

// Recupera il payload JSON
$json_str = file_get_contents("php://input");
$data = json_decode($json_str);
// Validazione dei dati del payload JSON
validate_json_data($data);
// Creazione dell'ordine
$order = wc_create_order();
// Aggiunta dei prodotti all'ordine
add_products_to_order($order, $data->data->variable);
add_products_to_order($order, $data->data->simple);
// Calcolo dei totali dell'ordine
$order->calculate_totals();
// Pulizia e sanitizzazione dei dati dell'utente
$address = sanitize_user_data($data);
// Impostazione degli indirizzi di fatturazione e spedizione
$order->set_address($address, "billing");
$order->set_address($address, "shipping");
// Aggiornamento dello stato dell'ordine
if ($data->method === 'internet_banking') {
    $order->update_status("pending");
} else if ($data->method === 'paypal') {
    $order->update_status("processing");
}
// Salvataggio dell'ordine
$order->save();
echo 1;
