@foreach ($products as $product)
    <div class="flex justify-between p-4 md:p-10">
        <div>
            <p class="text-xl font-semibold">{{ $product->name }}</p>
            <p class="italic">{{ $product->remark }}</p>
            <p class="text-xl font-semibold">€ {{ $product->price }}</p>
            <a href="{{ route('addToCart', ['id' => $product->id]) }}"><button
                    class="btn btn-secondary mt-2 transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">Toevoegen</a>
            </button>
        </div>
        <img src="{{ asset('img/dummy.png') }}" alt="">
    </div>
    <div class="divider"></div>
@endforeach
