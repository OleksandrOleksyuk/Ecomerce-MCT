<section class="flex items-center py-20">
    <div class="max-w-7xl flex flex-col md:grid md:grid-cols-5 text-left gap-5 w-11/12 mx-auto justify-items-center">
        <div class="px-5 col-span-2">
            <h2 class="text-2xl font-black text-emerald-600 md:text-3xl lg:text-4xl">Cosa pensano di noi</h2>
            <div class="flex items-center mb-2">
                <?php for ($i = 0; $i < 5; $i++) {
                ?>
                    <img class="w-5 h-5 emerald-600" src="<?php echo get_image_path("svg/star.svg"); ?>" />';
                <?php
                } ?>
                <p class="ml-2 text-sm font-medium">5 su 5</p>
            </div>
            <div id="containerStar" class="mb-5"></div>
            <button type="button" class="text-white bg-emerald-600 hover:text-white hover:bg-emerald-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                Scrivi una recensione
                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div id="reviewsContainer" class="px-5 col-span-3 h-[500px] overflow-y-auto"></div>
    </div>
</section>