<div class="animate-pulse duration-500 fixed bottom-0 left-0 z-100 flex p-4 m-5 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">Attenzione!</span> Questo e-commerce è in fase di sviluppo.
    </div>
</div>
<header class="w-full text-black">
    <div class="relative isolate flex justify-center items-center gap-x-6 overflow-hidden bg-emerald-50 px-6 py-2.5 sm:px-3.5">
        <div class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#80ff8b] to-[#89fc95] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
        </div>
        <div class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#80ff9e] to-[#89fc95] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
        </div>
        <div class="items-center mx-auto">
            <p class="text-sm leading-6 text-pink-900">
                <strong class="font-semibold">
                    <?php
                    $date = new DateTime();
                    $formatter = new IntlDateFormatter("it_IT", IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                    $data = $formatter->format($date);
                    echo $data;
                    ?>
                </strong>
                <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
                    <circle cx="1" cy="1" r="1" />
                </svg>
                Spedizione gratuita sopra i 79€ - Spedizione entro 24h
            </p>
        </div>
    </div>
    <nav class="bg-white">
        <div class="mx-auto max-w-screen-2xl px-2 sm:px-6 lg:px-8 py-3">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <svg id="open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg id="close" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center">
                    <a href="<?= get_link_path(
                        "home"
                    ) ?>"><img class="hidden h-20 w-auto md:block" src="<?= get_image_path(
    "logo/logo.png"
) ?>" alt="Merceria creativa tania logo"></a>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-center">
                    <div class="flex items-center">
                        <a href="<?= get_link_path(
                            "home"
                        ) ?>"><img class="h-12 block w-auto md:hidden " src="<?= get_image_path(
    "logo/logo.png"
) ?>" alt="Merceria creativa tania logo"></a>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex space-x-4 gap-5">
                            <?php
                            $elements = [
                                "home" => "Home",
                                "product" => "Prodotti",
                                "about" => "Chi sono",
                            ];
                            foreach ($elements as $key => $value) {
                                $path = get_link_path($key); ?>
                                <li class='text-emerald-900 hover:text-pink-500 md:text-2xl underlineHoverEffect transition-all duration-300 ease-linear'>
                                    <a href='<?= $path ?>' aria-current='page'><?= $value ?></a>
                                </li>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="relative" data-headlessui-state="open">
                    <div id="openSliderover" class="flex gap-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <p id="numElOnCart" class="text-pink-600 text-xl">0</p>
                    </div>
                    <!-- absolute mt-3.5 px-4 right-0 sm:px-0 w-screen z-50 -->
                    <div id="slideover-container" class="absolute invisible z-50 mt-3.5 w-screen px-4 opacity-100 -right-2 sm:max-w-md sm:px-0">
                        <div class="overflow-hidden rounded-2xl shadow-lg ring-1 ring-black/5">
                            <div class="relative bg-white">
                                <div class="p-5">
                                    <div class="flex justify-between py-5">
                                        <h3 class="text-xl font-semibold">Carrello</h3>
                                        <button id="closeSlideover" type="button" class="-m-2 p-2 text-gray-400 cursor-pointer">
                                            <span class="sr-only">Close panel</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="containerSidebarProduct" class="divide-y divide-slate-100 overflow-y-auto max-h-[45vh]"></div>
                                </div>
                                <div class="bg-neutral-50 p-5">
                                    <p class="flex justify-between font-semibold text-slate-900 text-left">
                                        <span><span>Subtotale</span><span class="block text-sm font-normal text-slate-500">Spedizione e tasse vengono calcolate al checkout.</span></span><span id="sumPrice" class="">$299.00</span>
                                    </p>
                                    <div class="mt-5 flex space-x-2">
                                        <a class="btnStyle w-full text-center" href="<?= get_link_path(
                                            "checkout"
                                        ) ?>">Check out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 w-full">
                <?php
                $elements = [
                    "home" => "Home",
                    "product" => "Prodotti",
                    "about" => "Chi sono",
                    "blog" => "Blog",
                ];
                foreach ($elements as $key => $value) {
                    $path = get_link_path($key);
                    echo "<a href='$path' class='bg-emerald-500 text-white block rounded-md px-3 py-2 text-base font-medium' aria-current='page'>$value</a>";
                }
                ?>
            </div>
        </div>
    </nav>
</header>
<?= do_shortcode("[views section=general name=sidebar]") ?>
