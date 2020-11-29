@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
  
<section class="content">
  <div class="container mt-3">
    <div class="row">
      <div class="col-lg-6">
        <div class="d-flex align-items-baseline mb-3">
          <a href="#" class="text-pinky font-weight-bold text-decoration-none"> <img src="/storage/icons/back.svg" alt=""> назад</a>
        </div>
        <div class="text-center">
          <img src="/storage/theme/sneakers-pic/preview.png" class="mw-100" alt="">
        </div>
        <div class="row add-product-secondary my-3">
          <div class="col-3 text-center">
            <img src="/storage/theme/sneakers-pic/front.png" class="mw-100" alt="">
          </div>
          <div class="col-3 text-center">
            <img src="/storage/theme/sneakers-pic/back.png" class="mw-100" alt="">
          </div>
          <div class="col-3 text-center">
            <img src="/storage/theme/sneakers-pic/under.png" class="mw-100" alt="">
          </div>
          <div class="col-3 text-center">
            <img src="/storage/theme/sneakers-pic/sneaker.png" class="mw-100" alt="">
          </div>
        </div>

        <div class="mt-5">
          <h3 class="h3">Описание товара:</h3>
          <p class="about-prod__info">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
            Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        </div>
      </div>

      <div class="col-lg-6">
        <h3 class="h3 title mt-3 mt-lg-5" >Информация о товаре</h3>
        <div class="snk-info">
          <p class="snk-info__type mb-0">Кроссовки</p>
          <h3 class="h3 font-weight-bold">Adidas Air Max</h3>
          <div>
            <span class="snk-info__market">Магазин:</span> <span class="snk-info__market"> Olim.h</span>
          </div>
        </div>

        <div class="mt-3">
          <div class="d-block color-and-size__caption mb-3">
              <span class="snk-info__type m-0"> Цвет :</span>
          </div>
          <div class="product-colors d-flex justify-content-between w-50">
            <label for="grey" class="color_select select-color rounded-circle">
              <input class="color_selector form-check-input" type="checkbox" value="" id="grey" hidden>
            </label>

            <label for="blue" class="color_select select-color rounded-circle bg-info">
              <input class="color_selector form-check-input" type="checkbox" value="" id="blue" hidden>
            </label>

            <label for="green" class="color_select select-color rounded-circle bg-success">
              <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
            </label>

            <label for="yellow" class="color_select select-color rounded-circle bg-warning">
              <input class="color_selector form-check-input" type="checkbox" value="" id="yellow" hidden>
            </label>
          </div>

          <div class="color-and-size__size-number sizes d-flex justify-content-between mt-2 w-50">
            <span class="snk-info__type m-0"> Размер :</span>

            <label for="size-41" class="product-size">41
              <input class=" form-check-input" type="checkbox" value="" id="size-41" hidden>
            </label>

            <label for="size-42" class="product-size">42
              <input class=" form-check-input" type="checkbox" value="" id="size-42" hidden>
            </label>

            <label for="size-43" class="product-size">43
              <input class=" form-check-input" type="checkbox" value="" id="size-43" hidden>
            </label>

            <label for="size-44" class="product-size">44
              <input class=" form-check-input" type="checkbox" value="" id="size-44" hidden>
            </label>
          </div>
        </div>

        <div class="row align-items-center my-3">
          <div class="col-12 col-sm-3">
            <div class="text-center text-md-left">
              <span class="snk-info__name mr-4">199$</span>
            </div>
          </div>
          <div class="col-12 col-sm-4 my-md-0 my-3">
            <div class="rounded-pill border border-dark px-3">

              <div class="d-flex align-items-center justify-content-between">
                <span class="plus-minus">-</span>
                <input type="number" value="1" class="quantyty form-control text-center border-0">
                <span class="plus-minus">+</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-5 ">
            <div class="text-center text-md-right">
              <button type="button" class="price-and-amount__buy-bttn custom-bttn btn-secondary mr-2 rounded px-3"
                data-toggle="modal" data-target="#product-size">Купить</button>
<!--              
              <div class="modal fade" id="product-size" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="product-sizeLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header border-0">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <img src="/storage/icons/close icon.svg" alt="">
                        </span>
                      </button>
                    </div>
                    <div class="modal-body mx-4">
                      <div class="row text-left">
                        <div class="col-12 col-lg-5">
                          <h5 class="h5">ТОВАР</h5>
                          <div class="d-flex flex-column flex-lg-row">
                            <img class="border mw-100 mr-3" src="/storage/theme/modal_pic.png" height="100px" width="160px" alt="">
                            <div class="d-flex flex-column">
                              <h4 class="h4">Adidas Air Max</h4>
                              <span class="d-block snk-info__market_modal"> Olim.h</span>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-12  col-lg-2">
                          <h5 class="h5">ЦЕНА</h5>
                          <span class="text-secondary">199$</span>
                        </div>
                        <div class="col-12  col-lg-3">
                          <div class="text-left text-lg-center">
                            <h5 class="h5">КОЛЧЕСТВО</h5>
                            <div class="snk-amount__numb  border rounded-circle text-center "> 1 </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-2">
                          <h5 class="h5">СУММА</h5>
                          <span class="text-secondary">199$</span>
                        </div>
                      </div>
                      <div class="pl-3">
                        <span class="d-block border-bottom">Ваш адрес:</span>
                        <h3 class="snk-info__name_modal">Борбад 124/1</h3>
                      </div>
                    </div>
                    <div class="modal-footer border-0 d-flex justify-content-between mt-4">
                      <button type="button" class="btn btn-outline-danger rounded-pill px-4 "><img src="/storage/icons/exchange.svg" alt=""> Поменять адрес</button>
                      <button type="button"
                        class="price-and-amount__buy-bttn custom-bttn btn-secondary mr-2 rounded px-3"
                        data-toggle="modal" data-target="#staticBackdrop2">Купить</button>

                  
                      <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-0">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                      d="M23 12C23 5.92708 18.0729 1 12 1C5.92708 1 1 5.92708 1 12C1 18.0729 5.92708 23 12 23C18.0729 23 23 18.0729 23 12Z"
                                      stroke="#FF0055" stroke-width="2" stroke-miterlimit="10" />
                                    <path d="M16 16L8 8" stroke="#FF0055" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                    <path d="M8 16L16 8" stroke="#FF0055" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                  </svg>
                                </span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="modal-required__head-txt  d-flex justify-content-center mb-3">
                                <p class="order-agree__txt text-center">Ваш заказ приянт, в ближайшее время Вам позвонят
                                  <br> наши операторы!</p>
                              </div>
                              <div class="modal-required__icon-check  d-flex justify-content-center">
                                <svg width="149" height="149" viewBox="0 0 149 149" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="74.5" cy="74.5" r="72.5" stroke="#FF0055" stroke-width="4" />
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M92.4142 61.6083C93.1953 62.4194 93.1953 63.7344 92.4142 64.5455L70.4142 87.3917C69.6332 88.2028 68.3668 88.2028 67.5858 87.3917L57.5858 77.0071C56.8047 76.196 56.8047 74.8809 57.5858 74.0699C58.3668 73.2588 59.6332 73.2588 60.4142 74.0699L69 82.9859L89.5858 61.6083C90.3668 60.7972 91.6332 60.7972 92.4142 61.6083Z"
                                    fill="#FE0055" />
                                </svg>
                              </div>

                              <div class="modal-required__thanks d-flex justify-content-center mb-3">
                                <h3 class="tnx-txt">Спасибо</h3>
                              </div>

                              <div class="modal-required__head-txt d-flex justify-content-center">
                                <p>Номер вашего заказа <span>3320</span></p>
                              </div>

                            </div>
                            <div class="modal-footer border-0"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>

        <div class="info-product_footer mt-3 mt-sm-5 d-flex justify-content-end">
          <div class="info-prod_footer__bttn mt-3 mt-sm-4 text-center">
            <button type="button" class="custom-bttn btn-secondary my-1 mx-2 rounded-pill px-3"><img class="mr-1" src="/storage/icons/store.svg" alt=""> В магазин продавца</button>
            <button type="button" class="custom-bttn btn-secondary my-1 mx-2 rounded-pill px-3"><img class="mr-1" src="/storage/icons/saved.svg" alt="">Сохранить</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="">
  <div class="all-product container mt-5">
    <div class="text-center">
      <h2 class="shop-subject title mt-5 mb-4">Новые товары </h2>
    </div>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div
          class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h5 class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-3"> Купить </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div
          class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h5 class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-2"> Купить </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div
          class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h5 class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-3"> Купить </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div
          class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h5 class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-3"> Купить </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div
          class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h5 class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-3"> Купить </a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div class="position-relative bg-white border-lg-0 border product-place text-center w-100 h-100  py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h5 class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-3"> Купить </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h3 class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-3"> Купить </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h3 class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-3"> Купить </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h3 class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-3"> Купить </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
        <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
          <img class="liked-icon position-absolute" src="/storage/icons/favourite.svg" alt="">
          <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
          <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
          <p class="about-product mb-2">
            Lorem Ipsum is simply dummy text.
          </p>
          <div class="price-place position-relative">
            <h3 class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
            <p class="buy-bttn text-center mb-0 position-absolute">
              <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none px-3"> Купить </a>
            </p>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection