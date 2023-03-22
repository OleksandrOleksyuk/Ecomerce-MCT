<?php
$product_list = render_products(10); ?>
<div class="text-emerald-900">
    <!-- navbar -->
    <?= do_shortcode("[views section=general name=navbarView]"); ?>
    <header class="py-10 lg:py-20 w-11/12 mx-auto">
        <!-- title -->
        <div class="flex flex-col md:flex-row justify-center items-center pb-10 gap-10 lg:gap-20 ">
            <div class="max-w-2xl">
                <h1 class="text-left text-3xl lg:text-5xl xl:text-6xl font-bold md:font-bold text-emerald-600 mb-1 md:mb-5">
                    <span class="text-pink-600">Benvenuti nella</span> </br> <span class="highlight"> Merceria Creativa Tania, </span> </br>
                    <p class="text-lg md:text-xl lg:text-2xl xl:text-3xl">il tuo negozio online per il cucito creativo.</p>
                </h1>
                <div class="text-left w-32 md:w-48 py-1 rounded-lg bg-emerald-600 flex justify-center items-center">
                    <p class="text-stone-100 md:text-xl">Scopri di più</p>
                </div>
            </div>
            <!-- image -->
            <div class="max-w-xs lg:max-w-sm xl:max-w-md rounded-lg shadow-lg shadow-pink-600">
                <img src="<?= get_image_path("fotoHeader.jpeg"); ?>" alt="Header Image">
            </div>
        </div>
        <!-- brand -->
        <div class="flex justify-center items-center gap-10">
            <?php
            $logos = [
                "vlieseline.png", "adriafil.png", "iNastriDiMirta.png", "renkalik.webp"
            ];
            foreach ($logos as $logo) {
                $imagePath = get_image_path("logo/logo-$logo");
            ?>
                <div class='w-32 h-32 flex justify-center items-center'><img class='block' src="<?= $imagePath; ?>" alt='logo-<?= $logo; ?> '></div>
            <?php
            }
            ?>
        </div>
    </header>
    <main>
        <!-- welcome phrase -->
        <section class="section opacity-0 translate-y-52 duration-1000 py-5 flex flex-col items-center px-5 md:px-10 bg-pink-50">
            <div class="flex justify-center mx-auto py-5 w-11/12">
                <div class="flex flex-col md:grid md:grid-cols-3 max-w-5xl text-left">
                    <div class="col-span-1 p-2 lg:p-5">
                        <p class="text-xl md:text-2xl lg:text-3xl xl:text-4xl">Stai cercando <span class="text-pink-600 font-semibold">prodotti unici</span>per dare sfogo alla tua <span class="text-pink-600 font-semibold"> creatività</span>?</p>
                    </div>
                    <div class="col-span-2 p-2 lg:p-5">
                        <p class="lg:text-lg xl:text-xl mb-5">Sì, io, Merceria Creativa Tania, sono il luogo giusto per te. Offro una vasta scelta di tessuti di alta <span class="font-bold">qualità</span>, bottoni <span class="font-bold">esclusivi</span> e accessori per soddisfare il tuo <span class="font-bold">desiderio</span> di creare. Sono certa che troverai ciò che stai cercando per realizzare progetti <span class="font-bold">originali</span> e <span class="font-bold">straordinari</span>.</p>
                        <p class="text-xl xl:text-2xl text-pink-600 font-semibold">Vieni a scoprire il mio mondo della creatività!
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- best-selling products -->
        <section class="section opacity-0 translate-y-52 duration-1000 py-5 flex flex-col items-center px-5 md:px-10">
            <div class="flex flex-col max-w-7xl mx-auto overflow-hidden w-11/12">
                <div class="flex flex-col">
                    <div class="flex flex-col items-start md:grid md:grid-cols-2 md:px-5 md:items-center text-left py-5">
                        <h2 class="text-2xl font-black text-emerald-600 md:text-3xl lg:text-4xl">Prodotti più venduti</h2>
                        <p class="text-xl text-pink-600 flex justify-end items-center gap-1">
                            Vedi tutti i prodotti
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </p>
                    </div>
                    <div class="carousel flex justify-start items-center gap-5 relative mx-auto"> <!-- overflow-x-auto -->
                        <?php
                        // ciclo foreach per stampare i prodotti
                        foreach ($product_list as $product) {
                            echo $this->SetGeneralsShortCodesParams(["section" => "general", "name" => "cardView", "params" => $product]);
                        } ?>
                    </div>
                    <div class="flex justify-end items-center gap-5 py-5">
                        <button type="button" id="prev" class="text-white bg-emerald-600 hover:text-white hover:bg-emerald-600 focus:ring-4 focus:outline-none focus:ring-emerald-600 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 rotate-180">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <button type="button" id="next" class="text-white bg-emerald-600 hover:text-white hover:bg-emerald-600 focus:ring-4 focus:outline-none focus:ring-emerald-600 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="section opacity-0 translate-y-52 duration-1000 py-10 lg:py-20 flex flex-col items-center bg-pink-50">
            <!-- call to action -->
            <div class="flex flex-col items-center gap-5 w-11/12 mx-auto ">
                <div class="max-w-md md:max-w-lg lg:max-w-5xl flex items-center text-left mb-5">
                    <div class="p-4 border-emerald-600 border-r-2">
                        <h3 class="text-sm md:text-2xl lg:text-4xl">Ecco perché scegliere <span class="font-black">noi</span></br> per i tuoi acquisti online:</h3>
                    </div>
                    <div class="p-4">
                        <h3 class="text-sm md:text-lg lg:text-2xl  text-left items-center">spedizione rapida e <br> gratuita sopra i 79€</h3>
                    </div>
                </div>
                <div class="max-w-7xl flex text-left gap-5">
                    <?php
                    $data = [
                        [
                            "img_src" => "package.svg",
                            "h5" => "Spedizione gratuita",
                            "p" => "gratis sopra i 79€",
                        ],
                        [
                            "img_src" => "delivery.svg",
                            "h5" => "Consegna rapida",
                            "p" => "in 24/48 ore",
                        ],
                        [
                            "img_src" => "operator-support.svg",
                            "h5" => "Assistenza clienti",
                            "p" => "disponibile 24/7",
                        ],
                    ];
                    foreach ($data as $d) {
                        $image_path = get_image_path("svg/" . $d["img_src"]); ?>
                        <div class="flex items-center gap-1">
                            <img class="w-8 h-8 md:h-12 md:w-12 lg:h-20 lg:w-20" src="<?php echo $image_path; ?>" alt="">
                            <div>
                                <h5 class="text-xs md:text-lg lg:text-2xl xl:text-3xl font-semibold"><?php echo $d["h5"]; ?></h5>
                                <p class="text-[10px] md:text-md lg:text-xl"><?php echo $d["p"]; ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </section>
        <section class="section opacity-0 translate-y-52 duration-1000 py-10 lg:py-20 flex flex-col w-11/12 max-w-7xl mx-auto">
            <div class="md:px-5 py-5">
                <h2 class="font-black lg:text-4xl md:text-3xl md:text-left text-2xl text-center text-emerald-600">Categorie</h2>
            </div>
            <div class="md:px-5 flex flex-wrap md:justify-between justify-around gap-5">
                <?php
                $data = [
                    ["img_src" => "lana.jpeg", "h5" => "Lana"],
                    ["img_src" => "uncinetto.jpeg", "h5" => "Uncinetto"],
                    ["img_src" => "tessuti.jpeg", "h5" => "Tessuti"],
                    ["img_src" => "faiDaTeCreativo.jpeg", "h5" => "Fai da te creativo"]
                ];
                foreach ($data as $d) {
                    $image_path = get_image_path($d["img_src"]); ?>
                    <div class="relative rounded-xl">
                        <img class="2xl:h-80 2xl:w-72 h-36 lg:h-64 lg:w-52 md:h-48 md:w-36 object-cover rounded-xl w-28 xl:h-80 xl:w-64" src="<?= $image_path ?>" alt="">
                        <div class="absolute inset-0 bg-black opacity-50 rounded-xl"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h5 class="text-white text-2xl md:text-3xl lg:text-4xl 2xl:text-5xl font-bold text-center z-10"><?= $d["h5"] ?></h5>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <section class="section opacity-0 translate-y-52 duration-1000 bg-pink-50 py-10 lg:py-20 px-10 flex flex-col items-center">
            <!-- news letter -->
            <div class="flex flex-col gap-5 max-w-2xl items-center">
                <div>
                    <p class="md:text-lg lg:text-2xl  xl:text-2xl">Iscriviti alla nostra newsletter per ricevere il <span class="text-pink-600">15% di sconto</span> sul tuo primo acquisto e <span class="text-pink-600">sorprese esclusive</span> ogni mese.</p>
                </div>
                <div>
                    <div class="flex gap-2">
                        <div>
                            <label for="input-group-1" class="hidden mb-2 text-sm font-medium text-emerald-600">Your Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-emerald-600 text-sm rounded-lg w-56 focus:ring-pink-500 focus:border-pink-500 block p-2.5" placeholder="tania@gmail.com" style="padding: 0.5rem 0.5rem 0.5rem 2.2rem">
                            </div>
                        </div>
                        <button class="bg-emerald-600 text-xs md:text-sm lg:text-md text-white rounded-lg px-5">Invia</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="section opacity-0 translate-y-52 duration-1000">
            <!-- reviews -->
            <?= do_shortcode("[views section=reviews name=reviewsViews]"); ?>
        </section>
    </main>
</div>
<?= do_shortcode("[views section=footer name=footerView]"); ?>