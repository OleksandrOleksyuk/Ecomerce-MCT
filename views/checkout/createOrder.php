<?php
// Carica WordPress e WooCommerce
require_once($_SERVER['DOCUMENT_ROOT'] . '/mct/wp-load.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/mct/wp-content/plugins/woocommerce/woocommerce.php');

$json_str = file_get_contents('php://input');
$data = json_decode($json_str);

// Crea un nuovo ordine
$order = wc_create_order();

// Aggiungi i prodotti all'ordine
$tuttiiprodotti = $data->code;

foreach ($tuttiiprodotti as $value) {
    $product_id = $value->productId;
    $quantity = $value->productQnt;
    $variation_id = $value->variantId;
    $variation_attributes = [$value->productColor];
    $variation_image_id = $value->imageSrc;

    $product = wc_get_product($product_id);

    $order->add_product($product, $quantity, [$variation_id, $variation_attributes]);
}

$address = [
    'first_name' => $data->first_name,
    'last_name'  => $data->last_name,
    'email'      => $data->email,
    'phone'      => $data->phone,
    'address_1'  => $data->address_1,
    'address_2'  => $data->address_2,
    'city'       => $data->city,
    'state'      => $data->state,
    'postcode'   => $data->postcode,
    'country'    => $data->country
];
$order->set_address($address, 'billing');
$order->set_address($address, 'shipping');

// Imposta lo stato dell'ordine
$order->update_status('processing');


// Calcola e salva il totale dell'ordine
$order->calculate_totals();
$order->save();

// Mostra un messaggio di conferma
echo 'L\'ordine è stato creato con successo senza il pagamento.';
