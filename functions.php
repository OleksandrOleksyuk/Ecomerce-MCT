<?php
require_once('controllers.php');
// require_once(get_template_directory() . '/config.php');
function add_custom_rewrite_tags()
{
    add_rewrite_tag('%product_id%', '([^&]+)');
}
add_action('init', 'add_custom_rewrite_tags', 10, 0);


function get_image_path($image_filename)
{
    $local_path = '/mct';
    $production_path = '';
    $base_url = is_local() ? $local_path : $production_path;
    return $base_url . '/wp-content/themes/merceriacreativatania/assets/images/' . $image_filename;
}
function get_views_path($views_filename)
{
    $local_path = '/mct';
    $production_path = '';
    $base_url = is_local() ? $local_path : $production_path;
    return $base_url . '/wp-content/themes/merceriacreativatania/views/' . $views_filename;
}

function get_merceria_path($path)
{
    $local_path = '/mct';
    $production_path = '';
    $base_url = is_local() ? $local_path : $production_path;
    return $base_url . '/wp-content/themes/merceriacreativatania/' . $path;
}

function get_link_path($path)
{
    $local_link = '/wp-content/themes/merceriacreativatania/';
    $production_link = '/index.php/';
    $base_url = is_local() ? get_home_url(null, '')  : get_site_url();
    $base_link = is_local() ? $local_link : $production_link;
    return $base_url . $base_link . $path;
}


function is_local()
{
    $localhosts = array(
        '127.0.0.1',
        '::1'
    );
    return in_array($_SERVER['REMOTE_ADDR'], $localhosts) || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false;
}

function render_products($limit = -1)
{
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $limit,
        'post_status' => 'publish' // aggiungi questo parametro per ottenere solo prodotti pubblicati
    );
    $products = wc_get_products($args);

    $product_list = [];

    foreach ($products as $product) {
        $categories = get_the_terms($product->get_id(), 'product_cat');
        $parent_id = 0;
        $children_ids = [];

        if (is_array($categories) || is_object($categories)) {
            foreach ($categories as $category) {
                if ($category->parent == 0) {
                    $parent_id = $category->name;
                } else {
                    $parent_category = get_term($category->parent, 'product_cat');
                    $parent_id = $parent_category->name;
                    $children_ids[] = $category->name;
                }
            }
        }
        $price = $product->get_price();
        $price = number_format($price, 2, '.', ''); // Formatta il prezzo con due decimali

        $product_list[] = [
            'id' => $product->get_id(),
            'name' => $product->get_name(),
            'image' => $product->get_image(),
            'short_description' => $product->get_short_description(),
            'price' => $price,
            'categories' => $product->get_categories(),
            'parent' => $parent_id,
            'children' => $children_ids,
            'data-parent' => $parent_id,
            'data-children' => implode(',', $children_ids),
            'link' => get_link_path('singleproduct') . "/?product_id=" . $product->get_id()
            // Aggiungi altre proprietà di prodotto desiderate
        ];
    }

    // $path = $_SERVER['DOCUMENT_ROOT'] . get_merceria_path('assets/logs/logs.txt');
    // var_dump($path);
    // file_put_contents($path, '<pre>' . print_r($product_list, true)  . '</pre>');
    return $product_list;
}
function render_single_product($product_id)
{
    $product = wc_get_product($product_id);

    $price = $product->get_price();
    $price = number_format($price, 2, '.', ''); // Formatta il prezzo con due decimali

    $variations = $product->get_available_variations();
    $variation_data = array();

    foreach ($variations as $variation) {
        // Aggiungi le informazioni sull'attributo per ciascuna variazione
        $variation_data[] = array(
            'id' => $variation['variation_id'],
            'attributes' => $variation['attributes'],
            'price' => $variation['display_price'],
            'image' => ''
        );

        if (isset($variation['image_id']) && $variation['image_id']) {
            $image_data = wp_get_attachment_image_src($variation['image_id'], 'full');
            if (is_array($image_data)) {
                $variation_data[count($variation_data) - 1]['image'] = $image_data[0];
            }
        }
    }
    $gallery_ids = $product->get_gallery_image_ids();
    $gallery_images = array();

    foreach ($gallery_ids as $gallery_id) {
        $image_data = wp_get_attachment_image_src($gallery_id, 'full');
        if (is_array($image_data) && !empty($image_data[0])) {
            $gallery_images[] = $image_data[0];
        }
    }


    $product_data = [
        'id' => $product->get_id(),
        'name' => $product->get_name(),
        'image' => $product->get_image(),
        'short_description' => $product->get_short_description(),
        'description' => $product->get_description(),
        'price' => $price,
        'categories' => $product->get_categories(),
        'link' => get_link_path('singleproduct') . "/?product_id=" . $product->get_id(),
        'variations' => $variation_data, // Aggiungi le informazioni sulle variazioni disponibili
        'gallery_images' => $gallery_images // Aggiungi le immagini della galleria del prodotto
    ];

    // Resto del codice per renderizzare il prodotto come desiderato
    // $path = $_SERVER['DOCUMENT_ROOT'] . get_merceria_path('assets/logs/single.txt');
    // file_put_contents($path, '<pre>' . print_r($product_data, true)  . '</pre>');
    return $product_data;
}
