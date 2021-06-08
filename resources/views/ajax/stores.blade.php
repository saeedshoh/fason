@empty(!$stores)
    @foreach ($stores as $store)
        <div class="col card__item mt-3 position-relative">
            <img class="mw-100" src="/storage/{{ $store->avatar ?? 'theme/avatar_store.svg' }}">
            <div class="card__body text-center mt-3">
                <h3>{{ $store->name }}</h3>
                <span class="text-pinky">Товаров: {{ $store->product->count() }}</span>
            </div>
            <a href="{{ route('ft-store.guest', ['slug' => $store->slug]) }}" class="stretched-link"></a>
        </div>
    @endforeach
@endempty
