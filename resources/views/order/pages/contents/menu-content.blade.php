@foreach ($products as $product)
    <div class="flex justify-between p-4 sm:w-screen md:w-[60rem] md:p-10">
        <form method="post" action="{{ route('addToCart') }}">
            @csrf
            <p class="text-xl">{{ $product->name }}</p>
            <p class="italic text-slate-50">{{ $product->remark }}</p>
            <p class="my-2 text-xl">€ {{ $product->price }}</p>
            <div class="my-4 flex">
                <input name="selectedProduct" value="{{ $product }}" hidden />
                @if (count($product->options))
                    <div class="mt-4 flex flex-col">
                        <p class="font-semibold text-slate-50">Kies je extra's:</p>
                        {{-- Product Options --}}
                        @foreach ($product->options as $option)
                            <div class="mt-2 flex">
                                <input type="checkbox" class="checkbox" id="checkbox" name="selectedOptions[]"
                                    value="{{ $option }}">
                                <label for="checkbox" class="ml-2 mr-5 text-slate-50">{{ $option->name }}</label>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <button class="btn btn-primary mt-2">
                Toevoegen
            </button>
        </form>
        <img src="{{ asset('img/dummy.png') }}" class="h-40" alt="">
    </div>
    <div class="divider"></div>
@endforeach
