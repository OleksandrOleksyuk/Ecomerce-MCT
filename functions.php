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
        'posts_per_page' => $limit
    );

    $products = wc_get_products($args);

    $product_list = [];

    foreach ($products as $product) {
        $categories = get_the_terms($product->get_id(), 'product_cat');
        $parent_id = 0;
        $children_ids = [];

        foreach ($categories as $category) {
            if ($category->parent == 0) {
                $parent_id = $category->name;
            } else {
                $parent_category = get_term($category->parent, 'product_cat');
                $parent_id = $parent_category->name;
                $children_ids[] = $category->name;
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

    $path = $_SERVER['DOCUMENT_ROOT'] . get_merceria_path('assets/logs/logs.txt');
    file_put_contents($path, '<pre>' . print_r($product_list, true)  . '</pre>');
    return $product_list;
}

function render_single_product($product_id)
{
    $product = wc_get_product($product_id);

    $categories = get_the_terms($product->get_id(), 'product_cat');
    $parent_id = 0;
    $children_ids = [];

    foreach ($categories as $category) {
        if ($category->parent == 0) {
            $parent_id = $category->name;
        } else {
            $parent_category = get_term($category->parent, 'product_cat');
            $parent_id = $parent_category->name;
            $children_ids[] = $category->name;
        }
    }

    $price = $product->get_price();
    $price = number_format($price, 2, '.', ''); // Formatta il prezzo con due decimali

    $product_data = [
        'id' => $product->get_id(),
        'name' => $product->get_name(),
        'image' => $product->get_image(),
        'short_description' => $product->get_short_description(),
        'description' => $product->get_description(),
        'price' => $price,
        'categories' => $product->get_categories(),
        'parent' => $parent_id,
        'children' => $children_ids,
        'data-parent' => $parent_id,
        'data-children' => implode(',', $children_ids),
        'link' => get_link_path('singleproduct') . "/?product_id=" . $product->get_id()
        // Aggiungi altre proprietà di prodotto desiderate
    ];

    // Resto del codice per renderizzare il prodotto come desiderato
    $path = $_SERVER['DOCUMENT_ROOT'] . get_merceria_path('assets/logs/single.txt');
    file_put_contents($path, '<pre>' . print_r($product_data, true)  . '</pre>');
    return $product_data;
}
