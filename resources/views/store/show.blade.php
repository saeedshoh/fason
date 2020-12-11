@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
 <!--Header-end-->
  <section class="content profile mt-0 mt-md-5">
    <div class="container">
      <div class="row">
        <!--store logo start-->
        <div class="col-12 col-lg-3">
          <div class="text-center">
            <div class="position-relative d-inline-block">
            <img src="{{ Storage::url($stores->avatar) }}" class="img-fluid" alt="">
              <button class="btn p-0 position-absolute change-avatar-icon"><img src="img/camera.svg" class="" alt=""></button>
            </div>
          </div>
        </div>
        <!--store logo end-->
        <!--store-info start-->
        <div class="col-12 col-lg-9">
          <div class="d-none d-lg-block">
            <p>Copywright will prowide is wonderful serenity has taken possession of my entire as soul, like these sweet
              mornings of spring which I enjoy with my whole heart. I am alone standards.</p>
            <a href="#" class="copywright__gideline mt-3 text-success"> Политика и конфеденцальность </a>
          </div>
          <div class="my-5 my-lg-3">
            <div class="row">
              <div class="col-12 col-md-6">
                <h3 class="font-weight-bold">Телефон:</h3>
              </div>
              <div class="col-12 col-md-6">
                <div class="text-left text-md-right">
                  <h5 class="font-weight-bold h5">
                    {{ $stores->user->phone ?? '' }}
                  </h5>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <h3 class="font-weight-bold">Город:</h3>
              </div>
              <div class="col-12 col-md-6">
                <div class="text-left text-md-right">
                  <h5 class="font-weight-bold h5">
                    {{ $stores->city->name ?? ''}}
                  </h5>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <h3 class="font-weight-bold">Имя:</h3>
              </div>
              <div class="col-12 col-md-6">
                <div class="text-left text-md-right">
                  <h5 class="font-weight-bold h5">
                    {{ $stores->user->name ?? ''}}
                  </h5>
                </div>
              </div>
              <div class="ccol-12 col-md-6">
                <h3 class="font-weight-bold">Адрес:</h3>
              </div>
              <div class="offset-0 offset-md-6 col-12 col-md-6">
                <div class="text-center text-md-right">
                  <a class="btn btn-danger" href="#">Изменить</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--customer-navs start-->
    <div class="container-fluid bg-white py-3 d-none d-md-block">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 my-3 my-lg-0">
            <a class="btn btn-secondary w-100" href="#"><img class="mr-1" src="/storage/theme/icons/sstore.svg" alt="">Мои товары</a>
          </div>
          <div class="col-md-6 col-lg-3 my-3 my-lg-0">
            <a class="btn btn-secondary w-100" href="#"><img class="mr-1" src="/storage/theme/icons/sorders.svg" alt="">История продаж</a>
          </div>
          <div class="col-md-6 col-lg-3 my-3 my-lg-0">
            <a class="btn btn-danger w-100" href="{{ route('ft_product.add_product') }}"><img class="mr-1" src="/storage/theme/icons/sadd.svg" alt="">Добавить товар</a>
          </div>
          <div class="col-md-6 col-lg-3 my-3 my-lg-0">
            <a class="btn btn-secondary w-100" href="#"><img class="mr-1" src="/storage/theme/icons/ssaved.svg" alt="">Сохраненные</a>
          </div>
        </div>
      </div>
    </div>
    <!--customer-navs end-->
    <div class="all-product container mt-5">
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
        <div class="col d-flex mb-3 mb-lg-0 px-1 px-md-3">
          <div class="order-cancled position-relative bg-white border text-center py-3 px-2">
            <img class="img-fluid my-md-5 my-3" src="css/img/Products/tablet.png" alt="">
            <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
            <p class="about-product mb-2">
              Lorem Ipsum is simply dummy text.
            </p>
            <div class="price-place position-relative">
              <h5 class="text-secondary mt-4 position-relative">ЦЕНА: $116</h5>
            </div>
          </div>
        </div>
      </div>
      <h4 class="text-secondary mt-4 text-center w-100">Определение статусов по цвету</h4>
      <div class="products-status position-relative row justify-content-center text-center">
        <div class="info-status__products status-success col-12 col-lg-2 mx-1"> Заказ выполнен</div>
        <div class="info-status__products status-cancled col-12 col-lg-2 mx-1"> Заказ отменен </div>
        <div class="info-status__products status-preparing col-12 col-lg-2  mx-1"> В пути</div>
      </div>
    </div>
  </section>
@endsection