<form method="post" action="/checkout/submit">
    @csrf
    <div class="flex flex-col p-4 md:p-10">
        <h1 class="mb-3 text-2xl font-medium">Je gegevens</h1>
        <div class="mb-2 flex flex-col">
            <label for="naam">Naam *</label>
            <input type="text" name="name" id="naam" class="input input-bordered w-full max-w-xs" />
        </div>
        <div class="mb-2 flex flex-col">
            <label for="email">Email *</label>
            <input type="text" name="email" id="email" class="input input-bordered w-full max-w-xs" />
        </div>
        <div class="mb-2 flex flex-col">
            <label for="telefoon">Telefoon *</label>
            <input type="text" name="telephone" id="telefoon" class="input input-bordered w-full max-w-xs" />
        </div>
        <div class="divider"></div>
        <h1 class="mb-3 text-2xl font-medium">Afhalen</h1>
        <div class="alert alert-warning mb-5 shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>Let op, je kunt alleen vooruit bestellen. Kies de gewenste datum:</span>
            </div>
        </div>
        <div class="relative mb-4">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input datepicker datepicker-buttons type="text"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                placeholder="Datum">
        </div>
        <select class="select select-bordered mb-4 w-full max-w-xs">
            <option selected>17:00</option>
            <option>17:30</option>
            <option>17:00</option>
            <option>18:00</option>
            <option>18:30</option>
            <option>19:00</option>
            <option>19:30</option>
            <option>20:00</option>
            <option>20:30</option>
        </select>
        <div class="flex justify-center">
            <button type="submit" class="btn btn-wide btn-secondary mt-5">Bestelling plaatsen</button>
        </div>
    </div>
</form>
