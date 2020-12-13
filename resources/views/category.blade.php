@extends('layouts.app')
@section('name')
@extends('layouts.header')
@extends('layouts.footer')

@section('content')

<section class="content mt-4">
    <div class="all-product container mt-5">
      <h3 class="shop-subject"> <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055"/>
        </svg>  <span class="ml-2"> Назад</span>
      <div class="row mt-3">
        <div class="col-12 col-md-4 mb-2 px-2 px-lg-3">
          <div class="catalog__ategory col-12 bg-white px-0">
            <ul class="shop-subject list-group list-group-flush h-100">
              @forelse ($categories as $category)
                <li class="list-group-item"> <img src="{{ Storage::url($category->icon ) }}" height="20" width="20" alt=""> {{ $category->name }} </li>
              @empty
                <li class="list-group-item"> Извините ничего не найдено</li>
              @endforelse
            </ul>
          </div>
        </div>

        <div class="col-12 col-md-8">
          <div class="row row-cols-2 row-cols-md-2 row-cols-lg-3 my-2">
              @forelse ($products as $product)
                <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
                  <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
                    <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
                    <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
                    <h4 class="product-name shop-subject" >{{ $product->name }}</h4>
                    <p class="about-product mb-2" >
                      {{ Str::limit($product->description, 110) }}
                    </p>
                    <div class="price-place position-relative">
                      <h5 class="product-price mt-4 position-relative">ЦЕНА: {{ $product->price }}</h5>
                      <p class="buy-bttn text-center mb-0 position-absolute">
                        <a href="{{ route('ft-products.single', $product->slug) }}" class="rounded-pill px-5 py-2 text-decoration-none "> Купить </a>
                      </p>
                    </div>
                  </div>
                @empty
                  <p>Извените ничего не найдено</p>
                @endforelse

              </div>
          </div>
        </div>

        </div>
      </div>
  </section>
@endsection