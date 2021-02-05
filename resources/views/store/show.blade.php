@extends('layouts.app')
@extends('layouts.header')
@section('title')
    {{ $store->name }}
@endsection
@extends('layouts.footer')
@section('content')
 <!--Header-end-->
  <section class="content profile mt-0 mt-md-3">
    <div class="container">
      <div class="row">
        <!--store logo start-->
        <div class="col-12 d-none d-md-block col-lg-3 px-0 px-md-2">
          <div class="text-center">
            <div class="position-relative d-inline-block">
            <img src="/storage/{{ $store->avatar }}" class="w-100 rounded store-image" alt=""  height="216">
              {{-- <button class="btn p-0 position-absolute change-avatar-icon"><img src="img/camera.svg" class="" alt=""></button> --}}
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-9 px-0 px-md-2">
            <div class="text-center">
              <div class="position-relative d-inline-block">
              <img src="/storage/{{ $store->cover ?? '/theme/yellowbanner.png'}}" class="w-100 rounded store-image" alt=""  height="216">
              <div class="mobile-avatar position-absolute w-lg-100">
                <img src="/storage/{{ $store->avatar ?? '/theme/icons/Avatar.svg'}}" class="store-image d-block d-md-none rounded-circle" width="90" height="90" alt="">
              </div>
              </div>
            </div>
          </div>
        <!--store logo end-->
        <!--store-info start-->
        <div class="col-12 mt-lg-4">
          <div class="d-none d-lg-block">
            <p>{{ $store->description ?? '' }}</p>
            <a href="{{ route('useful_links.privacy_policy') }}" class="copywright__gideline mt-3 text-success"> Политика и конфеденцальность </a>
          </div>
          <div class="my-5 my-lg-3">
            <div class="row">
              <div class="col-5">
                <h3 class="font-weight-bold">Телефон:</h3>
              </div>
              <div class="col-7 align-self-center">
                <h5 class="font-weight-bold text-left text-md-right mb-1">
                  {{ $store->user->phone ?? '' }}
                </h5>
              </div>
              <div class="col-5">
                <h3 class="font-weight-bold">Город:</h3>
              </div>
              <div class="col-7 align-self-center">
                <h5 class="font-weight-bold text-left text-md-right mb-1">
                  {{ $store->city->name ?? ''}}
                </h5>
              </div>
              <div class="col-5">
                <h3 class="font-weight-bold">Имя:</h3>
              </div>
              <div class="col-7 align-self-center">
                <h5 class="font-weight-bold text-left text-md-right mb-1">
                  {{ $store->name ?? ''}}
                </h5>
              </div>
              <div class="col-5">
                <h3 class="font-weight-bold">Адрес:</h3>
              </div>
              <div class="col-7 align-self-center">
                <h5 class="font-weight-bold text-left text-md-right mb-1">
                  {{ $store->address ?? ''}}
                </h5>
              </div>
              <div class="offset-0 offset-md-6 col-12 col-md-6 mt-md-0 mt-3">
                <div class="text-center text-md-right">
                  <a class="btn btn-danger col-6 col-sm-4 rounded-11" href="{{ route('ft-store.edit', $store->slug) }}">Изменить</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--customer-navs start-->
    <!--customer-navs start-->
  <div class="container-fluid bg-white py-3 d-none d-md-block">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('ft-store.show', $store->slug) }}"><img class="mr-1" src="/storage/theme/icons/store.svg" alt="">  Мои товары</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('salesHistory', $store->slug) }}"><img class="mr-1" src="/storage/theme/icons/orders.svg" alt="">  История продаж</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('ft_product.add_product') }}"><img class="mr-1" src="/storage/theme/icons/add.svg" alt="">Добавить товар</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('favorite.index') }}"><img class="mr-1" src="/storage/theme/icons/saved.svg" alt="">  Сохраненные</a>
        </div>
      </div>
    </div>
  </div>
  <!--customer-navs end-->
  <!--tabs with goods start-->
  <div class="container">
    <ul class="nav nav-tabs customer-tab border-0">
      <li class="nav-item position-relative">
        <a class="nav-link active border-0 font-weight-bold" id="all-product-tab" data-toggle="tab" href="#all-product"  aria-selected="true">Все {{ count($products) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="published-tab" data-toggle="tab" href="#published"  aria-selected="false">Опубликованные {{ count($acceptedProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="onChecking-tab" data-toggle="tab" href="#onChecking" aria-selected="false">На проверке {{ count($onCheckProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="hidden-tab" data-toggle="tab" href="#hidden" aria-selected="false">Скрыты {{ count($hiddenProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="declined-tab" data-toggle="tab" href="#declined" aria-selected="false">Отклоненные {{ count($canceledProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="notInStock-tab" data-toggle="tab" href="#notInStock" aria-selected="false">Нет в наличии {{ count($notInStock) }}</a>
      </li>
      {{-- <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="onDelete-tab" data-toggle="tab" href="#onDelete"  aria-selected="false">Удалено {{ count($deletedProducts) }}</a>
      </li> --}}
    </ul>
    <!--Tab-content>-->
    <div class="tab-content mb-5" id="myTabContent">
      <!--all-product-->
      <div class="tab-pane fade show active" id="all-product" role="tabpanel" aria-labelledby="all-product-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($products as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">

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
              @empty
                  Извините ничего не найдено
              @endforelse
            </div>
        </div>
      </div>
      <!--All product-end-->
      <!--Published-tab-->
      <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($acceptedProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
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
              @empty
                  Извените ничего не найдено
              @endforelse
            </div>
        </div>
      </div>
      <!--Published-tab end-->
      <!--On Checking-->
      <div class="tab-pane fade" id="onChecking" role="tabpanel" aria-labelledby="onChecking-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($onCheckProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
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
              @empty
                  Извените ничего не найдено
              @endforelse
            </div>
        </div>
      </div>
      <!--On Checking end-->
      <!--Hidden-->
      <div class="tab-pane fade" id="hidden" role="tabpanel" aria-labelledby="hidden-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($hiddenProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
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
              @empty
                  Извените ничего не найдено
              @endforelse
            </div>
        </div>
      </div>
      <!--Hidden end-->
      <!--Declined-->
      <div class="tab-pane fade" id="declined" role="tabpanel" aria-labelledby="declined-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($canceledProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
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
              @empty
                  Извените ничего не найдено
              @endforelse
            </div>
        </div>
      </div>
      <!--Declined end-->
      <!--Not in stock-->
      <div class="tab-pane fade" id="notInStock" role="tabpanel" aria-labelledby="notInStock-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($notInStock as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
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
              @empty
                  Извените ничего не найдено
              @endforelse
            </div>
        </div>
      </div>
      <!--Declined end-->
      <!--On Delete-->
      {{-- <div class="tab-pane fade" id="onDelete" role="tabpanel" aria-labelledby="onDelete-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($deletedProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0">
                  <svg class="position-absolute favorite @if (Auth::check() && $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()) $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()->product_id == $product->id ? active : '' @endif" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
                    <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                  </svg>
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
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
      </div> --}}
      <!--On Delete end-->
    </div>
    <!--Tab content end-->
    <div class="text-center mb-5 mb-lg-0">
        @if($store->is_active == 1)
        <a class="btn btn-danger rounded-11 mb-5" href="{{ route('ft_product.add_product') }}"><img class="mr-1" src="/storage/theme/icons/add.svg" alt="">Добавить товар</a>
        @else
        <div class="alert alert-warning" role="alert">
            Магазин еще не прошел модерацию.
        </div>
        @endif
    </div>
  </div>
  </section>
@endsection
