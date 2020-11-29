@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
<section class="content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-3 mt-5 mt-md-0">
                <div class="w-75 mx-auto text-center ">
                    <div class="position-relative d-inline-block">
                        <img src="/storage/theme/itpark.png" class="h-100 mw-100" alt="">
                        <button class="btn p-0 position-absolute change-avatar-icon">
                            <img src="/storage/theme/icons/camera.svg" class="" alt=""></button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="copywright-txt d-none d-lg-block">
                    <p>Copywright will prowide is wonderful serenity has taken possession of my entire as soul, like
                        these sweet mornings of spring which I enjoy with my whole heart. I am alone standards.</p>
                    <a href="#" class="copywright__gideline mt-3 text-success"> Read our Buyer gidelines </a>
                </div>
                <div class="market-info__change mt-5 mt-lg-0">
                    <form action="">
                        <div class="form-group row mb-2">
                            <label for="inputChar1"
                                class="market-info__caption col-sm-8 col-form-label w-75 d-none d-lg-block">Телефон:</label>
                            <div class="col-12 col-lg-4 text-center text-lg-left">
                                <p class="market-info__value">{{ $store->user->phone }} 
                                    <img src="/storage/theme/icons/change.svg" class="align-bottom" height="25px" alt="">
                                </p>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="" class="market-info__caption col-12 col-lg-8">Город :</label>
                            <div class="col-12 col-lg-4">
                                <p class="market-info__value">{{ $store->city->name }} <img src="/storage/theme/icons/change.svg" height="25px" alt=""></p>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="inputChar1"
                                class="market-info__caption col-12 col-lg-8 col-form-label w-75">Имя:</label>
                            <div class="col-sm-4 d-flex align-items-center ">
                                <p class="market-info__value">{{ $store->user->name }} 
                                    <img src="/storage/theme/icons/change.svg" height="25px" alt="">
                                </p>
                            </div>
                        </div>

                        <div class="form-group text-center text-lg-right">
                            <button type="button" class="seller-bttns custom-bttn btn-secondary rounded px-5"> Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--customer-navs start-->
    <div class="container-fluid bg-white d-none d-md-block">
        <div class="container px-0 py-4 d-flex justify-content-between">
            <div class="d-flex flex-column flex-lg-row justify-content-between w-50 mr-5">
                <a class="custom-bttn d-flex justify-content-center btn-secondary rounded text-decoration-none text-center px-4 my-2 my-lg-0"
                    href="#"><img class="mr-1" src="/storage/theme/icons/store.svg" alt=""> Мои товары</a>
                <a class="custom-bttn d-flex justify-content-center btn-secondary rounded text-decoration-none text-center px-4 my-2 my-lg-0"
                    href="#"><img class="mr-1" src="/storage/theme/icons/orders.svg" alt=""> История продаж</a>
            </div>
            <div class="d-flex flex-column flex-lg-row justify-content-between w-50 ml-5">
                <a class="custom-bttn d-flex justify-content-center btn-secondary rounded text-decoration-none text-center px-4 my-2 my-lg-0"
                    href="#"><img class="mr-1" src="/storage/theme/icons/add.svg" alt=""> Добавить товар</a>
                <a class="custom-bttn d-flex justify-content-center btn-secondary rounded text-decoration-none text-center px-4 my-2 my-lg-0"
                    href="#"><img class="mr-1" src="/storage/theme/icons/saved.svg" alt=""> Сохраненные </a>
            </div>
        </div>
    </div>
    <!--customer-navs end-->

    <div class="all-product container mt-5">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
            <div class="col d-flex align-items-center justify-content-center mb-3 mb-lg-0 px-1 px-md-2">
                <div
                    class="line-test__order-cancled position-relative bg-white border-lg-0 border product-place text-center h-100 w-100 py-3 px-2">
                    <img class="product-pic my-md-5 my-3" src="/storage/theme/Products/tablet.png" alt="">
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
        <div class="products-status position-relative row justify-content-center">
            <div class="info-status__products status-success col-12 col-lg-2 mx-1"> Заказ выполнен</div>
            <div class="info-status__products status-cancled col-12 col-lg-2 mx-1"> Заказ отменен </div>
            <div class="info-status__products status-preparing col-12 col-lg-2  mx-1"> В пути</div>
        </div>
    </div>
</section>
@endsection