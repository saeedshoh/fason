@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="main-content">

    <!-- HEADER -->
    <div class="header">
      <div class="container-fluid">

        <!-- Body -->
        <div class="header-body">
          <div class="row align-items-end">
            <div class="col">

                <!-- Title -->
                <h1 class="header-title">
                    Общая сводка
                </h1>
                <p class="header-subtitle">
                    Некоторая сводка
                </p>
            </div>
          </div> <!-- / .row -->
        </div> <!-- / .header-body -->

      </div>
    </div> <!-- / .header -->

    <!-- CARDS -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl">

            <!-- Value  -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        Пользователей
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        $24,500
                    </span>

                    <!-- Badge -->
                    <span class="badge badge-soft-success mt-n1">
                        +3.5%
                    </span>
                    </div>
                    <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Hours -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                        <!-- Title -->
                        <h6 class="text-uppercase text-muted mb-2">
                            Магазинов
                        </h6>

                        <!-- Heading -->
                        <span class="h2 mb-0">
                            {{ $storesCount }}
                        </span>

                        </div>
                        <div class="col-auto">

                        <!-- Icon -->
                        <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Exit -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        Товаров
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        {{ $productsCount }}
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Chart -->
                    <div class="chart chart-sparkline">
                        <canvas class="chart-canvas chartjs-render-monitor" id="sparklineChart" width="75" height="35" style="display: block; width: 75px; height: 35px;"></canvas>
                    </div>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Time -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        Заказов
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        2:37
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-clock text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
        </div> <!-- / .row -->
        <div class="header">
            <div class="header-body">

              <!-- Title -->
              <h1 class="header-title">
                Товары
              </h1>

              <!-- Subtitle -->
              <p class="header-subtitle">
                Некоторая сводка о ваших товарах
              </p>

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 col-xl">

            <!-- Value  -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Title -->
                        <h6 class="text-uppercase text-muted mb-2">
                            Новые
                        </h6>

                        <!-- Heading -->
                        <span class="h2 mb-0">
                            {{ $newProductsCount }}
                        </span>

                    </div>
                    <div class="col-auto">

                        <!-- Icon -->
                        <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Hours -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        На проверке
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        763.5
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Exit -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        Отклонённые
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        35.5%
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Chart -->
                    <div class="chart chart-sparkline">
                        <canvas class="chart-canvas chartjs-render-monitor" id="sparklineChart" width="75" height="35" style="display: block; width: 75px; height: 35px;"></canvas>
                    </div>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Time -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        Удаленные
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        {{ $deletedProductsCount }}
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-clock text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
        </div> <!-- / .row -->
        <div class="header">
            <div class="header-body">

              <!-- Title -->
              <h1 class="header-title">
                Заказы
              </h1>

              <!-- Subtitle -->
              <p class="header-subtitle">
                Некоторая сводка о ваших заказах
              </p>

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 col-xl">

            <!-- Value  -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                        <h6 class="text-uppercase text-muted mb-2">
                            КУПЛЕННО ТОВАРОВ НА СУММУ
                        </h6>

                        <!-- Heading -->
                        <span class="h2 mb-0">
                            {{ $salesSum }} TJS
                        </span>
                    </div>
                    <div class="col-auto">

                        <!-- Icon -->
                        <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Hours -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        ПРИНЯТО ЗАКАЗОВ
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        {{ $ordersCount }}
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Exit -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        ПРИБЫЛЬ С УЧЕТОМ КОМИССИИ
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        {{ $profitIncludingCommission }} TJS
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Chart -->
                    <div class="chart chart-sparkline">
                        <canvas class="chart-canvas chartjs-render-monitor" id="sparklineChart" width="75" height="35" style="display: block; width: 75px; height: 35px;"></canvas>
                    </div>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Time -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        Выполненых заказов
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        2:37
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-clock text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
        </div> <!-- / .row -->

        <div class="row">
            <div class="col-12 col-lg-6 col-xl">

            <!-- Value  -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        Возврат заказов
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        $24,500
                    </span>

                    <!-- Badge -->
                    <span class="badge badge-soft-success mt-n1">
                        +3.5%
                    </span>
                    </div>
                    <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

            <!-- Hours -->
            <div class="card">
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                        Отмененных заказов
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                        763.5
                    </span>

                    </div>
                    <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                    </div>
                </div> <!-- / .row -->
                </div>
            </div>

            </div>
        </div> <!-- / .row -->
        <div class="header">
            <div class="header-body">

              <!-- Title -->
              <h1 class="header-title">
                Магазины
              </h1>

              <!-- Subtitle -->
              <p class="header-subtitle">
                Узнайте о новых и лучших магазинах
              </p>

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-4">

            <!-- Projects -->
            <div class="card card-fill">
                <div class="card-header">

                <!-- Title -->
                <h4 class="card-header-title">
                    Новые магазины
                </h4>

                <!-- Link -->
                <a href="project-overview.html" class="small">Показать все</a>

                </div>
                <div class="card-body">

                <!-- List group -->
                    <div class="list-group list-group-flush my-n3">
                        <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto">

                            <!-- Avatar -->
                            <a href="project-overview.html" class="avatar avatar-4by3">
                                <img src="assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                            </a>

                            </div>
                            <div class="col ml-n2">

                            <!-- Title -->
                            <h4 class="mb-1">
                                <a href="project-overview.html">Homepage Redesign</a>
                            </h4>

                            <!-- Time -->
                            <p class="card-text small text-muted">
                                <time datetime="2018-05-24">Updated 4hr ago</time>
                            </p>

                            </div>
                            <div class="col-auto">

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

                            </div>
                        </div> <!-- / .row -->
                        </div>
                    </div>

                </div> <!-- / .card-body -->
            </div> <!-- / .card -->
            </div>
            <div class="col-12 col-xl-8">

                <!-- Goals -->
                <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                    <div class="col">

                        <!-- Title -->
                        <h4 class="card-header-title">
                            Топ 5 активных магазинов
                        </h4>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="#!" class="btn btn-sm btn-white">
                        Export
                        </a>

                    </div>
                    </div> <!-- / .row -->
                </div>
                <div class="table-responsive mb-0" data-list="{&quot;valueNames&quot;: [&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]}">
                    <table class="table table-sm table-nowrap card-table">
                    <thead>
                        <tr>
                        <th>
                            <a href="#" class="text-muted list-sort" data-sort="goal-project">
                            Goal
                            </a>
                        </th>
                        <th>
                            <a href="#" class="text-muted list-sort" data-sort="goal-status">
                            Status
                            </a>
                        </th>
                        <th>
                            <a href="#" class="text-muted list-sort" data-sort="goal-progress">
                            Progress
                            </a>
                        </th>
                        <th>
                            <a href="#" class="text-muted list-sort" data-sort="goal-date">
                            Due date
                            </a>
                        </th>
                        <th class="text-right">
                            Team
                        </th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                    <tr>
                        <td class="goal-project">
                            Release v1.2-Beta
                        </td>
                        <td class="goal-status">
                            <span class="text-warning">●</span> In progress
                        </td>
                        <td class="goal-progress">
                            25%
                        </td>
                        <td class="goal-date">
                            <time datetime="2018-10-24">08/26/18</time>
                        </td>
                        <td class="text-right">
                            <div class="avatar-group justify-content-end">
                            <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Dianna Smiley">
                                <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                            </a>
                            <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                <img src="assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle" alt="...">
                            </a>
                            <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">
                                <img src="assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle" alt="...">
                            </a>
                            </div>
                        </td>
                        <td class="text-right">
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
                    </tbody>
                    </table>
                </div>
                </div>

            </div>
        </div> <!-- / .row -->
    </div>

  </div>

  <div class="container-fluid mt-6">


    <div class="row">
      <div class="col-12 col-xl-4">

        <!-- Activity -->
        <div class="card-adjust-xl">
          <div class="card">
            <div class="card-header">

              <!-- Title -->
              <h3 class="card-header-title">
                Новые магазины
                <span class="badge badge-pill badge-soft-secondary">{{ $newStores->count() }}</span>
              </h3>

            </div>
            <div class="card-body">

              <!-- List group -->
              <div class="list-group list-group-flush list-group-activity my-n3">
                  @foreach ($newStores as $store)
                  @if($loop->iteration < 6)
                    <div class="list-group-item">
                        <div class="row">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar avatar-sm">
                            <img src="{{ Storage::url($store->avatar) }}" alt="..." class="avatar-img rounded-circle" />
                            </div>

                        </div>
                        <div class="col ml-n2">

                            <!-- Content -->
                            <div class="small">
                            <strong>{{ $store->name }}</strong><br>
                            {{ $store->description }}
                            </div>

                            <!-- Time -->
                            <small class="text-muted">
                            2m ago
                            </small>

                        </div>
                        </div> <!-- / .row -->
                    </div>
                    @endif
                  @endforeach
              </div>

            </div>
          </div>
        </div>

      </div>
      <div class="col-12 col-xl-8">

        <!-- Products -->
        <div class="card">
          <div class="card-header">

            <!-- Title -->
            <h4 class="card-header-title">
              Топ 5 активных магазинов
            </h4>

          </div>
          <div class="table-responsive mb-0" data-list='{"valueNames": ["products-product", "products-stock", "products-price", "products-sales"]}' id="productsList">
            <table class="table table-sm table-nowrap table-hover card-table">
              <thead>
                <tr>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="products-product">
                      Название
                    </a>
                  </th>
                  {{-- <th>
                    <a href="#" class="text-muted list-sort" data-sort="products-stock">
                      Статус
                    </a>
                  </th> --}}
                  <th colspan="2">
                    <a href="#" class="text-muted list-sort" data-sort="products-sales">
                      Общая сумма продаж
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($topstores as $store)
                  <tr>
                    <td class="products-product">
                      <div class="d-flex align-items-center">

                        <!-- Image -->
                        <div class="avatar">
                          <img class="avatar-img rounded mr-3" src="/storage/{{ $store->avatar ?? '/theme/icons/Avatar.svg'}}" alt="..." />
                        </div>

                        <div class="ml-3">

                          <!-- Heading -->
                          <h4 class="font-weight-normal mb-1">{{ $store->name}}</h4>

                          {{-- <!-- Text -->
                          <small class="text-muted">3" x 5" Size</small> --}}

                        </div>

                      </div>
                    </td>
                    {{-- <td class="products-stock">

                      <!-- Badge -->

                        <span class="badge {{ $store->is_active == 1 ? 'badge-soft-success' : 'badge badge-danger'}}">{{ $store->is_active == 1 ? 'Активен' : 'Неактивен'}}</span>

                    </td> --}}
                    <td class="products-sales">
                      {{ $store->orders.' TJS'}}
                    </td>
                  </tr>
                @endforeach
                {{-- <tr>
                  <td class="products-product">
                    <div class="d-flex align-items-center">

                      <!-- Image -->
                      <div class="avatar">
                        <img class="avatar-img rounded mr-3" src="assets/img/avatars/products/product-2.jpg" alt="..." />
                      </div>

                      <div class="ml-3">

                        <!-- Heading -->
                        <h4 class="font-weight-normal mb-1">Turtleshell Shades</h4>

                        <!-- Text -->
                        <small class="text-muted">UV + Blue Light</small>

                      </div>

                    </div>
                  </td>
                  <td class="products-stock">

                    <!-- Badge -->
                    <span class="badge badge-soft-warning">Unavailable</span>

                  </td>
                  <td class="products-price">
                    $39.99
                  </td>
                  <td class="products-sales">
                    $2,611.82
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
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection
