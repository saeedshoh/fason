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
              <div class="col-auto">

                <!-- Buttons -->
                <a href="{{ route('products.create')}}" class="btn btn-primary ml-2">
                  Добавить
                </a>

              </div>
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
                      Опубликовано <span class="badge badge-pill badge-soft-success">{{ $products_stats->where('product_status_id', 2)->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.onCheck') }}" class="nav-link">
                      На проверке <span class="badge badge-pill badge-soft-warning">{{ $products_stats->where('product_status_id', 1)->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.canceled') }}" class="nav-link">
                      Отклонённые <span class="badge badge-pill badge-light">{{ $products_stats->where('product_status_id', 3)->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.hidden') }}" class="nav-link">
                      Скрыто <span class="badge badge-pill badge-soft-info">{{ $products_stats->where('updated_at', '<', now()->subWeek())->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.notInStock') }}" class="nav-link">
                      Нет в наличии <span class="badge badge-pill badge-soft-primary">{{ $products_stats->where('quantity', '<', 1)->count() }}</span>
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
        @if (session()->get('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-order", "item-name", "item-total", "item-category", "item-date", "item-quantity", "item-company", "item-status"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
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
                        <input class="list-search form-control" type="search" placeholder="Поиск">
                      </div>
                    </form>

                  </div>
                </div> <!-- / .row -->
              </div>
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
                    <tr class="table-success">
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
                            {{ $product->product_status->name }}
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
@endsection
