@extends('layouts.app')
@section('name')
@section('title')
    Сохраненные товары
@endsection
@extends('layouts.header')
@extends('layouts.footer')

@section('content')
<section>
    <div class="container mt-3 px-md-0">
      <!--favourite start-->
      <div class="d-flex mb-3 justify-content-between align-items-center">
        <a href="javascript:history.back()" class="text-danger font-weight-bold text-decoration-none"> <img src="/storage/theme/icons/back.svg" alt="">
          назад
        </a>
        <h6 class="text-secondary d-md-none mb-0">Сохраненные:</h6>
      </div>
      <h4 class="text-secondary py-3 d-none d-md-block text-center">Сохраненные:</h4>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 mt-3 mb-5 active-product">
        @forelse ($favorites as $favorite)
            @foreach ($favorite->products as $product)
                <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                    <div class="card rounded shadow border-0 h-100">
                        <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                        <div class="container">
                            <h4 class="product-name shop-subject my-3" >{{ Str::limit($product->name, 26) }}</h4>
                            <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                                <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                                <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @empty
        </div>
            <div class="text-center">
                Извените ничего не найдено
            </div>
        @endforelse
      </div>
  </section>
@endsection
