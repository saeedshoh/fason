@extends('layouts.app')
@extends('layouts.header')
@section('title')
    {{ $store->name }}
@endsection
@extends('layouts.footer')
@section('content')
  <!--Header-end-->
  <section class="content">
    <div class="container">
      <!--Edit logo and banner start-->
      <div class="row mt-sm-3">
         <div class="col-md-3 px-0 px-md-2 position-relative">
           <div class="text-center d-none d-md-block">
            <img src="{{ Storage::url($store->avatar) }}" height="215" class="img-fluid rounded">
           </div>
         </div>
         <div class="col-md-9 px-0 px-md-2 position-relative">
          <img src="{{ Storage::url($store->cover) }}" class="w-100 rounded store-banner" height="215">
         </div>
         <div class="col-12 d-block my-4">
          <div class="row align-items-center">
            <div class="col-4 col-md-3 text-center">
              <div class="d-inline-block position-relative  d-md-none">
                <img class="store-icon" src="{{ Storage::url($store->avatar) }}" width="80px" height="80px">
              </div>
            </div>
            <div class="col-8 col-md-9 order-0 order-lg-1 mt-0 mt-sm-3">
              <div class="d-flex flex-column flex-md-row justify-content-between">
                <h3 class="font-weight-bold">{{ $store->user->name }}</h3>
                <span class="text-monospace">г.{{ $store->city->name }}</span> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Edit logo and banner end-->
      <!--store info start-->
      <div class="row align-items-center my-4">
        <div class="col-12 col-md-3">
          <h3 class="font-weight-bold">О магазине:</h3>
        </div>
        <div class="col-12 col-md-9">
          <div class="">
           {{ $store->description }}
          </div>
        </div>
      </div>
      <!--store info end-->
    </div>
    <!--goods start-->
    <div class="container">
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">

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
        @empty
            Извените ничего не найдено
        @endforelse

      </div>
    </div>
    <!--tabs with goods end-->
  </section>

@endsection
