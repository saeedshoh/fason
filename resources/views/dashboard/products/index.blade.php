@extends('dashboard.layouts.app')
@section('title', 'Все товары')
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
                  список товаров
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                   Все товары  <span class="badge badge-pill badge-soft-secondary">{{ $products->count() }}</span>
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
                    <tr class="table-@if($product->updated_at < now()->subWeek())danger @elseif($product->product_status->id == 1)warning @elseif($product->product_status->id == 2)success @else()danger @endif">
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
                        <span class="item-name text-reset" href="profile-posts.html">{{ $product->category->name }}</span>
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
                        <a class="item-name text-reset" href="{{ route('showStoreInfo', $product->store->id) }}">{{ $product->store->name }}</a>
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
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary m-1 pull-right">
                            <i class="fe fe-edit"></i>
                        </a>
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
