<div id="slideover-container" class="fixed inset-0 w-full h-full invisible z-50 text-emerald-900">
    <div id="slideover-bg" class="absolute transition-all ease-out w-full h-full bg-gray-500 top-0 opacity-1"></div>
    <div id="slideover" class=" absolute transition-all ease-out duration-700 w-full sm:w-[450px] h-full bg-white top-0 right-0 translate-x-full p-5 shadow-lg">
        <div class="flex items-start justify-between">
            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Carrello della spesa</h2>
            <div class="ml-3 flex h-7 items-center">
                <button id="closeSlideover" type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Close panel</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="w-full h-full flex flex-col justify-between gap-5 text-start my-8">
            <!-- <h1 class="text-4xl font-semibolds absolute top-10 left-0 p-5 bg-white w-full z-50">Carrello</h1> -->
            <div id="containerSidebarProduct" class="overflow-scroll"></div>
            <div class="border-t border-gray-200 px-4 pb-12 sm:px-6">
                <div class="flex justify-between text-base font-medium text-gray-900">
                    <p>Subtotal</p>
                    <p id="sumPrice">$262.00</p>
                </div>
                <p class="mt-0.5 text-sm text-gray-500">Eventuali costi di spedizioni vengono calcolati al checkout</p>
                <div class="mt-6">
                    <a href="<?= get_link_path('checkout'); ?>" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                </div>
                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                    <p>
                        o
                        <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                            <a href="<?= get_link_path('product'); ?>" class="text-pink-500 cursor-pointer">continua a fare shopping</a>
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>