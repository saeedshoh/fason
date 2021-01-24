@extends('dashboard.layouts.app')
@section('title', 'Заказы')
@extends('dashboard.layouts.aside')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">

        <!-- Header -->
        <div class="header">
          <div class="header-body border-0">
            <div class="row align-items-center">
              <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  список заказов
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Все заказы <span class="badge badge-pill badge-soft-secondary">{{ $orders->count() }}</span>
                </h1>

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
                <tr class="table-@if($order->order_status->id == 1)warning @elseif($order->order_status->id == 2)danger @else()success @endif">
                  <td class="orders-order">
                    #{{ ++$key}}
                  </td>
                  <td class="orders-client">
                    <a href="{{ route('orders.show', $order) }}">
                      {{ $order->user->name}}
                    </a>
                  </td>
                  <td class="orders-client-info">
                    {{ 'Тел: '.$order->user->phone.', Адрес:'.$order->user->address}}
                  </td>
                  <td class="orders-product">
                    {{ $order->product->name}}
                  </td>
                  <td class="orders-store">
                    {{ $order->product->store->name}}
                  </td>
                  <td class="orders-store-info">
                    {{ 'Тел: '.$order->product->store->user->phone.', Адрес: '.$order->product->store->address}}
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
