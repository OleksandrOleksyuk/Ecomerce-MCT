<div class="text-emerald-900">
    <?= do_shortcode("[views section=general name=navbarView]"); ?>
    <div id="aboutMe" class="w-100 min-h-screen">
        <header class="py-10 lg:py-20 w-11/12 mx-auto">
            <div class="flex flex-col sm:flex-row justify-center items-center pb-10 gap-10 lg:gap-20 ">
                <div class="w-1/2 flex flex-col gap-2 max-w-2xl">
                    <div class="text-left">
                        <h2 class="text-3xl lg:text-5xl xl:text-6xl font-semibold mb-1 md:mb-3">
                            ciao a tutti,
                        </h2>
                        <h1 class="text-4xl lg:text-6xl xl:text-7xl font-semibold mb-1 md:mb-3">sono Tania</h1>
                        <p class="text-lg md:text-xl lg:text-2xl xl:text-3xl text-emerald-600">una sarta professionista con una passione per il cucito che risale alla mia infanzia. </p>
                    </div>
                </div>
                <!-- image -->
                <div class="w-1/2 max-w-xs lg:max-w-sm  shadow-lg shadow-pink-400">
                    <img class="" src="<?= get_image_path("foto.jpeg"); ?>" alt="Header Image">
                </div>
            </div>
        </header>
    </div>
    <?= do_shortcode("[views section=footer name=footerView]"); ?>
</div>