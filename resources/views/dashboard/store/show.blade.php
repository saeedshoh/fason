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
              <img src="{{ Storage::url($store->avatar) }}" alt="..." class="avatar-img rounded-circle border border-4 border-body">
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
              <button href="{{ route('ft-store.toggle', $store) }}" type="submit" class="btn d-block d-md-inline-block lift btn-{{ $store->is_active ? 'warning' : 'success'}}">
                  <i class="fe fe-{{ $store->is_active ? 'x' : 'check'}}" aria-hidden="true"></i>
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
                <small>Адрес</small> <small>{{ $store->address }}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Город</small> <small>{{ $store->city->name }}</small>
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
                <small>Адрес</small> <small>{{ $store_edit->address }}</small>
              </li>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Город</small> <small>{{ $store_edit->city->name }}</small>
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
      
      <div class="col-12">
        <div class="card" data-list="{&quot;valueNames&quot;: [&quot;orders-order&quot;, &quot;orders-product&quot;, &quot;orders-date&quot;, &quot;orders-total&quot;, &quot;orders-status&quot;, &quot;orders-method&quot;]}">
          <div class="card-header">
  
            <!-- Search -->
            <form>
              <div class="input-group input-group-flush">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fe fe-search"></i>
                  </span>
                </div>
                <input class="form-control list-search" type="search" placeholder="Поиск">
              </div>
            </form>

          </div>
          
          <div class="table-responsive">
            <table class="table table-sm table-nowrap card-table">
              <thead>
                <tr>
                  <th>
  
                    <!-- Checkbox -->
                    <div class="custom-control custom-checkbox table-checkbox">
                      <input type="checkbox" class="list-checkbox-all custom-control-input" name="ordersSelect" id="ordersSelectAll">
                      <label class="custom-control-label" for="ordersSelectAll">&nbsp;</label>
                    </div>
  
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="orders-order">
                      Номер заказа
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="orders-product">
                      Товар
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="orders-date">
                      Дата
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="orders-total">
                      Сумма
                    </a>
                  </th>
                  
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="orders-method">
                      Кол/во
                    </a>
                  </th>
                  <th colspan="2">
                    <a href="#" class="text-muted list-sort" data-sort="orders-status">
                      Статус
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody class="list">
                @forelse ($orders as $order)
                  <tr>
                    <td>
    
                      <!-- Checkbox -->
                      <div class="custom-control custom-checkbox table-checkbox">
                        <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                        <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                      </div>
    
                    </td>
                    <td class="orders-order">
                      #{{ $order->id }}
                    </td>
                    <td class="orders-product">
                       {{ $order->name }} 
                    </td>
                    <td class="orders-date">
    
                      <!-- Time -->

                      <time datetime="{{ $order->updated_at->format('d-m-y') }}">{{ $order->updated_at->format('d/m/y') }}</time>
    
                    </td>
                    <td class="orders-total">
                      {{ $order->total }} TJS
                    </td>
                    
                    <td class="orders-method">
                      {{ $order->quantity }} шт
                    </td>
                    <td class="orders-status">
                      <!-- Badge -->
                      <div class="badge @if($order->order_status_id == 1) badge-soft-warning @elseif($order->order_status_id == 2) badge-soft-success @else badge-soft-danger @endif">
                        {{ $order->order_status->name }}
                      </div>
    
                    </td>
                    <td class="text-right">
        
                    </td>
                  </tr>
                @empty
                    
                @endforelse
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
      
    </div> <!-- / .row -->
    
    

  </div>
</div>
@endsection
