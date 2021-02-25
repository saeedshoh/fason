@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Изменение магазина
@endsection
@extends('layouts.footer')
@section('content')
<section class="content">
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

    <form action="{{ route('ft-store.update', $store->id) }}" enctype="multipart/form-data" method="POST">
      @csrf
      @method('PATCH')
      <div class="row mt-sm-3">
        <div class="col-md-3 px-0 px-md-2 position-relative">
          <div class="text-center d-none d-md-block">
            <img src="/storage/{{ $store->avatar ?? 'theme/avatar_store.svg' }}" class="w-100 rounded" id="avatar-poster" height="216">
            <div class="edit-store-logo position-absolute w-100">
              <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt="">
                Изменить
                <input type="file" class="d-none" id="avatar" name="avatar">
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-9 px-0 px-md-2 position-relative">
          <img src="/storage/{{ $store->cover ?? 'theme/banner_store.svg' }}" class="w-100 rounded store-image" id="cover-poster-mobile" height="216">

          <div class="change-banner position-absolute">
            <label for="cover" class="btn btn-edit rounded-pill">
              <img src="/storage/theme/icons/camera.svg" height="14px" class="mr-1 mw-100 align-text-top">Изменить
              <input type="file" class="d-none" id="cover" name="cover">
            </label>
          </div>
        </div>
        <div class="col-12 d-block d-md-none mt-5">
          <h2>Магазин</h2>
          <div class="row">
            <div class="col-4 text-center justify-items-center align-self-center">
              <div class="d-inline-block position-relative">
                <img src="/storage/{{ $store->avatar }}" class="rounded-circle" width="75" height="75" id="avatar-poster-mobile">
                <label for="avatar" class="btn p-0 position-absolute change-avatar-icon m-0">
                  <img src="/storage/theme/icons/camera.svg">
                </label>
              </div>
            </div>
            <div class="col-8 d-flex justify-content-between order-0 order-lg-1">
              <div>
                <h3 class="font-weight-bold">{{ $store->name }}</h3>
                {{-- <span class="text-secondary">Зарафшон</span> --}}
              </div>
              {{-- <div>
                <button type="button" class="btn"><img src="/storage/theme/icons/change.svg" alt=""></button>
              </div> --}}
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
              <input class="form-control" type="text" name="name" id="nameEditStore" value="{{ old('name') ? old('name') : $store->name }}">
              <div class="store-exist d-none mt-1 text-danger">
                <small>Магазин с таким названием уже зарегистрирован</small>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-4 col-form-label text-secondary font-weight-bold">Aдресс:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="address" id="address" value="{{ old('address') ? old('address') : $store->address }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-4 col-form-label text-muted font-weight-bold">О магазине:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="description" id="description" value="{{ old('description') ? old('description') : $store->description }}">
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-3">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label text-muted font-weight-bold">Город:</label>
            <div class="col-sm-8">
              <div class="form-group row form-check">
                <div class="col-sm-6">
                    @foreach ($cities as $city)
                        <input class="form-check-input" type="radio" name="city_id" id="city_id_{{ $city->id }}" value="{{ $city->id }}" @if($store->city->id == $city->id) checked @endif>
                        <label class="form-check-label" for="exampleRadios1">
                            {{ $city->name }}
                        </label>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row mb-5 mb-lg-0">
            <div class="col mb-3">
              <button type="submit" class="col-sm-12 col-12 btn rounded-11 px-3 btn-danger" id="storeEditSubmit">Отправить</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--store info end-->
  </div>

  <!--tabs with goods end-->
</section>
@endsection
