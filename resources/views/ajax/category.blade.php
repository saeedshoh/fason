@if($style == 1)
    @forelse ($products as $product)
        <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
            <div class="card rounded shadow border-0 h-100 w-100">
                <img class="img-fluid rounded" src="{{ Storage::url($product->image) ?? '/storage/app/public/theme/no-photo.jpg' }}" alt="">
                <div class="container d-flex flex-column justify-space-between flex-wrap">
                    <h4 class="product-name shop-subject my-3" style="height: 2rem;" >{{ Str::limit($product->name, 26) }}</h4>
                    <div class="discription d-none">
                        <p>
                            {{ Str::limit($product->description, 20) }}
                        </p>
                    </div>
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
@else
    @forelse ($products as $product)
    <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
        <div class="card rounded shadow border-0 h-100 w-100 flex-row">
            <img class="img-fluid rounded w-50" src="{{ Storage::url($product->image) ?? '/storage/app/public/theme/no-photo.jpg' }}" alt="">
            <div class="container d-flex flex-column justify-space-between flex-wrap">
                <h4 class="product-name shop-subject my-3" >{{ Str::limit($product->name, 26) }}</h4>
                <div class="discription">
                    <p>
                        {{ Str::limit($product->description, 20) }}
                    </p>
                </div>
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
@endif

