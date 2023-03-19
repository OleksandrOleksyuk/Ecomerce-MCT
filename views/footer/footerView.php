<footer class="bg-dark-tertiary flex items-center flex-col">
    <div class="p-4 bg-dark-tertiary md:px-6 md:py-8 w-11/12 mx-auto ">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="<?php echo get_link_path('home'); ?>"><img class="h-20" src="<?php echo get_image_path('logo/logo.png'); ?>" alt="Merceria creativa tania logo"></a>
            <ul class="flex md:flex-row flex-col md:items-center items-start md:gap-[3vw] gap-6 ">
                <?php
                $elements = [
                    "home" => "Home", "product" => "Prodotti", "home2" => "Fai da te creativo", "home3" => "Chi sono",
                ];
                foreach ($elements as $key => $value) {
                    $path = get_link_path($key);
                    echo "<li class=''><a class='hover:text-pink-600 text-slate-300 text-xl' href=" . $path . ">$value</a></li>";
                }
                ?>
            </ul>
        </div>
        <!-- <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" /> -->
    </div>
</footer>
<span class="block text-sm text-gray-500 sm:text-center">© <a href="" class="">Merceria Creativa Tania</a> P.Iva 0000000000</span>