@extends('layouts.app')
@section('name')
@section('title')
    Сохраненные товары
@endsection
@extends('layouts.header')
@extends('layouts.footer')

@section('content')
<section>
    <div class="container mt-3">
      <!--favourite start-->
      <div class="d-flex mb-3 justify-content-between align-items-center">
        <a href="{{ $back }}" class="text-danger font-weight-bold text-decoration-none"> <img src="/storage/theme/icons/back.svg" alt="">
          назад</a>
          <h6 class="text-secondary mb-0">Сохраненные:</h6>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3 active-product">
        @forelse ($favorites as $favorite)
            @foreach ($favorite->products as $product)
                <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                    <div class="card rounded shadow border-0">
                        <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                        <div class="container">
                            <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                            <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                                <span class="font-weight-bold">{{ round($product->price_after_margin) }} сомони</span>
                                <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @empty
                Извените ничего не найдено
        @endforelse

      </div>
      <!--favourite end-->
    </div>
  </section>
@endsection
