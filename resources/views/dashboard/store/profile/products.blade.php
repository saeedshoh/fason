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
                            <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-category">Категория</a>
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
                        <tbody class="list font-size-base">
                        @forelse ($products as $key => $product)
                        <tr class="table-@if($product->updated_at < now()->subWeek())danger @elseif(!$product->store)secondary @elseif($product->product_status->id == 1)warning @elseif($product->product_status->id == 2)success @else()danger @endif">
                            <td class="item-order">
                            {{ ++$key }}
                            </td>
                            <td class="item-name">
                            <span class="item-name text-reset">{{ $product->name }}</span>
                            </td>
                            <td class="item-total">
                            {{ $product->price }}
                            </td>
                            <td class="item-category">
                            <span class="item-name text-reset">{{ $product->category->name }}</span>
                            </td>
                            <td class="item-date">
                            <!-- Time -->
                            <time datetime="2018-07-30">{{ $product->created_at->format('d/m/Y') }}</time>
                            </td>
                            <td class="item-quantity">
                            <!-- Badge -->
                            {{ $product->quantity }}
                            </td>
                            <td class="item-company">
                            <a class="item-name text-reset" href="{{ route('showStoreInfo', $product->no_scope_store->id) }}">{{ $product->no_scope_store->name }}</a>
                            </td>
                            <td class="item-status">
                            <!-- Badge -->
                            <div class="badge badge-primary">
                                @if($product->updated_at < now()->subWeek())
                                    Скрыто
                                @else
                                    {{ $product->product_status->name }}
                                @endif
                            </div>
                            </td>
                            <td class="text-right">
                                @if($product->store)
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary m-1 pull-right">
                                    <i class="fe fe-edit"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <span>Данные отсутствуют </span>
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg">
                            <li class="page-item">
                                {{ $products->links() }}
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
          </div>

        </div>
      </div>


    </div> <!-- / .row -->



  </div>
</div>
@endsection
