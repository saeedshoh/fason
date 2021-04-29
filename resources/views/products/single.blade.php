@extends('layouts.app')
@extends('layouts.header')

@extends('layouts.footer')

@section('title', $product->name)
@section('seo-desc', $product->description)
@section('seo-keywords', $product->name)
@section('og:title', $product->name)
@section('og:description', $product->description)
@section('og:image', Storage::url($product->image))
@section('og:image:alt', $product->name)


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
            <img src="{{ Storage::url($product->image) }}" class="rounded  pic-main  img-fluid" alt="" height="373px">
            <div class="add-product-secondary my-2 row">
                <div class="col-3 mt-3">
                  <img src="{{ Storage::url($product->image ) }}" data-image-src="{{ Storage::url($product->image) }}" class="mw-100 pic-item rounded shadow pic-item-active" alt="{{ $product->name }}">
                </div>
                @if(!empty($product->gallery))
                  @foreach (json_decode($product->gallery) as $gallery)
                    <div class="col-3 mt-3">
                        <img src="{{ Storage::url($gallery) }}" data-image-src="{{ Storage::url($gallery) }}" class="mw-100 pic-item rounded shadow" alt="{{ $product->name }}">
                    </div>
                  @endforeach 
                @endif
                
            </div>
          </div>
          <!--desktop slider end-->
          </div>
        <div>
        </div>
        <div class="col-12 d-block d-lg-none order-2">
{{--  
          <div class="d-flex justify-content-center">

            <form class="d-inline" action="{{ route('products.destroy', $product) }}" method="POST">
              @csrf
                  <button class="btn btn-danger delete-confirm custom-radius" type="submit"><i class="fe fe-trash"> </i> Удалить</button>
              @method('DELETE')
            </form>  --}}

          {{--  </div>  --}}

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
          <div class="my-3 text-center d-flex justify-content-around product-buttons">
            <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="rounded-11 btn btn-danger mr-md-2 my-1">
              <img class="mr-1" src="/storage/theme/icons/store.svg" alt=""> В магазин
            </a>
            @guest
            <button type="button" class="rounded-11 btn btn-outline-danger  ml-md-2 my-1 favorite" data-toggle="modal" data-target="#enter_site">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="transparent" class="mr-1">
                <path d="M7.94597 2.71279L8.57496 3.68437L9.20478 2.71333C10.4481 0.796396 12.1312 0.462684 13.4666 0.975646C14.8495 1.50688 16.0146 3.00417 16.0146 5.08284C16.0146 5.74548 15.6555 6.61063 14.9662 7.61805C14.2922 8.60304 13.3726 9.62443 12.4091 10.579C11.4488 11.5304 10.4633 12.3978 9.66832 13.0765C9.38279 13.3203 9.12441 13.5376 8.89924 13.7269C8.81018 13.8018 8.72632 13.8723 8.64804 13.9384C8.62151 13.9608 8.59529 13.9829 8.56948 14.0048C8.53921 13.9801 8.50847 13.955 8.47739 13.9297C8.36326 13.8369 8.23979 13.7372 8.10654 13.6295C7.89922 13.462 7.66823 13.2754 7.412 13.0661C6.58031 12.3865 5.54628 11.5186 4.53756 10.5664C3.52534 9.61096 2.55824 8.58893 1.84936 7.60358C1.12275 6.59358 0.75 5.73384 0.75 5.08284C0.75 3.01509 1.98483 1.50639 3.47882 0.96746C4.9378 0.441162 6.71626 0.813318 7.94597 2.71279Z" stroke="#FF0055" stroke-width="1.5"/>
              </svg>
              <span>Сохранить</span>
            </button>
            @endguest
            @auth
            <button type="button" class="rounded-11 btn btn-outline-danger  ml-md-2 my-1  btnHoverTouchMobile favorite 
            @if (Auth::check() && $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()) $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()->product_id == $product->id ? active : '' @endif" data-id="{{ $product->id }}" id="favoriteSave"  data-toggle="modal" data-target=".activeSaved">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="transparent" class="mr-1" >
                <path d="M7.94597 2.71279L8.57496 3.68437L9.20478 2.71333C10.4481 0.796396 12.1312 0.462684 13.4666 0.975646C14.8495 1.50688 16.0146 3.00417 16.0146 5.08284C16.0146 5.74548 15.6555 6.61063 14.9662 7.61805C14.2922 8.60304 13.3726 9.62443 12.4091 10.579C11.4488 11.5304 10.4633 12.3978 9.66832 13.0765C9.38279 13.3203 9.12441 13.5376 8.89924 13.7269C8.81018 13.8018 8.72632 13.8723 8.64804 13.9384C8.62151 13.9608 8.59529 13.9829 8.56948 14.0048C8.53921 13.9801 8.50847 13.955 8.47739 13.9297C8.36326 13.8369 8.23979 13.7372 8.10654 13.6295C7.89922 13.462 7.66823 13.2754 7.412 13.0661C6.58031 12.3865 5.54628 11.5186 4.53756 10.5664C3.52534 9.61096 2.55824 8.58893 1.84936 7.60358C1.12275 6.59358 0.75 5.73384 0.75 5.08284C0.75 3.01509 1.98483 1.50639 3.47882 0.96746C4.9378 0.441162 6.71626 0.813318 7.94597 2.71279Z" stroke="#FF0055" stroke-width="1.5"/>
              </svg>
              <span>Сохранить</span>
            </button>
            @endauth
            @if(Auth::check())
                @if (Auth::user()->store && $product->store_id == Auth::user()->store->id)
                <button type="button" class="rounded-11 btn btn-outline-secondary ml-md-2 my-1 delete-product">
                  <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="-40 0 427 427.00131" width="15px"><path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/></svg>
                  Удалить
                </button>
                {{-- <button type="button" class="rounded-11 btn btn-outline-primary  ml-md-2 my-1 px-2 restore-product">
                  <svg width="15px" height="15px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 14.155 14.155" style="enable-background:new 0 0 14.155 14.155;" xml:space="preserve">
                    <g>
                      <path d="M12.083,1.887c-0.795-0.794-1.73-1.359-2.727-1.697v2.135c0.48,0.239,0.935,0.55,1.334,0.95   c1.993,1.994,1.993,5.236,0,7.229c-1.993,1.99-5.233,1.99-7.229,0c-1.991-1.995-1.991-5.235,0-7.229   C3.466,3.269,3.482,3.259,3.489,3.25h0.002l1.181,1.179L4.665,0.685L0.923,0.68l1.176,1.176C2.092,1.868,2.081,1.88,2.072,1.887   c-2.763,2.762-2.763,7.243,0,10.005c2.767,2.765,7.245,2.765,10.011,0C14.844,9.13,14.847,4.649,12.083,1.887z"/>
                    </g>
                    </svg>Восстановить
                </button> --}}
                @endif
              @endif
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
                <div class="d-flex mt-3 gap-3 att-show-row flex-column">
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
              <div class="position-relative d-flex align-items-center number justify-content-center">
                <form id="number-spinner-horizontal" class="t-neutral">
                  <fieldset class="spinner spinner--horizontal l-contain--medium flex-row flex-nowrap">
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
                  <div class="modal-dialog modal-dialog-centered buy-modal px-2">
                    <div class="modal-content mb-5">
                      <div class="modal-header border-0 pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <img src="/storage/theme/icons/close-modal.svg" alt="">
                        </button>
                      </div>
                      <div class="modal-body py-0">
                        <div class="container text-dark px-0">
                          <div class="row modal-item position-relative">
                            <div class="col-12 col-lg-5">
                                <div class="title mb-3"><span class="small-title">Оформление заказа</span></div>
                                <div class="row">
                                    <div class="col-4 col-lg-6"><img src="{{ Storage::url($product->image) }}" class="img-fluid rounded" height="48" width="48" alt="" ></div>
                                    <div class="col-8 col-lg-6 text-truncate">
                                        <h6 class="h6 font-weight-bold checkout-id text-dark" data-id="{{ $product->id }}">{{ $product->name }}</h6>
                                        <span class="text-secondary text-semi-bold">{{ $product->store->name }}</span>
                                        <div class="selectedAttrs text-dark"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 d-none d-lg-block text-dark">
                                <div class="title mb-3 title-capitalize font-weight-600">Цена:</div>
                                <span class="text-secondary text-semi-bold price-start">{{ round($product->price_after_margin) }} </span>Сомони
                            </div>
                            <div class="col-12 col-lg-3 mt-3 mt-lg-0 text-left text-lg-center">
                                <div class="d-flex flex-row flex-lg-column justify-content-between text-dark">
                                    <div class="title mb-sm-1  mb-md-3 title-capitalize font-weight-600">Количество:</div>
                                    <span class="text-secondary text-semi-bold text-pinky font-weight-600">
                                      <span class="quantity-product">1</span>
                                      шт
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 mt-1 mt-lg-0">
                                <div class="d-flex flex-row flex-lg-column justify-content-between text-dark">
                                    <div class="title mb-3 title-capitalize font-weight-600">Сумма:</div>
                                    <div class="text-semi-bold font-weight-600 text-pinky"><span class="total-price">{{ round($product->price_after_margin) }}</span> сомони</div>
                                </div>
                            </div>
                          </div>
                          <div class="mt-1 mt-md-3">
                            <input class="font-weight-bold checkout-address w-100 form-control" type="text" name="comment" id="comment" placeholder="Примичание к заказу">
                          </div>
                          <div class="mt-3">
                            <div class="text-dark mb-2 font-weight-600">Ваш адрес</div>
                            <input class="font-weight-bold checkout-address w-100 form-control" type="text" name="checkout_address" id="checkout_address" value="{{ Auth::user()->address ?? '' }}">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0 info-product_footer">
                        <div class="d-flex flex-column flex-sm-row justify-content-between w-100  flex-wrap">
                          <div class="btn btn-outline-danger change-address custom-radius mb-2 mb-sm-0 mb-md-0 font-weight-bold"> <i class="fas fa-map-marked-alt pr-2 pr-sm-0 pr-md-0"></i> Поменять адрес</div>
                          <button type="button" class="btn btn-danger custom-radius checkout-product font-weight-bold arrange" data-toggle="modal" data-target="#thanks"  data-dismiss="modal" aria-label="Close">
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
                        <div class="text-secondary">Ваш заказ принят. В ближайшее время Вам позвонят наши операторы!</div>
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
                 <!--Modal-3-->
                 <div class="modal fade activeSaved" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content py-3 text-center">
                          <div class="text-pinky text-sucsess"></div>  
                        </div>
                      </div>
                    </div>
                    <!--Modal-3 end-->
              </div>
            </div>
          </div>
          <div class="mt-3 mt-sm-5 d-lg-flex justify-content-end info-product_footer d-none order-1">
            <div class="my-3 text-center d-flex justify-content-end w-100">
              <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="rounded-11 btn btn-danger mr-md-2 my-1 px-2">
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
              <button type="button" class="rounded-11 btn btn-outline-danger  ml-md-2 my-1 favorite px-2
              @if (Auth::check() && $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first())  active @endif" data-id="{{ $product->id }}"  id="favoriteSave"  data-toggle="modal" data-target=".activeSaved">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="transparent" class="mr-1" >
                  <path d="M7.94597 2.71279L8.57496 3.68437L9.20478 2.71333C10.4481 0.796396 12.1312 0.462684 13.4666 0.975646C14.8495 1.50688 16.0146 3.00417 16.0146 5.08284C16.0146 5.74548 15.6555 6.61063 14.9662 7.61805C14.2922 8.60304 13.3726 9.62443 12.4091 10.579C11.4488 11.5304 10.4633 12.3978 9.66832 13.0765C9.38279 13.3203 9.12441 13.5376 8.89924 13.7269C8.81018 13.8018 8.72632 13.8723 8.64804 13.9384C8.62151 13.9608 8.59529 13.9829 8.56948 14.0048C8.53921 13.9801 8.50847 13.955 8.47739 13.9297C8.36326 13.8369 8.23979 13.7372 8.10654 13.6295C7.89922 13.462 7.66823 13.2754 7.412 13.0661C6.58031 12.3865 5.54628 11.5186 4.53756 10.5664C3.52534 9.61096 2.55824 8.58893 1.84936 7.60358C1.12275 6.59358 0.75 5.73384 0.75 5.08284C0.75 3.01509 1.98483 1.50639 3.47882 0.96746C4.9378 0.441162 6.71626 0.813318 7.94597 2.71279Z" stroke="#FF0055" stroke-width="1.5"/>
                </svg>
                <span>Сохранить</span>
              </button>
              @endauth
              @if(Auth::check())
                @if (Auth::user()->store && $product->store_id == Auth::user()->store->id)
                <button type="button" class="rounded-11 btn btn-outline-secondary  ml-md-2 my-1 px-2 delete-product">
                  <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="-40 0 427 427.00131" width="15px"><path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/></svg>
                  Удалить
                </button>
                {{-- <button type="button" class="rounded-11 btn btn-outline-primary  ml-md-2 my-1 px-2 restore-product">
                  <svg width="15px" height="15px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 14.155 14.155" style="enable-background:new 0 0 14.155 14.155;" xml:space="preserve">
                    <g>
                      <path d="M12.083,1.887c-0.795-0.794-1.73-1.359-2.727-1.697v2.135c0.48,0.239,0.935,0.55,1.334,0.95   c1.993,1.994,1.993,5.236,0,7.229c-1.993,1.99-5.233,1.99-7.229,0c-1.991-1.995-1.991-5.235,0-7.229   C3.466,3.269,3.482,3.259,3.489,3.25h0.002l1.181,1.179L4.665,0.685L0.923,0.68l1.176,1.176C2.092,1.868,2.081,1.88,2.072,1.887   c-2.763,2.762-2.763,7.243,0,10.005c2.767,2.765,7.245,2.765,10.011,0C14.844,9.13,14.847,4.649,12.083,1.887z"/>
                    </g>
                    </svg>Восстановить
                </button> --}}
                @endif
              @endif
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
        <h2 class="my-2 my-md-5"> <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="text-muted mb-other-product text-decoration-none">Другие товары продавца</a></h2>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 mt-3 px-2 px-md-0 custom-lined">
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
        <h2 class="mb-4 mt-2 my-md-5 text-muted mb-other-product">Топ продаж</h2>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 mt-3 mb-5 px-2 px-md-0 custom-lined">
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
        <div class="text-secondary">Ваш заказ принят. В ближайшее время Вам позвонят наши операторы!</div>
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
