<div class="bg-emerald-900 text-stone-100 py-2 text-sm sm:text-base text-center">
    <p>Spedizione gratuita sopra i 79€ - Spedizione entro 24h</p>
</div>
<nav class="navbar flex justify-between items-center w-11/12 mx-auto top-0 text-emerald-900">
    <div>
        <a href="<?= get_link_path('home'); ?>"><img class="h-20" src="<?= get_image_path('logo/logo.png'); ?>" alt="Merceria creativa tania logo"></a>
    </div>
    <div id="menu" class="hidden md:block absolute md:static bg-white left-0 top-[120px] w-full md:w-auto p-5">
        <ul class="flex md:flex-row flex-col md:items-center items-start md:gap-[3vw] gap-6 ">
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
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>
        <p class="text-pink-600 text-xl">0</p>
        <svg id="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-3xl cursor-pointer md:hidden">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
        </svg>
        <svg id="close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-3xl cursor-pointer md:hidden hidden">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>
</nav>