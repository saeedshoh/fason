@extends('layouts.app')
@extends('layouts.header')

@extends('layouts.footer')

@section('title')
{{ $product->name }}
@endsection
@section('seo-desc')
{{ $product->description }}
@endsection
@section('seo-keywords')
{{ $product->name }}
@endsection

@section('content')
  <section>
    <div class="container mt-lg-5">
      <div class="row">
        <!--slider-proiduct-and-description-->
        <div class="col-12 col-lg-5">
          <div class="d-flex align-items-baseline mb-3 justify-content-between">
            <a href="{{ route('home') }}" class="text-pinky font-weight-bold text-decoration-none">
              <img src="/storage/theme/icons/back.svg" alt="">
              назад</a>
              <h6 class="d-block d-lg-none text-secondary">Информация о товаре</h6>
          </div>
          <div class="d-block d-lg-none my-3">
            <a href="{{ route('ft-category.category', $product->category->slug) }}" class="text-secondary font-weight-bold text-decoration-none">{{ $product->category->name }}</a>

            <h3 class="h3 font-weight-bold">{{ $product->name }}</h3>

           </p>
          </div>
          <!--desktop slider-->
          <div class="product-img-holder">
            <img src="{{ Storage::url($product->image )}}" class="rounded  pic-main  img-fluid" alt="" height="373px">
            <div class="add-product-secondary my-2 row">
                @for ($i = 0; $i < count(explode(',', $product->gallery)); $i++)
                    <div class="col-3 mt-3">
                        <img src="{{ Storage::url(explode(',', $product->gallery)[$i]) }}" data-image-src="{{ Storage::url(explode(',', $product->gallery)[$i]) }}" class="mw-100 pic-item rounded shadow" alt="{{ $product->name }}">
                    </div>
                @endfor
            </div>
          </div>
          <!--desktop slider end-->
          </div>
        <div>
        </div>
        <div class="col-12 d-block d-lg-none order-2">
          <div class="my-3 ">
            <div class="d-flex mt-3 gap-3 att-show-row flex-wrap flex-column px-0">
              @foreach ($product->attribute_variation->groupBy('attribute_id') as $key => $item)
                  <div class="row px-3 flex-wrap mobAttrs">
                    <span class="pr-2">{{ $item->first()->attribute->name }}:</span>
                    @foreach ($product->attribute_variation as $attribute)
                      @if ($key == $attribute->attribute_id)
                        <label class="radio-container mr-2">
                          {{ $attribute->attribute_value->name }}
                          <input type="radio" data-name="{{ $item->first()->attribute->name }}:" name="{{ $attribute->attribute_value->attribute_id }}" value="{{ $attribute->attribute_value->id }}">
                          <span class="radio-checkmark"></span>
                        </label>
                      @endif
                    @endforeach
                  </div>
              @endforeach
            </div>
          </div>

          <nav>
            Магазин: <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="text-muted font-weight-bold text-decoration-none"> {{ $product->store->name }}     </a>
          </nav>

        </div>
        <div class="col-12 col-lg-6 order-lg-2  order-2">

          <div class="my-3">
            <h4 class="font-weight-bold">Описание товара:</h4>
            <p class="text-secondary text-semi-bold">{{ $product->description }}</p>
          </div>
        </div>
        <div class="mt-3 d-block d-lg-none w-100 order-2">
          <div class="my-3 text-center d-flex justify-content-around">
            <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="rounded-11 btn btn-danger mr-md-2 my-1">
              <img class="mr-1" src="/storage/theme/icons/store.svg" alt=""> В магазин
            </a>
            @guest
            <button type="button" class="rounded-11 btn btn-outline-danger  ml-md-2 my-1 favorite" data-toggle="modal" data-target="#enter_site">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="transparent" class="mr-1" >
                <path d="M7.94597 2.71279L8.57496 3.68437L9.20478 2.71333C10.4481 0.796396 12.1312 0.462684 13.4666 0.975646C14.8495 1.50688 16.0146 3.00417 16.0146 5.08284C16.0146 5.74548 15.6555 6.61063 14.9662 7.61805C14.2922 8.60304 13.3726 9.62443 12.4091 10.579C11.4488 11.5304 10.4633 12.3978 9.66832 13.0765C9.38279 13.3203 9.12441 13.5376 8.89924 13.7269C8.81018 13.8018 8.72632 13.8723 8.64804 13.9384C8.62151 13.9608 8.59529 13.9829 8.56948 14.0048C8.53921 13.9801 8.50847 13.955 8.47739 13.9297C8.36326 13.8369 8.23979 13.7372 8.10654 13.6295C7.89922 13.462 7.66823 13.2754 7.412 13.0661C6.58031 12.3865 5.54628 11.5186 4.53756 10.5664C3.52534 9.61096 2.55824 8.58893 1.84936 7.60358C1.12275 6.59358 0.75 5.73384 0.75 5.08284C0.75 3.01509 1.98483 1.50639 3.47882 0.96746C4.9378 0.441162 6.71626 0.813318 7.94597 2.71279Z" stroke="#FF0055" stroke-width="1.5"/>
              </svg>
              <span>Сохранить</span>
            </button>
            @endguest
            @auth
            <button type="button" class="rounded-11 btn btn-outline-danger  ml-md-2 my-1 favorite
            @if (Auth::check() && $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()) $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()->product_id == $product->id ? active : '' @endif" data-id="{{ $product->id }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="transparent" class="mr-1" >
                <path d="M7.94597 2.71279L8.57496 3.68437L9.20478 2.71333C10.4481 0.796396 12.1312 0.462684 13.4666 0.975646C14.8495 1.50688 16.0146 3.00417 16.0146 5.08284C16.0146 5.74548 15.6555 6.61063 14.9662 7.61805C14.2922 8.60304 13.3726 9.62443 12.4091 10.579C11.4488 11.5304 10.4633 12.3978 9.66832 13.0765C9.38279 13.3203 9.12441 13.5376 8.89924 13.7269C8.81018 13.8018 8.72632 13.8723 8.64804 13.9384C8.62151 13.9608 8.59529 13.9829 8.56948 14.0048C8.53921 13.9801 8.50847 13.955 8.47739 13.9297C8.36326 13.8369 8.23979 13.7372 8.10654 13.6295C7.89922 13.462 7.66823 13.2754 7.412 13.0661C6.58031 12.3865 5.54628 11.5186 4.53756 10.5664C3.52534 9.61096 2.55824 8.58893 1.84936 7.60358C1.12275 6.59358 0.75 5.73384 0.75 5.08284C0.75 3.01509 1.98483 1.50639 3.47882 0.96746C4.9378 0.441162 6.71626 0.813318 7.94597 2.71279Z" stroke="#FF0055" stroke-width="1.5"/>
              </svg>
              <span>Сохранить</span>
            </button>
            @endauth
          </div>
        </div>
        <!--slider-proiduct-and-description-end-->
        <!--product-information-and-attribute-->
        <div class="col-12 col-lg-7 order-lg-1 px-md-5">
          <h3 class="h3 title mt-3 mt-lg-2 d-none d-lg-block">Информация о товаре</h3>
          <div class="mt-3 mt-lg-5 d-none d-lg-block ">

            <div class="mt-3">
              <a href="{{ route('ft-category.category', $product->category->slug) }}" class="text-muted  font-weight-bold text-decoration-none">{{ $product->category->name }}</a>
              <h3 class="mt-2 mb-3 font-weight-bold">{{ $product->name }}</h3>
              <nav class="text-muted">
                Магазин: <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="text-muted text-decoration-none"> {{ $product->store->name }}     </a>
              </nav>
              <div class="my-3 px-0">
                <div class="d-flex mt-3 gap-3 att-show-row flex-column  ">
                  @foreach ($product->attribute_variation->groupBy('attribute_id') as $key => $item)
                  <div class="row px-3 flex-wrap desktopAttrs">
                    <span class="pr-2">{{ $item->first()->attribute->name }}:</span>
                    @foreach ($product->attribute_variation as $attribute)
                      @if ($key == $attribute->attribute_id)
                        <label class="radio-container mr-2">
                          {{ $attribute->attribute_value->name }}
                          <input type="radio" data-name="{{ $item->first()->attribute->name }}:" name="{{ $attribute->attribute_value->attribute_id }}"  value="{{ $attribute->attribute_value->id }}">
                          <span class="radio-checkmark"></span>
                        </label>
                      @endif
                    @endforeach
                    </div>
                  @endforeach
                </div>
              </div>

            </div>
          </div>
          <div class="row align-items-center mt-lg-3 prod-controls">
            <div class="col-4">
              <div class="text-center text-md-left">
                <h5 class="mb-0"><span class="text-danger price mb-price" id="price">{{ round($product->price_after_margin) }}</span> <span class="mb-currency">Сомони</span></h5>
              </div>
            </div>
            <div class="col-4 my-md-0 my-3 text-center">
              <div class="position-relative d-flex align-items-center number">
                <form id="number-spinner-horizontal" class="t-neutral">
                  <fieldset class="spinner spinner--horizontal l-contain--medium">
                     <button class="spinner__button spinner__button--left js-spinner-horizontal-subtract" data-type="subtract" title="Subtract 1" aria-controls="spinner-input">- </button>
                     <input type="number" class="spinner__input js-spinner-input-horizontal" id="spinner-input" disabled value="1" min="1" max="{{ $product->quantity  }}" step="1" pattern="[0-9]*" role="alert" aria-live="assertlive" />
                     <button data-type="add" class="spinner__button spinner__button--right js-spinner-horizontal-add" title="Add 1" aria-controls="spinner-input">+ </button>
                   </fieldset>
                 </form>
              </div>
            </div>
            <div class="col-4">
              <div class="text-center text-md-right">

                @if(Auth::check())
                  @if (Auth::user()->store && $product->store_id == Auth::user()->store->id)
                    <a href="{{ route('ft-products.edit', $product->slug) }}" class="btn btn-danger custom-radius">Изменить</a>
                  @else
                    <!-- Button trigger modal -->
                    <button id="buyBtn" type="button" class="btn btn-danger custom-radius d-none d-lg-block" data-toggle="modal">
                        Купить
                    </button>
                    <button id="buyBtnMob" type="button" class="btn btn-danger custom-radius d-block d-lg-none" data-toggle="modal">
                        Купить
                    </button>
                  @endif
                @endif
                @guest
                <button type="button" class=" btn btn-danger custom-radius" data-toggle="modal" data-target="#enter_site">
                  Купить
                </button>
                @endguest
                <!-- Modal 1-->
                <div class="modal fade text-left" id="buyProduct" tabindex="-1" aria-labelledby="buyProduct"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered buy-modal">
                    <div class="modal-content mb-5">
                      <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <img src="/storage/theme/icons/close-modal.svg" alt="">
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="container text-dark px-0">
                          <div class="row modal-item position-relative">
                            <div class="col-12 col-lg-5">
                                <div class="title mb-3">Товар:</div>
                                <div class="row">
                                    <div class="col-4 col-lg-6"><img src="{{ Storage::url($product->image) }}" class="img-fluid rounded" height="48" width="48" alt="" ></div>
                                    <div class="col-8 col-lg-6">
                                        <h6 class="h6 font-weight-bold checkout-id text-dark" data-id="{{ $product->id }}">{{ $product->name }}</h6>
                                        <span class="text-secondary text-semi-bold">{{ $product->store->name }}</span>
                                        <div class="selectedAttrs text-dark"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 d-none d-lg-block text-dark">
                                <div class="title mb-3">Цена:</div>
                                <span class="text-secondary text-semi-bold price-start">{{ round($product->price_after_margin) }} </span>Сомони
                            </div>
                            <div class="col-12 col-lg-3 mt-3 mt-lg-0 text-left text-lg-center">
                                <div class="d-flex flex-row flex-lg-column justify-content-between text-dark">
                                    <div class="title mb-3">Количество:</div>
                                    <span class="text-secondary text-semi-bold quantity-product">1</span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 mt-3 mt-lg-0">
                                <div class="d-flex flex-row flex-lg-column justify-content-between text-dark">
                                    <div class="title mb-3">Сумма:</div>
                                    <div class="text-semi-bold"><span class="total-price">{{ round($product->price_after_margin) }}</span> сомони</div>
                                </div>
                            </div>
                          </div>
                          <div class="mt-3">
                            <div class="border-bottom text-secondary mb-2">Примичание к заказу</div>
                            <input class="font-weight-bold checkout-address w-100 form-control" type="text" name="comment" id="comment">
                          </div>
                          <div class="mt-3">
                            <div class="border-bottom text-secondary mb-2">Ваш адрес</div>
                            <input class="font-weight-bold checkout-address w-100 form-control" type="text" name="checkout_address" id="checkout_address" value="{{ Auth::user()->address ?? '' }}" disabled="true">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0 info-product_footer">
                        <div class="d-flex flex-column flex-sm-row justify-content-between w-100  flex-wrap">
                          <div class="btn btn-outline-danger change-address custom-radius my-1"> <i class="fas fa-map-marked-alt"></i> Поменять адрес</div>
                          <button type="button" class="btn btn-danger custom-radius checkout-product" data-toggle="modal" data-target="#thanks"  data-dismiss="modal" aria-label="Close">
                            Оформить
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal 1 end-->
                <!--Modal-2-->
                <div class="modal fade text-left" id="thanks" tabindex="-1" aria-labelledby="thanks"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered buy-modal">
                  <div class="modal-content">
                    <div class="modal-header border-0">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="/storage/theme/icons/close-modal.svg" alt=""></span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container text-center">
                        <div class="text-secondary">Ваш заказ приянт, в ближайшее время Вам позвонят наши операторы!</div>
                        <img src="/storage/theme/icons/thanks.svg" class="img-fluid my-3" alt="">
                        <h2 class="text-danger font-weight-bold">Спасибо!</h2>
                        {{-- <div class="text-secondary">Номер вашего заказа <span class="order-number"></span></div> --}}
                      </div>
                    </div>
                    <div class="modal-footer border-0">

                    </div>
                  </div>
                </div>
              </div>
                <!--Modal-2 end-->
              </div>
            </div>
          </div>
          <div class="mt-3 mt-sm-5 d-lg-flex justify-content-end info-product_footer d-none order-1">
            <div class="my-3 text-center d-flex justify-content-end w-100">
              <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="rounded-11 btn btn-danger mr-md-2 my-1">
                <img class="mr-1" src="/storage/theme/icons/store.svg" alt=""> В магазин продавца
              </a>
              @guest
              <button type="button" class="rounded-11 btn btn-outline-danger  ml-md-2 my-1 favorite" data-toggle="modal" data-target="#enter_site">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="transparent" class="mr-1" >
                  <path d="M7.94597 2.71279L8.57496 3.68437L9.20478 2.71333C10.4481 0.796396 12.1312 0.462684 13.4666 0.975646C14.8495 1.50688 16.0146 3.00417 16.0146 5.08284C16.0146 5.74548 15.6555 6.61063 14.9662 7.61805C14.2922 8.60304 13.3726 9.62443 12.4091 10.579C11.4488 11.5304 10.4633 12.3978 9.66832 13.0765C9.38279 13.3203 9.12441 13.5376 8.89924 13.7269C8.81018 13.8018 8.72632 13.8723 8.64804 13.9384C8.62151 13.9608 8.59529 13.9829 8.56948 14.0048C8.53921 13.9801 8.50847 13.955 8.47739 13.9297C8.36326 13.8369 8.23979 13.7372 8.10654 13.6295C7.89922 13.462 7.66823 13.2754 7.412 13.0661C6.58031 12.3865 5.54628 11.5186 4.53756 10.5664C3.52534 9.61096 2.55824 8.58893 1.84936 7.60358C1.12275 6.59358 0.75 5.73384 0.75 5.08284C0.75 3.01509 1.98483 1.50639 3.47882 0.96746C4.9378 0.441162 6.71626 0.813318 7.94597 2.71279Z" stroke="#FF0055" stroke-width="1.5"/>
                </svg>
                <span>Сохранить</span>
              </button>
              @endguest
              @auth
              <button type="button" class="rounded-11 btn btn-outline-danger  ml-md-2 my-1 favorite
              @if (Auth::check() && $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()) $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()->product_id == $product->id ? active : '' @endif" data-id="{{ $product->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="transparent" class="mr-1" >
                  <path d="M7.94597 2.71279L8.57496 3.68437L9.20478 2.71333C10.4481 0.796396 12.1312 0.462684 13.4666 0.975646C14.8495 1.50688 16.0146 3.00417 16.0146 5.08284C16.0146 5.74548 15.6555 6.61063 14.9662 7.61805C14.2922 8.60304 13.3726 9.62443 12.4091 10.579C11.4488 11.5304 10.4633 12.3978 9.66832 13.0765C9.38279 13.3203 9.12441 13.5376 8.89924 13.7269C8.81018 13.8018 8.72632 13.8723 8.64804 13.9384C8.62151 13.9608 8.59529 13.9829 8.56948 14.0048C8.53921 13.9801 8.50847 13.955 8.47739 13.9297C8.36326 13.8369 8.23979 13.7372 8.10654 13.6295C7.89922 13.462 7.66823 13.2754 7.412 13.0661C6.58031 12.3865 5.54628 11.5186 4.53756 10.5664C3.52534 9.61096 2.55824 8.58893 1.84936 7.60358C1.12275 6.59358 0.75 5.73384 0.75 5.08284C0.75 3.01509 1.98483 1.50639 3.47882 0.96746C4.9378 0.441162 6.71626 0.813318 7.94597 2.71279Z" stroke="#FF0055" stroke-width="1.5"/>
                </svg>
                <span>Сохранить</span>
              </button>
              @endauth
            </div>
          </div>
        </div>
        <!--product-information-and-attribute-end-->
      </div>
    </div>
  </section>
  <section class="divide"></section>
  <section class="other-product">
    <div class="all-product container mt-5 mt-md-0">
      <div class="text-center">
        <h2 class="my-5"> <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="text-muted mb-other-product text-decoration-none">Другие товары продавца</a></h2>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3 px-2 px-md-0 custom-lined">
        @forelse ($similars as $product)
        <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
          <div class="card rounded shadow border-0  h-100 w-100">
            <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
            <div class="container">
              <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
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
  </section>
  <section class="other-product">
    <div class="all-product container mt-5 mt-md-0">
      <div class="text-center">
        <h2 class="my-5 text-muted mb-other-product">Топ продаж</h2>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-5 px-2 px-md-0 custom-lined">
        @forelse ($topProducts as $product)
        <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
          <div class="card rounded shadow border-0  h-100 w-100">
            <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
            <div class="container">
              <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
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
  </section>
  <!-- Modal 1-->
  <div class="modal fade text-left" id="buyProduct" tabindex="-1" aria-labelledby="buyProduct"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered buy-modal">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="/storage/theme/icons/close-modal.svg" alt="">
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row modal-item position-relative">
            <div class="col-12 col-lg-5">
              <div class="title mb-3">Товар:</div>
              <div class="row">
                <div class="col-4 col-lg-6"><img src="{{ Storage::url($product->image) }}" class="img-fluid rounded" height="48" width="48" alt="" ></div>
                <div class="col-8 col-lg-6">
                 <h6 class="h6 font-weight-bold checkout-id" data-id="{{ $product->id }}">{{ $product->name }}</h6>
                  <span class="text-secondary text-semi-bold">{{ $product->store->name }}</span>
                </div>
              </div>
            </div>
            <div class="col-2 d-none d-lg-block">
              <div class="title mb-3">Цена:</div>
              <span class="text-secondary text-semi-bold price-start">{{ $product->price_after_margin }} </span>Сомони
            </div>
            <div class="col-12 col-lg-3 mt-3 mt-lg-0 text-left text-lg-center">
              <div class="d-flex flex-row flex-lg-column justify-content-between">
                <div class="title mb-3">Количество:</div>
                <span class="text-secondary text-semi-bold quantity-product">1</span>
              </div>
            </div>
            <div class="col-12 col-lg-2 mt-3 mt-lg-0">
              <div class="d-flex flex-row flex-lg-column justify-content-between">
                <div class="title mb-3">Сумма:</div>
                <div class="text-semi-bold"><span class="total-price">{{ $product->price_after_margin }}</span> сомони</div>
              </div>
            </div>
          </div>
          <div class="mt-3">
            <div class="border-bottom text-secondary mb-2">Ваш адрес</div>
            <input class="font-weight-bold checkout-address w-100 border-0" type="text" name="checkout_address" id="checkout_address" value="{{ Auth::user()->address ?? '' }}" disabled="true">
          </div>
        </div>
      </div>
      <div class="modal-footer border-0 info-product_footer">
        <div class="d-flex flex-column flex-sm-row justify-content-between w-100  flex-wrap">
          <div class="btn btn-outline-danger change-address custom-radius my-1"> <i class="fas fa-map-marked-alt"></i> Поменять адрес</div>
          <button type="button" class="btn btn-danger custom-radius checkout-product" data-toggle="modal" data-target="#thanks"  data-dismiss="modal" aria-label="Close">
            Оформить
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal 1 end-->
<!--Modal-2-->
<div class="modal fade text-left" id="thanks" tabindex="-1" aria-labelledby="thanks"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered buy-modal">
  <div class="modal-content">
    <div class="modal-header border-0">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="/storage/theme/icons/close-modal.svg" alt=""></span>
      </button>
    </div>
    <div class="modal-body">
      <div class="container text-center">
        <div class="text-secondary">Ваш заказ приянт, в ближайшее время Вам позвонят наши операторы!</div>
        <img src="/storage/theme/icons/thanks.svg" class="img-fluid my-3" alt="">
        <h2 class="text-danger font-weight-bold">Спасибо!</h2>
        <div class="text-secondary">Номер вашего заказа <span class="order-number"></span></div>
      </div>
    </div>
    <div class="modal-footer border-0">

    </div>
  </div>
</div>
</div>
<!--Modal-2 end-->
@endsection
