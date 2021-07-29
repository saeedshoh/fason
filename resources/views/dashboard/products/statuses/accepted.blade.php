@extends('dashboard.layouts.app')
@section('title', 'Опубликованые товары')
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
                  список товаров
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                    Опубликовано <span class="badge badge-pill badge-soft-success">{{ $products->total() }}</span>
                </h1>

              </div>
              <div class="col-auto">

                <!-- Buttons -->
                <a href="{{ route('editItemsForPage', 1)}}" class="ml-2">
                  Кол-во на главной странице
                </a>

              </div>

              @permission('create-products')
                <div class="col-auto">

                  <!-- Buttons -->
                  <a href="{{ route('products.create')}}" class="btn btn-primary ml-2">
                    Добавить
                  </a>

                </div>
              @endpermission
            </div>
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                      Все товары <span class="badge badge-pill badge-soft-secondary">{{ $products_stats->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.accepted') }}" class="nav-link active">
                      Опубликовано <span class="badge badge-pill badge-soft-success">{{ $products->total() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.onCheck') }}" class="nav-link">
                      На проверке <span class="badge badge-pill badge-soft-warning">{{ $products_stats->where('product_status_id', 1)->whereNull('deleted_at')->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.canceled') }}" class="nav-link">
                      Отклонённые <span class="badge badge-pill badge-light">{{ $products_stats->where('product_status_id', 3)->whereNull('deleted_at')->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.hidden') }}" class="nav-link">
                      Скрыто <span class="badge badge-pill badge-soft-info">{{ $products_stats->where('product_status_id', 4)->whereNull('deleted_at')->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.notInStock') }}" class="nav-link">
                      Нет в наличии <span class="badge badge-pill badge-soft-primary">{{ $products_stats->where('product_status_id', 5)->whereNull('deleted_at')->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.deleted') }}" class="nav-link">
                      Удаленные <span class="badge badge-pill badge-soft-danger">{{ $products_stats->whereNotNull('deleted_at')->count() }}</span>
                    </a>
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </div>
        @if (session('class'))
          <div class="alert alert-{{ session('class') }} mt-4">
              {{session()->get('message')}}
          </div>
        @endif
        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-name", "item-order", "item-total", "item-margin", "item-category", "item-city", "item-date", "item-quantity", "item-company", "item-status"]}' id="contactsList">
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
                          <input class="form-control" type="text" placeholder="Поиск" data-item="products/statuses/accepted" id="search" value="{{ request()->search }}">
                      </div>
                    </form>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div id="products_accepted">
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
                        <tr class="table-success">
                        <td class="item-order p-0">
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
                  <nav>
                    {{ $products->links() }}
                  </nav>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection
