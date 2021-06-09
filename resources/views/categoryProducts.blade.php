<div class="row row-cols-2 row-cols-md-2 row-cols-lg-3 my-2">
    @forelse ($products as $product)
    <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
        <div class="card rounded shadow">
            <img class="position-absolute favorite @if (Auth::check() && $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()) $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()->product_id == $product->id ? active : '' @endif" src="storage/theme/icons/favourite.svg" alt="">
            <img class="img-fluid rounded mb-md-3" src="{{ Storage::url($product->image) }}" alt="">
            <div class="container">
                <h4 class="product-name shop-subject" >{{ $product->name }}</h4>
                <div class="price-place d-flex justify-content-between align-items-center mb-3">
                    <span class="font-weight-bold">TJS {{ $product->price_after_margin }}</span>
                    <a href="{{ route('ft-products.single', $product->slug) }}" class="btn btn-danger rounded-pill"> Купить </a>
                </div>
            </div>
        </div>
    </div>
    @empty
        Извините ничего не найдено
    @endforelse
</div>
