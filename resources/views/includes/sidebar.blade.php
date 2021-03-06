@if (Route::currentRouteName() == 'checkout')
    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <ul
            class="menu text-base-content scrollbar-thin scrollbar-thumb-stone-600 scrollbar-track-gray-100 w-80 overflow-y-auto bg-stone-800 p-4">
            @include('order.pages.contents.shopping-cart-content')
            <div class="divider"></div>
            <li><a href="{{ route('order.main') }}" class="font-medium focus:outline-none"><i
                        class="fa-solid fa-circle-arrow-left fa-lg"></i>Terug
                    naar bestellen</a></li>
        </ul>
    </div>
@else
    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <ul
            class="menu text-base-content scrollbar-thin scrollbar-thumb-stone-600 scrollbar-track-gray-100 w-80 overflow-y-auto bg-stone-800 p-4">
            </li>
            @include('order.pages.contents.shopping-cart-content')
            <div class="divider"></div>
            @if (Route::currentRouteName() == 'order.main')
                <li><a href="/" class="font-medium focus:outline-none"><i
                            class="fa-solid fa-circle-arrow-left fa-lg"></i> Terug naar
                        homepagina</a>
                </li>
            @else
                <li><a href="{{ route('order.main') }}" class="font-medium focus:outline-none"><i
                            class="fa-solid fa-circle-arrow-left fa-lg"></i>Terug
                        naar bestellen</a></li>
            @endif
            <div class="divider"></div>
            @foreach ($categories as $category)
                @if (Route::currentRouteName() == 'order.main')
                    <li class="category"><a href="{{ route('getProductsFromCategory', ['id' => $category->id]) }}"
                            class="active:bg-accent font-medium focus:ring-amber-300">{{ $category->name }}</a>
                    </li>
                @else
                    <li><a href="{{ route('getProductsFromCategory', ['id' => $category->id]) }}"
                            class="active:bg-accent font-medium focus:ring-amber-300">{{ $category->name }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif
<script>
    TweenMax.to(".category", 0.6, {
        scale: 1.02,
        repeat: 10,
        yoyo: true,
        ease: Power0.easeNone,
    });
</script>
