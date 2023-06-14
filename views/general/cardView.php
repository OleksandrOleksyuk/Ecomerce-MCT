<?php
$product = $params["params"]; ?>
<div data-link="<?= $product["link"] ?>" data-parent="<?= strtolower($product["data-parent"]) ?>"
     data-children="<?= strtolower($product["data-children"]) ?>" id="<?= $product["id"] ?>"
     class="opacity-0 -translate-y-32 duration-500 cardView col-span-1 mb-10 w-80 h-[440px] rounded-xl text-slate-900 swiper-slide
     shadow-lg md:hover:shadow-lg md:hover:shadow-pink-600">
    <div class="w-80 h-[440px] text-left flex flex-col rounded-xl">
        <div id="containerImageCard" class="flex h-[190px] items-center justify-center overflow-hidden relative rounded-t-xl">
            <?= $product["image"] ?>
            <div class="absolute top-5 left-5 py-1 px-2 text-sm rounded-lg <?= $product["available"]
                ? "bg-emerald-50 text-emerald-500"
                : "bg-red-50 text-red-500" ?>"><?= $product["available"]
                    ? "&#9083; Disponibile"
                    : "&#10060; Non disponibile" ?></div>
        </div>
        <div class="flex flex-col justify-between h-[250px] p-5">
            <div>
                <p class="uppercase text-sm tracking-widest"><?= $product["parent"] ?></p>
                <a href="<?= $product["link"] ?>" class="">
                    <h4 class="font-semibold text-lg overflow-hidden">
                        <?= $product["name"] ?>
                    </h4>
                </a>
                <p class="font-light text-sm">
                    <?php
                    $shortDescription = $product["short_description"];
                    if (strlen($shortDescription) > 80) {
                        $shortDescription = substr($shortDescription, 0, 80) . "...";
                    }
                    echo $shortDescription;
                    ?>
                </p>
            </div>
            <div class="">
                <h3 id="priceSingleElement" class="text-4xl font-semibold text-emerald-600 py-2">
                    <?= "€ " . $product["price"] ?>
                </h3>
                <a href="<?= $product["link"] ?>" class="">
                    <button class="btnStyle min-w-full transition duration-700 ease-in-out <?= $product["available"] ? "" : "disabled" ?>">
                        Vai ai dettagli
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>