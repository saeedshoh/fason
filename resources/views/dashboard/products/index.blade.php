

@extends('dashboard.layouts.app')
@section('title', 'Все категории')
@extends('dashboard.layouts.aside')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">

        <!-- Header -->
        <div class="header">
          <div class="header-body">
            <div class="row align-products-center">
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
            <div class="row align-products-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap active">
                      Все товары <span class="badge badge-pill badge-soft-secondary">823</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Активные <span class="badge badge-pill badge-soft-secondary"></span>
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
            <div class="card" data-list='{"valueNames": ["product-name", "product-title", "product-email", "product-phone", "product-score", "product-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
              <div class="card-header">
                <div class="row align-products-center">
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
                          <th>
    
                            <!-- Checkbox -->
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="list-checkbox-all custom-control-input" id="listCheckboxAll">
                              <label class="custom-control-label" for="listCheckboxAll"></label>
                            </div>
    
                          </th>
                          <th>
                            <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
                          </th>
                          <th>
                            <a class="list-sort text-muted" data-sort="item-industry" href="#">категория</a>
                          </th>
                          <th>
                            <a class="list-sort text-muted" data-sort="item-location" href="#">Цена</a>
                          </th>
                          <th>
                            <a class="list-sort text-muted" data-sort="item-owner" href="#">Магазин</a>
                          </th>
                          <th colspan="2">
                            <a class="list-sort text-muted" data-sort="item-created" href="#">Дата создание</a>
                          </th>
                        </tr>
                    </thead>
                  <tbody class="list font-size-base">
                    @forelse ($products as $product)
                    <tr>
                        <td>
  
                          <!-- Checkbox -->
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxOne">
                            <label class="custom-control-label" for="listCheckboxOne"></label>
                          </div>
  
                        </td>
                        <td>
  
                          <!-- Avatar -->
                          <div class="avatar avatar-xs align-middle mr-2">
                            <img class="avatar-img rounded-circle" src="/storage/{{ $product->image }}" alt="...">
                          </div> <a class="item-name text-reset" href="team-overview.html">{{ $product->name }}</a>
  
                        </td>
                        <td>
  
                          <!-- Text -->
                          <span class="item-industry">{{ $product->category->name }}</span>
  
                        </td>
                        <td>
  
                          <!-- Text -->
                            <span class="item-location">{{ $product->price }} TJS</span>
  
                        </td>
                        <td class="item-phone">
                          <!-- Avatar -->
                          <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/storage/{{ $product->store->avatar }}" alt="...">
                          </div> <a class="item-owner text-reset" href="profile-posts.html">{{ $product->store->name }}</a>
  
                        </td>
                        <td>
  
                          <!-- Badge -->
                          <time class="item-created text-capitalize" datetime="2020-01-14">{{ \Carbon\Carbon::parse($product->created_at)->locale('ru')->isoFormat('MMM DD, YYYY')}}</time>
  
                        </td>
                        <td class="text-right">
  
                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                      {{-- <td class="text-right">
                        
                      </td> --}}
                    
                    @empty
                    <tr>
                        <td colspan="7">
                            <span>Данные отсутствуют</span>
                        </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg">
                        <li class="page-product">
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
