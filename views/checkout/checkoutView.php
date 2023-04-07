<?= do_shortcode("[views section=general name=navbarView]"); ?>
<div id="checkout" class="text-emerald-900 md:grid md:grid-cols-4 w-11/12 mx-auto">
    <div class="col-span-2 px-5 py-10 lg:p-20">
        <ol class="flex items-center w-full mb-4 sm:mb-5">
            <li class="flex w-full items-center text-emerald-600 after:content-[''] after:w-full after:h-1 after:border-b after:border-emerald-100 after:border-4 after:inline-block">
                <div class="flex items-center justify-center w-10 h-10 bg-emerald-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg aria-hidden="true" class="w-5 h-5 text-emerald-600 lg:w-6 lg:h-6" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </li>
            <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </li>
            <li class="flex items-center">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </li>
        </ol>
        <form action="#" id="form-left" class="min-w-full duration-1000">
            <h3 class="mb-4 text-lg font-medium leading-none">Invoice details</h3>
            <div class="grid gap-4 mb-4 sm:grid-cols-6">
                <div class="col-span-3">
                    <label for="first_name" class="block mb-2 text-sm font-medium">Nome</label>
                    <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Maria" required>
                </div>
                <div class="col-span-3">
                    <label for="last_name" class="block mb-2 text-sm font-medium">Cognome</label>
                    <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Rossi" required>
                </div>
                <div class="col-span-6">
                    <label for="phone" class="block mb-2 text-sm font-medium">Numbero di cellulare</label>
                    <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="+39 333 92 88 151 01" required>
                </div>
                <div class="col-span-6">
                    <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="maria_rossi@esempio.com" required>
                </div>
                <div class="col-span-6">
                    <label for="address" class="block mb-2 text-sm font-medium">Indirizzo</label>
                    <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="Via Roma" required>
                </div>
                <div class="col-span-2">
                    <label for="city" class="block mb-2 text-sm font-medium">Città</label>
                    <input type="text" id="city" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Bologna" required>
                </div>
                <div class="col-span-2">
                    <label for="province" class="block mb-2 text-sm font-medium">Provincia</label>
                    <input type="text" id="province" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Bologna" required>
                </div>
                <div class="col-span-2">
                    <label for="zip" class="block mb-2 text-sm font-medium">Codice postale</label>
                    <input type="text" id="zip" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="40100" required>
                </div>
            </div>
            <button id="nextStepPayment" class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Prossimo step: informazioni di pagamento
            </button>
        </form>
        <form action="#" id="form-right" class="opacity-0 translate-x-full min-w-full duration-1000 ">
            <h3 class="mb-4 text-lg font-medium leading-none">Invoice details</h3>
            <div class="grid gap-4 mb-4 sm:grid-cols-6">
                <div class="col-span-3">
                    <label for="first_name" class="block mb-2 text-sm font-medium">Nome</label>
                    <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Maria" required>
                </div>
                <div class="col-span-3">
                    <label for="last_name" class="block mb-2 text-sm font-medium">Cognome</label>
                    <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Rossi" required>
                </div>
                <div class="col-span-6">
                    <label for="phone" class="block mb-2 text-sm font-medium">Numbero di cellulare</label>
                    <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="+39 333 92 88 151 01" required>
                </div>
                <div class="col-span-6">
                    <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="maria_rossi@esempio.com" required>
                </div>
                <div class="col-span-6">
                    <label for="address" class="block mb-2 text-sm font-medium">Indirizzo</label>
                    <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5" placeholder="Via Roma" required>
                </div>
                <div class="col-span-2">
                    <label for="city" class="block mb-2 text-sm font-medium">Città</label>
                    <input type="text" id="city" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Bologna" required>
                </div>
                <div class="col-span-2">
                    <label for="province" class="block mb-2 text-sm font-medium">Provincia</label>
                    <input type="text" id="province" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Bologna" required>
                </div>
                <div class="col-span-2">
                    <label for="zip" class="block mb-2 text-sm font-medium">Codice postale</label>
                    <input type="text" id="zip" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="40100" required>
                </div>
            </div>
            <button id="payment" class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Procedi al pagamento
            </button>
        </form>
    </div>
    <div class="col-span-2 h-100 bg-green-100 px-5 py-10 lg:p-20">
        <h3>Riepilogo dell'ordine</h3>
        <p>Controlla i tuoi articoli.</p>
        <div id="checkContainer">
        </div>
    </div>
</div>
<?= do_shortcode("[views section=footer name=footerView]"); ?>