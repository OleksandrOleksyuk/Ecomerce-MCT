<div class="bg-emerald-900 text-stone-100 py-2 text-sm sm:text-base text-center">
    <p>Spedizione gratuita sopra i 79€ - Spedizione entro 24h</p>
</div>
<nav class="navbar flex justify-between items-center w-11/12 mx-auto top-0 text-emerald-900">
    <div>
        <a href="<?= get_link_path('home'); ?>"><img class="h-20" src="<?= get_image_path('logo/logo.png'); ?>" alt="Merceria creativa tania logo"></a>
    </div>
    <div id="menu" class="hidden md:block absolute md:static bg-white left-0 top-[120px] w-full md:w-auto p-5">
        <ul class="flex md:flex-row flex-col md:items-center items-start md:gap-[3vw] gap-6 transition-all duration-500">
            <?php
            $elements = [
                "home" => "Home", "product" => "Prodotti", "#" => "Fai da te creativo", "#" => "Chi sono",
            ];
            foreach ($elements as $key => $value) {
                $path = get_link_path($key);
                echo "<li class='cursor-pointer'><a class='hover:text-pink-500 text-xl' href=" . $path . ">$value</a></li>";
            }
            ?>
        </ul>
    </div>
    <div class="flex items-center gap-2">
        <div id="openSliderover" class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <p id="numElOnCart" class="text-pink-600 text-xl">0</p>
        </div>
        <svg id="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-3xl cursor-pointer md:hidden">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
        </svg>
        <svg id="close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-3xl cursor-pointer md:hidden hidden">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>
</nav>
<div id="slideover-container" class="fixed inset-0 w-full h-full invisible z-20 text-emerald-900">
    <div id="slideover-bg" class=" absolute transition-all ease-out w-full h-full bg-gray-500 top-0 opacity-0"></div>
    <div id="slideover" class=" absolute transition-all ease-out duration-700 w-full sm:w-[450px] h-full bg-white top-0 right-0 translate-x-full p-5 shadow-lg">
        <div id="closeSlideover" class="h-10 z-10 w-10 absolute top-0 right-0 m-5 flex justify-center items-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="w-full h-full py-5 flex flex-col justify-between gap-5 text-start">
            <h1 class="text-4xl font-semibolds absolute top-10 left-0 p-5 bg-white w-full z-10">Carrello</h1>
            <div id="containerSidebarProduct" class="overflow-scroll py-20"></div>
            <div>
                <p>Eventuali costi di spedizioni vengono calcolati al checkout</p>
                <div class="flex justify-between items-center w-full">
                    <div>
                        <h3 class="font-semibold text-3xl overflow-hidden">
                            Subtotale
                        </h3>
                    </div>
                    <div>
                        <h3 id="sumPrice" class="text-4xl font-semibold text-emerald-600 py-2">
                            20.00
                        </h3>
                    </div>
                </div>
                <a href="<?= get_link_path('checkout'); ?>">
                    <div class="mt-6 text-center">
                        <button type="button" class="group inline-flex w-full items-center justify-center rounded-md bg-emerald-900 px-6 py-4 text-lg font-semibold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-emerald-800 hover:text-white">
                            Checkout
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:ml-8 ml-4 h-6 w-6 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>
                </a>
                <div class="text-center">
                    <p>o <a href="<?= get_link_path('product'); ?>" class="text-pink-500 cursor-pointer">continua a fare shopping</a></p>
                </div>
            </div>
        </div>
    </div>
</div>