@extends('dashboard.layouts.app')
@section('title', 'Отмененые заказы')
@extends('dashboard.layouts.aside')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">

        <!-- Header -->
        <div class="header">
          <div class="header-body">

            <div class="row align-items-center">
              <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  список заказов
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                    Отменено <span class="badge badge-pill badge-soft-danger">{{ $orders->count() }}</span>
                </h1>

              </div>
            </div>
            
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link">
                      Все товары <span class="badge badge-pill badge-soft-secondary">{{ $orders->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('orders.accepted') }}" class="nav-link">
                      Выполнено <span class="badge badge-pill badge-soft-success">{{ $orders_stats->where('order_status_id', 3)->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('orders.onCheck') }}" class="nav-link">
                      В ожидании <span class="badge badge-pill badge-soft-warning">{{ $orders_stats->where('order_status_id', 1)->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('orders.onTheWay') }}" class="nav-link">
                      В пути <span class="badge badge-pill badge-soft-primary">{{ $orders_stats->where('order_status_id', 4)->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('orders.returns') }}" class="nav-link">
                      Возврат <span class="badge badge-pill badge-soft-info">{{ $orders_stats->where('order_status_id', 5)->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('orders.canceled') }}" class="nav-link active">
                      Отменен <span class="badge badge-pill badge-soft-danger">{{ $orders->where('order_status_id', 2)->count() }}</span>
                    </a>
                  </li>
                </ul>

              </div>
            </div>

          </div>
        </div>

        <!-- Card -->
        <div class="card" data-list='{"valueNames": ["orders-order", "orders-client", "orders-client-info", "orders-product", "orders-date", "orders-total", "orders-margin", "orders-status", "orders-store", "orders-store-info"]}'>
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
                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-status">
                      Статус
                    </a>
                  </th>

                </tr>
              </thead>
              <tbody class="list">
                @forelse ($orders as $key => $order)
                <tr class="table-@if($order->order_status->id == 1)warning @elseif($order->order_status->id == 2)danger @elseif($order->order_status->id == 4)primary @else()success @endif">
                  <td class="orders-order">
                    #{{ $order->id}}
                  </td>
                  <td class="orders-client">
                    <a href="{{ route('orders.show', $order) }}">
                      {{ $order->user->name ?? $order->user->phone}}
                    </a>
                  </td>
                  <td class="orders-client-info">
                    {{ 'Тел: '.$order->user->phone.', Адрес:'.$order->user->address}}
                  </td>
                  <td class="orders-product">
                    {{ $order->no_scope_product->name}}
                  </td>
                  <td class="orders-store">
                    {{ $order->no_scope_product->no_scope_store->name}}
                  </td>
                  <td class="orders-store-info">
                    {{ 'Тел: '.$order->no_scope_product->no_scope_store->user->phone.', Адрес: '.$order->no_scope_product->no_scope_store->address }}
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
                  <td class="orders-status">
                    <!-- Badge -->
                    <div class="badge badge-primary">
                      {{ $order->order_status->name }}
                    </div>
                  </td>
                </tr>
                @empty
                    <tr>
                        <td class="text-muted h4" colspan="12">Список заказов пуст</td>
                    </tr>
                @endforelse

              </tbody>
            </table>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg">
                    <li class="page-item">
                    </li>
                </ul>
            </nav>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
