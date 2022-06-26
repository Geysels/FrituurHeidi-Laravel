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
            <li><input type="text" placeholder="Type here" class="input input-bordered h-full w-full max-w-xs" />
            </li>
            <div class="divider"></div>
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
                <li><a href="{{ route('getProductsFromCategory', ['id' => $category->id]) }}"
                        class="active:bg-secondary category font-medium focus:ring-amber-300">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
<script>
    TweenMax.to(".category", 0.6, {
        scale: 1.06,
        repeat: -1,
        yoyo: true,
        ease: Power0.easeNone,
    });
</script>
