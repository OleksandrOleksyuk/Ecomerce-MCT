<?php
$product_list = render_products();
?>
<section id="product" class="min-h-screen">
    <?= do_shortcode('[views section=general name=navbarView]'); ?>
    <header class="bg-white">
        <div class="mx-auto max-w-screen-2xl px-4 py-6">
            <h1 class="text-5xl font-bold tracking-tight text-gray-900 text-center">Prodotti</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto py-6">
            <div class="flex flex-col lg:flex-row w-11/12 mx-auto gap-2">
                <div class="p-4 shadow-lg h-fit rounded-lg">
                    <h2 class="text-4xl font-semibold text-pink-500">Filtra per:</h2>
                    <div class="flex flex-col gap-2 lg:block">
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
                                                    <input data-type="categories" data-parent="<?= strtolower($value['data-parent']); ?>" id="<?= $key . '-checkbox'; ?>" type="checkbox" value="" class="w-4 h-4  accent-pink-500 bg-pink-100">
                                                    <label for="<?= $key . '-checkbox'; ?>" class="w-full py-1 ml-2 font-medium text-emerald-900"><?= $value['parent']; ?></label>
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
                                                        <input data-type="subcategories" data-parent="<?= strtolower($value['data-parent']); ?>" data-children="<?= strtolower($value['data-children']); ?>" id="<?= '10' . $key . '-checkbox'; ?>" type="checkbox" value="" class="w-4 h-4 accent-pink-500 bg-pink-100 ">
                                                        <label for="<?= '10' . $key . '-checkbox'; ?>" class="w-full py-1 ml-2 font-medium text-emerald-900"><?= $value['children'][0]; ?></label>
                                                    </div>
                                                </li>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="flex gap-2 p-2 mx-auto border border-pink-600 rounded-lg items-center justify-center">Reset<img class="h-6 w-6 hover:animate-spin" src="<?= get_image_path('svg/reset.svg'); ?>" alt="" srcset=""></div>
                        </div>
                    </div>
                </div>
                <div id="contProd" class="flex flex-wrap items-center justify-evenly w-full relative">
                    <?php
                    foreach ($product_list as $product) {
                        echo $this->SetGeneralsShortCodesParams([
                            'section' => 'general',
                            'name' => 'cardView',
                            'params' => $product
                        ]);
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</section>
<!-- footer -->
<?= do_shortcode('[views section=footer name=footerView]'); ?>