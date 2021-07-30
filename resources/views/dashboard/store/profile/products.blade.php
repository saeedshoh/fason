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
                <a href="{{ route('store.profile_orders', $store->id) }}" class="nav-link">
                  Заказы
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('store.profile_products', $store->id) }}" class="nav-link active">
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

      <div class="tab-content col-lg-12">
        <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">

          <!-- Card -->
          <div class="card" id="contactsList">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">

                  <!-- Form -->
                  <form>
                    <div class="input-group input-group-flush">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fe fe-search"></i>
                        </span>
                      </div>
                      <input class="form-control" type="text" placeholder="Поиск" data-item="show/{{ $store->id }}/products" id="search" value="{{ request()->search }}">
                    </div>
                  </form>

                </div>
              </div> <!-- / .row -->
            </div>
            <div id="show_products">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-order">№</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-name">Название</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-total">Цена</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-margin">Маржа</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-category">Категория</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-city">Город</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-date">Дата</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-quantity">Кол/Во</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-company">Магазин</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-status">Статус</a>
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @forelse ($products as $key => $product)
                    <tr class="table-@if($product->product_status->id == 4)info @elseif(!$product->store)secondary @elseif($product->deleted_at)danger @elseif($product->product_status->id == 5)primary @elseif($product->product_status->id == 1)warning @elseif($product->product_status->id == 2)success @elseif($product->product_status->id == 3)light @endif">
                      <td class="item-order py-0">
                          #{{ $product->id }}
                      </td>
                      <td class="item-name py-0">
                        <span class="item-name text-reset">{{ $product->name }}</span>
                      </td>
                      <td class="item-total py-0">
                        {{ $product->price }}
                      </td>
                      <td class="item-category py-0">
                        <span class="item-name text-reset">{{ $product->price_after_margin - $product->price }}</span>
                      </td>
                      <td class="item-category py-0">
                        <span class="item-name text-reset">{{ $product->category->name }}</span>
                      </td>
                      <td class="item-city py-0">
                        <span class="item-name text-reset">г. {{ $product->store->city->name }}</span>
                      </td>
                      <td class="item-date py-0">
                        <!-- Time -->
                        <time datetime="2018-07-30">{{ $product->created_at->format('d/m/Y') }}</time>
                      </td>
                      <td class="item-quantity py-0">
                        <!-- Badge -->
                        {{ $product->quantity }}
                      </td>
                      <td class="item-company py-0">
                        <a class="item-name text-reset" href="{{ route('showStoreInfo', $product->no_scope_store->id) }}">{{ $product->no_scope_store->name }}</a>
                      </td>
                      <td class="item-status py-0">
                        <!-- Badge -->
                        <div class="badge badge-primary">
                            @if($product->store->is_active == 0)
                                Магазин отключен
                            @elseif($product->updated_at < now()->subWeek())
                                Скрыто
                            @elseif($product->quantity < 1)
                                Нет в наличии
                            @elseif($product->deleted_at)
                              Удаленный
                            @else
                                {{ $product->product_status->name }}
                            @endif
                        </div>
                      </td>
                      <td class="text-right py-0">

                          @permission('update-products')
                            @if($product->store)
                              <a href="{{ route('products.edit', $product) }}" class="btn btn-primary m-1 pull-right">
                                  <i class="fe fe-edit"></i>
                              </a>
                            @endif
                          @endpermission
                      </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-muted h4" colspan="7">
                            <span>Данные отсутствуют </span>
                        </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
                <div class="card-footer d-flex justify-content-center">
                  {{ $products->links() }}
                </div>
            </div>
          </div>

        </div>
      </div>


    </div> <!-- / .row -->



  </div>
</div>
@endsection
