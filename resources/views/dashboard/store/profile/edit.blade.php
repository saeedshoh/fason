@extends('dashboard.layouts.app')
@section('title', 'Магазины')
@extends('dashboard.layouts.aside')

@section('content')
<div class="main-content">

  <!-- HEADER -->
  <div class="header">

    <!-- Image -->
    <img src="{{ Storage::url($store->cover) }}" class="header-img-top object-cover" alt="...">

    <div class="container-fluid">

      <!-- Body -->
      <div class="header-body mt-n5 mt-md-n6">
        <div class="row align-items-end">
          <div class="col-auto">

            <!-- Avatar -->
            <div class="avatar avatar-xxl header-avatar-top">
              <img src="{{ Storage::url($store->avatar) }}" alt="..." class="avatar-img rounded-circle border-4 border-body">
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
            <form action="{{ route('stores.destroy', $store) }}" method="POST">
              @csrf
              <button type="submit" href="{{ route('stores.destroy', $store->id) }}"  class="ml-3 btn d-block d-md-inline-block lift btn-danger delete-confirm">
                  <i class="fe fe-trash"> </i></button>
              @method('DELETE')
            </form>
           
          </div>
        </div> <!-- / .row -->
        <div class="row align-items-center">
          <div class="col">

            <!-- Nav -->
            <ul class="nav nav-tabs nav-overflow header-tabs">
              <li class="nav-item">
                <a href="{{ route('showStoreInfo', $store->id) }}" class="nav-link ">
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
      @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="col-12 ">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}

            <!-- Button -->
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>

          </div>
        </div>
        @endforeach
      @endif
      <div class="col-12 col-lg-6">
        <div class="card">
          <div class="card-body">

            <!-- Form -->
            <form action="{{ route('ft-store.update', $store) }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate="">
              @csrf
              @method('PATCH')
              <input type="hidden" name="is_back" value="1">
              <div class="form-row">
                <div class="col-12 col-md-12 mb-3">
                    <label for="name">Название магазина</label>

                    <input type="text" class="form-control" id="name" placeholder="Введите название магазина" name="name" value="{{ $store->name }}">
                  
                </div>
                <div class="col-12 col-md-12 mb-3">
                  <label for="name">Введите адрес</label>

                  <input type="text" class="form-control" id="address" placeholder="Введите адрес" name="address" value="{{ $store->address }}">
                
                </div>
                <div class="col-12 col-md-12 mb-3">
                  <label>Выберите город</label>

                  <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach($cities as $city)
                      <label class="btn btn-white">
                        <input type="radio" name="city_id" id="city_{{ $city->id }}" value="{{ $city->id }}" {{ $store->city_id == $city->id ? 'checked' : '' }}> <i class="fe fe-check-circle"></i> {{ $city->name }}
                      </label>
                    @endforeach
                  </div>
                  
                </div>
                <div class="col-12 col-md-12 mb-3">
                  <label for="name">Введите описание</label>

                  <textarea type="text" class="form-control" id="desciption" name="description" required="" rows="6"> {{ $store->description }}</textarea>
                
                </div>
              </div>
              <!-- Button -->
              <button class="btn btn-primary mt-2" type="submit">Изменить</button>

            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="card">
          <div class="card-body">

            <div class="form-row">
              <div class="col-12 col-md-12 mb-3">
                <label for="name">Выберите фон</label>

                <input type="file" class="form-control" id="cover" name="cover" value="{{ $store->cover }}">
                  
              </div>
              <div class="col-12 col-md-12 mb-3">
                <label for="name">Выберите аватарку</label>

                <input type="file" class="form-control" id="avatar" name="avatar" value="{{ $store->avatar }}">
              
              </div>
            </div>
        </div>
      </div>
      
      
      
      
    </div> <!-- / .row -->
    
    

  </div>
</div>
@endsection
