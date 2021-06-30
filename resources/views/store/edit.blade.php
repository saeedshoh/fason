@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Изменение магазина
@endsection
@extends('layouts.footer')
@section('content')
<section class="content mb-3 mb-lg-0">
  <div class="container">
    <!--Edit logo and banner start-->
    @if ($errors->any())
        <div class="alert alert-danger my-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ft-store.update', $store->id) }}" novalidate enctype="multipart/form-data" method="POST" id="update-store">
      @csrf
      @method('PATCH')
      <div class="row mt-sm-3">
        <div class="col-md-3 px-0 px-md-2 position-relative">
          <div class="text-center d-none d-md-block">
            <label for="avatar">
              <img src="/storage/{{ $store->avatar ?? 'theme/avatar_store.svg' }}" class="w-100 rounded" id="avatar-poster" height="216">
            </label>
            <div class="edit-store-logo position-absolute w-100">

              <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt="">
                Изменить
                <input type="file" accept="image/*"  class="d-none" id="avatar" name="avatar">
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-9 px-0 px-md-2 position-relative">
          <label for="cover">
            <img src="/storage/{{ $store->cover ?? 'theme/banner_store.svg' }}" class="w-100 rounded store-image" id="cover-poster-mobile" height="216">
          </label>
          <div class="change-banner position-absolute">
            <label for="cover" class="btn btn-edit rounded-pill">
              <img src="/storage/theme/icons/camera.svg" height="14px" class="mr-1 mw-100 align-text-top">Изменить
              <input type="file" accept="image/*"  class="d-none" id="cover" name="cover">
            </label>
          </div>
        </div>
        <div class="col-12 d-block d-md-none mt-5">
          <h2>Магазин</h2>
          <div class="row">
            <div class="col-4 text-center justify-items-center align-self-center">
              <div class="d-inline-block position-relative">
                <img src="/storage/{{ $store->avatar ?? 'theme/avatar_store.svg' }}" class="rounded-circle" width="75" height="75" id="avatar-poster-mobile">
                <label for="avatar" class="btn position-absolute change-avatar-icon m-0 d-flex">
                  <img class="mr-1 mw-100  align-text-top" src="/storage/theme/icons/camera.svg">Изменить
                </label>
              </div>
            </div>
            <div class="col-8 d-flex justify-content-between order-0 order-lg-1">
              <div>
                <h3 class="font-weight-bold">{{ $store->name }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Edit logo and banner end-->
      <!--store info start-->

      <div class="row mt-5">
        <div class="col-12 col-lg-9">
          <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label text-muted font-weight-bold">Название магазина</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="name" form="update-store" id="nameEditStore" value="{{ old('name') ? old('name') : $store->name }}" required>
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
            <div class="col-sm-8">
              <input class="form-control" type="text" name="address" id="address" value="{{ old('address') ? old('address') : $store->address }}" form="update-store" required>
              <div class="invalid-feedback">
                Поле адрес магазина обязательно для заполнения.
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-4 col-form-label text-muted font-weight-bold">О магазине:</label>
            <div class="col-sm-8">
              <textarea class="form-control" type="text" name="description" rows="5" id="description" form="update-store" required>{{ old('description') ? old('description') : $store->description }}</textarea>
              <div class="invalid-feedback">
                Поле описание магазина обязательно для заполнения.
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-3">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label text-muted font-weight-bold">Город:</label>
            <div class="col-sm-8">
              <div class="form-group row form-check">
                @foreach ($cities as $city)
                <div class="col-sm-6">
                    <input class="form-check-input" form="update-store" type="radio" name="city_id" id="city_id_{{ $city->id }}" value="{{ $city->id }}" @if($store->city->id == $city->id) checked @endif required>
                    <label class="form-check-label" for="city_id_{{ $city->id }}">
                        {{ $city->name }}
                    </label>
                </div>
                @endforeach
                <div class="invalid-feedback">
                    Выберите город
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row mb-5 mb-lg-0">
            <div class="col mb-3">
              <button type="submit" data-id="{{ $store->id }}" class="col-sm-12 col-12 btn rounded-11 px-3 btn-danger" id="storeEditSubmit" form="update-store">Отправить</button>
              {{--  $store->is_active == 2 это если пользователь отключил магазин  --}}
              @if($store->is_active)
                <form action="{{ route('ft-store.toggleUser', $store->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="rounded-11 btn @if($store->is_active == 0 || $store->is_active == 2)btn-success restore-store @else btn-outline-secondary  delete-store @endif my-1 w-100 mt-3">
                        @if($store->is_active == 0 || $store->is_active == 2)
                            Включить
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="-40 0 427 427.00131" width="15px"><path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/></svg>
                            Отключить
                        @endif
                    </button>
                </form>
                @endif
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
