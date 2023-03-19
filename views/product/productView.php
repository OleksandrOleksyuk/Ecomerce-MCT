<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
);

$products = wc_get_products($args);

$product_list = array();

foreach ($products as $product) {
    $product_list[] = array(
        'id' => $product->get_id(),
        'name' => $product->get_name(),
        'image' => $product->get_image(),
        'short_description' => $product->get_short_description(),
        'price' => $product->get_price(),
        'categories' => $product->get_categories(),
        'parent' => $product->get_parent()
        // Aggiungi altre proprietà di prodotto desiderate
    );
}

$path = $_SERVER['DOCUMENT_ROOT'] . get_merceria_path('assets/logs/logs.txt');
file_put_contents($path, '<pre>' . print_r($product_list, true)  . '</pre>');

function list_product_categories()
{
    $catgegories = get_terms(
        array(
            'taxonomy'   => 'product_cat',
            'orderby'    => 'name',
            'hide_empty' => false,
        )
    );

    $catgegories = treeify_terms($catgegories);

    return $catgegories;
}

function treeify_terms($terms, $root_id = 0)
{
    $tree = array();

    foreach ($terms as $term) {
        if ($term->parent === $root_id) {
            array_push(
                $tree,
                array(
                    'name'     => $term->name,
                    'slug'     => $term->slug,
                    'id'       => $term->term_id,
                    'count'    => $term->count,
                    'children' => treeify_terms($terms, $term->term_id),
                )
            );
        }
    }

    return $tree;
}
// echo '<pre>' . print_r(, true)  . '</pre>';

$catgegoriesProduct = list_product_categories();

file_put_contents($path, '<pre>' . print_r($catgegoriesProduct, true)  . '</pre>');
?>
<section id="product">
    <?php echo do_shortcode('[views section=general name=navbarView]'); ?>
    <h1 class="text-center w-full text-7xl font-bold text-dark-tertiary">Prodotti</h1>
    <div class="flex py-10 md:py-20 w-11/12 mx-auto gap-2">
        <div class="w-64 p-4">
            <h2 class="text-4xl font-bold text-pink-500">Filtra per:</h2>
            <div>
                <h3 class="mt-2 font-semibold text-dark-tertiary text-2xl">Marca</h3>
                <ul class="w-48 text-sm font-medium text-dark-tertiary">
                    <?php
                    // Stampa gli elementi del nuovo array
                    foreach ($catgegoriesProduct as $key => $value) {
                    ?>
                        <li class="w-full">
                            <div class="flex items-center">
                                <input id="<?php echo $key . '-checkbox'; ?>" type="checkbox" value="" class="w-4 h-4  bg-pink-100 border-pink-500 rounded">
                                <label for="<?php echo $key . '-checkbox'; ?>" class="w-full py-1 ml-2 text-sm font-medium text-dark-tertiary"><?php echo $value['name']; ?></label>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div>
                <h3 class="mt-2 font-semibold text-dark-tertiary text-2xl">Categoria</h3>
                <ul class="w-48 text-sm font-medium text-dark-tertiary">
                    <?php
                    // Stampa gli elementi del nuovo array
                    foreach ($catgegoriesProduct as $subcategories) {
                        if ($subcategories['children']) {
                            foreach ($subcategories['children'] as $key => $value) {
                    ?>
                                <li class="w-full">
                                    <div class="flex items-center">
                                        <input id="<?php echo $key . '-checkbox'; ?>" type="checkbox" value="" class="w-4 h-4  bg-pink-100 border-pink-500 rounded">
                                        <label for="<?php echo $key . '-checkbox'; ?>" class="w-full py-1 ml-2 text-sm font-medium text-dark-tertiary"><?php echo $value['name']; ?></label>
                                    </div>
                                </li>
                    <?php
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="flex gap-2 p-2 mx-auto border border-pink-600 rounded-lg items-center justify-center">Reset<img class="h-6 w-6 hover:animate-spin" src="<?php echo get_image_path('svg/reset.svg'); ?>" alt="" srcset=""></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 w-full lg:grid-cols-3">
            <?php
            // ciclo foreach per stampare i prodotti
            foreach ($product_list as $product) {
                // include($path);
                echo $this->SetGeneralsShortCodesParams(['section' => 'general', 'name' => 'cardView', 'params' => $product]);
            }
            ?>
        </div>

    </div>
</section>
<?php echo do_shortcode('[views section=footer name=footerView]'); ?>