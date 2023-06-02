<?php
$product_list = render_products();
$product_id = get_query_var("product_id");
$product = render_single_product($product_id);
$image_src = isset($product["variations"][0]["image"]) ? $product["variations"][0]["image"] : $product["image"];
$opacityClass = "hidden";
foreach ($product["gallery_images"] as $image) {
    if (strpos($image, "gallery") !== false) {
        $opacityClass = "max-sm:flex lg:flex";
        break;
    }
}
?>
<?= do_shortcode("[views section=general name=navbarView]") ?>
<main data-type="<?= $product["type"] ?>" id="singleProduct" data-id="<?= $product["id"] ?>" data-link="<?= $product["link"] ?>"
      class="text-emerald-900">
    <section class="flex flex-col lg:flex-row-reverse mx-auto justify-center items-center max-w-7xl p-10">
        <div class="lg:w-1/2 h-[550px] flex flex-col sm:flex-row-reverse lg:flex-col justify-center items-center gap-5 p-5">
            <?php
            if (count($product["variations"]) > 0) { ?>
                <img id="imgFirst" class="w-64 h-64 sm:w-96 sm:h-96 mb-5 rounded-lg p-2 object-cover" src="<?= $image_src ?>"
                     alt="immagine grande del prodotti">
                <div id="gallery" class="gap-5 <?= $opacityClass ?>">
                    <img id="imgFirst--small" class="w-14 h-14 sm:w-20 sm:h-20 lg:w-24 lg:h-24 object-cover rounded-lg mt-2 activeProduct"
                         src="<?= $image_src ?>" alt="immagine piccola del prodotto dentro la galleria">
                    <?php
                    foreach ($product["gallery_images"] as $value) {
                        if (strpos($value, "gallery") !== false) { ?>
                            <img class="w-14 h-14 sm:w-20 sm:h-20 lg:w-24 lg:h-24 rounded-lg object-cover mt-2" src="<?= $value ?>"
                                 alt="galleria delle immagini">
                            <?php
                        }
                    } ?>
                </div>
                <?php
            } else { ?>
                <div id="imgFirstSimple">
                    <?= $product["image"] ?>
                </div>
                <div id="gallerySingle" class="gap-5 <?= $opacityClass ?>">
                    <?= $product["image"] ?>
                    <?php
                    foreach ($product["gallery_images"] as $value) {
                        if (strpos($value, "gallery") !== false) { ?>
                            <img class="w-14 h-14 sm:w-20 sm:h-20 lg:w-24 lg:h-24 rounded-lg object-cover mt-2" src="<?= $value ?>"
                                 alt="galleria delle immagini">
                            <?php
                        }
                    } ?>
                </div>
                <?php
            } ?>
        </div>
        <div class="lg:w-1/2 md:p-5 flex flex-col justify-between">
            <div class="space-y-2">
                <p id="singleProduct--categories" class="uppercase tracking-widest"><?= $product["parent"] ?></p>
                <h1 id="singleProduct--name" class="text-emerald-900 text-4xl lg:text-5xl"><?= $product["name"] ?></h1>
                <p class="lg:text-lg font-light"><?= $product["description"] ?></p>
                <?php
                if (count($product["variations"]) > 0) { ?>
                    <div class="mt-5 <?= $product["variations"][0] ? "" : "hidden" ?>">
                        <span class="font-semibold lg:text-lg">COLORE:</span> <span id="color" class="uppercase text-pink-500"><?= $product["variations"][0]["attributes"]["attribute_pa_color"] ?></span>
                        <div id="colorSingleProduct" class="flex gap-2 flex-wrap">
                            <?php
                            foreach ($product["variations"] as $key => $value) {

                                $color = $value["attributes"]["attribute_pa_color"];
                                $image_src = "";
                                $active = $key === 0 ? "activeProduct" : "";
                                foreach ($product["gallery_images"] as $img) {
                                    if (strpos($img, $color) !== false) {
                                        $image_src = $img;
                                        break;
                                    }
                                }
                                ?>
                                <img id="<?= $value["id"] ?>" data-maxQty="<?= $value["max_qty"] ?>" data-color="<?= $color ?>"
                                     data-image="<?= $value["image"] ?>" class="h-10 w-10 rounded-full object-cover <?= $active ?>"
                                     src="<?= $image_src ?>" alt="immagine del colore da selezionare <?= $color ?>">
                                <?php
                            } ?>
                        </div>
                    </div>
                    <?php
                } ?>
            </div>
            <div class="flex flex-col items-start justify-between gap-5 mt-5">
                <div>
                    <h3 id="singleProduct--price" class="text-5xl font-semibold text-emerald-600 py-2">
                        <?= "€ " . $product["price"] ?>
                    </h3>
                </div>
                <div class="flex gap-5">
                    <a id="addToSidebarBtn" href="#" class="btnStyle flex items-center gap-2">
                        <div>
                            <svg width="20" height="20" viewBox="0 0 20 20" class="fill-current">
                                <path
                                    d="M18.0738 0.849609H16.0676C15.8171 0.850867 15.5754 0.942155 15.3867 1.10681C15.1979 1.27146 15.0747 1.4985 15.0394 1.74648L14.4769 5.80898H13.3957V3.40273C13.3933 3.16503 13.2982 2.93766 13.1307 2.76899C12.9632 2.60031 12.7365 2.50367 12.4988 2.49961H10.0801C10.0533 2.27727 9.94785 2.07185 9.78277 1.92052C9.61769 1.7692 9.40389 1.68196 9.18007 1.67461H6.45194C6.3269 1.67779 6.20376 1.70595 6.08977 1.75745C5.97578 1.80895 5.87325 1.88274 5.78821 1.97447C5.70318 2.0662 5.63736 2.17402 5.59464 2.29158C5.55191 2.40914 5.53315 2.53406 5.53944 2.65898V3.32461H3.14882C2.91201 3.32126 2.68348 3.41171 2.51312 3.57622C2.34275 3.74073 2.24437 3.96595 2.23944 4.20273V5.81211C2.09795 5.81502 1.95882 5.84901 1.83192 5.91165C1.70501 5.97429 1.59343 6.06406 1.50507 6.17461C1.41421 6.29057 1.35071 6.42556 1.31933 6.5695C1.28794 6.71343 1.28948 6.8626 1.32382 7.00586C1.32248 7.02146 1.32248 7.03714 1.32382 7.05273L3.23632 12.9371C3.29128 13.1429 3.41335 13.3244 3.58318 13.4529C3.753 13.5814 3.96087 13.6495 4.17382 13.6465H13.3863C13.7359 13.6461 14.0736 13.5193 14.3372 13.2896C14.6008 13.0599 14.7725 12.7428 14.8207 12.3965L16.2488 2.09961H18.0707C18.2365 2.09961 18.3954 2.03376 18.5126 1.91655C18.6298 1.79934 18.6957 1.64037 18.6957 1.47461C18.6957 1.30885 18.6298 1.14988 18.5126 1.03267C18.3954 0.915457 18.2365 0.849609 18.0707 0.849609H18.0738ZM12.1363 5.79336H10.0926V3.74961H12.1457L12.1363 5.79336ZM6.78944 2.91523H8.84257V3.39961V5.79023H6.78944V2.91523ZM3.48944 4.56523H5.53944V5.79336H3.48944V4.56523ZM13.5832 12.2246C13.5771 12.2724 13.5537 12.3163 13.5174 12.3479C13.4811 12.3796 13.4345 12.3969 13.3863 12.3965H4.37382L2.65194 7.04961H14.3019L13.5832 12.2246Z"></path>
                                <path
                                    d="M5.31172 15.1133C4.9118 15.1102 4.51997 15.226 4.18594 15.4459C3.85191 15.6659 3.59073 15.9801 3.43553 16.3487C3.28034 16.7173 3.23813 17.1236 3.31425 17.5163C3.39037 17.9089 3.58139 18.2701 3.86309 18.5539C4.14478 18.8378 4.50445 19.0317 4.89647 19.1108C5.28849 19.19 5.6952 19.1509 6.06499 18.9986C6.43477 18.8463 6.75099 18.5876 6.97351 18.2553C7.19603 17.9229 7.31483 17.532 7.31485 17.1321C7.31608 16.868 7.26522 16.6062 7.16518 16.3617C7.06515 16.1172 6.91789 15.8949 6.73184 15.7074C6.5458 15.5199 6.3246 15.3709 6.08092 15.269C5.83725 15.167 5.57586 15.1142 5.31172 15.1133ZM5.31172 17.9008C5.15905 17.9039 5.00891 17.8615 4.88045 17.7789C4.75199 17.6964 4.65103 17.5774 4.59045 17.4373C4.52986 17.2971 4.51239 17.1421 4.54026 16.9919C4.56814 16.8418 4.64009 16.7034 4.74695 16.5943C4.85382 16.4852 4.99075 16.4104 5.14028 16.3795C5.28981 16.3485 5.44518 16.3628 5.58656 16.4205C5.72794 16.4782 5.84894 16.5767 5.93412 16.7034C6.0193 16.8302 6.06481 16.9794 6.06484 17.1321C6.06651 17.3338 5.9882 17.5279 5.84705 17.672C5.70589 17.8161 5.51341 17.8984 5.31172 17.9008Z"></path>
                                <path
                                    d="M12.9484 15.1133C12.5485 15.1102 12.1567 15.226 11.8227 15.4459C11.4886 15.6659 11.2274 15.9801 11.0723 16.3487C10.9171 16.7173 10.8748 17.1236 10.951 17.5163C11.0271 17.9089 11.2181 18.2701 11.4998 18.5539C11.7815 18.8378 12.1412 19.0317 12.5332 19.1108C12.9252 19.19 13.3319 19.1509 13.7017 18.9986C14.0715 18.8463 14.3877 18.5876 14.6102 18.2553C14.8327 17.9229 14.9516 17.532 14.9516 17.1321C14.9532 16.5989 14.7432 16.0868 14.3676 15.7083C13.9921 15.3298 13.4816 15.1158 12.9484 15.1133ZM12.9484 17.9008C12.7958 17.9039 12.6456 17.8615 12.5172 17.7789C12.3887 17.6964 12.2878 17.5774 12.2272 17.4373C12.1666 17.2971 12.1491 17.1421 12.177 16.9919C12.2049 16.8418 12.2768 16.7034 12.3837 16.5943C12.4905 16.4852 12.6275 16.4104 12.777 16.3795C12.9265 16.3485 13.0819 16.3628 13.2233 16.4205C13.3647 16.4782 13.4857 16.5767 13.5708 16.7034C13.656 16.8302 13.7015 16.9794 13.7016 17.1321C13.7032 17.3338 13.6249 17.5279 13.4838 17.672C13.3426 17.8161 13.1501 17.8984 12.9484 17.9008Z"></path>
                            </svg>
                        </div>
                        <div>
                            Aggiungi al carrello
                        </div>
                    </a>
                    <div class="flex items-center gap-2">
                        <div id="minus-btn" class="counter-btn cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-emerald-500 text-white flex justify-center items-center rounded-lg">
                            <p id="singleProduct--qnt" data-maxQnt="max_qty">1</p>
                        </div>
                        <div id="plus-btn" class="counter-btn cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 flex flex-col items-center px-5 md:p-10">
        <div class="flex flex-col max-w-7xl mx-auto w-11/12">
            <div class="flex flex-col">
                <div class="md:px-5 py-5">
                    <h2 class="text-3xl md:text-4xl font-semibold text-left py-5">Prodotti correlati</h2>
                </div>
                <div id="swiperSingleProduct" class="swiper w-full h-full" style="overflow: visible !important;">
                    <div class="swiper-wrapper flex">
                        <?php
                        // ciclo foreach per stampare i prodotti
//                        var_dump($product_list);
                        foreach ($product_list as $pippo) {
                            if ( $product["parent"] === $pippo['parent']) {
                                echo $this->SetGeneralsShortCodesParams([
                                    "section" => "general",
                                    "name" => "cardView",
                                    "params" => $pippo,
                                ]);
                            };
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- footer -->
<?= do_shortcode("[views section=footer name=footerView]") ?>
