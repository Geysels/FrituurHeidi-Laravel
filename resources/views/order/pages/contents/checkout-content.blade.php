<form method="post" action="/checkout/submit">
    @csrf
    <div class="flex flex-col p-4 sm:w-screen md:w-[60rem] md:p-10">

        <h1 class="mb-3 text-7xl font-medium">Afhalen</h1>
        <div class="alert alert-warning mb-5 shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>Let op, je kunt alleen vooruit bestellen. Kies de gewenste tijd:</span>
            </div>
        </div>

        <select name="pickuptime" class="select select-bordered mb-4 w-full max-w-xs">
            <option value="17:00" selected>17:00</option>
            <option value="17:30">17:30</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="18:30">18:30</option>
            <option value="19:00">19:00</option>
            <option value="19:30">19:30</option>
            <option value="20:00">20:00</option>
            <option value="20:30">20:30</option>
        </select>
        <div class="flex justify-center">
            <button type="submit" class="btn btn-wide btn-primary mt-5">Bestelling plaatsen</button>
        </div>
    </div>
</form>
