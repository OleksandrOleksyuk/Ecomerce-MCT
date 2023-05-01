<?php
// Carica WordPress e WooCommerce
require_once($_SERVER['DOCUMENT_ROOT'] . '/mct/wp-load.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/mct/wp-content/plugins/woocommerce/woocommerce.php');

$json_str = file_get_contents('php://input');
$data = json_decode($json_str);

// $path = $_SERVER['DOCUMENT_ROOT'] . get_merceria_path('assets/logs/payment.txt');
// file_put_contents($path, '<pre>' . print_r($data, true)  . '</pre>');

$order = wc_create_order();

$allVariationsProduct = $data->data->variable;
$allSimpleProducts = $data->data->simple;

foreach ($allVariationsProduct as $value) {
    $product_id = $value->productId;
    $quantity = $value->productQnt;
    $variation_id = $value->variantId;
    $variation_attributes = [$value->productColor];
    $product_description = $value->productDescription;
    $product_name = $value->productName;

    $product = wc_get_product($product_id);

    $item_id = $order->add_product($product, $quantity, [$variation_id, $variation_attributes]);
    $variation_image_id = $value->imageSrc;

    $description = $product_name . ' - ' . implode(', ', $variation_attributes) . ' - ' . $product_description;
    wc_update_order_item_meta($item_id, 'Product Description', $description);

    wc_update_order_item_meta($item_id, '_thumbnail_id', $variation_image_id);

    $product_id = 123; // ID del prodotto o della variante di prodotto
    $quantity = 10; // Nuova quantità di magazzino

    // Aggiorna la quantità di magazzino del prodotto
    wc_update_product_stock($variation_id, $quantity);
}

foreach ($allSimpleProducts as $value) {
    $product_id = $value->productId;
    $quantity = $value->productQnt;
    $product = wc_get_product($product_id);
    $item_id = $order->add_product($product, $quantity);
}

$order->calculate_totals();

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

$order->update_status('processing');

$order->save();

echo 1;

// echo 'L\'ordine è stato creato con successo senza il pagamento.';
