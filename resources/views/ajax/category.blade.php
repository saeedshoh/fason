@forelse ($products as $product)
    <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
        <div class="card rounded shadow border-0 h-100 w-100">
        <img class="img-fluid rounded" src="{{ Storage::url($product->image) ?? '/storage/app/public/theme/no-photo.jpg' }}" alt="">
        <div class="container">
            <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
            <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
            <span class="font-weight-bold">
                {{ $product->price_after_margin }} сомони
            </span>
            <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
            </div>
        </div>
        </div>
    </div>
@endforeach
