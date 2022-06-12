@if (Session::get('cart')->getTotalQty() == 0)
    <div class="flex flex-col">
        <div class="alert alert-warning shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="h-6 w-6 flex-shrink-0 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Winkelwagen leeg!</span>
            </div>
        </div>
    </div>
@else
    <div class="mt-3 flex flex-col">
        <div class="mb-4 flex items-center justify-between">
            <p class="text-lg font-medium">Winkelwagen</p>
            <a href="{{ route('emptyCart') }}">
                <i class="fa-solid fa-trash-can fa-lg"></i>
            </a>
        </div>
        @foreach ($storedItems as $storedItem)
            <div class="flex justify-between">
                <p>
                    <a href="{{ route('removeFromCart', ['id' => $storedItem['product']->id]) }}">
                        <i class="fa-solid fa-minus"></i></a>
                    {{ $storedItem['qty'] }}x {{ $storedItem['product']->name }}
                </p>
                <p>€ {{ $storedItem['subTotal'] }}</p>
            </div>
        @endforeach
        <div class="mt-4 mb-4 flex justify-between">
            <p class="text-lg font-medium">Totaal:</p>
            <p class="text-lg font-medium">€ {{ $totalPrice }}</p>
        </div>
        <div class="flex justify-center">
            <a href="{{ route('shoppingCart') }}"><button type="button"
                    class="btn btn-primary transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">Checkout</button></a>
        </div>

@endif
{{-- <div class="mt-3 flex flex-col">
        <div class="flex justify-between">
            <p class=""><i class="fa-solid fa-cart-shopping"></i>Winkelwagen</p>
            <div class="badge badge-accent">{{ Session::get('cart')->getTotalQty() }}</div>
        </div>
        @foreach ($storedItems as $storedItem)
            <div class="flex justify-between">
                <p>
                    <a href="{{ route('removeFromCart', ['id' => $storedItem['product']->id]) }}">
                        <i class="fa-solid fa-minus"></i></a>
                    {{ $storedItem['qty'] }}x {{ $storedItem['product']->name }}
                </p>
                <p>€ {{ $storedItem['subTotal'] }}</p>
            </div>
        @endforeach
        <a href="{{ route('emptyCart') }}">
            <i class="fa-solid fa-trash-can"></i>
        </a>
        <div class="flex justify-between">
            <p>Totaal:</p>
            <p>€ {{ $totalPrice }}</p>
        </div>
    @else
        (Session::get('cart')->getTotalQty() == 0)

    </div>
@endif --}}


{{-- @if (Session::has('cart'))

    @foreach ($storedItems as $storedItem)
        <span
            class="mr-2 rounded bg-pink-100 px-2.5 py-0.5 text-sm font-medium text-pink-800 dark:bg-pink-200 dark:text-pink-900">{{ $storedItem['qty'] }}</span>
        <p>{{ $storedItem['product']->name }}</p>
        <div class="badge badge-secondary">{{ $storedItem['subTotal'] }}</div>
        <div class="inline-flex rounded-md shadow-sm" role="group">
            <a href="{{ route('removeFromCart', ['id' => $storedItem['product']->id]) }}">
                <button type="button"
                    class="rounded-l-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                    -
                </button>
            </a>
        </div>
    @endforeach
    <a href="{{ route('emptyCart') }}">
        <button type="button"
            class="border-t border-b border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
            Clear All
        </button>
    </a>

    <strong>Total: {{ $totalPrice }}</strong>
    <a href="{{ route('shoppingCart') }}"><button type="button" class="btn btn-primary">Checkout</button></a>
@else
    <p>No items</p>
@endif --}}
