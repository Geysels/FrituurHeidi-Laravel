<div class="drawer-side">
    <label for="my-drawer-2" class="drawer-overlay"></label>
    <ul
        class="menu bg-base-100 text-base-content scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-100 w-80 overflow-y-auto p-4">
        <li><input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" /></li>
        <div class="divider"></div>
        @include('order.pages.contents.shopping-cart-content')
        <div class="divider"></div>
        @if (Route::currentRouteName() == 'order.main')
            <li><a href="/"
                    class="font-medium transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 focus:outline-none"><i
                        class="fa-solid fa-circle-arrow-left fa-lg"></i> Terug naar
                    homepagina</a>
            </li>
        @else
            <li><a href="{{ route('order.main') }}"
                    class="font-medium transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 focus:outline-none"><i
                        class="fa-solid fa-circle-arrow-left fa-lg"></i>Terug
                    naar bestellen</a></li>
        @endif
        <div class="divider"></div>
        @foreach ($categories as $category)
            <li><a
                    class="active:bg-secondary font-medium transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring focus:ring-amber-300">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
