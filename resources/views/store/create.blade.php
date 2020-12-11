@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
<section class="content">
  <div class="container">
    <!--Edit logo and banner start-->
    <form action="{{ route('ft-store.store') }}" enctype="multipart/form-data" method="POST">
      @method('POST')
      @csrf
      <div class="row mt-3">
        <div class="col-md-3 px-0 px-md-2 position-relative">
          <div class="text-center d-none d-md-block">
            <img src="/storage/theme/itpark.png" class="w-100 rounded" id="avatar-poster" height="216">
            <div class="edit-store-logo position-absolute w-100">
              <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt=""> 
                Изменить
                <input type="file" class="d-none" id="avatar" name="avatar">
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-9 px-0 px-md-2 position-relative">
          <img src="/storage/theme/yellowbanner.png" class="w-100 rounded store-image" id="cover-poster" height="216">
         
          <div class="change-banner position-absolute">
            <label for="cover" class="btn btn-edit rounded-pill">
              <img src="/storage/theme/icons/camera.svg" height="14px" class="mr-1 mw-100 align-text-top">Изменить
              <input type="file" class="d-none" id="cover" name="cover">
            </label>
          </div>
        </div>
        <div class="col-12 d-block d-md-none">
          <h2>Магазин</h2>
          <div class="row">
            <div class="col-3 text-center">
              <div class="d-inline-block position-relative">
                <img src="/storage/theme/icons/Avatar.svg">
                <label for="avatar" class="btn p-0 position-absolute change-avatar-icon">
                  <img src="/storage/theme/icons/camera.svg">  Изменить
                </label>
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
      <!--Edit logo and banner end-->
      <!--store info start-->
      <div class="row mt-5">
        <div class="col-12 col-lg-6">
          <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label text-muted font-weight-bold">Название магазина</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-4 col-form-label text-secondary font-weight-bold">Aдресс:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-4 col-form-label text-muted font-weight-bold">О магазине:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="description" id="description" value="{{ old('description') }}">
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label text-muted font-weight-bold">Город:</label>
            <div class="col-sm-8">
              <div class="form-group row form-check">
                <div class="col-sm-6">
                  <input type="checkbox" value="1" name="city_id" class="form-check-input" id="Dushanbe">
                  <label for="Dushanbe">Душанбе</label>
                </div>
                <div class="col-sm-6">
                  <input type="checkbox" value="2" name="city_id" class="form-check-input" id="hujand">
                  <label for="hujand">Худжанд</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <button type="submit" class="btn rounded px-3 btn-danger">Отправить</button>
          </div>
        </div>
      </div>
    </form>
    <!--store info end-->
  </div>
  <!--customer-navs start-->
  <div class="container-fluid bg-white py-3 d-none d-md-block">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-secondary w-100" href="#"><img class="mr-1" src="/storage/theme/icons/store.svg" alt="">  Мои товары</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-secondary w-100" href="#"><img class="mr-1" src="/storage/theme/icons/orders.svg" alt="">  История продаж</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100" href="#"><img class="mr-1" src="/storage/theme/icons/add.svg" alt="">  Добавить товар</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-secondary w-100" href="#"><img class="mr-1" src="/storage/theme/icons/saved.svg" alt="">  Сохраненные</a>
        </div>
      </div>
    </div>
  </div>
  <!--customer-navs end-->
  <!--tabs with goods start-->
  <div class="container">
    <ul class="nav nav-tabs customer-tab border-0">
      <li class="nav-item position-relative">
        <a class="nav-link active border-0 font-weight-bold" id="all-product-tab" data-toggle="tab" href="#all-product"  aria-selected="true">Все 16</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="published-tab" data-toggle="tab" href="#published"  aria-selected="false">Опубликованные 0</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="onChecking-tab" data-toggle="tab" href="#onChecking" aria-selected="false">На проверке 0</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="hidden-tab" data-toggle="tab" href="#hidden" aria-selected="false">Скрыты 0</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="declined-tab" data-toggle="tab" href="#declined" aria-selected="false">Отклоненные 0</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="onDelete-tab" data-toggle="tab" href="#onDelete"  aria-selected="false">На удаление 0 </a>
      </li>
    </ul>
    <!--Tab-content>-->
    <div class="tab-content" id="myTabContent">
      <!--all-product-->
      <div class="tab-pane fade show active" id="all-product" role="tabpanel" aria-labelledby="all-product-tab">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
          <div class="col d-flex mb-3 mb-lg-0 px-1 px-md-2">
            <div class="position-relative bg-white border product-place text-center py-3 px-2">
              <img class="my-md-5 my-3 img-fluid" src="/storage/theme/Products/tablet.png" alt="">
              <h4 class="product-name shop-subject">Samsung g12312 45D </h4>
              <p class="about-product mb-2">
                Lorem Ipsum is simply dummy text.
              </p>
              <div class="price-place position-relative">
                <h3 class="product-price mt-4 position-relative">ЦЕНА: $116</h3>
                <p class="buy-bttn text-center mb-0 position-absolute">
                  <p class="buy-bttn text-center mb-0 position-absolute">
                    <button type="button"
                      class="change-hover__bttn change-bttn btn btn-outline-dark rounded-pill  ml-4 mr-3  px-3">
                      <img src="/storage/theme/icons/change.svg" alt=""> Изменить
                    </button>
                  </p>
                </p>
              </div>
            </div>
          </div>


        </div>
      </div>
      <!--All product-end-->
      <!--Published-tab-->
      <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
        2
      </div>
      <!--Published-tab end-->
      <!--On Checking-->
      <div class="tab-pane fade" id="onChecking" role="tabpanel" aria-labelledby="onChecking-tab">
        3
      </div>
      <!--On Checking end-->
      <!--Hidden-->
      <div class="tab-pane fade" id="hidden" role="tabpanel" aria-labelledby="hidden-tab">
        4
      </div>
      <!--Hidden end-->
      <!--Declined-->
      <div class="tab-pane fade" id="declined" role="tabpanel" aria-labelledby="declined-tab">
        5
      </div>
      <!--Declined end-->
      <!--On Delete-->
      <div class="tab-pane fade" id="onDelete" role="tabpanel" aria-labelledby="onDelete-tab">
        6
      </div>
      <!--On Delete end-->
    </div>
    <!--Tab content end-->
    <div class="text-center">
      <button type="button" class="btn btn-danger rounded px-5">
        <img src="/storage/theme/icons/add.svg" alt=""> Добавить товар
      </button>
    </div>
  </div>
  <!--tabs with goods end-->
</section>
@endsection