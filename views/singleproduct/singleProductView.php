<?php
$product_list = render_products(4);
?>
<?php echo do_shortcode('[views section=general name=navbarView]'); ?>
<main class="text-emerald-900">
    <section class="flex flex-col lg:flex-row mx-auto justify-center items-center max-w-7xl lg:gap-8 p-10">
        <div class="lg:w-1/2 flex flex-col sm:flex-row-reverse lg:flex-col justify-center items-center lg:items-end p-5">
            <img class="w-64 h-64 sm:w-96 sm:h-96 xl:w-[400px] xl:h-[400px] mb-5" src="<?= get_image_path('test.jpeg'); ?>" alt="">
            <div class="justify-between max-sm:w-64 max-sm:flex lg:flex lg:w-96 xl:w-[400px]">
                <div class="active border-[1px] border-emerald-500 rounded-lg">
                    <img class="w-14 h-14 sm:w-20 sm:h-20 lg:w-24 lg:h-24 rounded-lg" src=" <?= get_image_path('test.jpeg'); ?>" alt="">
                </div>
                <div>
                    <img class="w-14 h-14 sm:w-20 sm:h-20 lg:w-24 lg:h-24" src="<?= get_image_path('test.jpeg'); ?>" alt="">
                </div>
                <div>
                    <img class="w-14 h-14 sm:w-20 sm:h-20 lg:w-24 lg:h-24" src="<?= get_image_path('test.jpeg'); ?>" alt="">
                </div>
                <div>
                    <img class="w-14 h-14 sm:w-20 sm:h-20 lg:w-24 lg:h-24" src="<?= get_image_path('test.jpeg'); ?>" alt="">
                </div>
            </div>
        </div>
        <div class="lg:w-1/2 p-10">
            <div class="space-y-2">
                <h1 class="text-emerald-900 font-bold text-5xl lg:text-6xl">Cupido</span>
                    <h3 class="font-bold text-3xl lg:text-4xl  text-pink-500">€ 4,90</h3>
                    <!-- <div class="flex gap-1 ">
                        <?php
                        for ($i = 0; $i < 5; $i++) {
                        ?>
                            <img class="w-6 h-6" src="<?= get_image_path("svg/star.svg"); ?>" alt="">
                        <?php
                        }
                        ?>
                    </div> -->
                    <p class=" lg:text-lg font-light">Un vero gioco di “vedo non vedo”, luce e ombra, dove la lavorazione semi-ingabbiata intorno al filo ne esalta la rotondità e gli dona una struttura rotonda e corposa.
                        Il punto di forza è il contrasto tra il filo di base e la legatura metallizzata tono su tono che lo avvolge.
                    </p>
                    <div class="lg:text-lg font-light">
                        <p><span class="font-medium">Composizione</span>: 40% cotone 35% acrilico 17 % poliammide 4% altre fibre 4% fibra metallizzata</p>
                        <p class=""><span class="font-medium">Ferri:</span> 3mm</p>
                    </div>
                    <!--COLORS-->
                    <div>
                        <div class="flex gap-2">
                            <span class="font-medium lg:text-lg">COLORE:</span>
                            <div class="w-8 h-8 rounded-full bg-emerald-400 ring-1 outline outline-offset-2 outline-emerald-400"></div>
                            <div class="w-8 h-8 rounded-full bg-gray-400"></div>
                            <div class="w-8 h-8 rounded-full bg-black"></div>
                            <div class="w-8 h-8 rounded-full bg-pink-400"></div>
                            <div class="w-8 h-8 rounded-full bg-yellow-400"></div>
                            <div class="w-8 h-8 rounded-full bg-orange-400"></div>
                            <div class="w-8 h-8 rounded-full bg-cyan-400"></div>
                        </div>
                    </div>
            </div>
            <button class="text-left max-md:w-full px-10 py-2 mt-5 rounded-lg bg-emerald-600 flex justify-center items-center">
                <p class="text-stone-100 md:text-xl">Aggiungi al carrello</p>
            </button>

        </div>
    </section>
    <section class="py-5 flex flex-col items-center px-5 md:p-10">
        <div class="flex flex-col max-w-7xl mx-auto overflow-hidden w-11/12">
            <div class="flex flex-col">
                <div class="flex flex-col items-start md:grid md:grid-cols-2 md:px-5 md:items-center text-left py-5">
                    <h2 class="text-2xl font-black text-emerald-600 md:text-3xl lg:text-4xl">Prodotti simili</h2>
                </div>
                <div class="flex justify-start items-center gap-5 relative mx-auto"> <!-- overflow-x-auto -->
                    <?php
                    // ciclo foreach per stampare i prodotti
                    foreach ($product_list as $product) {
                        echo $this->SetGeneralsShortCodesParams(["section" => "general", "name" => "cardView", "params" => $product]);
                    } ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?= do_shortcode("[views section=footer name=footerView]"); ?>