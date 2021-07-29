@extends('dashboard.layouts.app')
@section('title', 'Выполненые заказы')
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
                    Выполнено <span class="badge badge-pill badge-soft-success">{{ $orders->total() }}</span>
                </h1>

              </div>
            </div>

            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link">
                      Все товары <span class="badge badge-pill badge-soft-secondary">{{ $orders_stats->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('orders.accepted') }}" class="nav-link active">
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
                      Возврат <span class="badge badge-pill badge-soft-secondary">{{ $orders_stats->where('order_status_id', 5)->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('orders.canceled') }}" class="nav-link">
                      Отменен <span class="badge badge-pill badge-soft-danger">{{ $orders_stats->where('order_status_id', 2)->count() }}</span>
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
            <div class="col">
                <!-- Search -->
                <form>
                    <div class="input-group input-group-flush">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fe fe-search"></i>
                        </span>
                        </div>
                        <input class="form-control list-search" type="search" placeholder="Поиск" autocomplete="off">
                    </div>
                </form>
            </div>
            <div class="col-auto">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <button class="btn btn-sm btn-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-sliders mr-1"></i> Фильтр <span class="badge badge-primary ml-1 d-none">0</span>
                    </button>

                    <!-- Menu -->
                    <form class="dropdown-menu dropdown-menu-right dropdown-menu-card" style="">
                        <div class="card-header">
                            <!-- Title -->
                            <h4 class="card-header-title">
                                Фильтры
                            </h4>

                            @if (isset(request()->user_id) || isset(request()->product_id) || isset(request()->store_id) || isset(request()->date_from) || isset(request()->date_to)
                                || isset(request()->total_from) || isset(request()->total_to) || isset(request()->margin_from) || isset(request()->margin_to))
                            <!-- Link -->
                            <a href="{{ route('orders.index') }}" class="btn btn-sm btn-link text-danger">
                                <small>Очистить фильтры</small>
                            </a>
                            @endif
                        </div>
                        <div class="card-body" style="min-height: 370px;">
                        <!-- List group -->
                        <div class="list-group list-group-flush mt-n4 mb-4">
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <!-- Text -->
                                        <small>Клиент</small>
                                    </div>
                                    <div class="col-8">
                                        <!-- Select -->
                                        <select class="custom-select custom-select-sm chosen-select" name="user_id">
                                            <option value="">Все</option>
                                            @isset($users)
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}" @if(request()->user_id == $user->id)selected @endif>{{ $user->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <!-- Text -->
                                        <small>Товар</small>
                                    </div>
                                    <div class="col-8">
                                        <!-- Select -->
                                        <select class="custom-select custom-select-sm chosen-select" name="product_id">
                                            <option value="">Все</option>
                                            @isset($products)
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" @if(request()->product_id == $product->id)selected @endif>{{ $product->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <!-- Text -->
                                        <small>Магазин</small>
                                    </div>
                                    <div class="col-8">
                                        <!-- Select -->
                                        <select class="custom-select custom-select-sm chosen-select" name="store_id">
                                            <option value="">Все</option>
                                            @isset($stores)
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store->id }}" @if(request()->store_id == $store->id)selected @endif>{{ $store->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item border-0 pb-1">
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        <!-- Text -->
                                        <small>Дата от</small>
                                    </div>
                                    <div class="col-8">
                                        <!-- Input -->
                                        <input type="date" name="date_from" class="form-control custom-date" value="{{ request()->date_from ?? '' }}">
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item pt-0">
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        <!-- Text -->
                                        <small>Дата до</small>
                                    </div>
                                    <div class="col-8">
                                        <!-- Input -->
                                        <input type="date" name="date_to" class="form-control custom-date" value="{{ request()->date_to ?? '' }}">
                                    </div>
                                </div> <!-- / .row -->
                            </div>

                            <div class="list-group-item border-0 pb-1">
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        <!-- Text -->
                                        <small>Цена от</small>
                                    </div>
                                    <div class="col-8">
                                        <!-- Input -->
                                        <input type="number" name="total_from" class="form-control custom-date" value="{{ request()->total_from ?? '' }}" autocomplete="off">
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item pt-0">
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        <!-- Text -->
                                        <small>Цена до</small>
                                    </div>
                                    <div class="col-8">
                                        <!-- Input -->
                                        <input type="number" name="total_to" class="form-control custom-date" value="{{ request()->total_to ?? '' }}" autocomplete="off">
                                    </div>
                                </div> <!-- / .row -->
                            </div>

                            <div class="list-group-item border-0 pb-1">
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        <!-- Text -->
                                        <small>Маржа от</small>
                                    </div>
                                    <div class="col-8">
                                        <!-- Input -->
                                        <input type="number" name="margin_from" class="form-control custom-date" value="{{ request()->margin_from ?? '' }}" autocomplete="off">
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item pt-0">
                                <div class="row">
                                    <div class="col d-flex align-items-center">
                                        <!-- Text -->
                                        <small>Маржа до</small>
                                    </div>
                                    <div class="col-8">
                                        <!-- Input -->
                                        <input type="number" name="margin_to" class="form-control custom-date" value="{{ request()->margin_to ?? '' }}" autocomplete="off">
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                        </div>
                        <!-- Button -->
                        <button class="btn btn-block btn-primary" type="submit">
                            Применить фильтр
                        </button>
                        </div>
                    </form>
                </div>
            </div>
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
                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-grand-total">
                        Итого
                    </a>
                </th>
                  <th>
                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-status">
                      Статус
                    </a>
                  </th>

                  <th></th>

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
    </div>
  </div>
@endsection
