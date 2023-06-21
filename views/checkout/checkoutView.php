<?php
global $woocommerce;
?>
<?= do_shortcode("[views section=general name=navbarView]") ?>
<div id="checkout" class="flex text-emerald-900 w-11/12 mx-auto max-w-screen-xl p-5 md:py-24 gap-2 flex-col-reverse md:flex-row">
    <div class="w-full">
        <ol id="stepbar-checkout" class="flex items-center w-full mb-4 sm:mb-5">
            <li data-step="0" class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-emerald-100">
                <div class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0 bg-emerald-100">
                    <svg aria-hidden="true" class="w-6 h-6 lg:w-6 lg:h-6 text-emerald-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </li>
            <li data-step="1" class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </li>
            <li data-step="2" class="flex items-center">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </li>
        </ol>
        <form id="formDataOrder" action="#">
            <div data-step="0" class="">
                <h3 class="mb-4 text-lg font-medium leading-none">Step 1</h3>
                <div class="grid gap-4 mb-4 sm:grid-cols-6">
                    <div class="col-span-6 md:col-span-3">
                        <label for="first_name" class="block mb-2 text-sm font-medium">Nome</label>
                        <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Maria" required="" />
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <label for="last_name" class="block mb-2 text-sm font-medium">Cognome</label>
                        <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Rossi" required="" />
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="maria_rossi@esempio.com" required="" />
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <label for="phone" class="block mb-2 text-sm font-medium">Numbero di cellulare</label>
                        <input type="tel" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="+39 333 92 88 151 01" required="" />
                    </div>
                    <div class="col-span-6 md:col-span-4">
                        <label for="address_1" class="block mb-2 text-sm font-medium">Indirizzo di spedizione</label>
                        <input type="text" name="address_1" id="address_1" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="Via Roma" required="" />
                    </div>
                    <div class="col-span-6 md:col-span-2">
                        <label for="address_1_number" class="block mb-2 text-sm font-medium">Numero civico</label>
                        <input type="text" name="address_1" id="address_1" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="2" required="" />
                    </div>
                    <div class="col-span-6 md:col-span-4">
                        <label for="address_2" class="block mb-2 text-sm font-medium">Indirizzo di fatturazione</label>
                        <input type="text" name="address_2" id="address_2" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="Via Roma" />
                    </div>
                    <div class="col-span-6 md:col-span-2">
                        <label for="address_2_number" class="block mb-2 text-sm font-medium">Numero civico</label>
                        <input type="text" name="address_2" id="address_2" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="4" />
                    </div>
                    <div class="col-span-6 md:col-span-2">
                        <label for="city" class="block mb-2 text-sm font-medium">Città</label>
                        <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Bologna" required="" />
                    </div>
                    <div class="col-span-6 md:col-span-2">
                        <label for="state" class="block mb-2 text-sm font-medium">Provincia</label>
                        <input type="text" name="state" id="state" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Bologna" required="" />
                    </div>
                    <div class="col-span-6 md:col-span-1">
                        <label for="postcode" class="block mb-2 text-sm font-medium">CAP</label>
                        <input type="text" name="postcode" id="postcode" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="40100" required="" />
                    </div>
                    <div class="col-span-6 md:col-span-1">
                        <label for="country" class="block mb-2 text-sm font-medium">Stato</label>
                        <input type="text" name="country" id="country" class="bg-gray-50 border border-gray-300 text-sm rounded focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Italia" required="" />
                    </div>
                </div>
                <button id="estractData" class="disabled text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded text-sm px-5 py-2.5 text-center" data-next="">
                    Prossimo step: informazioni di pagamento
                </button>
            </div>
            <div data-step="1" class="">
                <h3 class="mb-4 text-lg font-medium leading-none">Step 2</h3>
                <div class="w-full text-gray-800 font-light mb-6 space-y-8">
                    <div class="flex items-start flex-col gap-2">
                        <div class="flex items-center text-sm sm:text-base pt-3.5">
                            <input id="paypalMethod" class="text-emerald-500 rounded-full border-slate-400
                                hover:border-emerald-700 bg-transparent focus:ring-emerald-500 w-6 h-6" type="radio" value="paypalMethod" name="payment-method" />
                            <label for="paypalMethod" class="flex items-center space-x-4 sm:space-x-6">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="ml-3" width="80" />
                            </label>
                        </div>
                        <div class="w-full p-5 paypalMethod hidden">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <div class="flex items-center text-sm sm:text-base pt-3.5">
                            <input id="internetBanking" class="text-emerald-500 rounded-full
                                hover:border-emerald-700 bg-transparent focus:ring-emerald-500 w-6 h-6" type="radio" value="Bonifico
                                bancario" name="payment-method" />
                        </div>
                        <div class="flex-1">
                            <label for="internetBanking" class="flex items-center space-x-4 sm:space-x-6">
                                <div class="p-2.5 rounded-xl border-2 border-gray-200">
                                    <svg class="w-6 h-6 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.99998 3H8.99998C7.04998 8.84 7.04998 15.16 8.99998 21H7.99998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15 3C16.95 8.84 16.95 15.16 15 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M3 16V15C8.84 16.95 15.16 16.95 21 15V16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M3 9.0001C8.84 7.0501 15.16 7.0501 21 9.0001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <p class="font-medium">Bonifico bancario</p>
                            </label>
                            <div class="mt-6 mb-4 internetBanking hidden">
                                <p class="text-sm">Your order will be delivered to you after you transfer to:</p>
                                <ul class="mt-3.5 text-sm text-slate-500 space-y-2">
                                    <li>
                                        <h3 class="text-base text-slate-800 font-semibold mb-1">ChisNghiax</h3>
                                    </li>
                                    <li>Bank name: <span class="text-slate-900 font-medium">EMILBANCA CRED. COOP.</span></li>
                                    <li>IBAN: <span class="text-slate-900 font-medium">IT69V0707202400000000408331</span></li>
                                    <li>BIC: <span class="text-slate-900 font-medium">ICRAITRRTS0</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="comeBack" type="button" class="uppercase text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none
                        focus:ring-red-300 font-medium rounded text-sm px-5 py-2.5 text-center" data-prev="">
                        indietro
                    </button>
                    <button id="btnPayment" type="button" class="disabled uppercase text-white bg-emerald-700 hover:bg-emerald-800
                        focus:ring-4
                        focus:outline-none
                        focus:ring-emerald-300 font-medium rounded text-sm px-5 py-2.5 text-center" data-next="">
                        Paga ora
                    </button>
                </div>
            </div>
            <div data-step="2" class="hidden">
                <div class="bg-white p-6 md:mx-auto">
                    <div id="statusMessage--svg">
                        <img class="w-24 h-24 mx-auto" src="" alt="status icon" />
                    </div>
                    <div id="statusMessage" class="text-center">
                        <h3 id="statusMessage--status" class="md:text-2xl text-base text-gray-900 font-semibold text-center"></h3>
                        <p id="statusMessage--text" class="text-gray-600 my-2"></p>
                        <p id="statusMessage--callToAction"></p>
                        <div class="py-10 text-center">
                            <a href="#" class="px-12 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-3"> torna </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="flex-shrink-0 border-t lg:border-t-0 lg:border-l border-emerald-200 my-10 lg:my-0 lg:mx-10"></div>
    <div class="w-full lg:w-5/12">
        <h3 class="text-lg font-semibold">Order summary</h3>
        <div id="checkContainer" class="divide-slate-200/70 divide-y max-h-[500px] mt-8 overflow-scroll"></div>
        <div class="mt-10 border-t border-slate-200/70 pt-6 text-sm text-slate-500">
            <div class="hidden">
                <label class="text-sm font-medium text-emerald-900">Codice sconto</label>
                <div class="mt-1.5 flex">
                    <input type="text" class="focus:border-emerald-300 focus:ring-emerald-200 block h-10 w-full flex-1 rounded-2xl
                        border-emerald-200 bg-white px-4 py-3 text-sm font-normal focus:ring focus:ring-opacity-50 disabled:bg-emerald-200" />
                    <button class="ml-3 flex w-24 items-center justify-center rounded-2xl border border-emerald-200 bg-emerald-200/70 px-4 text-sm font-medium text-emerald-700 transition-colors hover:bg-emerald-100">
                        Applica
                    </button>
                </div>
            </div>
            <div class="mt-4 flex justify-between py-2.5">
                <span>Subtotale</span><span id="checkSubtotalPrice" class="font-semibold text-slate-900">€ 585.00</span>
            </div>
            <div class="flex justify-between py-2.5">
                <span>Costi di spedizione</span><span id="checkShippingPrice" class="font-semibold text-slate-900">€ 10</span>
            </div>
            <div class="flex justify-between py-2.5">
                <span>Tasse stimate</span><span class="font-semibold text-slate-900">$24.90</span>
            </div>
            <div class="flex justify-between pt-4 text-base font-semibold text-slate-900">
                <span>Totale dell'ordine</span><span id="checkSumPrice">$276.00</span>
            </div>
        </div>
    </div>
</div>
<div id="containerModal" class="absolute top-0 left-0 h-screen w-screen hidden">
    <div class="z-10 text-center -translate-x-1/2 -translate-y-1/2 top-1/2 absolute left-1/2">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-emerald-200 rounded-lg shadow">
                <button id="containerModalClose" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent
                hover:bg-gray-200
                hover:text-gray-900
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5 fill-emerald-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3
                    .org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 stroke-emerald-900" fill="none" stroke="currentColor" viewBox="0 0
                    24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this product?</h3>
                    <button id="containerModalSendOrder" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4
                    focus:outline-none
                    focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-100 absolute top-0 left-0 h-screen w-screen opacity-50"></div>
</div>
<?= do_shortcode("[views section=footer name=footerView]") ?>