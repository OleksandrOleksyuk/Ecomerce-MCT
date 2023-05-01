<?= do_shortcode('[views section=general name=navbarView]'); ?>
<?php
$product_list = render_products();
?>
<div id="product" class="bg-white">
    <div>
        <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black bg-opacity-25"></div>

            <div class="fixed inset-0 z-40 flex">
                <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                        <button type="button" class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Filters -->
                    <form class="mt-4 border-t border-gray-200">
                        <h3 class="sr-only">Categories</h3>
                        <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                            <li>
                                <a href="#" class="block px-2 py-3">Totes</a>
                            </li>
                            <li>
                                <a href="#" class="block px-2 py-3">Backpacks</a>
                            </li>
                            <li>
                                <a href="#" class="block px-2 py-3">Travel Bags</a>
                            </li>
                            <li>
                                <a href="#" class="block px-2 py-3">Hip Bags</a>
                            </li>
                            <li>
                                <a href="#" class="block px-2 py-3">Laptop Sleeves</a>
                            </li>
                        </ul>

                        <div class="border-t border-gray-200 px-4 py-6">
                            <h3 class="-mx-2 -my-3 flow-root">
                                <!-- Expand/collapse section button -->
                                <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Color</span>
                                    <span class="ml-6 flex items-center">
                                        <!-- Expand icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-mobile-0">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">White</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-color-1" class="ml-3 min-w-0 flex-1 text-gray-500">Beige</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Blue</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Brown</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-color-4" class="ml-3 min-w-0 flex-1 text-gray-500">Green</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-color-5" class="ml-3 min-w-0 flex-1 text-gray-500">Purple</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-6">
                            <h3 class="-mx-2 -my-3 flow-root">
                                <!-- Expand/collapse section button -->
                                <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-1" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Category</span>
                                    <span class="ml-6 flex items-center">
                                        <!-- Expand icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-mobile-1">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">Prodotti</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">Sale</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-2" name="category[]" value="travel" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">Travel</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-category-3" class="ml-3 min-w-0 flex-1 text-gray-500">Organization</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Accessories</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-6">
                            <h3 class="-mx-2 -my-3 flow-root">
                                <!-- Expand/collapse section button -->
                                <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-2" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Size</span>
                                    <span class="ml-6 flex items-center">
                                        <!-- Expand icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-mobile-2">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-0" name="size[]" value="2l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500">2L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-1" name="size[]" value="6l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500">6L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-2" name="size[]" value="12l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-size-2" class="ml-3 min-w-0 flex-1 text-gray-500">12L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-3" name="size[]" value="18l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-size-3" class="ml-3 min-w-0 flex-1 text-gray-500">18L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-4" name="size[]" value="20l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-size-4" class="ml-3 min-w-0 flex-1 text-gray-500">20L</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-5" name="size[]" value="40l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                        <label for="filter-mobile-size-5" class="ml-3 min-w-0 flex-1 text-gray-500">40L</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <main class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900">Prodotti</h1>

                <div class="flex items-center">
                    <div class="relative inline-block text-left">
                        <div>
                            <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" id="menu-button" aria-expanded="false" aria-haspopup="true">
                                Sort
                                <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
                        <div class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <!--
                  Active: "bg-gray-100", Not Active: ""

                  Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                -->
                                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900" role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1" id="menu-item-1">Best Rating</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1" id="menu-item-2">Newest</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1" id="menu-item-3">Price: Low to High</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1" id="menu-item-4">Price: High to Low</a>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                        <span class="sr-only">View grid</span>
                        <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v2.5A2.25 2.25 0 004.25 9h2.5A2.25 2.25 0 009 6.75v-2.5A2.25 2.25 0 006.75 2h-2.5zm0 9A2.25 2.25 0 002 13.25v2.5A2.25 2.25 0 004.25 18h2.5A2.25 2.25 0 009 15.75v-2.5A2.25 2.25 0 006.75 11h-2.5zm9-9A2.25 2.25 0 0011 4.25v2.5A2.25 2.25 0 0013.25 9h2.5A2.25 2.25 0 0018 6.75v-2.5A2.25 2.25 0 0015.75 2h-2.5zm0 9A2.25 2.25 0 0011 13.25v2.5A2.25 2.25 0 0013.25 18h2.5A2.25 2.25 0 0018 15.75v-2.5A2.25 2.25 0 0015.75 11h-2.5z" clip-rule="evenodd" />
                        </svg>
                    </button>
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
                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                    <!-- Filters -->
                    <form class="hidden lg:block">
                        <!-- <h3 class="sr-only">Categories</h3>
                        <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                            <li>Totes</li>
                            <li>Backpacks</li>
                            <li>Travel Bags</li>
                            <li>Hip Bags</li>
                            <li>Laptop Sleeves</li>
                        </ul> -->
                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                                <!-- Expand/collapse section button -->
                                <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Brand</span>
                                    <span class="ml-6 flex items-center">
                                        <!-- Expand icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-0">
                                <div class="space-y-4">
                                    <?php
                                    $displayed_parents = []; // array vuoto per tenere traccia dei valori già visualizzati
                                    foreach ($product_list as $key => $value) {
                                        // verifica se il valore è già stato visualizzato
                                        if (!in_array($value['parent'], $displayed_parents)) {
                                            // aggiungi il valore attuale all'array di valori visualizzati
                                            $displayed_parents[] = $value['parent'];
                                    ?>
                                            <div class="flex items-center">
                                                <input data-type="categories" data-parent="<?= strtolower($value['data-parent']); ?>" id="filter-color-<?= $key; ?>" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                                <label for="filter-color-<?= $key; ?>" class="ml-3 text-sm text-gray-600"><?= $value['parent']; ?></label>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                                <!-- Expand/collapse section button -->
                                <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-1" aria-expanded="false">
                                    <span class="font-medium text-gray-900">Category</span>
                                    <span class="ml-6 flex items-center">
                                        <!-- Expand icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        <!-- Collapse icon, show/hide based on section open state. -->
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-1">
                                <div class="space-y-4">
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
                                                <div class="flex items-center">
                                                    <input data-type="subcategories" data-parent="<?= strtolower($value['data-parent']); ?>" data-children="<?= strtolower($value['data-children']); ?>" id="filter-category-<?= '10' . $key; ?>" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                                    <label for="filter-category-<?= '10' . $key; ?>" class="ml-3 text-sm text-gray-600"><?= $value['children'][0]; ?></label>
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

                    <!-- Your content -->
                    <div id="contProd" class="flex flex-wrap items-center justify-evenly w-full relative lg:col-span-3">
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
            </section>
        </main>
    </div>
</div>
<!-- 
<section>
    <div class="mx-auto max-w-screen-2xl px-4 py-6">
        <h1 class="text-5xl font-bold tracking-tight text-gray-900 text-center">Prodotti</h1>
    </div>
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
                                        <li class="w-full flex items-center">
                                            <input data-type="categories" data-parent="<?= strtolower($value['data-parent']); ?>" id="<?= $key . '-checkbox'; ?>" type="checkbox" value="" class="w-4 h-4  accent-pink-500 bg-pink-100">
                                            <label for="<?= $key . '-checkbox'; ?>" class="w-full py-1 ml-2 font-medium text-emerald-900"><?= $value['parent']; ?></label>
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
                                            <li class="w-full flex items-center">
                                                <input data-type="subcategories" data-parent="<?= strtolower($value['data-parent']); ?>" data-children="<?= strtolower($value['data-children']); ?>" id="<?= '10' . $key . '-checkbox'; ?>" type="checkbox" value="" class="w-4 h-4 accent-pink-500 bg-pink-100 ">
                                                <label for="<?= '10' . $key . '-checkbox'; ?>" class="w-full py-1 ml-2 font-medium text-emerald-900"><?= $value['children'][0]; ?></label>
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
                        <div class="flex gap-2 p-2 mx-auto border border-pink-600 rounded-lg items-center justify-center">Reset<img class="h-6 w-6 hover:animate-spin" src="<?= get_image_path('svg/reset.svg'); ?>" alt="bottone di reset" srcset=""></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between border-b border-gray-200 bg-white px-4 py-3 sm:px-6 z-10 min-w-full">
                    <div class="flex flex-1 justify-between items-center">
                        <button type="button" id="prevNavigationTop" class="focus:outline-none btnStyle px-3 rotate-180">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <nav id="navigationProductTop" aria-label="Pagination">
                            <ul class="isolate inline-flex -space-x-px rounded-md shadow-sm"></ul>
                        </nav>
                        <button type="button" id="nextNavigationTop" class="focus:outline-none btnStyle px-3">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="contProd" class="flex flex-wrap items-center justify-evenly w-full relative py-10">
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
                <div class="flex items-center justify-between border-b border-gray-200 bg-white px-4 py-3 sm:px-6 z-10 min-w-full">
                    <div class="flex flex-1 justify-between items-center">
                        <button type="button" id="prevNavigationBottom" class="focus:outline-none btnStyle px-3 rotate-180">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <nav id="navigationProductBottom" aria-label="Pagination">
                            <ul class="isolate inline-flex -space-x-px rounded-md shadow-sm"></ul>
                        </nav>
                        <button type="button" id="nextNavigationBottom" class="focus:outline-none btnStyle px-3">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->

<!-- footer -->
<?= do_shortcode('[views section=footer name=footerView]'); ?>