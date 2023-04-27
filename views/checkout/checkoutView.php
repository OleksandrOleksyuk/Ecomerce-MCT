<?php global $woocommerce; ?>
<?= do_shortcode("[views section=general name=navbarView]") ?>
<div id="checkout" class="flex text-emerald-900 w-11/12 mx-auto pb-20 max-w-screen-xl">
    <div class="px-5 py-10 lg:p-20">
        <ol id="stepbar-checkout" class="flex items-center w-full mb-4 sm:mb-5">
            <li data-step="0" class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-600 lg:w-6 lg:h-6" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </li>
            <li data-step="1" class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </li>
            <li data-step="2" class="flex items-center">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </li>
        </ol>
        <form id="formDataOrder" action="#">
            <div data-step="0" class="">
                <h3 class="mb-4 text-lg font-medium leading-none">Step 1</h3>
                <div class="grid gap-4 mb-4 sm:grid-cols-6 ">
                    <div class="col-span-3">
                        <label for="first_name" class="block mb-2 text-sm font-medium">Nome</label>
                        <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Maria" required>
                    </div>
                    <div class="col-span-3">
                        <label for="last_name" class="block mb-2 text-sm font-medium">Cognome</label>
                        <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Rossi" required>
                    </div>
                    <div class="col-span-3">
                        <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="maria_rossi@esempio.com" required>
                    </div>
                    <div class="col-span-3">
                        <label for="phone" class="block mb-2 text-sm font-medium">Numbero di cellulare</label>
                        <input type="tel" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="+39 333 92 88 151 01" required>
                    </div>
                    <div class="col-span-6">
                        <label for="address_1" class="block mb-2 text-sm font-medium">Indirizzo di spedizione</label>
                        <input type="text" name="address_1" id="address_1" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="Via Roma" required>
                    </div>
                    <div class="col-span-6">
                        <label for="address_2" class="block mb-2 text-sm font-medium">Indirizzo di fatturazione</label>
                        <input type="text" name="address_2" id="address_2" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="Via Roma">
                    </div>
                    <div class="col-span-2">
                        <label for="city" class="block mb-2 text-sm font-medium">Città</label>
                        <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Bologna" required>
                    </div>
                    <div class="col-span-2">
                        <label for="state" class="block mb-2 text-sm font-medium">Provincia</label>
                        <input type="text" name="state" id="state" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Bologna" required>
                    </div>
                    <div class="col-span-1">
                        <label for="postcode" class="block mb-2 text-sm font-medium">CAP</label>
                        <input type="text" name="postcode" id="postcode" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="40100" required>
                    </div>
                    <div class="col-span-1">
                        <label for="country" class="block mb-2 text-sm font-medium">Stato</label>
                        <input type="text" name="country" id="country" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Italia" required>
                    </div>
                </div>
                <button id="estractData" class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-next>
                    Prossimo step: informazioni di pagamento
                </button>
            </div>
            <div data-step="1" class="hidden">
                <h3 class="mb-4 text-lg font-medium leading-none">Step 2</h3>
                <div class="w-full mx-auto rounded-lg bg-white border border-gray-200 text-gray-800 font-light mb-6">
                    <div class="w-full p-3 border-b border-gray-200">
                        <div class="mb-5">
                            <label for="type1" class="flex items-center cursor-pointer">
                                <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                                <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-6 ml-3">
                            </label>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Name on card</label>
                                <div>
                                    <input class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="John Smith" type="text" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Card number</label>
                                <div>
                                    <input class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000 0000 0000 0000" type="text" />
                                </div>
                            </div>
                            <div class="mb-3 -mx-2 flex items-end">
                                <div class="px-2 w-1/4">
                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Expiration date</label>
                                    <div>
                                        <select class="form-select w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                            <?php
                                            $data = [
                                                "January",
                                                "February",
                                                "March",
                                                "April",
                                                "May",
                                                "June",
                                                "July",
                                                "August",
                                                "September",
                                                "October",
                                                "November",
                                                "December",
                                            ];
                                            for ($i = 0; $i < count($data); $i++) {
                                                echo '<option value="' .
                                                    ($i + 1) .
                                                    '">' .
                                                    ($i + 1) .
                                                    " - " .
                                                    $data[$i] .
                                                    "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="px-2 w-1/4">
                                    <select class="form-select w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                        <?php
                                        $data = ["2020", "2021", "2022", "2023", "2024", "2025", "2026", "2027", "2028", "2029"];
                                        for ($i = 0; $i < count($data); $i++) {
                                            echo '<option value="' . $data[$i] . '">' . $data[$i] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="px-2 w-1/4">
                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Security code</label>
                                    <div>
                                        <input class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-3">
                        <label for="type2" class="flex items-center cursor-pointer">
                            <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" width="80" class="ml-3" />
                        </label>
                    </div>
                </div>
                <div>
                    <button class="uppercase text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-prev>
                        indietro
                    </button>
                    <button class="uppercase text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-next>
                        Paga ora
                    </button>
                    <div id="paypal-button-container"></div>
                </div>
            </div>
            <div data-step="2" class="hidden">
                <div class="bg-white p-6 md:mx-auto">
                    <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
                        <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                        </path>
                    </svg>
                    <div class="text-center">
                        <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Pagamento avvenuto con successo</h3>
                        <p class="text-gray-600 my-2">Thank you for completing your secure online payment.</p>
                        <p> Have a great day! </p>
                        <div class="py-10 text-center">
                            <a href="#" class="px-12 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-3">
                                torna
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="w-full lg:w-2/5">
        <h3 class="text-lg font-semibold">Order summary</h3>
        <div id="checkContainer" class="divide-slate-200/70 divide-y h-[500px] mt-8 overflow-scroll"></div>
        <div class="mt-10 border-t border-slate-200/70 pt-6 text-sm text-slate-500">
            <div>
                <label class="nc-Label text-sm font-medium text-emerald-900 " data-nc-id="Label">Codice sconto</label>
                <div class="mt-1.5 flex">
                    <input type="text" class="focus:border-primary-300 focus:ring-primary-200 block h-10 w-full flex-1 rounded-2xl border-emerald-200 bg-white px-4 py-3 text-sm font-normal focus:ring focus:ring-opacity-50 disabled:bg-emerald-200   " /><button class="ml-3 flex w-24 items-center justify-center rounded-2xl border border-emerald-200 bg-emerald-200/70 px-4 text-sm font-medium text-emerald-700 transition-colors hover:bg-emerald-100">
                        Applica
                    </button>
                </div>
            </div>
            <div class="mt-4 flex justify-between py-2.5">
                <span>Subtotale</span><span id="checkSumPrice" class="font-semibold text-slate-900">$249.00</span>
            </div>
            <div class="flex justify-between py-2.5">
                <span>Costi di spedizione</span><span class="font-semibold text-slate-900">$5.00</span>
            </div>
            <div class="flex justify-between py-2.5">
                <span>Tasse stimate</span><span class="font-semibold text-slate-900">$24.90</span>
            </div>
            <div class="flex justify-between pt-4 text-base font-semibold text-slate-900">
                <span>Totale dell'ordine</span><span>$276.00</span>
            </div>
        </div>
    </div>
</div>
<?= do_shortcode("[views section=footer name=footerView]") ?>