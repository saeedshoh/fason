@empty(!$products)
<ul class="list-group list-group-flush">
    @forelse ($products as $product)
    <li class="list-group-item position-relative">
        <div class="media">
            <img src="{{ Storage::url($product->image) }}" class="mr-3 rounded" width="64">
            <div class="media-body">
                <h5 class="mt-0">{{ $product->name }}</h5>
                <span class="text-danger">{{ $product->price_after_margin }} Сомони</span>
            </div>
            <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
        </div>
    </li>
    @empty
    <li class="list-group-item">Извините ничего не найдено.</li>
    @endforelse
</ul>
@endempty
