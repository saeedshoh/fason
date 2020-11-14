@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
  
<section class="content">
    <div class="container">
      <!--Edit logo and banner start-->
      <div class="row mt-3">
        <div class="col-lg-3 order-1 order-lg-0" >
          <div class="market__head-banner w-100 text-center d-none d-md-block" style="background: #FFFFFF url(/storage/theme/itpark.png);">
            <button type="button" class="mt-3 change-bttn btn btn-outline-dark rounded-pill px-3"><img src="/storage/theme/icons/camera.svg" class="mw-100" alt=""> Изменить</button>
          </div>
          <div class=" d-block d-md-none">
            <h2>Магазин</h2>
            <div class="row">
              <div class="col-3 text-center">
                <div class="d-inline-block position-relative">
                  <img src="/storage/theme/icons/Avatar.svg" alt="">
                  <button class="btn p-0 position-absolute change-avatar-icon"><img src="/storage/theme/icons/camera.svg" class="" alt=""></button> 
                </div>
              </div>
              <div class="col-9 d-flex justify-content-between order-0 order-lg-1">
                <div>
                  <h3 class="font-weight-bold">Olim H</h3>
                  <span class="text-secondary">Зарафшон</span>
                </div>
                <div>
                  <button type="button" class="btn"><img src="/storage/theme/icons/change.svg" alt=""></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 mt-3 mt-lg-0">
          <div class="market__head-banner w-100 d-flex align-items-start justify-content-between" style="background: url(/storage/theme/yellowbanner.png); background-size: cover;">
            <div class="d-none d-md-flex align-items-center mt-2">
              <button type="button" class="font-weight-bold change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                <img src="/storage/theme/icons/change.svg" alt=""> Изменить
              </button>
              <span class="banner__name-market">Olim H</span>
            </div>
            <div class="mt-3">
              <button type="button" class="font-weight-bold change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3 px-3">
                <img src="/storage/theme/icons/camera.svg" alt="">  Изменить
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--Edit logo and banner end-->
      <!--store info start-->
      <div class="row mt-5">
        <div class="col-12 col-md-6">
          <form action="">
            <div class="form-group d-flex flex-column flex-lg-row justify-content-between align-items-baseline">
              <label class="font-weight-bold h5 text-secondary" for="aboutStore">О магазине: </label>
              <input class="form-control w-75 input_placeholder_style" type="text" name="aboutStore" id="aboutStore">
            </div>
            <div class="form-group d-flex flex-column flex-lg-row justify-content-between align-items-baseline">
              <label class="font-weight-bold h5 text-secondary" for="adress">Адрес: </label>
              <input class="form-control w-75 input_placeholder_style" type="text" name="adress" id="adress">
            </div>
          </form>
        </div>
        <div class="col-12 col-md-6">
          <form action="">
            <div class="form-group d-flex justify-content-between">
              <label class="font-weight-bold h5 text-secondary" for="checkboxes">Город:</label>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="Dushanbe">
                <label for="Dushanbe">Душанбе</label>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="Hujand">
                <label for="Hujand">Худжанд</label>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--store info end-->
    </div>
    <!--customer-navs start-->
    <div class="container-fluid bg-white d-none d-md-block">
      <div class="container px-0 py-4 d-flex justify-content-between">
        <div class="d-flex flex-column flex-lg-row justify-content-between w-50 mr-5">
          <a class="custom-bttn d-flex justify-content-center btn-secondary rounded text-decoration-none text-center px-4 my-2 my-lg-0" href="#"><img class="mr-1" src="/storage/theme/icons/store.svg" alt=""> Мои товары</a>
          <a class="custom-bttn d-flex justify-content-center btn-secondary rounded text-decoration-none text-center px-4 my-2 my-lg-0" href="#"><img class="mr-1" src="/storage/theme/icons/orders.svg" alt=""> История продаж</a>
        </div>
        <div class="d-flex flex-column flex-lg-row justify-content-between w-50 ml-5">
          <a class="custom-bttn d-flex justify-content-center btn-secondary rounded text-decoration-none text-center px-4 my-2 my-lg-0" href="#"><img class="mr-1" src="/storage/theme/icons/add.svg" alt=""> Добавить товар</a>
          <a class="custom-bttn d-flex justify-content-center btn-secondary rounded text-decoration-none text-center px-4 my-2 my-lg-0" href="#"><img class="mr-1" src="/storage/theme/icons/saved.svg" alt=""> Сохраненные </a>
        </div>
      </div>
    </div>
    <!--customer-navs end-->
    <!--tabs with goods start-->
    <div class="container">
      <ul class="nav nav-tabs customer-tab border-0" id="myTab" role="tablist">
        <li class="nav-item position-relative" role="presentation">
          <a class="nav-link active border-0 bg-transparent font-weight-bold" id="all-product-tab" data-toggle="tab" href="#all-product" role="tab" aria-controls="all-product" aria-selected="true">Все <span class="text-secondary">16</span></a>
        </li>
        <li class="nav-item position-relative" role="presentation">
          <a class="nav-link border-0 bg-transparent font-weight-bold" id="punlished-tab" data-toggle="tab" href="#punlished" role="tab" aria-controls="punlished" aria-selected="false">Опубликованные 0</a>
        </li>
        <li class="nav-item position-relative" role="presentation">
          <a class="nav-link border-0 bg-transparent font-weight-bold" id="onChecking-tab" data-toggle="tab" href="#onChecking" role="tab" aria-controls="onChecking" aria-selected="false">На проверке 0</a>
        </li>
        <li class="nav-item position-relative" role="presentation">
          <a class="nav-link border-0 bg-transparent font-weight-bold" id="hidden-tab" data-toggle="tab" href="#hidden" role="tab" aria-controls="hidden" aria-selected="false">Скрыты 0</a>
        </li>
        <li class="nav-item position-relative" role="presentation">
          <a class="nav-link border-0 bg-transparent font-weight-bold" id="declined-tab" data-toggle="tab" href="#declined" role="tab" aria-controls="declined" aria-selected="false">Отклоненные 0</a>
        </li>
        <li class="nav-item position-relative" role="presentation">
          <a class="nav-link border-0 bg-transparent font-weight-bold" id="onDelete-tab" data-toggle="tab" href="#onDelete" role="tab" aria-controls="contact" aria-selected="onDelete">На удаление 0 </a>
        </li>
      </ul>
      
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="all-product" role="tabpanel" aria-labelledby="all-product-tab">
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                      <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                    </button>
                  </p> 
                </div>
              </div>
            </div>
          </div>
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                      <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                    </button>
                  </p> 
                </div>
              </div>
            </div>
          </div>
  
  
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                      <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                    </button>
                  </p> 
                </div>
              </div>
            </div>
          </div>
  
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <p class="buy-bttn text-center mb-0 position-absolute">
                      <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                        <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                      </button>
                    </p> 
                  </p> 
                </div>
              </div>
            </div>
  
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
              <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
                <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
                <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
                <p  class="about-product mb-2" >
                  Lorem Ipsum is simply dummy text.
                </p>
                <div class="price-place position-relative">
                  <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <button type="button" class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3"> 
                      <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                    </button>
                  </p> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="punlished" role="tabpanel" aria-labelledby="punlished-tab">2</div>
        <div class="tab-pane fade" id="onChecking" role="tabpanel" aria-labelledby="onChecking-tab">3</div>
        <div class="tab-pane fade" id="hidden" role="tabpanel" aria-labelledby="hidden-tab">4</div>
        <div class="tab-pane fade" id="declined" role="tabpanel" aria-labelledby="declined-tab">5</div>
        <div class="tab-pane fade" id="onDelete" role="tabpanel" aria-labelledby="onDelete-tab">6</div>
      </div>
      <div class="text-center">
        <button  type="button" class="seller-bttns custom-bttn btn-secondary rounded px-5" > 
          <img src="/storage/theme/icons/add.svg" alt=""> Добавить товар
        </button>
      </div>
    </div>
    <!--tabs with goods end-->
  </section>
@endsection