<?php
$product_list = render_products();
?>
<section id="product">
    <?php echo do_shortcode('[views section=general name=navbarView]'); ?>
    <h1 class="text-center w-full text-7xl font-bold text-emerald-900">Prodotti</h1>
    <div class="flex flex-col lg:flex-row py-10 md:py-20 w-11/12 mx-auto gap-2 max-w-screen-2xl">
        <div class="w-64 p-4">
            <h2 class="text-4xl font-bold text-pink-500">Filtra per:</h2>
            <div class="flex lg:block">
                <div>
                    <h3 class="mt-2 font-semibold text-emerald-900 text-2xl">Marca</h3>
                    <ul class="w-48 font-medium text-emerald-900">
                        <?php
                        $displayed_parents = []; // array vuoto per tenere traccia dei valori già visualizzati
                        foreach ($product_list as $key => $value) {
                            // verifica se il valore è già stato visualizzato
                            if (!in_array($value['parent'], $displayed_parents)) {
                                // aggiungi il valore attuale all'array di valori visualizzati
                                $displayed_parents[] = $value['parent'];
                        ?>
                                <li class="w-full">
                                    <div class="flex items-center">
                                        <input data-type="categories" data-parent="<?php echo strtolower($value['data-parent']); ?>" id="<?php echo $key . '-checkbox'; ?>" type="checkbox" value="" class="w-4 h-4 border-[1px] checked:bg-blue-300 checked:text-white border-pink-500 rounded accent-pink-500">
                                        <label for="<?php echo $key . '-checkbox'; ?>" class="w-full py-1 ml-2 font-medium text-emerald-900"><?php echo $value['parent']; ?></label>
                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div>
                    <h3 class="mt-2 font-semibold text-emerald-900 text-2xl">Categoria</h3>
                    <ul class="w-48 font-medium text-emerald-900">
                        <?php
                        $displayed_children = []; // array vuoto per tenere traccia dei valori già visualizzati
                        foreach ($product_list as $key => $value) {
                            // verifico se il mio array non è vuoto per evitare che mi dia errore
                            if (!empty($value['children'])) {
                                // verifica se il valore è già stato visualizzato
                                if (!in_array($value['children'][0], $displayed_children)) {
                                    // aggiungi il valore attuale all'array di valori visualizzati
                                    $displayed_children[] = $value['children'][0];
                        ?>
                                    <li class="w-full">
                                        <div class="flex items-center">
                                            <input data-type="subcategories" data-children="<?php echo strtolower($value['data-children']); ?>" id="<?php echo $key . '-checkbox'; ?>" type="checkbox" value="" class="w-4 h-4 border-[1px] checked:bg-pink-300 checked:text-white border-pink-500 rounded">
                                            <label for="<?php echo $key . '-checkbox'; ?>" class="w-full py-1 ml-2 font-medium text-emerald-900"><?php echo $value['children'][0]; ?></label>
                                        </div>
                                    </li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </ul>

                </div>
                <div class="p2">
                    <div class="flex gap-2 p-2 mx-auto border border-pink-600 rounded-lg items-center justify-center">Reset<img class="h-6 w-6 hover:animate-spin" src="<?php echo get_image_path('svg/reset.svg'); ?>" alt="" srcset=""></div>
                </div>
            </div>
        </div>
        <div id="containerProduct" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 w-full 2xl:grid-cols-4">
            <?php
            foreach ($product_list as $product) {
                // include($path);
                echo $this->SetGeneralsShortCodesParams([
                    'section' => 'general',
                    'name' => 'cardView',
                    'params' => $product
                ]);
            }

            ?>
        </div>

    </div>
</section>
<?php echo do_shortcode('[views section=footer name=footerView]'); ?>