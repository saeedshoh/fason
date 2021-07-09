@extends('layouts.app')

@section('title', $name->name)
@section('seo-desc', 'Fason.tj - предоставляет всем предпринимателям возможность бесплатно размещать товары на площадке, так же мы облегчаем работу как продаваца так и покупателя и осуществляем доставку.')
@section('seo-keywords', 'Fason, Fason.tj, бесплатно, Торговая площадка, площадке, товары, Душанбе, Таджикистан')
@section('og:title', $name->name)
@section('og:description', 'Fason.tj - предоставляет всем предпринимателям возможность бесплатно размещать товары на площадке, так же мы облегчаем работу как продаваца так и покупателя и осуществляем доставку.')
@section('og:image', '/storage/theme/logo_fason.svg')
@section('og:image:alt', $name->name)

@extends('layouts.header')
@extends('layouts.footer')

@section('content')
<!--filter mobi-->
<div class="modal fade" id="enableFilter" tabindex="-1" aria-labelledby="enableFilter" aria-hidden="true">
    <div class="modal-dialog h-100">
        <div class="modal-content h-100 rounded-0 border-0">
            <div class="modal-body bg-white h-100 px-0 pb-0">
                <div class="h-100">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <button data-dismiss="modal" aria-label="Close" class="text-decoration-none close d-flex">
                            <span class="shop-subject mb-3 pl-3">
                                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055" />
                                </svg>
                                <span class="ml-2"> Назад</span>
                            </span>
                        </button>

                        <div class="catalog__ategory col-12 bg-white px-0">
                            <form action="{{ route('ft-category.category', $slug) }}" method="get">
                                <ul class="shop-subject list-group list-group-flush h-100">
                                    @forelse ($categories as $category)
                                    @empty
                                    @if ($parent_cat)
                                    @foreach ($parent_cat as $category)
                                    @endforeach
                                    @endif
                                    @endforelse
                                    <div id="mobile-Filter" class="col-12 col-lg-12 line-test__category fix_modal-line bg-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="captions-of__modal ">Сортировать<img src="/storage/theme/icons/sort.svg"></h5>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input data-sort="new" {{ (request()->sort != 'new' || request()->sort != 'cheap' || request()->sort != 'expensive') || request()->sort == 'new' ? 'checked' : '' }} class="form-check-input sort" type="radio" name="sort" id="new-mob" value="new">
                                            <label class="form-check-label" for="new-mob">Сначала новые</label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input data-sort="cheap" {{ request()->sort == 'cheap' ? 'selected' : '' }} class="form-check-input sort" type="radio" name="sort" id="cheap-mob" value="cheap">
                                            <label class="form-check-label" for="cheap-mob">Сначала дешевые</label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input data-sort="expensive" {{ request()->sort == 'expensive' ? 'selected' : '' }} class="form-check-input sort" type="radio" name="sort" id="expensive-mob" value="expensive">
                                            <label class="form-check-label" for="expensive-mob">Сначала дорогие</label>
                                        </div>

                                        <div class="mt-5">
                                            <h5 class="captions-of__modal ">Город</h5>
                                        </div>
                                        <div class="flex-column">
                                            @foreach ($cities as $city)
                                            <div class="form-check mt-3">
                                                <input data-city="1" class="form-check-input cityM" @if(isset(request()->city) && request()->city == $city->id) checked @elseif($loop->first)checked @endif type="radio" name="city" id="{{ $city->name }}" value="{{ $city->id }}">
                                                <label class="form-check-label" for="{{ $city->name }}">{{ $city->name }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <br>
                                        <h5 class="captions-of__modal mt-5">Цена</h5>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="priceFromMobi">от</label>
                                                <input type="number" placeholder="0" class="form-control" name="priceFrom" @if(isset(request()->priceFrom)) value="{{ request()->priceFrom }}" @endif id="priceFromMobi">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="priceToMobi">до</label>
                                                <input type="number" placeholder="99999" class="form-control" name="priceTo" @if(isset(request()->priceTo)) value="{{ request()->priceTo }}" @endif id="priceToMobi">
                                            </div>
                                        </div>

                                        <button type="submit" data-cat-slug="{{ $name->slug }}" data-cat-id="{{ $cat_id }}" id="filterMobi" class="change-bttn__modal btn btn-danger rounded-pill px-5 mb-5 w-100">
                                            <i class="fas fa-search" aria-hidden="true"></i> Фильтр
                                        </button>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="d-block d-lg-none container px-0">
    <div class="d-flex justify-content-between px-3 align-items-center">
        <h3 class="shop-subject mb-0">
            <a class="text-decoration-none" href="{{ $name->parent ? route('ft-category.category', $name->parent->slug) : route('home') }}">
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055" />
                </svg><span class="ml-2 text-pinky"> Назад</span>
            </a>
        </h3>
        <a class="text-pinky font-weight-bold" href="{{route('home')}}">Все категории</a>
    </div>
    @if(!$name->parent)
    <h4 class="py-1 category-item border-bottom text-dark category-item-mobile category-Border-gray uppercase"><a class="text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}">@if($name->icon)<img src="/storage/{{ $name->icon }}" height="28"
                width="28" alt="" class="mr-2">@endif{{ $name->name }}</a></h4>
    @elseif(!$name->parent->parent)
    @if(isset($name->childrens->first()->id))
    <h4 class="py-2 category-item border-bottom text-dark cs_categoryTitle">
        <a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}">
            @if($name->icon)<img src="/storage/{{ $name->icon }}" height="28" width="28" alt="" class="mr-2">@endif{{ $name->name }}
        </a>
    </h4>
    @endif
    @elseif(!isset($name->childrens->first()->id))
    @elseif(!$name->parent->parent->parent)
    <h4 class="py-2 category-item border-bottom text-dark cs_categoryTitle">
        <a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}">
            @if($name->icon)<img src="/storage/{{ $name->icon }}" height="28" width="28" alt="" class="mr-2">@endif{{ $name->name }}
        </a>
    </h4>
    @else
    <h4 class="py-2 category-item border-bottom text-dark cs_categoryTitle">
        <a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->parent ? $name->parent->slug : $name->slug) }}">
            @if($name->icon)<img src="/storage/{{ $name->parent->icon }}" height="28" width="28" alt="" class="mr-2">@endif{{ $name->parent->name }}
        </a>
    </h4>
    @endif
    <ul class="shop-subject list-group list-group-flush h-100 mx-0 cs_list px-3">
        @forelse ($categories as $category)
        <li class="list-group-item  bg-transparent  border-bottom py-1">
            <nav class="category-mix">
                <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $category->slug) }}" class="text-decoration-none subcategory">{{ $category->name }}
                    <span class="count-products" data-id="{{ $category->id }}"></span>
                </a>
            </nav>
        </li>
        @empty
        @endforelse
    </ul>
</div>
<!--filter end mobi-->
<section class="content mt-2 mb-5">
    <!--Filter mobi-controll-->
    <div class="d-flex justify-content-between d-lg-none mb-3 mobile-filter w-100 container">
        <div class="d-flex">
            <img src="/storage/theme/icons/sort.svg">
            <form method="get" action="{{ route('ft-category.category', $name->slug) }}">
                <select id="mobSort" class="custom-select border-0 bg-transparent text-pinky pl-1 pr-3" name="sort">
                    <option value="new" {{ request()->sort == 'new' ? 'selected' : '' }}>Сначала новые</option>
                    <option value="cheap" {{ request()->sort == 'cheap' ? 'selected' : '' }}>Сначала дешевые</option>
                    <option value="expensive" {{ request()->sort == 'expensive' ? 'selected' : '' }}>Сначала дорогие</option>
                </select>
            </form>
        </div>
        <div id="mobileConrols">
            <button id="gridView" class="btn d-none p-0">
                <img class="pr-1" src="/storage/theme/icons/grid.svg" alt="">
            </button>
            <button id="listView" class="btn p-0">
                <img class="pr-1" src="/storage/theme/icons/list.svg" alt="">
            </button>
            <button type="button" id="enableFilter" class="btn py-1 text-pinky" data-toggle="modal" data-target="#enableFilter"><img class="pr-1" height="20px" width="18px" src="/storage/theme/icons/filter.svg" alt="">Фильтр</button>
        </div>
    </div>
    <!--Filter mobi-controll-->
    <div class="all-product container px-md-0 mt-5">

        <div class="row mt-3">
            <div class="col-12 col-md-4 mb-2 px-2 px-lg-3 d-lg-block d-none">
                <a class="text-decoration-none" href="{{ $name->parent ? route('ft-category.category', $name->parent->slug) : route('home') }}">
                    <h3 class="shop-subject mb-3"> <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055" />
                        </svg> <span class="ml-2"> Назад</span>
                    </h3>
                </a>
                <div class="catalog__ategory col-12 bg-white px-0 custom-lined-category">
                    @if(!$name->parent)
                    <h4 class="py-2 px-3 category-Border-gray"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}">@if($name->icon)<img src="/storage/{{ $name->icon }}" height="28" width="28" alt=""
                                class="mr-2">@endif{{ $name->name }}</a></h4>
                    @elseif(!$name->parent->parent)
                    @if(isset($name->childrens->first()->id))
                    <h4 class="py-2 px-3 category-Border-gray"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}">@if($name->icon)<img src="/storage/{{ $name->icon }}" height="28" width="28" alt=""
                                class="mr-2">@endif{{ $name->name }}</a></h4>
                    @endif
                    @elseif(!isset($name->childrens->first()->id))
                    @elseif(!$name->parent->parent->parent)
                    <h4 class="py-2 px-3 category-Border-gray"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}">@if($name->icon)<img src="/storage/{{ $name->icon }}" height="28" width="28" alt=""
                                class="mr-2">@endif{{ $name->name }}</a></h4>
                    @else
                    <h4 class="py-2 px-3 category-Border-gray"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->parent ? $name->parent->slug : $name->slug) }}">@if($name->parent->icon)<img
                                src="/storage/{{ $name->parent->icon }}" height="28" width="28" alt="" class="mr-2">@endif{{ $name->parent->name }}</a></h4>
                    @endif
                    <ul class="shop-subject list-group list-group-flush h-100 px-2">
                        @forelse ($categories as $category)
                        @if ($category->is_active)
                        <li class="list-group-item  bg-transparent py-2 border-bottom">
                            <nav class="category-mix">
                                <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $category->slug) }}" class="text-decoration-none subcategory text-dark">{{ $category->name }}</a>
                                <span class="count-products" data-id="{{ $category->id }}"></span>
                                </a>
                            </nav>
                        </li>
                        @endif
                        @empty
                        @if ($parent_cat)
                        @foreach ($parent_cat as $category)
                        @if($category->parent_id != '0')
                        @if ($category->is_active)
                        <li class="list-group-item  bg-transparent border-bottom">
                            <nav class="category-mix">
                                <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $category->slug) }}" class="text-decoration-none subcategory text-dark">{{ $category->name }}</a>
                                <span class="count-products" data-id="{{ $category->id }}"></span>
                                </a>
                            </nav>
                        </li>
                        @endif
                        @endif
                        @endforeach
                        @endif
                        @endforelse
                        <form action="{{ route('ft-category.category', $slug) }}" method="get">
                            <div class="col-12 col-lg-12 line-test__category fix_modal-line mt-5">
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <h5 class="captions-of__modal mt-3">Сортировать </h5>
                                </div>
                                <div class="form-check mt-3">
                                    <input {{ (request()->sort != 'new' || request()->sort != 'cheap' || request()->sort != 'expensive') || request()->sort == 'new' ? 'checked' : '' }} class="form-check-input sort" id="new" type="radio" name="sort" value="new">
                                    <label class="form-check-label" for="new">Сначала новые</label>
                                </div>
                                <div class="form-check mt-3">
                                    <input {{ request()->sort == 'cheap' ? 'checked' : '' }} class="form-check-input sort" id="cheap" type="radio" name="sort" value="cheap">
                                    <label class="form-check-label" for="cheap">Сначала дешевые</label>
                                </div>
                                <div class="form-check mt-3">
                                    <input {{ request()->sort == 'expensive' ? 'checked' : '' }} class="form-check-input sort" id="expensive" type="radio" name="sort" value="expensive">
                                    <label class="form-check-label" for="expensive">Сначала дорогие</label>
                                </div>

                                <div class="mt-5">
                                    <h5 class="captions-of__modal ">Город</h5>
                                </div>
                                <div class="flex-column">
                                    @foreach ($cities as $city)
                                    <div class="form-check mt-3">
                                        <input @if(isset(request()->city) && request()->city == $city->id) checked @elseif($loop->first)checked @endif class="form-check-input city" type="radio" name="city" id="{{ $city->name }}" value="{{ $city->id }}">
                                        <label class="form-check-label" for="{{ $city->name }}">{{ $city->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                <br>
                                <h5 class="captions-of__modal mt-5">Цена</h5>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="priceFrom">от</label>
                                        <input type="number" placeholder="0" class="form-control" name="priceFrom" id="priceFrom" @if(isset(request()->priceFrom)) value="{{ request()->priceFrom }}" @endif>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="priceTo">до</label>
                                        <input type="number" placeholder="99999" class="form-control" name="priceTo" id="priceTo" @if(isset(request()->priceTo)) value="{{ request()->priceFrom }}" @endif>
                                    </div>
                                </div>

                                <button type="submit" data-cat-slug="{{ $name->slug }}" data-cat-id="{{ $cat_id }}" id="filter" class="change-bttn__modal btn btn-danger rounded-pill px-5 mb-5 w-100">
                                    <i class="fas fa-search" aria-hidden="true"></i> Фильтр
                                </button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>

            <div id="catProducts" class="col-12 col-lg-8">
                <div class="row row-cols-2 row-cols-md-3 pt-2 mt-4 my-2 endless-pagination px-2 px-md-0 custom-lined" data-style="1" data-next-page="{{ $products->nextPageUrl() }}">

                    @forelse ($products as $product)
                    <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                        <div class="card rounded shadow border-0 w-100 h-100">
                            <img class="img-fluid rounded" src="{{ Storage::url($product->image) ?? '/storage/app/public/theme/no-photo.jpg' }}" alt="">
                            <div class="container d-flex flex-column justify-space-between flex-wrap">
                                <h4 class="product-name shop-subject my-3" style="height: 2rem;">{{ Str::limit($product->name, 26) }}</h4>
                                <div class="discription d-none">
                                    <p>
                                        {{ Str::limit($product->description, 20) }}
                                    </p>
                                </div>
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
                </div>
                <div class="text-center mb-5">
                    Извините ничего не найдено
                    @endforelse
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    <div id="scroll-spinner" class="spinner-border d-none mb-5" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    $(function() {
        $('#mobSort').change(function() {
            $(this).closest('form').submit();
        });
    });
</script>

@endsection
