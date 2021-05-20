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
                        {{  $usersCount }} шт
                    </span>
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
                            {{ $storesCount }} шт
                        </span>

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
                        {{ $productsCount }} шт
                    </span>

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
                        {{ $ordersCount }} шт
                    </span>

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
                            {{ $newProductsCount }} шт
                        </span>

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
                        {{ $onCheckProductsCount }} шт
                    </span>

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
                        {{ $cancelledCheckProductsCount }} шт
                    </span>

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
                        {{ $deletedProductsCount }} шт
                    </span>

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
                       {{ $ordersCount }} шт
                    </span>

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
                        {{ $orderReturnsCount }} шт
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
                        {{ $orderCanceledCount }} шт
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
                <a href="{{ route('stores.index') }}" class="small">Показать все</a>

                </div>
                <div class="card-body">

                <!-- List group -->
                    <div class="list-group list-group-flush my-n3">
                    @foreach ($newStores as $store)
                        @if($loop->iteration < 6)
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                <!-- Avatar -->
                                <a href="{{ route('showStoreInfo', $store->id) }}" class="avatar avatar-4by3">
                                    <img src="{{ Storage::url($store->avatar) }}" alt="..." class="avatar-img rounded border">
                                </a>

                                </div>
                                <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="mb-1">
                                    <a href="{{ route('showStoreInfo', $store->id) }}">{{ $store->name }}</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <time datetime="{{ $store->created_at->format('Y-m-d') }}">Создан {{ \Carbon\Carbon::parse($store->created_at)->locale('ru_RU')->isoFormat('Do MMMM') }} </time>
                                </p>

                                </div>
                                <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('showStoreInfo', $store->id) }}" class="dropdown-item">
                                            Подробнее
                                        </a>
                                    </div>
                                </div>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                        @endif
                    @endforeach
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
                        </div> <!-- / .row -->
                    </div>
                    <div class="table-responsive mb-0" data-list="{&quot;valueNames&quot;: [&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]}">
                        <table class="table table-sm table-nowrap card-table">
                            <thead>
                                <tr>
                                <th>
                                    <a href="#" class="text-muted list-sort" data-sort="goal-project">
                                        Название
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted list-sort" data-sort="goal-status">
                                        Статус
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted list-sort" data-sort="goal-progress">
                                        Адрес
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted list-sort" data-sort="goal-date">
                                        Дата
                                    </a>
                                </th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($topstores as $store)
                                    <tr>
                                        <td class="goal-project">
                                            {{ $store->name}}
                                        </td>
                                        <td class="goal-status">
                                            <span class="{{ $store->is_active == 1 ? 'text-success' : 'text-danger'}}">●</span> {{ $store->is_active == 1 ? 'Активен' : 'Неактивен'}}
                                        </td>
                                        <td class="goal-progress">
                                            {{ $store->address }}
                                        </td>
                                        <td class="goal-date">
                                            <time datetime="{{ $store->created_at->format('Y-m-d') }}">{{ $store->created_at->format('d/m/Y') }}</time>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('showStoreInfo', $store->id) }}" class="dropdown-item">
                                                        Подробнее
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
    </div>

  </div>

@endsection
