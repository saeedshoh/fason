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
                <a href="{{ route('showStoreInfo', $store->id) }}" class="nav-link ">
                  Главная
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('store.profile_orders', $store->id) }}" class="nav-link active">
                  Заказы
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('store.profile_products', $store->id) }}" class="nav-link">
                  Товары
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
      <div class="col-12">
        <div class="card">
            <div class="card-header">

                <!-- Search -->
                <form>
                <div class="input-group input-group-flush">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fe fe-search"></i>
                    </span>
                    </div>
                    <input class="form-control" type="search" placeholder="Поиск" data-item="show/{{ $store->id }}/orders" id="search" value="{{ request()->search }}">
                </div>
                </form>

            </div>
            <div id="show_orders">
            <div class="table-responsive">
              <table class="table table-sm table-nowrap card-table">
                  <thead>
                      <tr>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-order">
                                  №
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-client">
                                  Клиент
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-client-info">
                                  Контакты клиента
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-product">
                                  Товар
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-store">
                                  Магазин
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-store-info">
                                  Контакты магазина
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-date">
                                  Дата заказа
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-total">
                                  Цена
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-margin">
                                  Маржа
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-grand-total">
                                  Итого
                              </a>
                          </th>
                          <th>
                              <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-status">
                                  Статус
                              </a>
                          </th>

                          <th>

                          </th>

                      </tr>
                  </thead>
                  <tbody class="list">
                      @forelse ($orders as $key => $order)
                      <tr class="table-@if($order->order_status->id == 1)warning @elseif($order->order_status->id == 2)danger @elseif($order->order_status->id == 4)primary @elseif($order->order_status->id == 5)secondary @else()success @endif">
                          <td class="orders-order">
                              #{{ $order->id}}
                          </td>
                          <td class="orders-client">
                              <a href="{{ route('orders.show', $order) }}">
                                  {{ $order->user->name ?? $order->user->phone}}
                              </a>
                          </td>
                          <td class="orders-client-info">
                              {{ 'Тел: '.$order->user->phone.', Город: '.$order->user->city->name.', Адрес:'.$order->user->address}}
                          </td>
                          <td class="orders-product">
                              {{ $order->no_scope_product->name}}
                          </td>
                          <td class="orders-store">
                              {{ $order->no_scope_product->no_scope_store->name}}
                          </td>
                          <td class="orders-store-info">
                              {{ 'Тел: '.$order->no_scope_product->no_scope_store->user->phone.', Город: '.$order->no_scope_product->no_scope_store->city->name.', Адрес: '.$order->no_scope_product->no_scope_store->address }}
                          </td>
                          <td class="orders-date">
                              <!-- Time -->
                              <time datetime="{{ $order->created_at->format('d/m/Y') }}">{{ $order->created_at->format('d-m-Y') }}</time>
                          </td>
                          <td class="orders-total">
                              {{ $order->total}} Сомони
                          </td>
                          <td class="orders-margin">
                              {{ $order->margin}} Сомони
                          </td>
                          <td class="orders-margin">
                              {{ $order->total + $order->margin}} Сомони
                          </td>
                          <td class="orders-status">
                              <!-- Badge -->
                              <div class="badge badge-primary">
                                  {{ $order->order_status->name }}
                              </div>
                          </td>

                          <td class="text-right py-0">
                                  <a href="{{ route('orders.show', $order) }}" class="btn btn-primary m-1 pull-right">
                                      <i class="fe fe-edit"></i>
                              </a>
                          </td>
                      </tr>
                      @empty
                      <tr>
                          <td class="text-muted h4" colspan="12">Список заказов пуст</td>
                      </tr>
                      @endforelse

                  </tbody>
              </table>

              <div class="text-muted h4 no-result p-3 m-1" style="display: none">Список заказов пуст</div>
          </div>
          <div class="card-footer d-flex justify-content-center">
              <nav>
                  {{ $orders->links() }}
              </nav>
          </div>
        </div>
      </div>


    </div> <!-- / .row -->



  </div>
</div>
@endsection
