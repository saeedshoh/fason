@extends('layouts.app')
@section('name')
@section('title')
    {{ $name }}
@endsection
@extends('layouts.header')
@extends('layouts.footer')

@section('content')

<section class="content mt-4">
    <div class="all-product container mt-5">
    <a href="{{ route('home') }}">
      <h3 class="shop-subject"> <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055"/>
        </svg>  <span class="ml-2"> Назад</span>
      </h3>
    </a>
      <div class="row mt-3">
        <div class="col-12 col-md-4 mb-2 px-2 px-lg-3">
          <div class="catalog__ategory col-12 bg-white px-0">
            <ul class="shop-subject list-group list-group-flush h-100">
              @forelse ($categories as $category)
              <li class="list-group-item  bg-transparent  d-flex justify-content-between align-items-center">
                <a data-id="{{ $category->id }}" href="#" class="text-decoration-none subcategory text-secondary"><img src="storage/{{ $category->icon }}" height="20" width="20" alt="" class="rounded-11"> {{ $category->name }}</a>
                <div class="spinner-grow text-center text-danger float-right" role="status"></div>
              </li>
              @empty
                <li class="list-group-item"> Извините ничего не найдено</li>
              @endforelse
            </ul>
          </div>
        </div>

        <div id="catProducts" class="col-12 col-md-8">
          <div class="row row-cols-2 row-cols-md-2 row-cols-lg-3 my-2">
            @forelse ($products as $product)
            <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
              <div class="card rounded shadow">
                <img class="position-absolute favorite @if (Auth::check() && $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()) $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()->product_id == $product->id ? active : '' @endif" src="storage/theme/icons/favourite.svg" alt="">
                <img class="img-fluid rounded mb-md-3" src="{{ Storage::url($product->image) }}" alt="">
                <div class="container">
                  <h4 class="product-name shop-subject" >{{ $product->name }}</h4>
                  <span class="text-muted">Одежда</span>
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
      </div>
    </div>
  </section>
@endsection
