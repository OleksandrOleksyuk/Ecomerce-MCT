<?php
$product = $params['params'];
?>
<div data-parent="<?php echo strtolower($product['data-parent']); ?>" data-children="<?php echo strtolower($product['data-children']); ?>" id="<?php echo $product['id']; ?>" class="transition-all duration-500 ease-linear col-span-1 mb-4">
    <div class="w-72 h-[27.1875rem] bg-cyan-100 p-5 text-left flex flex-col justify-between rounded-lg border-2 border-green-50">
        <div id="containerImageCard" class="flex h-48 items-center justify-center overflow-hidden">
            <?php echo $product['image']; ?>
        </div>
        <div class="flex flex-col justify-between h-52">
            <div>
                <h4 class="text-2xl font-bold text-emerald-600">
                    <?php echo $product['name']; ?>
                </h4>
                <h3 class="text-4xl font-bold text-pink-600">
                    <?php echo  '€ ' . $product['price']; ?>
                </h3>
                <p class="text-sm">
                    <?php echo $product['short_description']; ?>
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
                    <button class="group relative h-10 w-40 overflow-hidden rounded-lg bg-white text-lg shadow">
                        <div class="absolute inset-0 w-5 bg-emerald-400 transition-all duration-500 ease-out group-hover:w-full"></div>
                        <span class="relative text-emerald-900 group-hover:text-white">Aggiungi</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>