<?php
$product = $params['params'];
?>
<div data-parent="<?= strtolower($product['data-parent']); ?>" data-children="<?= strtolower($product['data-children']); ?>" id="<?= $product['id']; ?>" class="transition-all duration-500 ease-linear col-span-1 mb-4 w-72 md:w-[225px] xl:w-64 2xl:w-72 h-96 rounded-lg shadow-lg hover:shadow-pink-600 hover:bg-pink-50">
    <a href="<?= $product['link']; ?>">
        <div class="w-72 md:w-[225px] xl:w-64 2xl:w-72 h-96 p-5 text-left flex flex-col justify-between">
            <div id="containerImageCard" class="flex h-48 items-center justify-center overflow-hidden relative">
                <?= $product['image']; ?>
                <span class="absolute top-2 left-2 inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                    <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                    Disponibile
                </span>
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
                <div class="">
                    <button class="bg-emerald-300 flex group h-10 items-center justify-center overflow-hidden relative rounded-lg shadow text-lg">
                        <div class="absolute inset-0 w-0 bg-emerald-400 transition-all duration-500 ease group-hover:w-full"></div>
                        <span class="relative text-emerald-900 group-hover:text-white">Dettagli</span>
                    </button>
                </div>
            </div>
        </div>
    </a>
</div>