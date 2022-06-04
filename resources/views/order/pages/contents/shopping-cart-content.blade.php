@if (Session::has('cart'))
    <ul>
        @foreach ($storedItems as $storedItem)
            <li><span
                    class="mr-2 rounded bg-pink-100 px-2.5 py-0.5 text-sm font-medium text-pink-800 dark:bg-pink-200 dark:text-pink-900">{{ $storedItem['qty'] }}</span>
                <p>{{ $storedItem['product']->name }}</p>
                <span
                    class="mr-2 rounded bg-pink-100 px-2.5 py-0.5 text-sm font-medium text-pink-800 dark:bg-pink-200 dark:text-pink-900">{{ $storedItem['subTotal'] }}</span>
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <a href="{{ route('removeFromCart', ['id' => $storedItem['product']->id]) }}">
                        <button type="button"
                            class="rounded-l-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                            -
                        </button>
                    </a>
                </div>
            </li>
        @endforeach
        <a href="{{ route('emptyCart') }}">
            <button type="button"
                class="border-t border-b border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                Clear All
            </button>
        </a>
    </ul>
    <strong>Total: {{ $totalPrice }}</strong>
    <button type="button"
        class="mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Checkout</button>
@else
    <p>No items</p>
@endif
