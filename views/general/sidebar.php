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
                    <a href="<?= get_link_path(
                                    "checkout"
                                ) ?>" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                </div>
                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                    <p>
                        o
                        <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                            <a href="<?= get_link_path(
                                            "product"
                                        ) ?>" class="text-pink-500 cursor-pointer">continua a fare shopping</a>
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="relative" data-headlessui-state="open">
    <button class="group w-10 h-10 sm:w-12 sm:h-12 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full inline-flex items-center justify-center focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 relative" type="button" aria-expanded="true" data-headlessui-state="open" id="headlessui-popover-button-:R3oba:" aria-controls="headlessui-popover-panel-:rs:">
        <div class="w-3.5 h-3.5 flex items-center justify-center bg-primary-500 absolute top-1.5 right-1.5 rounded-full text-[10px] leading-none text-white font-medium">
            <span class="mt-[1px]">3</span>
        </div>
        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M9 8H21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg><a class="block md:hidden absolute inset-0" href="/cart"></a>
    </button><button id="headlessui-focus-sentinel-:R3obaH1:" data-headlessui-focus-guard="true" type="button" aria-hidden="true" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></button><button id="headlessui-focus-sentinel-before-:rt:" data-headlessui-focus-guard="true" type="button" aria-hidden="true" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></button>
    <div class="hidden md:block absolute z-10 w-screen max-w-xs sm:max-w-md px-4 mt-3.5 -right-28 sm:right-0 sm:px-0 opacity-100 translate-y-0" id="headlessui-popover-panel-:rs:" tabindex="-1" data-headlessui-state="open">
        <div class="overflow-hidden rounded-2xl shadow-lg ring-1 ring-black/5 dark:ring-white/10">
            <div class="relative bg-white dark:bg-neutral-800">
                <div class="max-h-[60vh] p-5 overflow-y-auto hiddenScrollbar">
                    <h3 class="text-xl font-semibold">Shopping cart</h3>
                    <div class="divide-y divide-slate-100 dark:divide-slate-700">
                        <div class="flex py-5 last:pb-0">
                            <div class="relative h-24 w-20 flex-shrink-0 overflow-hidden rounded-xl bg-slate-100"><img alt="Rey Nylon Backpack" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-contain object-center" sizes="100vw" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F17.fcfa959c.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F17.fcfa959c.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F17.fcfa959c.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F17.fcfa959c.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F17.fcfa959c.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F17.fcfa959c.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F17.fcfa959c.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F17.fcfa959c.png&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F17.fcfa959c.png&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"><a class="absolute inset-0" href="/product-detail"></a></div>
                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between ">
                                        <div>
                                            <h3 class="text-base font-medium "><a href="/product-detail">Rey Nylon Backpack</a></h3>
                                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400"><span>Natural</span><span class="mx-2 border-l border-slate-200 dark:border-slate-700 h-4"></span><span>XL</span></p>
                                        </div>
                                        <div class="mt-0.5">
                                            <div class="flex items-center border-2 border-green-500 rounded-lg py-1 px-2 md:py-1.5 md:px-2.5 text-sm font-medium"><span class="text-green-500 !leading-none">$74</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500 dark:text-slate-400">Qty 1</p>
                                    <div class="flex"><button type="button" class="font-medium text-primary-6000 dark:text-primary-500 ">Remove</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex py-5 last:pb-0">
                            <div class="relative h-24 w-20 flex-shrink-0 overflow-hidden rounded-xl bg-slate-100"><img alt="Round Buckle 1&quot; Belt" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-contain object-center" sizes="100vw" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.95a88b31.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.95a88b31.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.95a88b31.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.95a88b31.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.95a88b31.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.95a88b31.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.95a88b31.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.95a88b31.png&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.95a88b31.png&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"><a class="absolute inset-0" href="/product-detail"></a></div>
                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between ">
                                        <div>
                                            <h3 class="text-base font-medium "><a href="/product-detail">Round Buckle 1" Belt</a></h3>
                                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400"><span>Natural</span><span class="mx-2 border-l border-slate-200 dark:border-slate-700 h-4"></span><span>XL</span></p>
                                        </div>
                                        <div class="mt-0.5">
                                            <div class="flex items-center border-2 border-green-500 rounded-lg py-1 px-2 md:py-1.5 md:px-2.5 text-sm font-medium"><span class="text-green-500 !leading-none">$68</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500 dark:text-slate-400">Qty 1</p>
                                    <div class="flex"><button type="button" class="font-medium text-primary-6000 dark:text-primary-500 ">Remove</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex py-5 last:pb-0">
                            <div class="relative h-24 w-20 flex-shrink-0 overflow-hidden rounded-xl bg-slate-100"><img alt="Waffle Knit Beanie" loading="lazy" decoding="async" data-nimg="fill" class="h-full w-full object-contain object-center" sizes="100vw" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F16.2c5b70f4.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F16.2c5b70f4.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F16.2c5b70f4.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F16.2c5b70f4.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F16.2c5b70f4.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F16.2c5b70f4.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F16.2c5b70f4.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2F16.2c5b70f4.png&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F16.2c5b70f4.png&amp;w=3840&amp;q=75" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"><a class="absolute inset-0" href="/product-detail"></a></div>
                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between ">
                                        <div>
                                            <h3 class="text-base font-medium "><a href="/product-detail">Waffle Knit Beanie</a></h3>
                                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400"><span>Natural</span><span class="mx-2 border-l border-slate-200 dark:border-slate-700 h-4"></span><span>XL</span></p>
                                        </div>
                                        <div class="mt-0.5">
                                            <div class="flex items-center border-2 border-green-500 rounded-lg py-1 px-2 md:py-1.5 md:px-2.5 text-sm font-medium"><span class="text-green-500 !leading-none">$132</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500 dark:text-slate-400">Qty 1</p>
                                    <div class="flex"><button type="button" class="font-medium text-primary-6000 dark:text-primary-500 ">Remove</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-neutral-50 dark:bg-slate-900 p-5">
                    <p class="flex justify-between font-semibold text-slate-900 dark:text-slate-100"><span><span>Subtotal</span><span class="block text-sm text-slate-500 dark:text-slate-400 font-normal">Shipping and taxes calculated at checkout.</span></span><span class="">$299.00</span></p>
                    <div class="flex space-x-2 mt-5"><a class="nc-Button relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  ttnc-ButtonSecondary bg-white text-slate-700 dark:bg-slate-900 dark:text-slate-300 hover:bg-gray-100 dark:hover:bg-slate-800 flex-1 border border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-6000 dark:focus:ring-offset-0 " href="/cart">View cart</a><a class="nc-Button relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  ttnc-ButtonPrimary disabled:bg-opacity-90 bg-slate-900 dark:bg-slate-100 hover:bg-slate-800 text-slate-50 dark:text-slate-800 shadow-xl flex-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-6000 dark:focus:ring-offset-0 " href="/checkout">Check out</a></div>
                </div>
            </div>
        </div>
    </div><button id="headlessui-focus-sentinel-after-:ru:" data-headlessui-focus-guard="true" type="button" aria-hidden="true" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></button>
</div> -->