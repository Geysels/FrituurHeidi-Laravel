<div class="drawer-side">
    <label for="my-drawer-2" class="drawer-overlay"></label>
    <ul class="menu bg-base-100 text-base-content w-80 overflow-y-auto p-4">
        <li><input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" /></li>
        <li> <a href="{{ route('shoppingCart') }}"><i class="fa-solid fa-cart-shopping"></i>
                <span class="mx-4 font-medium">Winkelmandje</span><span
                    class="mr-2 rounded bg-pink-100 px-2.5 py-0.5 text-sm font-medium text-pink-800 dark:bg-pink-200 dark:text-pink-900">{{ Session::has('cart') ? Session::get('cart')->getTotalQty() : '' }}</span></a>
        </li>
        @include('order.pages.contents.shopping-cart-content')
        <li><a href="{{ route('order.main') }}">Terug naar bestellen</a></li>
        @foreach ($categories as $category)
            <li><a>{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>



{{-- <div class="hidden w-64 border-r px-4 py-8 dark:border-gray-600 dark:bg-gray-800 md:flex md:flex-col">
    <div class="relative mt-6">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                <path
                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
        <input type="text"
            class="w-full rounded-md border bg-white py-2 pl-10 pr-4 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300"
            placeholder="Search" />
    </div>
    <nav class="mt-6 flex flex-1 flex-col justify-between">
        <div>
            <a class="flex items-center rounded-md bg-gray-200 px-4 py-2 text-gray-700 dark:bg-gray-700 dark:text-gray-200"
                href="{{ route('shoppingCart') }}"><i class="fa-solid fa-cart-shopping"></i>
                <span class="mx-4 font-medium">Winkelmandje</span><span
                    class="mr-2 rounded bg-pink-100 px-2.5 py-0.5 text-sm font-medium text-pink-800 dark:bg-pink-200 dark:text-pink-900">{{ Session::has('cart') ? Session::get('cart')->getTotalQty() : '' }}</span></a>
            <a class="mt-2 flex items-center rounded-md bg-gray-200 px-4 py-2 text-gray-700 dark:bg-gray-700 dark:text-gray-200"
                href="/">
                <i class="fa-solid fa-house"></i>
                <span class="mx-4 font-medium">Terug naar home</span>
            </a>
            @foreach ($categories as $category)
                <a class="mt-2 flex items-center rounded-md bg-gray-200 px-4 py-2 text-gray-700 dark:bg-gray-700 dark:text-gray-200"
                    href="/">
                    <span class="mx-4 font-medium"> {{ $category->name }}
                    </span>
                </a>
            @endforeach
        </div>
    </nav>
</div>
</aside> --}}
