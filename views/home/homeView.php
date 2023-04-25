<?php
$product_list = render_products(10); ?>
<div class="text-emerald-900">
    <!-- navbar -->
    <?= do_shortcode("[views section=general name=navbarView]") ?>
    <header class="py-10 lg:py-20 w-11/12 mx-auto">
        <!-- title -->
        <div class="flex flex-col sm:flex-row justify-center items-center pb-10 gap-10">
            <div class="flex flex-col gap-2 max-w-2xl">
                <div class="text-left">
                    <h1 class="text-3xl lg:text-5xl xl:text-6xl font-semibold text-emerald-600 mb-1 md:mb-5">
                        <span class="text-pink-600">Benvenuti alla</span> Merceria Creativa Tania
                    </h1>
                    <p class="text-lg md:text-xl lg:text-2xl xl:text-3xl mb-1 md:mb-5">Il tuo negozio online per il cucito creativo</p>
                    <button class="btnStyle">Scopri la nostra selezione</button>
                </div>
            </div>
            <!-- image -->
            <div class="lg:max-w-sm xl:max-w-md max-w-xs border-2 border-slate-100">
                <img class="" src="<?= get_image_path("foto.jpeg") ?>" alt="Immagine del negozio">
            </div>
        </div>
        <!-- brand -->
        <div class="flex justify-center items-center gap-10 pt-5 opacity-0 translate-y-52 duration-1000 FadeDown">
            <?php
            $logos = ["vlieseline.png", "adriafil.png", "iNastriDiMirta.png", "renkalik.webp"];
            foreach ($logos as $logo) {
                $imagePath = get_image_path("logo/logo-$logo"); ?>
                <div class='w-32 h-32 flex justify-center items-center'><img class='block' src="<?= $imagePath ?>" alt='logo-<?= $logo ?> '></div>
            <?php
            }
            ?>
        </div>
    </header>
    <main class="space-y-20">
        <!-- welcome phrase -->
        <section id="welcome" class="FadeDown bg-emerald-50 py-5 flex flex-col items-center px-5 md:px-10">
            <div class="flex justify-center mx-auto py-5 w-11/12">
                <div class="flex flex-col md:grid md:grid-cols-3 max-w-5xl text-left">
                    <div class="col-span-1 p-2 lg:p-5">
                        <p class="text-xl md:text-2xl lg:text-3xl xl:text-4xl">Sei un <span class="text-emerald-600 font-semibold">creativo</span> alla ricerca di prodotti <span class="text-emerald-600 font-semibold"> unici</span> per dare libero sfogo alla tua<span class="text-emerald-600 font-semibold"> fantasia</span>?</p>

                    </div>
                    <div class="col-span-2 p-2 lg:p-5">
                        <p class="lg:text-lg xl:text-xl mb-5">Da Merceria Creativa Tania troverai tutto ciò di cui hai bisogno per dare vita ai tuoi progetti di <span class="font-bold text-emerald-600">cucito</span> e <span class="font-bold text-emerald-600">sartoria</span>, dai tessuti di <span class="font-bold text-emerald-600">alta qualità</span> ai bottoni <span class="font-bold text-emerald-600">esclusivi</span> e agli accessori più <span class="font-bold text-emerald-600">ricercati</span>. Siamo qui per aiutarti a dare forma alle tue idee e a creare capi unici e sorprendenti.</p>
                        <p class="text-xl xl:text-2xl text-emerald-600 font-semibold">Esplora il nostro negozio online e scopri l'infinita possibilità di creazione!</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- best-selling products -->
        <section class="section opacity-0 translate-y-52 duration-1000 py-5 flex flex-col items-center px-5 md:px-10">
            <div class="max-w-7xl mx-auto max-2xl:w-11/12">
                <div id="swiper" class="w-full h-full max-2xl:overflow-hidden">
                    <div class="flex justify-between">
                        <h2 class="text-3xl md:text-4xl font-semibold text-left py-5">I più venduti<span class="">. </span><span class="text-neutral-500">Prodotti più venduti del mese</span></h2>
                        <div class="flex justify-end items-center gap-5 py-5">
                            <button type="button" id="prev" class="focus:outline-none btnStyle rotate-180">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <button type="button" id="next" class="focus:outline-none btnStyle">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="swiper-wrapper">
                        <?php // ciclo foreach per stampare i prodotti

                        foreach ($product_list as $product) {
                            echo $this->SetGeneralsShortCodesParams(["section" => "general", "name" => "cardView", "params" => $product]);
                        } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-emerald-50 duration-1000 flex flex-col mx-auto section">
            <div class="gap-10 grid lg:grid-cols-3 max-w-7xl mx-auto relative py-10 lg:py-20 sm:gap-16 sm:grid-cols-2 w-11/12 xl:gap-20">
                <img class="hidden md:block absolute inset-x-0 top-5" src="<?= get_image_path("svg/linea-trattegiata.svg") ?>" style="color: transparent;">
                <div class="relative flex flex-col items-center max-w-xs mx-auto col-span-1">
                    <div class="mb-4 sm:mb-10 max-w-[140px] mx-auto">
                        <img class="rounded-3xl w-full" src="<?= get_image_path("svg/step-1.svg") ?>" style="color: transparent;">
                    </div>
                    <div class="text-center mt-auto space-y-5"><span class="nc-Badge inline-flex px-2.5 py-1 rounded-full font-medium relative text-red-800 bg-red-100">Step 1</span>
                        <h3 class="text-lg font-semibold">Filtra &amp; Scropri</h3><span class="block text-slate-600 text-md leading-6">Filtri intelligenti e suggerimenti facilitano la ricerca</span>
                    </div>
                </div>
                <div class="relative flex flex-col items-center max-w-xs mx-auto col-span-1">
                    <div class="mb-4 sm:mb-10 max-w-[140px] mx-auto">
                        <img class="rounded-3xl w-full" src="<?= get_image_path("svg/step-2.svg") ?>" style="color: transparent;">
                    </div>
                    <div class="text-center mt-auto space-y-5"><span class="nc-Badge inline-flex px-2.5 py-1 rounded-full font-medium relative text-indigo-800 bg-indigo-100">Step 2</span>
                        <h3 class="text-lg font-semibold">Aggiungi al carrello</h3><span class="block text-slate-600 text-md leading-6">Seleziona facilmente gli articoli e aggiungili al carrello</span>
                    </div>
                </div>
                <div class="relative flex flex-col items-center max-w-xs mx-auto col-span-1">
                    <div class="mb-4 sm:mb-10 max-w-[140px] mx-auto">
                        <img class="rounded-3xl w-full" src="<?= get_image_path("svg/step-3.svg") ?>" style="color: transparent;">
                    </div>
                    <div class="text-center mt-auto space-y-5"><span class="nc-Badge inline-flex px-2.5 py-1 rounded-full font-medium relative text-yellow-800 bg-yellow-100">Step 3</span>
                        <h3 class="text-lg font-semibold">Spedizione Rapida</h3><span class="block text-slate-600 text-md leading-6">Il corriere confermerà e spedirà rapidamente a te</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section opacity-0 translate-y-52 duration-1000 flex flex-col w-11/12 max-w-7xl mx-auto">
            <div class="relative flex flex-col sm:flex-row sm:items-end justify-between mb-12 lg:mb-14 text-neutral-900">
                <div class="">
                    <h2 class=" text-3xl md:text-4xl font-semibold">Acquista per categoria</h2>
                </div>
            </div>
            <div>
                <ul class="md:px-5 flex flex-wrap md:justify-between justify-around gap-1">
                    <?php
                    $data = [
                        ["img_src" => "lana.jpeg", "h2" => "Lana"],
                        ["img_src" => "uncinetto.jpeg", "h2" => "Uncinetto"],
                        ["img_src" => "tessuti.jpeg", "h2" => "Tessuti"],
                        ["img_src" => "faiDaTeCreativo.jpeg", "h2" => "Fai da te creativo"],
                    ];
                    foreach ($data as $d) {
                        $image_path = get_image_path($d["img_src"]); ?>
                        <li class="rounded-xl hover:scale-105 cursor-pointer transform duration-500">
                            <a href="">
                                <img class="2xl:h-80 2xl:w-72 w-screen h-24 sm:w-32 sm:h-52 md:w-40 lg:h-72 lg:w-52 object-cover rounded-xl xl:h-80 xl:w-64 " src="<?= $image_path ?>" alt="<?= $d["h2"] ?>">
                                <h2 class="text-lg sm:text-2xl text-neutral-900 font-semibold"><?= $d['h2']; ?></h2>
                                <span class="block mt-0.5 sm:mt-1.5 text-sm md:text-md text-neutral-500">10+ categories</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </section>
        <!-- news letter -->
        <section class="section opacity-0 translate-y-52 duration-1000 w-11/12 max-w-7xl mx-auto">
            <?= do_shortcode("[views section=general name=newsletterView]") ?>
        </section>
        <?= do_shortcode("[views section=reviews name=reviewsViews]") ?>
    </main>
</div>
<?= do_shortcode("[views section=footer name=footerView]") ?>