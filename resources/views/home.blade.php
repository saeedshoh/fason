@extends('layouts.app')
@extends('layouts.header')

@section('title', 'Торговая площадка')
@section('seo-desc', 'Fason.tj - предоставляет всем предпринимателям возможность бесплатно размещать товары на площадке, так же мы облегчаем работу как продаваца так и покупателя и осуществляем доставку.')
@section('seo-keywords', 'Fason, Fason.tj, бесплатно, Торговая площадка, площадке, товары, Душанбе, Таджикистан')
@section('og:title', 'Торговая площадка')
@section('og:description', 'Fason.tj - предоставляет всем предпринимателям возможность бесплатно размещать товары на площадке, так же мы облегчаем работу как продаваца так и покупателя и осуществляем доставку.')
@section('og:image', '/storage/theme/logo_fason.svg')
@section('og:image:alt', 'Торговая площадка')

@extends('layouts.footer')
@section('content')

<section class="container mt-lg-4">
    <div class="under-menu-category d-lg-block d-none">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-2 d-flex">
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle font-weight-bold category-dropdown position-relative" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Категории
                    </button>
                </div>
            </div>
            <div class="col-md-8 col-lg-7 d-none d-flex px-0 justify-content-around">
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
                <button type="button" class="mr-2 btn btn-danger rounded-11  px-3 border-0" data-toggle="modal" data-target="#enter_site">
                    <i class="fas fa-door-open"></i>Открыть магазин
                </button>
                @endguest
                @else
                <a href="{{ route('ft-store.show', $is_store->slug) }}" class="mr-2 btn btn-danger rounded-11 px-3 btn">
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
                <button type="button" class="mr-2 btn btn-danger rounded-11 px-3 border-0" data-toggle="modal" data-target="#enter_site"><img src="storage/theme/icons/orders.svg"> Мои заказы</button>
                <button type="button" class="btn btn-danger rounded-11 border-0 px-3" data-toggle="modal" data-target="#enter_site">
                    <img src="storage/theme/icons/saved.svg" alt=""> Сохраненные
                </button>
                @endguest

            </div>
            @auth
            <div class="col-12 col-lg-3 px-0 d-none d-lg-flex justify-content-center justify-content-lg-end align-items-center">
                <a href="{{ route('profile') }}" class="text-decoration-none text-secondary">
                    <img class="rounded-circle object-cover" src="/storage/{{ Auth::user()->profile_photo_path ?? '/theme/no-photo.svg' }}" alt="" width="32" height="32">
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
            <div class="col-12 col-lg-3 px-0 d-none d-lg-flex justify-content-center justify-content-lg-end">
                <button type="button" class="btn-danger rounded-11  px-3 border-0 float-right" data-toggle="modal" data-target="#enter_site">
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
                <h6 class="text-muted mb-other-product text-decoration-none mb-2 mt-3 mt-md-3 font-weight-bold text-center d-lg-none d-xl-none">
                    Категории </h6>
                <ul class="shop-subject list-group list-group-flush h-100 overflow-auto">
                    @forelse ($categories as $category)
                    @if ($category->is_active)
                    <li class="list-group-item bg-transparent py-2">
                        <div class="list-group-row d-flex align-items-center position-relative">
                            <img src="/storage/{{ $category->icon ?? 'camera.svg'}}" height="28" width="28" alt="" class="mr-2">
                            <nav class="category-mix">
                                <a data-id="{{ $category->id }}" href="{{ route('ft-category.category', $category->slug) }}" class="text-decoration-none category text-dark">{{ $category->name }}
                                    <span class="count-products" data-id="{{ $category->id }}"></span>
                                </a>
                            </nav>
                        </div>
                    </li>
                    @endif
                    @empty
                    Извините ничего не найдено
                    @endforelse
                </ul>
            </div>
            <div class="categories-site_products col-12 col-lg-8 order-0 order-lg-1 px-lg-0 bg-transparent">
                <div id="main-slider" class="carousel slide h-100" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @forelse ($sliders as $key => $slider )
                        <li data-target="#main-slider" data-slide-to="{{ $key }}" class="{{ $slider->position == 1 ? 'active' : '' }}"></li>
                        @empty

                        @endforelse
                    </ol>
                    <div class="carousel-inner h-100 rounded-11">
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
    <div class="all-product px-0 pt-3 pt-md-0 pt-lg-0">
        <h2 class="text-muted mb-other-product text-decoration-none mb-4 mt-3 mt-md-5 font-weight-bold text-xs-center">Новые товары </h2>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 mt-3 px-2 px-md-0 custom-lined mx-md-n4">
            @forelse ($newProducts as $product)
            <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0 h-100 w-100">
                    <img class="img-fluid rounded" src="{{ Storage::url($product->image) ?? '/storage/app/public/theme/no-photo.jpg' }}" alt="">
                    <div class="container d-flex flex-column justify-content-between flex-wrap">
                        <h4 class="product-name shop-subject mt-3" style="height: 2rem;">{{ Str::limit($product->name, 26) }}</h4>
                        <div class="price-place d-flex justify-content-between align-items-center my-3 text-danger">
                            <span class="font-weight-bold">
                                {{ $product->price_after_margin }} сомони
                            </span>
                            <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
        </div>
        <div class="text-center text-md-left">
            Извените ничего не найдено
            @endforelse
        </div>

        <!-- Топ продаж -->

        <h2 class="mb-4 mt-2 my-md-4 text-muted mb-other-product font-weight-bold text-xs-center">Топ продаж </h2>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 mt-3 px-2 px-md-0 custom-lined mx-md-n4">

            @forelse ($topProducts as $product)
            <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0 h-100 w-100">
                    <img class="img-fluid rounded" src="{{ Storage::url($product->image) ?? '/storage/app/public/theme/no-photo.jpg' }}" alt="">
                    <div class="container d-flex flex-column justify-content-between flex-wrap">
                        <h4 class="product-name shop-subject mt-3" style="height: 2rem;">{{ Str::limit($product->name, 26) }}</h4>
                        <div class="price-place d-flex justify-content-between align-items-center my-3  text-danger">
                            <span class="font-weight-bold">
                                {{ $product->price_after_margin }} сомони
                            </span>
                            <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
        </div>
        <div class="text-center text-md-left">
            Извините ничего не найдено
            @endforelse
        </div>
    </div>

    <div class="partners_and_another">
        @if($middle_banner)
        <!--BANNER  -->
        <div class="row under_banner d-none d-md-block mt-4">
            <a href="{{ $middle_banner ? $middle_banner->url : '' }}">
                <img src="{{ Storage::url($middle_banner->image ?? '') }}" class="img-fluid rounded-11">
            </a>
        </div>
        <!--Banner end-->
        @endif
        <h2 class="mb-4 mt-2 my-md-4 text-muted mb-other-product font-weight-bold text-center w-100">
            <a class="text-decoration-none text-muted" href="{{ route('stores') }}">Магазины</a>
        </h2>
        <div class="owl-carousel markets owl-theme" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
            @forelse ($stores as $store)
            <div class="item d-flex flex-column align-items-center position-relative">
                <img src="/storage/{{ $store->avatar ?? 'theme/avatar_store.svg' }}" alt="" class="rounded-circle object-cover" width="80" height="80">
                <h5 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">{{ $store->name }}</a></h5>
                <a href="{{ route('ft-store.guest', ['slug' => $store->slug]) }}" class="stretched-link"></a>
            </div>
            @empty
            <div class="text-center">Извените ничего не найдено</div>
            @endforelse
        </div>
    </div>
</section>
@endsection