@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
  <!-- HEADER -->
  <div class="header bg-dark pb-5">
    <div class="container-fluid">

      <!-- Body -->
      <div class="header-body">
        <div class="row align-items-end">
          <div class="col">

            {{-- <!-- Pretitle -->
            <h6 class="header-pretitle text-secondary">
              Annual
            </h6> --}}

            <!-- Title -->
            <h1 class="header-title text-white">
              Заказы
            </h1>

          </div>
          <div class="col-auto">

            <!-- Nav -->
            <ul class="nav nav-tabs header-tabs">
              <li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="0">
                <a href="#" class="nav-link text-center active" data-toggle="tab">
                  {{-- <h6 class="header-pretitle text-secondary">
                    Customers
                  </h6> --}}
                  <h3 class="text-white mb-0">
                    Месяц
                  </h3>
                </a>
              </li>
              {{-- <li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="1">
                <a href="#" class="nav-link text-center" data-toggle="tab">
                  {{-- <h6 class="header-pretitle text-secondary">
                    Sessions
                  </h6> --}}
                  {{-- <h3 class="text-white mb-0">
                    Неделя
                  </h3>
                </a>
              </li> --}}
              {{-- <li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="2">
                <a href="#" class="nav-link text-center" data-toggle="tab"> --}}
                  {{-- <h6 class="header-pretitle text-secondary">
                    Conversion
                  </h6> --}}
                  {{-- <h3 class="text-white mb-0">
                    Месяц
                  </h3>
                </a>
              </li> --}}
            </ul>

          </div>
        </div><!-- / .row -->
      </div> <!-- / .header-body -->

      <!-- Footer -->
      <div class="header-footer">

        <!-- Chart -->
        <div class="chart">
          <canvas id="audienceChart" class="chart-canvas"></canvas>
        </div>

      </div>

    </div>
  </div> <!-- / .header -->

  <!-- CARDS -->
  <div class="container-fluid mt-n6">
    <div class="row">
      <div class="col-12 col-xl-8">

        <!-- Orders -->
        <div class="card">
          <div class="card-header">

            <!-- Title -->
            <h4 class="card-header-title">
              Прибыль
            </h4>

            <!-- Caption -->
            <span class="text-muted mr-3">
              С учетом комиссии:
            </span>

            <!-- Switch -->
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="cardToggle" data-toggle="chart" data-target="#ordersChart" data-trigger="change" data-action="add" data-dataset="1" />
              <label class="custom-control-label" for="cardToggle"></label>
            </div>

          </div>
          <div class="card-body">

            <!-- Chart -->
            <div class="chart">
              <canvas id="ordersChart" class="chart-canvas"></canvas>
            </div>

          </div>
        </div>
      </div>
      <div class="col-12 col-xl-4">

        <!-- Traffic -->
        <div class="card">
          <div class="card-header">

            <!-- Title -->
            <h4 class="card-header-title">
              Traffic Channels
            </h4>

            <!-- Tabs -->
            <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
              <li class="nav-item" data-toggle="chart" data-target="#trafficChart" data-trigger="click" data-action="toggle" data-dataset="0">
                <a href="#" class="nav-link active" data-toggle="tab">
                  All
                </a>
              </li>
              <li class="nav-item" data-toggle="chart" data-target="#trafficChart" data-trigger="click" data-action="toggle" data-dataset="1">
                <a href="#" class="nav-link" data-toggle="tab">
                  Direct
                </a>
              </li>
            </ul>

          </div>
          <div class="card-body">

            <!-- Chart -->
            <div class="chart chart-appended">
              <canvas id="trafficChart" class="chart-canvas" data-toggle="legend" data-target="#trafficChartLegend"></canvas>
            </div>

            <!-- Legend -->
            <div id="trafficChartLegend" class="chart-legend"></div>

          </div>
        </div>

      </div>
    </div> <!-- / .row -->
    <h1 class="header-title my-2">
        Товары
    </h1>
    <div class="row">
      <div class="col-12 col-lg-6 col-xl">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="text-uppercase text-muted mb-2">
                  Общее количество товаров
                </h6>

                <div class="row align-items-center no-gutters">
                  <div class="col-auto">

                    <!-- Heading -->
                    <span class="h2 mr-2 mb-0">
                      {{ $productsCount }}
                    </span>

                  </div>
                </div> <!-- / .row -->

              </div>
              <div class="col-auto">

                <!-- Icon -->
                <span class="h2 fe fe-clipboard text-muted mb-0"></span>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>

      </div>
      <div class="col-12 col-lg-6 col-xl">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      Количество новых товаров
                    </h6>

                    <div class="row align-items-center no-gutters">
                      <div class="col-auto">

                        <!-- Heading -->
                        <span class="h2 mr-2 mb-0">
                          {{ $newProductsCount }}
                        </span>

                      </div>
                    </div> <!-- / .row -->

              </div>
              <div class="col-auto">

                <!-- Icon -->
                <span class="h2 fe fe-shopping-bag text-muted mb-0"></span>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>

      </div>
      <div class="col-12 col-lg-6 col-xl">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="text-uppercase text-muted mb-2">
                  Количество удаленных товаров
                </h6>

                <div class="row align-items-center no-gutters">
                  <div class="col-auto">

                    <!-- Heading -->
                    <span class="h2 mr-2 mb-0">
                      {{ $deletedProductsCount }}
                    </span>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="col-auto">

                <!-- Icon -->
                <span class="h2 fe fe-trash text-muted mb-0"></span>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>

      </div>
      </div>

      <h1 class="header-title my-2">
        Заказы
      </h1>
    <div class="row">
      <div class="col-12 col-lg-6 col-xl">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="text-uppercase text-muted mb-2">
                  Купленно товаров на сумму
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
        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="text-uppercase text-muted mb-2">
                  Принято заказов
                </h6>

                <!-- Heading -->
                <span class="h2 mb-0">
                  {{ $ordersCount }}
                </span>

              </div>
              <div class="col-auto">

                <!-- Chart -->
                <div class="chart chart-sparkline"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas class="chart-canvas chartjs-render-monitor" id="sparklineChart" width="75" height="35" style="display: block; width: 75px; height: 35px;"></canvas>
                </div>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>

      </div>
      <div class="col-12 col-lg-6 col-xl">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="text-uppercase text-muted mb-2">
                  Прибыль с учетом комиссии
                </h6>

                <div class="row align-items-center no-gutters">
                  <div class="col-auto">

                    <!-- Heading -->
                    <span class="h2 mr-2 mb-0">
                      {{ $profitIncludingCommission }}
                    </span>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="col-auto">

                <!-- Icon -->
                <span class="h2 fe fe-arrow-up text-muted mb-0"></span>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>
    </div> <!-- / .row -->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="header-title ml-3 my-2">
                Магазины
                <span class="badge badge-pill badge-soft-secondary">{{ $storesCount }}</span>
            </h1>
        </div>
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
                      Product
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="products-stock">
                      Stock
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted list-sort" data-sort="products-price">
                      Price
                    </a>
                  </th>
                  <th colspan="2">
                    <a href="#" class="text-muted list-sort" data-sort="products-sales">
                      Monthly Sales
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody class="list">
                <tr>
                  <td class="products-product">
                    <div class="d-flex align-items-center">

                      <!-- Image -->
                      <div class="avatar">
                        <img class="avatar-img rounded mr-3" src="assets/img/avatars/products/product-1.jpg" alt="..." />
                      </div>

                      <div class="ml-3">

                        <!-- Heading -->
                        <h4 class="font-weight-normal mb-1">Sketchpad</h4>

                        <!-- Text -->
                        <small class="text-muted">3" x 5" Size</small>

                      </div>

                    </div>
                  </td>
                  <td class="products-stock">

                    <!-- Badge -->
                    <span class="badge badge-soft-success">Available</span>

                  </td>
                  <td class="products-price">
                    $14.99
                  </td>
                  <td class="products-sales">
                    $3,145.23
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
                <tr>
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
                </tr>
                <tr>
                  <td class="products-product">
                    <div class="d-flex align-items-center">

                      <!-- Image -->
                      <div class="avatar">
                        <img class="avatar-img rounded mr-3" src="assets/img/avatars/products/product-3.jpg" alt="..." />
                      </div>

                      <div class="ml-3">

                        <!-- Heading -->
                        <h4 class="font-weight-normal mb-1">Nike "Go Bag"</h4>

                        <!-- Text -->
                        <small class="text-muted">Leather + Gortex</small>

                      </div>

                    </div>
                  </td>
                  <td class="products-stock">

                    <!-- Badge -->
                    <span class="badge badge-soft-success">Available</span>

                  </td>
                  <td class="products-price">
                    $149.99
                  </td>
                  <td class="products-sales">
                    $2,372.19
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
                <tr>
                  <td class="products-product">
                    <div class="d-flex align-items-center">

                      <!-- Image -->
                      <div class="avatar">
                        <img class="avatar-img rounded mr-3" src="assets/img/avatars/products/product-4.jpg" alt="..." />
                      </div>

                      <div class="ml-3">

                        <!-- Heading -->
                        <h4 class="font-weight-normal mb-1">Swell Bottle</h4>

                        <!-- Text -->
                        <small class="text-muted">Bone Clay White</small>

                      </div>

                    </div>
                  </td>
                  <td class="products-stock">

                    <!-- Badge -->
                    <span class="badge badge-soft-success">Available</span>

                  </td>
                  <td class="products-price">
                    $24.99
                  </td>
                  <td class="products-sales">
                    $1,145.23
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
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection
