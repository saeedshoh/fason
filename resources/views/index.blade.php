@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
  

  <section class="content mt-4 mx-3 mx-lg-1">
    <div class="d-block under-menu-category container" >
      <div class="row">
        <div class="col-12 col-md-4 col-lg-3"> 
          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle font-weight-bold category-dropdown position-relative" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Категории
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-6 d-none d-md-flex">
            <a href="{{ route('store.open') }}">
                <button type="button" class="custom-bttn mr-2 rounded px-3"> 
                    <i class="fas fa-door-open"></i>Открыть магазин</button>
            </a>
            <button type="button" class="custom-bttn mr-2 rounded px-3"><img src="storage/theme/icons/orders.svg"> Мои заказы</button>
            <button type="button" class="custom-bttn mr-2 rounded px-3" ><img src="storage/theme/icons/saved.svg" alt=""> Сохраненные</button>
        </div>
        <div class="col-12 col-lg-3 d-none d-lg-flex justify-content-center justify-content-lg-end">
          <a class="profile-img"> <img class="rounded-circle" src="storage/theme/profile.png" alt=""></a>
          <a class="shop-subject ml-2 mr-3"  href="">colibri</a>
          <button type="button" class="custom-bttn mr-2 rounded  float-right px-3"  data-toggle="modal" data-target="#enter_site" >
            <i class="fas fa-sign-in-alt"></i> Вход
          </button>
        </div>
      </div>
    </div>
<!--Category list and carousel-->
    <div class="slider_and_sides container mt-4"> 
      <div class="row">
        <div class="categories-site_products overflow-auto col-12 col-lg-4 px-0 order-1 order-lg-0 bg-white">
          <ul class="shop-subject list-group list-group-flush h-100 d-flex justify-content-center">
            <li class="list-group-item"> <img src="storage/theme/icons/kids.svg" height="20" width="20" alt=""> Всё для детей </li>
            <li class="list-group-item"><img src="storage/theme/icons/technics.svg" height="20" width="20" alt=""> Электроника</li>             
            <li class="list-group-item"><img src="storage/theme/icons/computers.svg"  height="20" width="20" alt="" > Компьютеры</li>
            <li class="list-group-item"><img src="storage/theme/icons/smartphones.svg" height="20" width="20" alt=""> Телефоны и аксессуары</li>
            <li class="list-group-item"><img src="storage/theme/icons/male-clothes.svg" height="20" width="20">Мужская одежда</li>
            <li class="list-group-item"><img src="storage/theme/icons/purse-and-shoes.svg" height="20" width="20" alt=""> Сумки и обувь</li>
            <li class="list-group-item"><img src="storage/theme/icons/female-cloth.svg" height="20" width="20" alt=""> Женская одежда</li>
            <li class="list-group-item"><img src="storage/theme/icons/for-car.svg" height="20" width="20" alt=""> Все для авто</li>
            <li class="list-group-item"><img src="storage/theme/icons/watches.svg" alt="">Часы</li>
          </ul>
        </div>
        <div class="col-12 col-lg-8 order-0 order-lg-1 px-0">
          <div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner h-100">
              <div class="carousel-item active h-100">
                <img src="storage/theme/bannerpic_1.png" class="d-block w-100 mw-100 h-100" alt="...">
              </div>
              <div class="carousel-item h-100">
                <img src="storage/theme/bannerpic_2.png" class="d-block w-100 mw-100 h-100" alt="...">
              </div>
              <div class="carousel-item h-100">
                <img src="storage/theme/bannerpic_1.png" class="d-block w-100 mw-100 h-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
<!--Category list end-->
    <div class="all-product container px-0">
    <h2 class="shop-subject title mt-5 mb-4" >Новые товары </h2>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2">
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none"> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>
        
        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>
      </div>

      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center w-100 h-100  py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>
      </div>

      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
          <div class="position-relative bg-white border-lg-0 border product-place text-center h-100  w-100 py-3 px-2">
            <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
            <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
            <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
            <p  class="about-product mb-2" >
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h3  class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
              <p class="buy-bttn text-center mb-0 position-absolute">
                <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
              </p> 
            </div>
          </div>
        </div>
      </div>


      <!-- Топ продаж -->

        <h2 class="shop-subject title mt-5 mb-4" >Топ продаж </h2>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>
          
          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="line-test position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>
        </div>


        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none"> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>
        </div>


        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>

          <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
              <img class="liked-icon position-absolute" src="storage/theme/icons/favourite.svg" alt="">
              <img class="product-pic my-md-5 my-3" src="storage/theme/Products/tablet.png" alt="">
              <h4  class="product-name shop-subject" >Samsung g12312  45D </h4>
              <p  class="about-product mb-2" >
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h5  class="product-price mt-4 position-relative">ЦЕНА: $116</h5>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <a href="#" class="rounded-pill px-5 py-2 custom-bttn text-decoration-none "> Купить </a>
                </p> 
              </div>
            </div>
          </div>
        </div>
      </div>
<!--Partners and markets-->
      <h2 class="shop-subject title mt-5 mb-4 text-center w-100" >Бренды</h2>
      <div class="partners_and_another container">
      <div class="row">  
        <div class="owl-carousel sample-carousel owl-theme">
          <div class="item border px-3 py-3"><img src="storage/theme/icons/Logo_AGES-removebg-preview.svg"  class="mw-100 mh-100" alt=""></div>
          <div class="item border px-3 py-3"><img src="storage/theme/partners/aspec.png" class="mw-100 mh-100" alt=""></div>
          <div class="item border px-3 py-3"><img src="storage/theme/partners/snv.png" class="mw-100 mh-100" alt=""></div>
          <div class="item border px-3 py-3 d-flex align-items-center"><img src="storage/theme/partners/samsung.png" height="50px" class="mw-100 mh-100"  alt=""></div>
          <div class="item border px-3 py-3"><img src="storage/theme/partners/apple.png"  class="mw-100 mh-100" alt=""></div>
          <div class="item border px-3 py-3"><img src="storage/theme/partners/snv.png"  class="mw-100 mh-100"alt=""></div>
          <div class="item border px-3 py-3"><img src="storage/theme/partners/aspec.png" class="mw-100 mh-100"alt=""></div>
          <div class="item border px-3 py-3"><img src="storage/theme/partners/ages.png" class="mw-100 mh-100" alt=""></div>
        </div>
      </div>
      <!--BANNER  -->
      <div class="row under_banner d-none d-lg-block mt-4">
        <div class="col py-4 pl-5 justify-content-around" style="background: url(storage/theme/under_banner.png); width: 100%; height: 135px; font-family: Montserrat;
          font-style: normal;
          font-weight: 800;
          font-size: 30px; color: #FFFFFF;"> <div class="text-center" style="background:#F83A3C; width: 35%;">Lorem Ipsum is <br> simply dummy text.</div> 
        </div>
      </div>
      <!--Banner end-->
      <h2 class="shop-subject title mt-5 mb-4 text-center w-100" >Магазины</h2>
      <div class="owl-carousel markets owl-theme">
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/akhmat.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/korvon.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/mohinav.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/Monn.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/halovat.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/kinder.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/mohinav.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/Monn.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/halovat.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
        <div class="item d-flex flex-column align-items-center">
          <img src="storage/theme/markets/kinder.png" alt="">
          <h3 class="mb-0"><a class="market-name text-dark text-decoration-none position-relative" href="#">Akhmat</a></h3>
          <span class="text-danger font-weight-bold">Товаров: 129</span>
        </div>
     </div>
    </div>
  </section>


 
     
    

@endsection