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
                   Все товары
                </h1>

              </div>
              <div class="col-auto">

                <!-- Buttons -->
                <a href="{{ route('products.create')}}" class="btn btn-primary ml-2">
                  Добавить
                </a>

              </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap active">
                      Все категории <span class="badge badge-pill badge-soft-secondary">823</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Активные <span class="badge badge-pill badge-soft-secondary">231</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Неактивные <span class="badge badge-pill badge-soft-secondary">22</span>
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
            <div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
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
                        <input class="list-search form-control" type="search" placeholder="Найти">
                      </div>
                    </form>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                  <thead>
                    <tr>
                      <th style="width: 50px;">

                        <!-- Checkbox -->
                        №

                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-total">Цена</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-title" href="#">Категория</a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-date">
                          Дата
                        </a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-score" href="#">Кол/Во</a>
                      </th>
                      <th colspan="2">
                        <a class="list-sort text-muted desc" data-sort="item-company" href="#">Магазин</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">
                    @forelse ( $products as $key => $product)
                    <tr>
                      <td>

                        {{ ++$key }}

                      </td>
                      <td>
                        <span class="item-name text-reset" href="profile-posts.html">{{ $product->name }}</span>
                      </td>
                      <td class="orders-total">
                        {{ $product->price }}
                      </td>
                      <td>
                        <span class="item-name text-reset" href="profile-posts.html">{{ $product->category->name }}</span>
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-30">{{ $product->created_at->format('d/m/Y') }}</time>
    
                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-danger">1/10</span>

                      </td>
                      <td>
                        <span class="item-name text-reset" href="profile-posts.html">{{ $product->store->name }}</span>
                      </td>
                      <td class="text-right">
                        <form class="d-inline" action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf 
                            <button type="submit" href="{{ route('products.destroy', $product->id) }}"  class="btn btn-danger m-1 pull-right">
                                <i class="fe fe-trash"> </i></button>
                            @method('DELETE')
                        </form>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary m-1 pull-right">
                            <i class="fe fe-edit"> </i>
                        </a>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-warning m-1 fa-pull-right">
                            <i class="fe fe-eye" aria-hidden="true"></i>
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
