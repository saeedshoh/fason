@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
  <!--Header-end-->
  <section class="content">
    <div class="container">
      <!--Edit logo and banner start-->
      <div class="row mt-sm-3">
         <div class="col-md-3 px-0 px-md-2 position-relative">
           <div class="text-center d-none d-md-block">
            <img src="{{ Storage::url($store->avatar) }}" height="215">
           </div>
         </div>
         <div class="col-md-9 px-0 px-md-2 position-relative">
          <img src="{{ Storage::url($store->cover) }}" class="w-100 rounded" height="215">
         </div>
         <div class="col-12 d-blockmy-4">
          <h2 class="d-md-none">Магазин</h2>
          <div class="row">
            <div class="col-3 text-center">
              <div class="d-inline-block position-relative  d-md-none">
                <img src="{{ Storage::url($store->avatar) }}" width="80px">
              </div>
            </div>
            <div class="col-9 d-flex justify-content-between order-0 order-lg-1 mt-3">
              <div>
                <h3 class="font-weight-bold">Название: {{ $store->user->name }}</h3>
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
          <div class="border rounded p-2">
           {{ $store->description }}
          </div>
        </div>
        <div class="col-6 mt-3 d-block d-md-none">
          <h3 class="font-weight-bold">Город:</h3>
        </div>
        <div class="col-6 text-right d-block d-md-none">
            {{ $store->city->name }}
        </div>
      </div>
      <!--store info end-->
    </div>
    <!--goods start-->
    <div class="container">
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">

        @forelse ($products as $product)
          <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
            <div class="card rounded shadow">
              <img class="position-absolute favorite" src="storage/theme/icons/favourite.svg" alt="">
              <img class="img-fluid rounded mb-md-3" src="{{ Storage::url($product->image) }}" alt="">
              <div class="container">
                <h4 class="product-name shop-subject" >{{ $product->name }}</h4>
                <span class="text-muted">{{ $product->category->name }}</span>
                <div class="price-place d-flex justify-content-between align-items-center mb-3">
                  <span class="font-weight-bold">TJS {{ $product->price }}</span>
                  <a href="{{ route('ft-products.single', $product->slug) }}" class="btn btn-danger rounded-pill"> Купить </a>
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
