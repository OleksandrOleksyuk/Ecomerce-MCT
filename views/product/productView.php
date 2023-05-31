<?= do_shortcode("[views section=general name=navbarView]") ?>
<?php $product_list = render_products(); ?>
    <div id="product" class="bg-white">
        <main class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-400 pb-6 pt-16">
                <h1 class="text-3xl md:text-5xl font-semibold text-left py-5 text-emerald-900 capitalize">I nostri prodotti</h1>
                <div class="flex items-center">
                    <div class="relative inline-block text-left">

                        <button type="button" class="group inline-flex justify-center text-sm hover:bg-gray-100 font-medium text-gray-700" id="menu-button">
                            Filtra
                            <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 hidden focus:outline-none">
                            <div class="py-1">
                                <!-- <div class="block px-4 py-2 text-sm hover:bg-emerald-500 cursor-pointer hover:text-white font-medium text-gray-900" id="menu-item-0">Più popolari</div> -->
                                <!-- <div class="block px-4 py-2 text-sm hover:bg-emerald-500 cursor-pointer hover:text-white text-gray-500" id="menu-item-1">Migliori recensioni</div> -->
                                <div class="block px-4 py-2 text-sm hover:bg-emerald-500 cursor-pointer hover:text-white text-gray-500" id="newProduct">Novità</div>
                                <div class="block px-4 py-2 text-sm hover:bg-emerald-500 cursor-pointer hover:text-white text-gray-500" id="lowPrice">Prezzo: dal più basso</div>
                                <div class="block px-4 py-2 text-sm hover:bg-emerald-500 cursor-pointer hover:text-white text-gray-500" id="hightPrice">Prezzo: dal più alto</div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
            <section aria-labelledby="products-heading" class="pb-24 pt-6">
                <h2 id="products-heading" class="sr-only">Products</h2>
                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-5">
                    <!-- Filters -->
                    <form class="hidden lg:block">
                        <div class="border-b border-gray-400 py-6">
                            <h3 class="-my-3 flow-root">
                                <!-- Expand/collapse section button -->
                                <button type="button" class="flex w-full items-center justify-between bg-white hover:bg-gray-100 py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-brand-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900 text-lg">Brand</span>
                                    <span class="ml-6 flex items-center">
                                    <!-- Expand icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5 plus hidden" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                    </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5 min" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-brand-0">
                                <div class="space-y-4">
                                    <?php
                                    $displayed_parents = []; // array vuoto per tenere traccia dei valori già visualizzati
                                    foreach ($product_list as $key => $value) {
                                        // verifica se il valore è già stato visualizzato
                                        if (!in_array($value["parent"], $displayed_parents)) {
                                            // aggiungi il valore attuale all'array di valori visualizzati
                                            $displayed_parents[] = $value["parent"]; ?>
                                            <div class="flex items-center">
                                                <input data-type="categories" data-parent="<?= strtolower(
                                                    $value["data-parent"]
                                                ) ?>" id="filter-brand-1<?= $key ?>" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                                <label for="filter-brand-1<?= $key ?>" class="ml-3 text-sm text-gray-600"><?= $value["parent"] ?></label>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="border-b border-gray-400 py-6">
                            <h3 class="-my-3 flow-root">
                                <!-- Expand/collapse section button -->
                                <button type="button" class="flex w-full items-center justify-between bg-white hover:bg-gray-100 py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-category-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900 text-lg">Category</span>
                                    <span class="ml-6 flex items-center">
                                    <!-- Expand icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5 plus hidden" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                    </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5 min" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-category-0">
                                <div class="space-y-4">
                                    <?php
                                    $displayed_children = []; // array vuoto per tenere traccia dei valori già visualizzati
                                    foreach ($product_list as $key => $value) {
                                        // verifico se il mio array non è vuoto per evitare che mi dia errore
                                        if (!empty($value["children"])) {
                                            // verifica se il valore è già stato visualizzato
                                            if (!in_array($value["children"][0], $displayed_children)) {
                                                // aggiungi il valore attuale all'array di valori visualizzati
                                                $displayed_children[] = $value["children"][0]; ?>
                                                <div class="flex items-center">
                                                    <input data-type="subcategories" data-parent="<?= strtolower(
                                                        $value["data-parent"]
                                                    ) ?>" data-children="<?= strtolower(
                                                        $value["data-children"]
                                                    ) ?>" id="filter-category-10<?= $key ?>" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                                    <label for="filter-category-10<?= $key ?>" class="ml-3 text-sm text-gray-600"><?= $value["children"][0] ?></label>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Product grid -->
                    <div id="contProd" class="flex flex-wrap items-center justify-evenly w-full relative lg:col-span-4">
                        <!-- Your content -->
                        <?php
                        shuffle($product_list);
                        foreach ($product_list as $product) {
                            echo $this->SetGeneralsShortCodesParams([
                                "section" => "general",
                                "name" => "cardView",
                                "params" => $product,
                            ]);
                        } ?>
                    </div>

                </div>
            </section>
        </main>
        <a href="#product" class="scroll-smooth">
            <div class="fixed bottom-0 right-0 z-100 flex p-3 m-10 text-xl rounded-lg bg-pink-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </a>
    </div>

    <!-- footer -->
<?= do_shortcode("[views section=footer name=footerView]") ?>