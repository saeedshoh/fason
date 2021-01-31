@extends('layouts.app')
@section('name')
@section('title')
    {{ $name->name }}
@endsection
@extends('layouts.header')
@extends('layouts.footer')

@section('content')

<section class="content mt-4">
    <div class="all-product container mt-5">
      <a href="{{ $name->parent ? route('ft-category.category', $name->parent->slug) : route('home') }}">
        <h3 class="shop-subject"> <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055"/>
          </svg>  <span class="ml-2"> Назад</span>
        </h3>
      </a>
      <div class="row mt-3">
        <div class="col-12 col-md-4 mb-2 px-2 px-lg-3">
          <div class="catalog__ategory col-12 bg-white px-0">
            <a class="text-center text-decoration-none subcategory text-secondary py-4" href="{{ route('ft-category.category', $name->parent ? $name->parent->slug : $name->slug) }}"><h4>{{ $name->parent ? $name->parent->name : $name->name }}</h4></a>
            <ul class="shop-subject list-group list-group-flush h-100">
              @forelse ($categories as $category)
              <li class="list-group-item  bg-transparent  d-flex justify-content-between align-items-center py-2">
                <nav class="category-mix">
                  <a data-id={{ $category->id }} data-slug="{{ $category->slug }}" href="{{ route('ft-category.category', $category->slug) }}" class="text-decoration-none subcategory text-secondary">{{ $category->name }}</a>
                    <span class="count-products" data-id="{{ $category->id }}"></span>
                  </a>
                </nav>
              </li>
              @empty
                @if ($parent_cat)
                    @foreach ($parent_cat as $category)
                        <li class="list-group-item  bg-transparent  d-flex justify-content-between align-items-center">
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
                    <h5 class="captions-of__modal ">Сортировать</h5>
                  </div>
                  <div class="form-check mt-3">
                      <input data-sort="new" @if(!request()->__get('sort')=='cheap' && !request()->__get('sort')=='expensive') checked @endif class="form-check-input sort" type="radio" name="sort" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">Сначала новые</label>
                  </div>
                  <div class="form-check mt-3">
                      <input data-sort="cheap" @if(request()->__get('sort')=='cheap') checked @endif class="form-check-input sort" type="radio" name="sort" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">Сначала дешевые</label>
                  </div>
                  <div class="form-check mt-3">
                      <input data-sort="expensive" @if(request()->__get('sort')=='expensive') checked @endif class="form-check-input sort" type="radio" name="sort" id="inlineRadio3" value="option3">
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



              </div>
            </div>
          </ul>


        <div id="catProducts" class="col-12 col-md-8">
          <div class="row row-cols-2 row-cols-md-2 row-cols-lg-3 my-2 endless-pagination" data-next-page="{{ $products->nextPageUrl() }}">

            @forelse ($products as $product)
            <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
              <div class="card rounded shadow border-0 h-100 w-100">
                <img class="img-fluid rounded" src="{{ Storage::url($product->image) ?? '/storage/app/public/theme/no-photo.jpg' }}" alt="">
                <div class="container">
                  <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
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
        </div>
      </div>
    </div>
  </section>
@endsection
