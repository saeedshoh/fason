@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')

{{--  {{ dd(Auth::user()->favorite) }}  --}}
  <section class="container mt-lg-4">
    <div class="under-menu-category">
      <div class="row">
        <div class="col-12 col-md-4 col-lg-3 d-none d-md-flex">
          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle font-weight-bold category-dropdown position-relative" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Категории
            </button>
          </div>
        </div>
        <div class="col-md-8 col-lg-6 d-none d-md-flex">
          @if ($is_store == null)

            @auth
                @if (Auth::user()->store)
                    <a href="{{ route('ft-store.show', Auth::user()->store->slug) }}" class="mr-2 btn btn-danger rounded-11 px-3">
                        <i class="fas fa-door-open"></i>Перейти в магазин
                    </a>
                @else
                    <a href="{{ route('ft-store.create') }}" class="mr-2 btn btn-danger rounded-11 px-3">
                        <i class="fas fa-door-open"></i>Открыть магазин
                    </a>
                @endif
            @endauth
            @guest
              <button type="button" class="mr-2 btn btn-danger rounded-11  px-3 border-0"  data-toggle="modal" data-target="#enter_site" >
                <i class="fas fa-door-open"></i>Открыть магазин
              </button>
            @endguest
          @else
            <a href="{{ route('ft-store.show', $is_store->slug) }}"  class="mr-2 btn btn-danger rounded-11 px-3 btn">
              <i class="fas fa-door-open"></i>Перейти в магазин
            </a>
          @endif

            @auth
              <a href="{{ route('ft-order.orders') }}" class="mr-2 btn btn-danger rounded-11 px-3 border-0"><img src="storage/theme/icons/orders.svg"> Мои заказы</a>
              <a href="{{ route('favorite.index') }}" class="btn btn-danger rounded-11 px-3">
                <img src="storage/theme/icons/saved.svg" alt=""> Сохраненные
              </a>
            @endauth

            @guest
            <button type="button" class="mr-2 btn btn-danger rounded-11 px-3 border-0" data-toggle="modal" data-target="#enter_site" ><img src="storage/theme/icons/orders.svg"> Мои заказы</button>
            <button type="button" class="btn btn-danger rounded-11 border-0 px-3"  data-toggle="modal" data-target="#enter_site">
              <img src="storage/theme/icons/saved.svg" alt=""> Сохраненные
            </button>
            @endguest

        </div>
        @auth
        <div class="col-12 col-lg-3 d-none d-lg-flex justify-content-center justify-content-lg-end align-items-center">
          <a class="text-decoration-none text-secondary">
            <img class="rounded-circle" src="/storage/{{ Auth::user()->profile_photo_path ?? '/theme/no-photo.svg' }}" alt="" width="32" height="32">
            <span class="text-small mr-2">{{ Auth::user()->phone }}</span>
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger rounded-11  px-3 border-0">
              <i class="fas fa-sign-out-alt"></i> Выход
            </button>
          </form>
        </div>
        @endauth
       @guest
        <div class="col-12 col-lg-3 d-none d-lg-flex justify-content-center justify-content-lg-end">
          <button type="button" class="mr-2 btn-danger rounded-11  px-3 border-0 float-right"  data-toggle="modal" data-target="#enter_site" >
            <i class="fas fa-sign-in-alt"></i> Вход
          </button>
        </div>
       @endguest
      </div>
    </div>
<!--Category list and carousel-->
    <div class="slider_and_sides mt-lg-4">

      <div id="categoriesRow" class="row">
        <div id="categories" class="categories-site_products col-12 col-lg-4 px-0 order-1 order-lg-0">
          <h6 class="text-muted  text-center mt-2 d-lg-none d-xl-none">
            Категории </h6>
          <ul class="shop-subject list-group list-group-flush h-100 overflow-auto">
            @forelse ($categories as $category)
            <li class="list-group-item bg-transparent  d-flex justify-content-between align-items-center">
              <a data-id="{{ $category->id }}" href="#" class="text-decoration-none category text-secondary"><img src="storage/{{ $category->icon }}" height="20" width="20" alt="" class="mr-1"> {{ $category->name }}</a>
              {{--  <a href="{{ route('ft-category.category', $category->slug) }} " class="text-decoration-none category text-secondary"><img src="storage/{{ $category->icon }}" height="20" width="20" alt="" class="rounded-11"> {{ $category->name }}</a>  --}}
              {{--  <div class="spinner-grow text-center text-danger float-right" role="status">
                {{--  <span class="sr-only">Loading...</span>
              </div>  --}}
              {{--  <span class="badge badge-danger badge-pill">{{ $category->products->count() }}</span>  --}}
            </li>
            @empty
              Извините ничего не найдено
            @endforelse
          </ul>
        </div>
        <div class="categories-site_products col-12 col-lg-8 order-0 order-lg-1 px-lg-0">
          <div id="main-slider" class="carousel slide h-100" data-ride="carousel">
            <ol class="carousel-indicators">
              @forelse ($sliders as $key => $slider )
                <li data-target="#main-slider" data-slide-to="{{ $key }}" class="{{ $slider->position == 1 ? 'active' : '' }}"></li>
              @empty

              @endforelse
            </ol>
            <div class="carousel-inner h-100">
              @forelse ($sliders as $slider)
                <div class="carousel-item {{ $slider->position == 1 ? 'active' : ''}} h-100">
                  <img src="{{ Storage::url($slider->image) }}" class="d-block w-100 mw-100 h-100" alt="...">
                </div>
              @empty

              @endforelse
            </div>
            <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#main-slider" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
<!--Category list end-->
    <div class="all-product px-0">
    <h2 class="shop-subject title mt-lg-5 mb-4" >Новые товары </h2>

      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">

        @forelse ($newProducts as $product)
{{--  {{ dd($product->favorite) }}  --}}

        <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
          <div class="card rounded shadow border-0">
            <svg class="position-absolute favorite
            @if (Auth::check() && $product->favorite) @if ($product->favorite->product_id == $product->id) active @endif @else @endif
            " data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15"  @guest data-toggle="modal" data-target="#enter_site" @endguest>
              <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
            </svg>
            <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
            <div class="container">
              <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
              <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                <span class="font-weight-bold">{{ $product->price }} сомони</span>
                <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
              </div>
            </div>
          </div>
        </div>
        @empty
            Извените ничего не найдено
        @endforelse

      </div>


      <!-- Топ продаж -->

        <h2 class="shop-subject title mt-lg-5 mb-4" >Топ продаж </h2>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">

          @forelse ($topProducts as $product)
          <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
            <div class="card rounded shadow border-0">
              <svg class="position-absolute favorite" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" @guest data-toggle="modal" data-target="#enter_site" @endguest>
                <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
              </svg>
              <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
              <div class="container">
                <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                <div class="price-place d-flex justify-content-between align-items-center mb-3  text-danger">
                  <span class="font-weight-bold">{{ $product->price }} сомони</span>
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

      <div class="partners_and_another">

      <!--BANNER  -->
      <div class="row under_banner d-lg-block mt-4">
        <img src="{{ Storage::url($middle_banner->image ?? '') }}" class="img-fluid rounded-11">
      </div>
      <!--Banner end-->
      <h2 class="shop-subject title mt-5 mb-4 text-center w-100" >Магазины</h2>
      <div class="owl-carousel markets owl-theme">
        @forelse ($stores as $store)
        <div class="item d-flex flex-column align-items-center">
          <img src="{{ Storage::url($store->avatar) }}" alt="" class="rounded" width="80">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">{{ $store->name }}</a></h3>
          <span class="text-danger font-weight-bold">Товаров: {{ $store->product->count() }}</span>
        </div>
        @empty
          <p>Извените ничего не найдено</p>
        @endforelse

     </div>
    </div>
  </section>
@endsection