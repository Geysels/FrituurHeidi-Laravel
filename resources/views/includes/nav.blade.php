<header>
    <nav class="fixed top-0 z-10 w-full border-gray-200 bg-amber-500 px-2 py-2.5 dark:bg-gray-800">
        <div class="container mx-auto flex flex-wrap items-center justify-between">
            <a href='#' class="flex items-center">
                <img src="{{ asset('img/burger.svg') }}" class="mr-3 h-6 sm:h-9" alt="logo">
                <span class="hidden self-center whitespace-nowrap text-2xl font-bold dark:text-white md:flex">Frituur
                    Heidi</span>
            </a>
            <div class="flex md:order-2">
                <button type="button"
                    class="mr-3 rounded-lg border-2 border-solid border-white px-2 py-2 text-center text-sm font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:mr-5 md:px-5">Aanmelden</button>
                <button type="button"
                    class="mr-3 rounded-lg bg-red-700 px-2 py-2 text-center text-sm font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:mr-0 md:px-5">Bestellen</button>
                <button data-collapse-toggle="mobile-menu-4" type="button"
                    class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                    aria-controls="mobile-menu-4" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="mobile-menu-4">
                <ul class="mt-4 flex flex-col md:mt-0 md:flex-row md:space-x-8 md:text-sm md:font-medium">
                    <li>
                        <a href="#"
                            class="block rounded py-2 pr-4 pl-3 text-stone-800 dark:text-white md:bg-transparent md:p-0"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block border-b border-gray-100 py-2 pr-4 pl-3 text-stone-800 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-stone-700 md:dark:hover:bg-transparent md:dark:hover:text-white">Over
                            Ons</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block rounded py-2 pr-4 pl-3 text-stone-800 dark:text-white md:bg-transparent md:p-0"
                            aria-current="page">Menu</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block border-b border-gray-100 py-2 pr-4 pl-3 text-stone-800 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-stone-700 md:dark:hover:bg-transparent md:dark:hover:text-white">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
