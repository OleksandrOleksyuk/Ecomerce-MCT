<div class="relative flow-root py-12 md:py-16">
    <div class="relative flex flex-col sm:flex-row sm:items-end justify-between mb-12 lg:mb-14 text-neutral-900">
        <div class="flex flex-col items-center text-center w-full mx-auto">
            <h2 class="text-center text-3xl md:text-4xl font-bold">Recensioni dei nostri clienti</h2>
            <span class="mt-2 md:mt-3 block text-base sm:text-lg text-neutral-500">Scopri cosa dicono i nostri clienti della Merceria Creativa Tania</span>
        </div>
    </div>
    <div class="relative md:mb-16 max-w-2xl mx-auto">
        <div class="hidden md:block">
            <img alt="img avatar" width="59" height="59" class="absolute top-9 -left-20" sizes="100px" src="<?= get_image_path('svg/avatar-1.svg'); ?>">
            <img alt="img avatar" width="60" height="59" class="absolute bottom-[100px] right-full mr-40" sizes="100px" src="<?= get_image_path('svg/avatar-2.svg'); ?>">
            <img alt="img avatar" width="55" height="58" class="absolute top-full left-[140px]" sizes="100px" src="<?= get_image_path('svg/avatar-3.svg'); ?>">
            <img alt="img avatar" width="47" height="49" class="absolute -bottom-10 right-[140px]" sizes="100px" src="<?= get_image_path('svg/avatar-4.svg'); ?>">
            <img alt="img avatar" width="65" height="63" class="absolute left-full ml-32 bottom-[80px]" sizes="100px" src="<?= get_image_path('svg/avatar-5.svg'); ?>">
            <img alt="img avatar" width="57" height="56" class="absolute -right-10 top-10 " sizes="100px" src="<?= get_image_path('svg/avatar-6.svg'); ?>">
        </div>
        <img alt="img avatar" width="126" height="120" class="mx-auto" src="<?= get_image_path('svg/avatar-7.svg'); ?>">
        <div class="relative">
            <img alt="img avatar" width="52" height="45" class="opacity-50 md:opacity-100 absolute -mr-16 lg:mr-3 right-full top-1" src="<?= get_image_path('svg/avatar-8.svg'); ?>">
            <img alt="img avatar" width="52" height="45" class="opacity-50 md:opacity-100 absolute -ml-16 lg:ml-3 left-full top-1" src="<?= get_image_path('svg/avatar-9.svg'); ?>">
            <div id="reviewsContainer" class="swiper mySwiper col-span-3 overflow-hidden w-full">
                <div class="swiper-wrapper items-center">
                </div>
            </div>
        </div>
    </div>
</div>