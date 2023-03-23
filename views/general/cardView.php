<?php
$product = $params['params'];
?>
<div data-parent="<?= strtolower($product['data-parent']); ?>" data-children="<?= strtolower($product['data-children']); ?>" id="<?= $product['id']; ?>" class="transition-all duration-500 ease-linear col-span-1 mb-4 w-72 md:w-[225px] xl:w-64 2xl:w-72 h-96 rounded-lg shadow-lg hover:shadow-pink-600 hover:bg-pink-50">
    <a href="<?= $product['link']; ?>">
        <div class="w-72 md:w-[225px] xl:w-64 2xl:w-72 h-96 p-5 text-left flex flex-col justify-between">
            <div id="containerImageCard" class="flex h-48 items-center justify-center overflow-hidden">
                <?= $product['image']; ?>
            </div>
            <div class="flex flex-col justify-between h-48">
                <div>
                    <h4 class="font-bold lg:text-2xl text-emerald-600 text-xl">
                        <?= $product['name']; ?>
                    </h4>
                    <h3 class="text-4xl font-bold text-pink-600">
                        <?= '€ ' . $product['price']; ?>
                    </h3>
                    <p class="text-sm">
                        <?= $product['short_description']; ?>
                    </p>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p>0</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="">
                        <button class="bg-emerald-300 flex group h-10 items-center justify-center overflow-hidden relative rounded-lg shadow text-lg">
                            <div class="absolute inset-0 w-0 bg-emerald-400 transition-all duration-500 ease group-hover:w-full"></div>
                            <span class="relative text-emerald-900 group-hover:text-white">Dettagli</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>