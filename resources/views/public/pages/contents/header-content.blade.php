<section>
    <div class="flex-col items-center justify-center bg-cover bg-center pt-24 pb-4 md:flex md:pt-64"
        style="background-image: url('{{ asset('img/1.png') }}')">
        <h1 class="mb-2 text-center text-5xl font-medium leading-tight text-stone-800 md:hidden">Frituur Heidi</h1>
        <div class="flex flex-wrap justify-center md:content-end md:items-center">
            <div
                class="order-2 max-w-sm rounded-lg border border-gray-200 bg-white p-4 drop-shadow-2xl dark:border-gray-700 dark:bg-gray-800 md:p-6">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Eenvoudig bestellen
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Zin in lekkere frietjes? Kom langs of bestel online!
                </p>
                <a href="#"
                    class="inline-flex items-center rounded-lg bg-red-700 py-2 px-3 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Bestel online
                    <svg class="ml-2 -mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <img src=" {{ asset('img/hand-smartphone.png') }}" class="h-96 md:order-2" alt="burger">
        </div>
    </div>
</section>
