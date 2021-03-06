@extends('layouts.app')
@extends('layouts.header')
@section('title')
  Добавление нового магазина
@endsection
@extends('layouts.footer')
@section('content')
<section class="content">
  <div class="container">
    <!--Edit logo and banner start-->

    <div class="row d-flex d-md-none create-store">
      <div class="col-4"><a href="javascript:history.back()" class="text-pinky font-weight-bold text-decoration-none" > <img src="/storage/theme/icons/back.svg" alt=""> Назад</a></div>
      <div class="col-8 d-flex align-items-center justify-content-end"><h6 class="font-weight-bold text-right text-opacity-low mb-0">Информация о магазине</h6></div>
      <div class="col-12">
        <p class="text-justify small my-3 text-muted">
          Fason.tj - предоставляет всем предпринимателям возможность бесплатно размещать товары на площадке, так же мы облегчаем работу как продаваца так и покупателя и осуществляем доставку.
        </p>
      </div>
    </div>
    <form class="d-md-block d-flex flex-column" action="{{ route('ft-store.store') }}" novalidate enctype="multipart/form-data" method="POST">
      @method('POST')
      @csrf
      <div class="row mt-sm-3 order-1">
        <div class="col-md-3 px-0 px-md-2 position-relative">
          <div class="text-center d-none d-md-block">
            <label for="avatar" class="cursor-pointer">
              <img src="/storage/theme/avatar_store.svg" class="w-100 rounded" id="avatar-poster" height="216">
            </label>
            <div class="edit-store-logo position-absolute w-100">
              <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt="">
                Изменить
                <input type="file" accept="image/*"  class="d-none" id="avatar" name="avatar">
              </label>
            </div>
          </div>
          <div class="d-none d-md-block">
            <div class="photo_describe_size">
              <span class="text-muted">Фотография профиля <span class="badge badge-danger">размером 270х215</span></span>
            </div>
          </div>
        </div>
        <div class="col-md-9 px-md-2 position-relative">
          <div class="d-block d-md-none mb-3 mt-3">
            <span class="text-muted">Фотография баннера <span class="badge badge-danger"> размером 8840х215</span></span>
          </div>
          <label for="cover" class="cursor-pointer w-100">
            <img src="/storage/theme/banner_store.svg" class="w-100 rounded store-image object-cover" id="cover-poster-mobile" height="216">
          </label>
          <div class="change-banner position-absolute d-none d-md-block">
            <label for="cover" class="btn btn-edit rounded-pill">
              <img src="/storage/theme/icons/camera.svg" height="14px" class="mr-1 mw-100 align-text-top">Изменить
              <input type="file" accept="image/*"  class="d-none" id="cover" name="cover">
            </label>
          </div>
          <div class="d-md-none">
            <div class="my-3">
              <h5 class="text-secondary font-weight-bold">Добавить фотографию профиля</h5>
              <span class="text-muted">Фотография профиля <span class="badge badge-danger">размером 270х215</span></span>
            </div>
            <label for="avatar" class="cursor-pointer text-center w-100">
              <img src="/storage/theme/avatar_store.svg" class="store-image" width="120" height="120" id="avatar-poster-mobile">
            </label>
          </div>
          <div class="form-group row d-md-none">
            <div class="col my-3">
              <button type="submit" class="col-12 btn rounded-11 px-3 btn-danger font-weight-bold storeSubmit" id="storeSubmit">Создать магазин</button>
            </div>
          </div>
          <div class="d-none d-md-block photo_describe_size">
            <span class="text-muted">Фотография профиля размером 840х215</span>
          </div>
        </div>
        <div class="col-12 d-block d-md-none mt-5">
          <h2 class="d-none d-md-block">Магазин</h2>
        </div>
      </div>
      <!--Edit logo and banner end-->
      <!--store info start-->
      <div class="row mt-3 order-0">
        <div class="col-12 col-lg-9">
          <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label text-muted font-weight-bold">Название магазина</label>

            <div class="col-sm-8 input-group">
              <div class="input-group-prepend position-relative bg-white border-0">
                <div class="input-group-text @error('name') border-danger  @enderror  btn-link btn-custom-fs text-decoration-none px-1"></div>
              </div>
              <input class="form-control border-left-0 @error('name') is-invalid @enderror" type="text" name="name" id="nameStoreCreate" value="{{ old('name') }}" required>
                <div class="invalid-feedback">
                  Поле название магазина обязательно для заполнения.
                </div>
              <div class="store-exist d-none mt-1 text-danger">
                <small>Магазин с таким названием уже зарегистрирован</small>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-4 col-form-label text-secondary font-weight-bold">Aдрес:</label>
            <div class="col-sm-8 input-group">
              <div class="input-group-prepend position-relative bg-white border-0">
                <div class="input-group-text @error('address') border-danger  @enderror  btn-link btn-custom-fs text-decoration-none px-1"></div>
              </div>
              <input class="form-control border-left-0 @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}" required>
              <div class="invalid-feedback">
                Поле адрес магазина обязательно для заполнения.
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-4 col-form-label text-muted font-weight-bold">О магазине:</label>
            <div class="col-sm-8 input-group">
              <div class="input-group-prepend position-relative bg-white border-0">
                <div class="input-group-text @error('description') border-danger  @enderror btn-link btn-custom-fs text-decoration-none px-1"></div>
              </div>
              <textarea class="form-control border-left-0 @error('description') is-invalid @enderror" type="text" name="description" rows="5" id="description" required>{{ old('description') }}</textarea>
              <div class="invalid-feedback">
                Поле описание магазина обязательно для заполнения.
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-3">
          <div class="form-group row flex-column">
            <label class="col-sm-4 col-form-label text-muted font-weight-bold">Город:</label>
            <div class="col-sm-8">
              <div class="form-group row form-check mb-md-1">
                <div class="col-sm-12">
                    @foreach ($cities as $city)
                        <input class="form-check-input" type="radio" name="city_id" id="city_id_{{ $city->id }}" {{ old('city_id') == $city->id ? 'checked' : ''}} value="{{ $city->id }}" required>
                        <label class="form-check-label mr-5 mr-lg-0" for="city_id_{{ $city->id }}">
                            {{ $city->name }}
                        </label><br>
                    @endforeach
                    <div class="invalid-feedback">
                        Выберите город
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row d-none d-md-block">
            <div class="col mb-3">
              <button type="submit" class="col-12 btn rounded-11 px-3 btn-danger storeSubmit" id="storeSubmit">Отправить</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--store info end-->
  </div>

  <!--tabs with goods end-->
</section>
<style>
  body {
    position: relative;
  }
</style>
<div class="success-preloader d-none" style="height: 100vh;">
  <img src="/storage/Spinner-1s-200px.svg" alt="" srcset="">
</div>
@endsection
