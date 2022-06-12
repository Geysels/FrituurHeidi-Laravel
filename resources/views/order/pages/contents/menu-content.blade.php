@foreach ($products as $product)
    <div class="flex justify-between">
        <p>{{ $product->name }}</p>
        <img src="{{ asset('img/dummy.png') }}" alt="">
        <div class="btn-group">
            <button class="btn btn-active"> {{ $product->price }}
            </button>
            <a href="{{ route('addToCart', ['id' => $product->id]) }}"><button class="btn"> <i
                        class="fa-solid fa-plus"></i></a>
            </button>
        </div>
    </div>
@endforeach
