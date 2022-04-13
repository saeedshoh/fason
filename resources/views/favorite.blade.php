@extends('layouts.app')
@section('name')
@section('title')
    Сохраненные товары
@endsection
@extends('layouts.header')
@extends('layouts.footer')

@section('content')
<section id="favorite_scroll">
    <div class="container mt-3 mb-5 px-md-0">
      <!--favourite start-->
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="javascript:history.back()" class="text-danger font-weight-bold text-decoration-none"> <img src="/storage/theme/icons/back.svg" alt="">
          назад
        </a>
        <h6 class="mb-0 text-secondary d-md-none">Сохраненные:</h6>
      </div>
      <h4 class="py-3 text-center text-secondary d-none d-md-block">Сохраненные:</h4>
      <div class="mt-3 mb-5 row row-cols-2 row-cols-md-3 row-cols-lg-5 active-product">
        @forelse ($favorites as $favorite)
            @foreach ($favorite->products as $product)
                <div class="px-1 mb-4 col d-flex align-items-center justify-content-center px-md-2">
                    <div class="border-0 rounded shadow card h-100">
                        <img class="rounded img-fluid" src="{{ Storage::url($product->image) }}" alt="">
                        <div class="container">
                            <h4 class="my-3 product-name shop-subject" >{{ Str::limit($product->name, 26) }}</h4>
                            <div class="mb-3 price-place d-flex justify-content-between align-items-center text-danger">
                                <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                                <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @empty
        </div>
            <div class="text-center empty-favorite">Извените ничего не найдено</div>
        @endforelse
      </div>
        <div class="my-3 text-center d-none loading_hide_favorite text-danger">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
        </div>
  </section>
@endsection
