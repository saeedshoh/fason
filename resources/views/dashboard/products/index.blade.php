@extends('dashboard.layouts.app')
@section('title', 'Все товары')
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
                   Все товары  <span class="badge badge-pill badge-soft-secondary">{{ $products->total() }}</span>
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
                  <a href="{{ route('products.create')}}" class="ml-2 btn btn-primary">
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
                    <a href="{{ route('products.index') }}" class="nav-link active">
                      Все товары <span class="badge badge-pill badge-soft-secondary">{{ $products_stats->count() }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.accepted') }}" class="nav-link">
                      Опубликовано <span class="badge badge-pill badge-soft-success">{{ $products_stats->where('product_status_id', 2)->whereNull('deleted_at')->where('quantity', '>', 1)->count() }}</span>
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
                          <div class="input-group input-group-flush">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fe fe-search"></i>
                                </span>
                              </div>
                              <input class="form-control" type="text" placeholder="Поиск" data-item="products" id="search" value="{{ request()->search }}" autocomplete="off">
                          </div>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div id="products">
                <div class="table-responsive">
                  <table class="table table-sm table-hover table-nowrap card-table">
                    <x-product-table-head></x-product-table-head>
                    <tbody class="list">
                      @forelse ($products as $key => $product)
                      <tr class="table-@if($product->product_status->id == 4)info @elseif(!$product->store)secondary @elseif($product->deleted_at)danger @elseif($product->product_status->id == 5)primary @elseif($product->product_status->id == 1)warning @elseif($product->product_status->id == 2)success @elseif($product->product_status->id == 3)light @endif">
                        <td class="py-0 item-order">
                            #{{ $product->id }}
                        </td>
                        <td class="py-0 item-name">
                          <span class="item-name text-reset">{{ $product->name }}</span>
                        </td>
                        <td class="py-0 item-category">
                          <span class="item-name text-reset">{{ $product->category->name }}</span>
                        </td>
                        <td class="py-0 item-city">
                          <span class="item-name text-reset">г. {{ $product->store->city->name ?? '' }}</span>
                        </td>
                        <td class="py-0 item-date">
                          <!-- Time -->
                          <time datetime="2018-07-30">{{ $product->created_at->format('d/m/Y') }}</time>
                        </td>
                        <td class="py-0 item-quantity">
                          <!-- Badge -->
                          {{ $product->quantity }}
                        </td>
                        <td class="py-0 item-company">
                          <a class="item-name text-reset" href="{{ route('showStoreInfo', $product->no_scope_store->id) }}">{{ $product->no_scope_store->name }}</a>
                        </td>
                        <td class="py-0 item-total">
                            {{ $product->price }}
                          </td>

                          <td class="py-0 item-category">
                            <span class="item-name text-reset">{{ $product->price_after_margin - $product->price }}</span>
                          </td>
                          <td class="py-0 item-total">
                            {{ $product->price + ($product->price_after_margin - $product->price)}}
                          </td>
                        <td class="py-0 item-status">
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
                        <td class="py-0 text-right">

                            @permission('update-products')
                              @if($product->store)
                                <a href="{{ route('products.edit', $product) }}" class="m-1 btn btn-primary pull-right">
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
