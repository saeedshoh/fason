@extends('dashboard.layouts.app')
@section('title', 'Магазины')
@extends('dashboard.layouts.aside')

@section('content')
<div class="main-content">

  <!-- HEADER -->
  <div class="header">


    <!-- Image -->
    <img src="/storage/{{ $store->cover ?? 'theme/banner_store.svg' }}" class="header-img-top object-cover" alt="...">

    <div class="container-fluid">

      <!-- Body -->
      <div class="header-body mt-n5 mt-md-n6">
        <div class="row align-items-end">
          <div class="col-auto">

            <!-- Avatar -->
            <div class="avatar avatar-xxl header-avatar-top">
              <img src="/storage/{{ $store->avatar ?? 'theme/avatar_store.svg' }}" alt="..." class="avatar-img rounded-circle border border-4 border-body">
            </div>

          </div>
          <div class="col mb-3 ml-n3 ml-md-n2">

            <!-- Pretitle -->
            <h6 class="header-pretitle">
              магазин
            </h6>

            <!-- Title -->
            <h1 class="header-title">
              {{ $store->name }}
            </h1>
          </div>

          <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3 d-flex">
            <form action="{{ route('ft-store.toggle', $store->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <button href="{{ route('ft-store.toggle', $store) }}" type="submit" class="btn d-block d-md-inline-block lift @if($store->is_moderation)btn-primary @elseif($store->is_active == 0) btn-success @else btn-warning @endif">
                <i class="fe @if($store->is_moderation) fe-feather @elseif($store->is_active == 0) fe-check @else fe-x @endif" aria-hidden="true"></i>
                @if($store->is_moderation) Принять модерацию @elseif($store->is_active == 0) Включить магазин @else Отключить магазин @endif
              </button>
            </form>
            <!-- Button -->
            <a href="{{ route('store.profile_edit', $store) }}" class="ml-3 btn btn-primary d-block d-md-inline-block lift">
              Изменить
            </a>

          </div>
        </div> <!-- / .row -->
        <div class="row align-items-center">
          <div class="col">

            <!-- Nav -->
            <ul class="nav nav-tabs nav-overflow header-tabs">
              <li class="nav-item">
                <a href="{{ route('showStoreInfo', $store->id) }}" class="nav-link active">
                  Главная
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('store.profile_orders', $store->id) }}" class="nav-link ">
                  Заказы
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('store.profile_products', $store->id) }}" class="nav-link">
                  Продукты
                </a>
              </li>
            </ul>

          </div>
        </div>
      </div> <!-- / .header-body -->

    </div>
  </div>

  <!-- CONTENT -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-6">

        <!-- Card -->
        <div class="card">
          <div class="card-header">

            <h4 class="card-header-title font-weight-bold">
              Информация
            </h4>

          </div>
          <div class="card-body">
            <!-- Card -->
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Название</small> <small>{{ $store->name }}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Владелец</small> <small>{{ $store->user->name }}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Телефон</small> <small><a href="tel:+992{{ $store->user->phone }}" class="text-body">{{ $store->user->phone }}</a></small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Город</small> <small>г. {{ $store->city->name ?? ''}}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Адрес</small> <small>{{ $store->address }}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Аватарка</small> <i class="fe {{ $store->avatar ? 'fe-check-circle text-success' : 'fe-alert-triangle text-danger'}}"></i>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Фоновое изображение</small> <i class="fe {{ $store->cover ? 'fe-check-circle text-success' : 'fe-alert-triangle text-danger'}}"></i>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">

        @if($store_edit == null)
        <div class="card bg-dark h-75 justify-content-center">
          <h3 class="font-weight-bold text-center text-white">
            Пока модерации нету
          </h3>
        </div>
        <!-- Card -->
        @else
        <div class="card">
          <div class="card-header">

            <h4 class="card-header-title font-weight-bold">
              Информация после модерации
            </h4>

          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Название</small> <small>{{ $store_edit->name }}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Владелец</small> <small>{{ $store->user->name }}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Телефон</small> <small><a href="tel:+992{{ $store->user->phone }}" class="text-body">{{ $store->user->phone }}</a></small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Город</small> <small>{{ $store_edit->city->name }}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Адрес</small> <small>{{ $store_edit->address }}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Аватарка</small> <i class="fe {{ $store_edit->avatar ? 'fe-check-circle text-success' : 'fe-alert-triangle text-danger'}}"></i>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Фоновое изображение</small> <i class="fe {{ $store_edit->cover ? 'fe-check-circle text-success' : 'fe-alert-triangle text-danger'}}"></i>
              </li>
            </ul>
          </div>
        </div>
        @endif
      </div>

    </div> <!-- / .row -->

  </div>
</div>
@endsection
