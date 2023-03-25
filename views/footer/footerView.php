<footer class="bg-emerald-900 flex items-center flex-col">
    <div class="py-4 bg-emerald-900 md:py-8 w-11/12 mx-auto ">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="<?php echo get_link_path('home'); ?>"><img class="h-20" src="<?php echo get_image_path('logo/logo.png'); ?>" alt="Merceria creativa tania logo"></a>
            <ul class="flex items-center gap-[3vw]">
                <?php
                $elements = [
                    "home" => "Home", "product" => "Prodotti", "home2" => "Fai da te creativo", "home3" => "Chi sono",
                ];
                foreach ($elements as $key => $value) {
                    $path = get_link_path($key);
                    echo "<li class=''><a class='hover:text-pink-600 text-slate-300 md:text-xl' href=" . $path . ">$value</a></li>";
                }
                ?>
            </ul>
        </div>
        <!-- <hr class="my-6 border-gray-200 sm:mx-auto emerald-900:border-gray-700 lg:my-8" /> -->
    </div>
</footer>
<span class="block text-sm text-gray-500 sm:text-center">© <a href="" class="">Merceria Creativa Tania</a> P.Iva 0000000000</span>