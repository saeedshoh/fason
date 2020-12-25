@extends('dashboard.layouts.app')
@section('title', 'Заказы')
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
                  Все заказы
                </h1>

              </div>
              <div class="col-auto">

                <!-- Button -->
                <a href="#" class="btn btn-primary lift">
                  Добавить заказ
                </a>

              </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link active">
                      Все заказы <span class="badge badge-pill badge-soft-secondary">823</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link">
                      Активные <span class="badge badge-pill badge-soft-secondary"></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link">
                      Неактивные <span class="badge badge-pill badge-soft-secondary"></span>
                    </a>
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </div>

        <!-- Card -->
        <div class="card" data-list='{"valueNames": ["orders-order", "orders-product", "orders-date", "orders-total", "orders-status", "orders-method"]}'>
          <div class="card-header">

            <!-- Search -->
            <form>
              <div class="input-group input-group-flush">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fe fe-search"></i>
                  </span>
                </div>
                <input class="form-control list-search" type="search" placeholder="Search">
              </div>
            </form>

            <!-- Dropdown -->
            <div class="dropdown">
              <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="bulkActionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bulk action
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bulkActionDropdown">
                <a class="dropdown-item" href="#!">Action</a>
                <a class="dropdown-item" href="#!">Another action</a>
                <a class="dropdown-item" href="#!">Something else here</a>
              </div>
            </div>

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
                      Заказ
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="orders-product">
                      Товар
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="orders-date">
                      Дата заказа
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="orders-total">
                      Цена
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="orders-status">
                      Статус
                    </a>
                  </th>
                  <th colspan="2">
                    <a href="#" class="text-muted list-sort" data-sort="orders-method">
                      Способ
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody class="list">
                @forelse ($orders as $key => $order)
                
                <tr>
                  <td>

                    <!-- Checkbox -->
                    <div class="custom-control custom-checkbox table-checkbox">
                      <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                      <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                    </div>

                  </td>
                  <td class="orders-order">
                    #{{ ++$key}}
                  </td>
                  <td class="orders-product">
                    {{ $order->product->name}}
                  </td>
                  <td class="orders-date">

                    <!-- Time -->
                    <time datetime="{{ $order->created_at->format('d/m/Y') }}">{{ $order->created_at->format('d-m-Y') }}</time>

                  </td>
                  <td class="orders-total">
                    {{ $order->total}} Сомони
                  </td>
                  <td class="orders-status">

                    <!-- Badge -->
                    <div class="badge badge-soft-warning">
                      {{ $order->order_status->name }}
                    </div>

                  </td>
                  <td class="orders-method">
                    {{ $order->product->store->name}}
                  </td>
                  <td class="text-right">

                    <!-- Dropdown -->
                    <div class="dropdown">
                      <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-more-vertical"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#!" class="dropdown-item">
                          Action
                        </a>
                        <a href="#!" class="dropdown-item">
                          Another action
                        </a>
                        <a href="#!" class="dropdown-item">
                          Something else here
                        </a>
                      </div>
                    </div>

                  </td>
                </tr>
                @empty
                    
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
    </div> <!-- / .row -->
  </div>
@endsection