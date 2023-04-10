<?php
$product = $params['params'];
?>
<div data-parent="<?= strtolower($product['data-parent']); ?>" data-children="<?= strtolower($product['data-children']); ?>" id="<?= $product['id']; ?>" class="transition-all duration-1000 ease-linear col-span-1 mb-4 w-80 h-[432px] rounded-xl shadow-lg hover:shadow-pink-600 text-slate-900 swiper-slide">
    <a href="<?= $product['link']; ?>">
        <div class="w-80 h-[432px] text-left flex flex-col rounded-xl">
            <div id="containerImageCard" class="flex h-48 items-center justify-center overflow-hidden relative rounded-t-xl">
                <?= $product['image']; ?>
            </div>
            <div class="flex flex-col justify-between h-60 p-5">
                <div>
                    <p class="uppercase text-sm tracking-widest"><?= $product['parent']; ?></p>
                    <h4 class="font-semibold text-3xl overflow-hidden">
                        <?= $product['name']; ?>
                    </h4>
                    <p class="font-light">
                        <?= $product['short_description']; ?>
                    </p>
                </div>
                <div class="">
                    <h3 class="text-4xl font-semibold text-emerald-600 py-2">
                        <?= '€ ' . $product['price']; ?>
                    </h3>
                    <a href="#" class="">
                        <button class="btnStyle min-w-full">
                            Vai ai dettagli
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </a>
</div>