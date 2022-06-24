@foreach ($products as $product)
    <div class="flex justify-between p-4 sm:w-screen md:w-[60rem] md:p-10">
        <form method="post" action="{{ route('addToCart') }}">
            @csrf
            <p class="text-xl font-semibold">{{ $product->name }}</p>
            <p class="italic">{{ $product->remark }}</p>
            <p class="text-xl font-semibold">€ {{ $product->price }}</p>

            <input name="selectedProduct" value="{{ $product }}" hidden />
            {{-- Product Options --}}
            @foreach ($product->options as $option)
                <input type="checkbox" name="selectedOptions[]" value="{{ $option }}">
                {{ $option->name }}
            @endforeach

            <button
                class="btn btn-primary mt-2 transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">
                Toevoegen
            </button>
        </form>
        <img src="{{ asset('img/dummy.png') }}" alt="">
    </div>
    <div class="divider"></div>
@endforeach
