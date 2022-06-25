@if (Route::currentRouteName() == 'checkout')
    <div class="mt-2 flex flex-col">
        <div class="mb-4 flex items-center justify-between">
            <p class="text-lg font-medium">Je bestelling</p>
            <a href="{{ route('emptyCart') }}">
                <i class="fa-solid fa-trash-can fa-lg"></i>
            </a>
        </div>
        @foreach ($cartItems as $cartItem)
            <div class="flex justify-between">
                <p>
                    <a href="{{ route('removeFromCart', ['id' => $loop->index]) }}">
                        <i class="fa-solid fa-minus"></i></a>
                    {{ $cartItem->getProductName() }}
                </p>
                <p>€ {{ $cartItem->getSubtotal() }}</p>
            </div>
        @endforeach
        <div class="divider"></div>
        <div class="mb-4 flex justify-between">
            <p class="text-lg font-medium">Totaal:</p>
            <p class="text-lg font-medium">€ {{ $totalPrice }}</p>
        </div>
        <div class="flex justify-center">
            <p class="text-sm italic">
                Door op 'Bestelling plaatsen' te klikken ga je een bestelling aan met betaalplicht en ga je akkoord met
                alle
                ingevoerde gegevens en de algemene voorwaarden, privacyverklaring en cookiebeleid.</p>
        </div>
    @else
        @if (!Session::has('cart') || Session::get('cart')->isEmpty())
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
            <div class="mt-2 flex flex-col">
                <div class="mb-4 flex items-center justify-between">
                    <p class="text-lg font-medium">Winkelwagen</p>
                    <a href="{{ route('emptyCart') }}">
                        <i class="fa-solid fa-trash-can fa-lg"></i>
                    </a>
                </div>
                @foreach ($cartItems as $cartItem)
                    <div class="flex justify-between">
                        <p>
                            <a href="{{ route('removeFromCart', ['id' => $loop->index]) }}">
                                <i class="fa-solid fa-minus"></i></a>
                            {{ $cartItem->getProductName() }}
                        </p>
                        @foreach ($cartItem->getOptionNames() as $optionName)
                            <p>{{ $optionName }}</p>
                        @endforeach
                        <p>€ {{ $cartItem->getSubtotal() }}</p>
                    </div>
                @endforeach
                <div class="divider"></div>
                <div class="mb-4 flex justify-between">
                    <p class="text-lg font-medium">Totaal:</p>
                    <p class="text-lg font-medium">€ {{ $totalPrice }}</p>
                </div>
                <div class="flex justify-center">
                    <a href="{{ route('checkout') }}"><button type="button"
                            class="btn btn-primary transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">Checkout</button></a>
                </div>
        @endif
@endif
