<section>
    @foreach ($products as $product)
        <div>
            <p>{{ $product->name }}</p>
            <a href="{{ route('addToCart', ['id' => $product->id]) }}">Add To Cart</a>
        </div>
    @endforeach
</section>
