@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')


  <section class="content mt-4 mx-3 mx-lg-1">
    <div class="d-block under-menu-category container" >
      <div class="row">
        <div class="col-12 col-md-4 col-lg-3"> 
          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle font-weight-bold category-dropdown position-relative" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Категории
            </button>
          </div>
        </div>
        <div class="col-md-8 col-lg-6 d-none d-md-flex">

          @if ($is_store == null)
            @auth
              <a href="{{ route('ft-store.create') }}" class="mr-2 rounded btn-danger text-decoration-none px-3">
                <i class="fas fa-door-open"></i>Открыть магазин
              </a>
            @endauth
            @guest
                
            <button type="button" class="mr-2 rounded btn-danger px-3 border-0"  data-toggle="modal" data-target="#enter_site" >
              <i class="fas fa-door-open"></i>Открыть магазин
            </button>
            @endguest
          @else
            <a href="{{ route('ft-store.show', $is_store->id) }}"  class="mr-2 btn-danger rounded px-3 text-decoration-none">
              <i class="fas fa-door-open"></i>Перейти в магазин
            </a>
          @endif
            <button type="button" class="mr-2 rounded btn-secondary px-3 border-0"><img src="storage/theme/icons/orders.svg"> Мои заказы</button>
            <button type="button" class="mr-2 rounded btn-secondary px-3 border-0" ><img src="storage/theme/icons/saved.svg" alt=""> Сохраненные</button>
        

        </div>
        @auth
        <div class="col-12 col-lg-3 d-none d-lg-flex justify-content-center justify-content-lg-end align-items-center">
          <a class="text-decoration-none text-secondary"> 
            <img class="rounded-circle" src="storage/theme/profile.png" alt="">
            <span class="text-small mr-2">{{ Auth::user()->phone }}</span>
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
          
            <button type="submit" class="rounded btn btn-danger px-3 border-0">
              <i class="fas fa-sign-out-alt"></i> Выход
            </button>
          </form>
          
        </div>
        @endauth
       @guest 
        <div class="col-12 col-lg-3 d-none d-lg-flex justify-content-center justify-content-lg-end">
          <button type="button" class="mr-2 rounded btn-danger px-3 border-0 float-right"  data-toggle="modal" data-target="#enter_site" >
            <i class="fas fa-sign-in-alt"></i> Вход
          </button>
        </div>
       @endguest
      </div>
    </div>
<!--Category list and carousel-->
    <div class="slider_and_sides container mt-4"> 
      <div class="row">
        <div class="categories-site_products overflow-auto col-12 col-lg-4 px-0 order-1 order-lg-0 bg-white">
          <ul class="shop-subject list-group list-group-flush h-100">
            @forelse ($categories as $category)
            <li class="list-group-item">
              <img src="storage/{{ $category->icon }}" height="20" width="20" alt=""> {{ $category->name }}
            </li>
            @empty
              Извение ничего не найдено
            @endforelse
          </ul>
        </div>
        <div class="col-12 col-lg-8 order-0 order-lg-1 px-0">
          <div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner h-100">
              <div class="carousel-item active h-100">
                <img src="storage/theme/bannerpic_1.png" class="d-block w-100 mw-100 h-100" alt="...">
              </div>
              <div class="carousel-item h-100">
                <img src="storage/theme/bannerpic_2.png" class="d-block w-100 mw-100 h-100" alt="...">
              </div>
              <div class="carousel-item h-100">
                <img src="storage/theme/bannerpic_1.png" class="d-block w-100 mw-100 h-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
<!--Category list end-->
    <div class="all-product container px-0">
    <h2 class="shop-subject title mt-5 mb-4" >Новые товары </h2>

      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">

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
                  <a href="{{ route('product.single', $product->slug) }}" class="rounded-pill px-5 py-2 text-decoration-none "> Купить </a>
                </p>
              </div>
            </div>
          </div>
        @empty
            Извените ничего не найдено
        @endforelse


      </div>


      <!-- Топ продаж -->

        <h2 class="shop-subject title mt-5 mb-4" >Топ продаж </h2>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">

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
                    <a href="{{ route('product.single', $product->slug) }}" class="rounded-pill px-5 py-2 text-decoration-none "> Купить </a>
                  </p>
                </div>
              </div>
            </div>
          @empty
              Извените ничего не найдено
          @endforelse


        </div>
      </div>

      <div class="partners_and_another container">

      <!--BANNER  -->
      <div class="row under_banner d-none d-lg-block mt-4">
        <div class="col py-4 pl-5 justify-content-around" style="background: url(storage/theme/under_banner.png); width: 100%; height: 135px; font-family: Montserrat;
          font-style: normal;
          font-weight: 800;
          font-size: 30px; color: #FFFFFF;"> <div class="text-center" style="background:#F83A3C; width: 35%;">Lorem Ipsum is <br> simply dummy text.</div> 
        </div>
      </div>
      <!--Banner end-->
      <h2 class="shop-subject title mt-5 mb-4 text-center w-100" >Магазины</h2>
      <div class="owl-carousel markets owl-theme">
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/akhmat.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
     </div>
    </div>
  </section>

@endsection