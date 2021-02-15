@extends('layouts.app')
@section('name')
@section('title')
    {{ $name->name }}
@endsection
@extends('layouts.header')
@extends('layouts.footer')

@section('content')
<!--filter mobi-->
<div class="modal fade"  id="enableFilter" tabindex="-1" aria-labelledby="enableFilter" aria-hidden="true">
  <div class="modal-dialog h-100">
    <div class="modal-content h-100 rounded-0 border-0">
      <div class="modal-body bg-white h-100 px-0 pb-0">
        <div class="h-100">
          <div class="d-flex flex-column justify-content-between h-100">
            <a class="text-decoration-none" href="{{ $name->parent ? route('ft-category.category', $name->parent->slug) : route('home') }}">
              <h3 class="shop-subject mb-3 pl-3"> <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055"/>
                </svg>  <span class="ml-2"> Назад</span>
              </h3>
            </a>

            <div class="catalog__ategory col-12 bg-white px-0">
              {{-- <a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->parent ? $name->parent->slug : $name->slug) }}"><h4 class="py-3">{{ $name->parent ? $name->parent->name : $name->name }}</h4></a> --}}
              <ul class="shop-subject list-group list-group-flush h-100">
                @forelse ($categories as $category)
                {{-- <li class="list-group-item  bg-transparent  d-flex justify-content-between align-items-center py-2">
                  <nav class="category-mix">
                    <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $name->parent ? $name->parent->slug : $name->slug) }}" class="text-decoration-none subcategory text-secondary">{{ $name->parent ? $name->parent->name : $name->name }}</a>
                      <span class="count-products" data-id="{{ $category->id }}"></span>
                    </a>
                  </nav>
                </li> --}}
                @empty
                  @if ($parent_cat)
                      @foreach ($parent_cat as $category)
                          {{-- <li class="list-group-item  bg-transparent  d-flex justify-content-between align-items-center">
                              <nav class="category-mix">
                                <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $name->parent ? $name->parent->slug : $name->slug) }}" class="text-decoration-none subcategory text-secondary">{{ $name->parent ? $name->parent->name : $name->name }}</a>
                                  <span class="count-products" data-id="{{ $category->id }}"></span>
                                </a>
                              </nav>
                          </li> --}}
                      @endforeach
                  @endif
                @endforelse
                  <div id="mobile-Filter" class="col-12 col-lg-12 line-test__category fix_modal-line bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="captions-of__modal ">Сортировать<img src="/storage/theme/icons/sort.svg"></h5>
                    </div>
                    <div class="form-check mt-3">
                        <input data-sort="new" @if(!request()->__get('sort')=='cheap' && !request()->__get('sort')=='expensive') checked="true" @endif checked="true" class="form-check-input sort" type="radio" name="sort" id="inlineRadioM1" value="option1">
                        <label class="form-check-label" for="inlineRadioM1">Сначала новые</label>
                    </div>
                    <div class="form-check mt-3">
                        <input data-sort="cheap" @if(request()->__get('sort')=='cheap') checked @endif class="form-check-input sort" type="radio"  name="sort" id="inlineRadioM2" value="option2">
                        <label class="form-check-label" for="inlineRadioM2">Сначала дешевые</label>
                    </div>
                    <div class="form-check mt-3">
                        <input data-sort="expensive" @if(request()->__get('sort')=='expensive') checked @endif class="form-check-input sort" type="radio" name="sort" id="inlineRadioM3" value="option3">
                        <label class="form-check-label" for="inlineRadioM3">Сначала дорогие</label>
                    </div>

                  <div class="mt-5"><h5 class="captions-of__modal ">Город</h5></div>
                  <div class="form-check form-check-inline mt-3">
                    <input data-city="1" class="form-check-input cityM" checked="false" type="radio" name="cityM" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Душанбе</label>
                  </div>
                  <br>
                  <h5 class="captions-of__modal mt-5">Цена</h5>
                  <div class="form-row">
                    <div class="form-group col-6">
                      <label for="from-price">от</label>
                      <input type="number" placeholder="0" class="form-control" id="priceFromMobi">
                    </div>
                    <div class="form-group col-6">
                      <label for="untill-price">до</label>
                      <input type="number" placeholder="99999" class="form-control" id="priceToMobi">
                    </div>
                  </div>

                  <button type="button" data-cat-slug="{{ $name->slug }}" data-cat-id="{{ $cat_id }}" id="filterMobi" class="change-bttn__modal btn btn-outline-danger rounded-pill px-5 mb-5 w-100">
                      <i class="fas fa-search" aria-hidden="true"></i> Фильтр
                  </button>
                </div>
              </ul>
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
      <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055"/>
      </svg><span class="ml-2 text-pinky"> Назад</span>
    </a>
  </h3>
    <a class="text-pinky font-weight-bold" href="{{route('home')}}">Все категории</a>
  </div>

  @if(!$name->parent)
    <h4 class="py-3 category-item border-bottom text-dark"><a class="text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}"><img src="/storage/{{ $name->icon }}" height="28" width="28" alt="" class="mr-2">{{ $name->name }}</a></h4>
  @elseif(!$name->parent->parent)
    <h4 class="py-3 category-item border-bottom text-dark"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}"><img src="/storage/{{ $name->icon }}" height="28" width="28" alt="" class="mr-2">{{ $name->name }}</a></h4>
  @elseif(!isset($name->childrens->first()->id))
  @elseif(!$name->parent->parent->parent)
    <h4 class="py-3 category-item border-bottom text-dark"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}"><img src="/storage/{{ $name->icon }}" height="28" width="28" alt="" class="mr-2">{{ $name->name }}</a></h4>
  @else
    <h4 class="py-3 category-item border-bottom text-dark"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->parent ? $name->parent->slug : $name->slug) }}"><img src="/storage/{{ $name->parent->icon }}" height="28" width="28" alt="" class="mr-2">{{ $name->parent->name }}</a></h4>
  @endif
    <ul class="shop-subject px-5 list-group list-group-flush h-100 mx-0">
      @forelse ($categories as $category)
      <li class="list-group-item  bg-transparent py-2 border-bottom">
        <nav class="category-mix px-3">
          <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $category->slug) }}" class="text-decoration-none subcategory">{{ $category->name }}</a>
            <span class="count-products" data-id="{{ $category->id }}"></span>
          </a>
        </nav>
      </li>
      @empty
        @if ($parent_cat)
            @foreach ($parent_cat as $category)
                <li class="list-group-item  bg-transparent border-bottom">
                    <nav class="category-mix w-100 px-3">
                      <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $category->slug) }}" class="text-decoration-none subcategory">{{ $category->name }}</a>
                        <span class="count-products d-block" data-id="{{ $category->id }}"></span>
                      </a>
                    </nav>
                </li>
            @endforeach
        @endif
      @endforelse
    </ul>
</div>
<!--filter end mobi-->
<section class="content mt-2 mb-5">
  <!--Filter mobi-controll-->
      <div class="d-flex justify-content-between d-lg-none mb-3 mobile-filter w-100 container">
        <div class="d-flex">
          <img src="/storage/theme/icons/sort.svg">
          {{--  <select class="custom-select border-0 bg-transparent text-pinky pl-1 pr-3">
              <option selected>Сначала новые</option>
              <option value="1">Сначала дешевые</option>
              <option value="2">Сначала дорогие</option>
          </select>  --}}
          <form method="get" action="{{route('ft-category.category', $name->slug)}}">
             <select id="mobSort" class="custom-select border-0 bg-transparent text-pinky pl-1 pr-3" name="sort">
              <option selected value="new">Сначала новые</option>
              <option value="cheap">Сначала дешевые</option>
              <option value="expensive">Сначала дорогие</option>
             </select>
            </form>
        </div>
        <div id="mobileConrols">
          <button id="gridView" class="btn d-none p-0">
            <img class="pr-1"  src="/storage/theme/icons/grid.svg" alt="">
          </button>
          <button id="listView" class="btn p-0">
            <img class="pr-1"  src="/storage/theme/icons/list.svg" alt="">
          </button>
          <button type="button" id="enableFilter" class="btn py-1 text-pinky" data-toggle="modal"
            data-target="#enableFilter"><img class="pr-1" height="20px" width="18px"  src="/storage/theme/icons/filter.svg" alt="">Фильтр</button>
        </div>
      </div>
      <!--Filter mobi-controll-->
    <div class="all-product container mt-5">

      <div class="row mt-3">
        <div class="col-12 col-md-4 mb-2 px-2 px-lg-3 d-lg-block d-none">
          <a class="text-decoration-none" href="{{ $name->parent ? route('ft-category.category', $name->parent->slug) : route('home') }}">
            <h3 class="shop-subject mb-3"> <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055"/>
              </svg>  <span class="ml-2"> Назад</span>
            </h3>
          </a>
          <div class="catalog__ategory col-12 bg-white px-0 custom-lined-category">
                @if(!$name->parent)
                  <h4 class="py-3 px-3"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}"><img src="/storage/{{ $name->icon }}" height="28" width="28" alt="" class="mr-2">{{ $name->name }}</a></h4>
                @elseif(!$name->parent->parent)
                  <h4 class="py-3 px-3"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}"><img src="/storage/{{ $name->icon }}" height="28" width="28" alt="" class="mr-2">{{ $name->name }}</a></h4>
                @elseif(!isset($name->childrens->first()->id))
                  <h4 class="py-3 px-3"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->parent->slug) }}"><img src="/storage/{{ $name->parent->icon }}" height="28" width="28" alt="" class="mr-2">{{ $name->parent->name }}</a></h4>
                @elseif(!$name->parent->parent->parent)
                  <h4 class="py-3 px-3"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->slug) }}"><img src="/storage/{{ $name->icon }}" height="28" width="28" alt="" class="mr-2">{{ $name->name }}</a></h4>
                @else
                  <h4 class="py-3 px-3"><a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->parent ? $name->parent->slug : $name->slug) }}"><img src="/storage/{{ $name->parent->icon }}" height="28" width="28" alt="" class="mr-2">{{ $name->parent->name }}</a></h4>
                @endif
                <ul class="shop-subject list-group list-group-flush h-100 px-4">
                @forelse ($categories as $category)
                <li class="list-group-item  bg-transparent py-2 border-bottom">
                    <nav class="category-mix">
                    <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $category->slug) }}" class="text-decoration-none subcategory text-secondary">{{ $category->name }}</a>
                        <span class="count-products" data-id="{{ $category->id }}"></span>
                    </a>
                    </nav>
                </li>
                @empty
                    @if ($parent_cat)
                        @foreach ($parent_cat as $category)
                            <li class="list-group-item  bg-transparent border-bottom" >
                                <nav class="category-mix">
                                <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $category->slug) }}" class="text-decoration-none subcategory text-secondary">{{ $category->name }}</a>
                                    <span class="count-products" data-id="{{ $category->id }}"></span>
                                </a>
                                </nav>
                            </li>
                        @endforeach
                    @endif
                @endforelse
                    <div class="col-12 col-lg-12 line-test__category fix_modal-line mt-5">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h5 class="captions-of__modal ">Сортировать  <img src="/storage/theme/icons/sort.svg"></h5>
                    </div>
                    <div class="form-check mt-3">
                        <input data-sort="new" @if(!request()->__get('sort')=='cheap' && !request()->__get('sort')=='expensive') checked='true' @endif checked='true' class="form-check-input sort" type="radio" name="sort" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Сначала новые</label>
                    </div>
                    <div class="form-check mt-3">
                        <input data-sort="cheap" @if(request()->__get('sort')=='cheap') checked='true' @endif class="form-check-input sort" type="radio" name="sort" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Сначала дешевые</label>
                    </div>
                    <div class="form-check mt-3">
                        <input data-sort="expensive" @if(request()->__get('sort')=='expensive') checked='true' @endif class="form-check-input sort" type="radio" name="sort" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">Сначала дорогие</label>
                    </div>

                    <div class="mt-5"><h5 class="captions-of__modal ">Город</h5></div>
                    <div class="form-check form-check-inline mt-3">
                        <input data-city="1" checked class="form-check-input city" type="radio" name="city" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Душанбе</label>
                    </div>
                    <br>
                    <h5 class="captions-of__modal mt-5">Цена</h5>
                    <div class="form-row">
                        <div class="form-group col-6">
                        <label for="from-price">от</label>
                        <input type="number" placeholder="0" class="form-control" id="priceFrom">
                        </div>
                        <div class="form-group col-6">
                        <label for="untill-price">до</label>
                        <input type="number" placeholder="99999" class="form-control" id="priceTo">
                        </div>
                    </div>

                    <button type="button" data-cat-slug="{{ $name->slug }}" data-cat-id="{{ $cat_id }}" id="filter" class="change-bttn__modal btn btn-outline-danger rounded-pill px-5 mb-5 w-100">
                        <i class="fas fa-search" aria-hidden="true"></i> Фильтр
                    </button>
                    </div>
                </ul>
          </div>
        </div>


        <div id="catProducts" class="col-12 col-md-8">
          <div class="row row-cols-2 row-cols-lg-3 pt-2 mt-4 my-2 endless-pagination px-2 px-md-0 custom-lined" data-style="1"  data-next-page="{{ $products->nextPageUrl() }}">

            @forelse ($products as $product)
            <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
              <div class="card rounded shadow border-0 h-100 w-100">
                <img class="img-fluid rounded" src="{{ Storage::url($product->image) ?? '/storage/app/public/theme/no-photo.jpg' }}" alt="">
                <div class="container">
                  <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                  <div class="discription d-none">
                    <p style="width: 6rem;" class="text-truncate">
                      {{ $product->description }}
                    </p>
                  </div>
                  <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                    <span class="font-weight-bold">
                      {{ round($product->price_after_margin) }} сомони
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
            console.log('hello')
            $(this).closest('form').submit();
        });
    });
</script>

@endsection
