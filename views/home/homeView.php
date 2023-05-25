<?php
$product_list = render_products(10); ?>
<div class="text-emerald-900">
    <!-- navbar -->
    <?= do_shortcode("[views section=general name=navbarView]") ?>
    <header class="py-10 lg:py-20 w-11/12 mx-auto max-w-7xl">
        <!-- title -->
        <div class="flex flex-col-reverse sm:flex-row justify-center items-center pb-10 gap-10">
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
        <section id="welcome" class="FadeDown bg-emerald-50 py-5 flex flex-col items-center px-5 md:px-10">
            <div class="flex flex-col md:grid md:grid-cols-3 text-left py-5 w-11/12 mx-auto max-w-7xl">
                <div class="col-span-1 p-2 lg:p-5">
                    <p class="text-xl md:text-2xl lg:text-3xl xl:text-4xl">Sei un <span class="text-emerald-600 font-semibold">creativo</span> alla ricerca di prodotti <span class="text-emerald-600 font-semibold"> unici</span> per dare libero sfogo alla tua<span class="text-emerald-600 font-semibold"> fantasia</span>?</p>
                </div>
                <div class="col-span-2 p-2 lg:p-5">
                    <p class="lg:text-lg xl:text-xl mb-5">Da Merceria Creativa Tania troverai tutto ciò di cui hai bisogno per dare vita ai tuoi progetti di <span class="font-bold text-emerald-600">cucito</span> e <span class="font-bold text-emerald-600">sartoria</span>, dai tessuti di <span class="font-bold text-emerald-600">alta qualità</span> ai bottoni <span class="font-bold text-emerald-600">esclusivi</span> e agli accessori più <span class="font-bold text-emerald-600">ricercati</span>. Siamo qui per aiutarti a dare forma alle tue idee e a creare capi unici e sorprendenti.</p>
                    <p class="text-xl xl:text-2xl text-emerald-600 font-semibold">Esplora il nostro negozio online e scopri l'infinita possibilità di creazione!</p>
                </div>
            </div>
        </section>
        <!-- best-selling products -->
        <section id="bestSellingProducts" class="section opacity-0 translate-y-52 duration-1000 py-5 flex flex-col items-center px-5 md:px-10">
            <div class="max-w-7xl mx-auto max-2xl:w-11/12">
                <div class="flex flex-wrap justify-between mb-5">
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
                <div id="swiper--bestSellingProducts" class="w-full h-full ">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($product_list as $product) {
                            echo $this->SetGeneralsShortCodesParams(["section" => "general", "name" => "cardView", "params" => $product]);
                        } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-emerald-50 duration-1000 flex flex-col mx-auto section">
            <div class="gap-10 grid lg:grid-cols-4 max-w-7xl mx-auto relative py-10 lg:py-20 sm:gap-10 sm:grid-cols-2 w-11/12">
                <img class="hidden md:block absolute inset-x-0 top-5" src="<?= get_image_path("svg/linea-trattegiata.svg") ?>" style="color: transparent;">
                <div class="relative flex flex-col items-center max-w-xs mx-auto col-span-1 translate-x-12 opacity-0 FadeRight">
                    <div class="mb-4 sm:mb-10 w-36 h-36 mx-auto">
                        <img class="rounded-3xl w-full" src="<?= get_image_path("svg/step-1.svg") ?>" style="color: transparent;">
                    </div>
                    <div class="text-center space-y-2">
                        <h3 class="text-lg font-semibold">Semplicità di utilizzo</h3>
                        <span class="block text-slate-600 text-md leading-6">Filtri intelligenti e suggerimenti rendono la ricerca facile e veloce</span>
                    </div>
                </div>
                <div class="relative flex flex-col items-center max-w-xs mx-auto col-span-1">
                    <div class="mb-4 sm:mb-10 w-36 h-36 mx-auto">
                        <img class="rounded-3xl w-full" src="<?= get_image_path("svg/step-2.svg") ?>" style="color: transparent;">
                    </div>
                    <div class="text-center space-y-2">
                        <h3 class="text-lg font-semibold">Assistenza telefonica</h3>
                        <span class="block text-slate-600 text-md leading-6">I nostri esperti sono a tua disposizione per consigliarti il prodotto migliore per te</span>
                    </div>
                </div>
                <div class="relative flex flex-col items-center max-w-xs mx-auto col-span-1">
                    <div class="mb-4 sm:mb-10 w-36 h-36 mx-auto">
                        <img class="rounded-3xl w-full" src="<?= get_image_path("svg/step-3.svg") ?>" style="color: transparent;">
                    </div>
                    <div class="text-center space-y-2">
                        <h3 class="text-lg font-semibold">Spedizione in giornata</h3>
                        <span class="block text-slate-600 text-md leading-6">Ricevi i tuoi prodotti rapidamente grazie alla spedizione in giornata</span>
                    </div>
                </div>
                <div class="relative flex flex-col items-center max-w-xs mx-auto col-span-1">
                    <div class="mb-4 sm:mb-10 w-36 h-36 mx-auto">
                        <img class="rounded-3xl w-full" src="<?= get_image_path("svg/step-4.svg") ?>" style="color: transparent;">
                    </div>
                    <div class="text-center space-y-2">
                        <h3 class="text-lg font-semibold">Facilità di pagamento</h3>
                        <span class="block text-slate-600 text-md leading-6">Pagamenti sicuri e veloci, senza alcun problema</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section opacity-0 translate-y-52 duration-1000 w-11/12 mx-auto max-w-7xl">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl md:text-4xl font-semibold text-left py-5">Le migliori scelte<span class="">. </span><span class="text-neutral-500">Prodotti top per la tua categoria preferita</span></h2>
                <div class="mt-6 space-y-12 md:grid md:grid-cols-3 md:gap-x-6 md:space-y-0 text-left">
                    <?php
                    $data = [
                        ["img_src" => "lana.jpeg", "span" => "Lana", 'p' => 'Creare morbidi capi e accessori con la lana.'],
                        ["img_src" => "uncinetto.jpeg", "span" => "Uncinetto", 'p' => "Creare tessuti unici con l'arte dell'uncinetto."],
                        ["img_src" => "tessuti.jpeg", "span" => "Tessuti", 'p' => "Creare moda e arredamento con tessuti unici."],
                        // ["img_src" => "faiDaTeCreativo.jpeg", "span" => "Fai da te creativo"],
                    ];
                    foreach ($data as $d) {
                        $image_path = get_image_path($d["img_src"]); ?>
                        <a href="<?= get_link_path('product'); ?>" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                            <img class="h-64 lg:rounded-l-lg max-md:rounded-t-lg md:rounded-none min-w-full object-cover" src="<?= $image_path; ?>" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?= $d['span']; ?></h5>
                                <p class="mb-3 font-normal text-gray-700"><?= $d['p']; ?></p>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="section opacity-0 translate-y-52 duration-1000 w-11/12 max-w-7xl mx-auto hidden">
            <?= do_shortcode("[views section=general name=newsletterView]") ?>
        </section>
        <?= do_shortcode("[views section=reviews name=reviewsViews]") ?>
    </main>
</div>
<?= do_shortcode("[views section=footer name=footerView]") ?>