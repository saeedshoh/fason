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
          <div class="mt-5">
            <h3 class="h3">Описание товара:</h3>
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
          <div class="row align-items-center my-3 prod-controls">
            <div class="col-3">
              <div class="text-center text-md-left">
                <h3 class="mb-0">TJS <span class="text-danger price" id='price'>{{ $product->price }}</span></h3>
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
            <div class="col-5">
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
                                 <h6 class="h6 font-weight-bold">{{ $product->name }}</h6>
                                  <span class="text-secondary text-semi-bold">{{ $product->store->name }}</span> 
                                </div>
                              </div>
                            </div>
                            <div class="col-2 d-none d-lg-block">
                              <div class="title mb-3">Цена:</div>
                              <span class="text-secondary text-semi-bold price-start">TJS {{ $product->price }}</span>
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
                                <div class="text-semi-bold total-price">TJS {{ $product->price }}</div>
                              </div>
                            </div>
                          </div>
                          <div class="mt-3">
                            <div class="border-bottom text-secondary mb-2">Ваш адресс</div>
                            <span class="font-weight-bold">Борбад 124/1</span>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0 info-product_footer">
                        <div class="d-flex flex-column flex-sm-row justify-content-between w-100">
                          <div class="btn btn-outline-danger custom-radius my-1"> <i class="fas fa-map-marked-alt"></i> Поменять адрес</div>
                          <button type="button" class="btn btn-danger custom-radius" data-toggle="modal" data-target="#thanks"  data-dismiss="modal" aria-label="Close">
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
              <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="custom-radius btn btn-danger mr-md-2 my-1"><img class="mr-1"
                  src="/storage/theme/icons/store.svg" alt=""> В магазин продавца</a>
              <button type="button" class="custom-radius btn btn-secondary  ml-md-2 my-1"><img class="mr-1"
                  src="/storage/theme/icons/saved.svg" alt="">Сохранить</button>
            </div>
          </div>
        </div>
        <!--product-information-and-attribute-end-->
      </div>
    </div>
  </section>
  <section class="">
    <div class="all-product container mt-5">
      <div class="text-center">
        <h2 class="shop-subject title mt-5 mb-4">Другие товары продавца:</h2>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
        @forelse ($similars as $product)
          <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
            <div class="card rounded shadow">
              <img class="position-absolute favorite" src="storage/theme/icons/favourite.svg" alt="">
              <img class="img-fluid rounded mb-md-3" src="{{ Storage::url($product->image) }}" alt="" >
              <div class="container">
                <h4 class="product-name shop-subject" >{{ $product->name }}</h4>
                <span class="text-muted">{{ $product->category->name }}</span>
                <div class="price-place d-flex justify-content-between align-items-center mb-3">
                  <span class="font-weight-bold">TJS {{ $product->price }}</span>
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