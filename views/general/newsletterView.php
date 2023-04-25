<div class="relative flex flex-col justify-center lg:flex-row items-center bg-slate-50 rounded-2xl sm:rounded-[40px] p-4 pb-0 sm:p-5 sm:pb-0 lg:p-24">
    <div class="max-w-lg relative text-left">
        <h2 class="font-semibold text-4xl md:text-5xl">Non perdere le offerte speciali</h2>
        <span class="block mt-5 text-neutral-500">Registrati per ricevere notizie sulle ultime combo, codici sconto e promozioni...</span>
        <ul class="space-y-4 mt-10">
            <li class="flex items-center space-x-4">
                <span class="nc-Badge inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative text-purple-800 bg-purple-100">01</span>
                <span class="font-medium text-neutral-700">Combo di risparmio</span>
            </li>
            <li class="flex items-center space-x-4">
                <span class="nc-Badge inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative text-blue-800 bg-blue-100">02</span>
                <span class="font-medium text-neutral-700">Spedizione gratuita</span>
            </li>
            <li class="flex items-center space-x-4">
                <span class="nc-Badge inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative text-red-800 bg-red-100">03</span>
                <span class="font-medium text-neutral-700">Riviste premium</span>
            </li>
        </ul>
        <form class="mt-10 relative max-w-sm">
            <input type="email" class="block w-full border-neutral-200 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 bg-white disabled:bg-neutral-200 rounded-full text-sm font-normal h-11 px-4 py-3 " required="" aria-required="true" placeholder="Inserisci la tua email">
            <button class="btnStyle p-0 flex justify-center items-center rounded-full disabled:bg-opacity-70 absolute top-1/2 -translate-y-1/2 right-1 w-8 h-8 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-6000" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff" aria-hidden="true" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h13.19l-5.47-5.47a.75.75 0 011.06-1.06l6.75 6.75a.75.75 0 010 1.06l-6.75 6.75a.75.75 0 11-1.06-1.06l5.47-5.47H4.5a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </form>
    </div>
    <div class="max-w-[420px]">
        <img class="object-cover w-[420px] h-[420px]" src="<?= get_image_path('foto-borsa.jpg'); ?>" alt="" style="color: transparent;">
    </div>
</div>