@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
  <section>
    <div class="container mt-3">
      <div class="row">
        <!--slider-proiduct-and-description-->
        <div class="col-12 col-lg-6">
          <div class="d-flex align-items-baseline mb-3 justify-content-between">
            <a href="#" class="text-pinky font-weight-bold text-decoration-none"> 
              <img src="/storage/theme/icons/back.svg" alt="">
              назад</a>
              <h6 class="d-block d-lg-none text-secondary">Информация о товаре</h6>
          </div>
          <div class="d-block d-lg-none">
            <h4 class="h4 text-secondary">Категория: Кроссовки</h4>
            <h3 class="h3">Adidas  Air Max</h3>
          </div>
          <!--desktop slider-->
          <div class="product-img-holder d-none d-lg-block">
            <div class="text-center">
              <img src="{{ Storage::url($product->image )}}" class="rounded" alt="" height="373px">
            </div>
            <div class="row add-product-secondary my-3">
              <div class="col-3 text-center">
                <img src="img/boot-1.png" data-image-src="img/boot-1.png" class="mw-100 pic-item" alt="">
              </div>
              <div class="col-3 text-center">
                <img src="img/boot-2.png" data-image-src="img/boot-2.png" class="mw-100 pic-item" alt="">
              </div>
              <div class="col-3 text-center">
                <img src="img/boot-3.png" data-image-src="img/boot-3.png" class="mw-100 pic-item" alt="">
              </div>
              <div class="col-3 text-center">
                <img src="img/boot-4.png" data-image-src="img/boot-4.png" class="mw-100 pic-item" alt="">
              </div>
            </div>
          </div>
          <!--desktop slider end-->
          <!--mobile slider-->
          <div id="prodCarousel" class="carousel slide d-block d-lg-none" data-ride="carousel">
            <ol class="carousel-indicators d-flex align-items-center">
              <li data-target="#prodCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#prodCarousel" data-slide-to="1"></li>
              <li data-target="#prodCarousel" data-slide-to="2"></li>
              <li data-target="#prodCarousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/boot-1.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/boot-2.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/boot-3.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/boot-4.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev d-none" href="#prodCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next d-none" href="#prodCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <!--mobile slider-end-->
          <div class="prod-controls-mobile">

          </div>
          <div class="my-5">
            <h4>Описание товара:</h4>
            <p class="text-secondary text-semi-bold">{{ $product->description }}</p>
          </div>
        </div>
        <!--slider-proiduct-and-description-end-->
        <!--product-information-and-attribute-->
        <div class="col-12 col-lg-6">
          <h3 class="h3 title mt-3 mt-lg-2 d-none d-lg-block">Информация о товаре</h3>
          <div class="mt-3 mt-lg-5">

            <div class="d-none d-lg-block mt-3 font-weight-bold">
              <span class="text-dark">Категория:</span>
              <a href="{{ route('ft-category.category', $product->category->slug) }}" class="text-danger text-decoration-none">{{ $product->category->name }}</a>
              <h3 class="mt-2 mb-4 font-weight-bold">{{ $product->name }}</h3>
            </div>
            <p class="font-weight-bold">
              <span class="text-dark">Магазин:</span>
              <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="text-danger text-decoration-none">{{ $product->store->name }}</a>
            </p>
          </div>
          <div class="row align-items-center mt-3 prod-controls">
            <div class="col-4">
              <div class="text-center text-md-left">
                <h5 class="mb-0"><span class="text-danger price" id='price'>{{ $product->price }}</span> Сомони</h5>
              </div>
            </div>
            <div class="col-4 my-md-0 my-3 text-center">
              <div class="position-relative d-flex align-items-center number">
                <form id="number-spinner-horizontal" class="t-neutral">
                  <fieldset class="spinner spinner--horizontal l-contain--medium">
                     <button class="spinner__button spinner__button--left js-spinner-horizontal-subtract" data-type="subtract" title="Subtract 1" aria-controls="spinner-input">- </button>
                     <input type="number" class="spinner__input js-spinner-input-horizontal" id="spinner-input" value="1" min="1" max="{{ $product->quantity  }}" step="1" pattern="[0-9]*" role="alert" aria-live="assertlive" />
                     <button data-type="add" class="spinner__button spinner__button--right js-spinner-horizontal-add" title="Add 1" aria-controls="spinner-input">+ </button>
                   </fieldset>
                 </form>
              </div>
            </div>
            <div class="col-4">
              <div class="text-center text-md-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger custom-radius" data-toggle="modal" data-target="#buyProduct">
                  Купить
                </button>
                <!-- Modal 1-->
                <div class="modal fade text-left" id="buyProduct" tabindex="-1" aria-labelledby="buyProduct"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered buy-modal">
                    <div class="modal-content">
                      <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <img src="/storage/theme/icons/iclose-modal.svg" alt=""></span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                          <div class="row modal-item position-relative">
                            <div class="col-12 col-lg-5">
                              <div class="title mb-3">Товар:</div>
                              <div class="row">
                                <div class="col-4 col-lg-6"><img src="{{ Storage::url($product->image) }}" class="img-fluid rounded" height="48" width="48" alt=""></div>
                                <div class="col-8 col-lg-6">
                                 <h6 class="h6 font-weight-bold checkout-id" data-id="{{ $product->id }}">{{ $product->name }}</h6>
                                  <span class="text-secondary text-semi-bold">{{ $product->store->name }}</span> 
                                </div>
                              </div>
                            </div>
                            <div class="col-2 d-none d-lg-block">
                              <div class="title mb-3">Цена:</div>
                              <span class="text-secondary text-semi-bold price-start">{{ $product->price }} </span>Сомони
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
                                <div class="text-semi-bold"><span class="total-price">{{ $product->price }}</span> сомони</div>
                              </div>
                            </div>
                          </div>
                          <div class="mt-3">
                            <div class="border-bottom text-secondary mb-2">Ваш адресс</div>
                            <span class="font-weight-bold checkout-address">Борбад 124/1</span>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0 info-product_footer">
                        <div class="d-flex flex-column flex-sm-row justify-content-between w-100">
                          <div class="btn btn-outline-danger custom-radius my-1"> <i class="fas fa-map-marked-alt"></i> Поменять адрес</div>
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
                        <div class="text-secondary">Номер вашего закза 3320</div>
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
          <div class="mt-3 mt-sm-5 d-flex justify-content-end info-product_footer">
            <div class="mt-3 mt-sm-4 text-center">
              <a ></a>
              <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="rounded-11 btn btn-danger mr-md-2 my-1"><img class="mr-1"
                  src="/storage/theme/icons/store.svg" alt=""> В магазин продавца</a>
              <button type="button" class="rounded-11 btn btn-outline-danger  ml-md-2 my-1 favorite" data-id="{{ $product->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="transparent" class="mr-1">
                  <path d="M7.94597 2.71279L8.57496 3.68437L9.20478 2.71333C10.4481 0.796396 12.1312 0.462684 13.4666 0.975646C14.8495 1.50688 16.0146 3.00417 16.0146 5.08284C16.0146 5.74548 15.6555 6.61063 14.9662 7.61805C14.2922 8.60304 13.3726 9.62443 12.4091 10.579C11.4488 11.5304 10.4633 12.3978 9.66832 13.0765C9.38279 13.3203 9.12441 13.5376 8.89924 13.7269C8.81018 13.8018 8.72632 13.8723 8.64804 13.9384C8.62151 13.9608 8.59529 13.9829 8.56948 14.0048C8.53921 13.9801 8.50847 13.955 8.47739 13.9297C8.36326 13.8369 8.23979 13.7372 8.10654 13.6295C7.89922 13.462 7.66823 13.2754 7.412 13.0661C6.58031 12.3865 5.54628 11.5186 4.53756 10.5664C3.52534 9.61096 2.55824 8.58893 1.84936 7.60358C1.12275 6.59358 0.75 5.73384 0.75 5.08284C0.75 3.01509 1.98483 1.50639 3.47882 0.96746C4.9378 0.441162 6.71626 0.813318 7.94597 2.71279Z" stroke="#FF0055" stroke-width="1.5"/>
                </svg>
                <span>Сохранить</span>
              </button>
            </div>
          </div>
        </div>
        <!--product-information-and-attribute-end-->
      </div>
    </div>
  </section>
  <section class="divide"></section>
  <section class="">
    <div class="all-product container mt-5">
      <div class="text-center">
        <h2 class="my-5 text-muted">Другие товары продавца:</h2>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
        @forelse ($similars as $product)
          <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
            <div class="card rounded shadow">
              <svg class="position-absolute favorite" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                </svg>
              <img class="img-fluid rounded mb-md-3" src="{{ Storage::url($product->image) }}" alt="" >
              <div class="container">
                <h4 class="product-name shop-subject" >{{ $product->name }}</h4>
                <span class="text-muted">{{ $product->category->name }}</span>
                <div class="price-place d-flex justify-content-between align-items-center mb-3">
                  <span class="font-weight-bold">{{ $product->price }} сомони</span>
                  <a href="{{ route('ft-products.single', $product->slug) }}" class="btn btn-danger rounded-pill"> Купить </a>
                </div>
              </div>
            </div>
          </div>
        @empty
            Извените ничего не найдено
        @endforelse

      </div>
  </section>
@endsection