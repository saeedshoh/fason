@extends('dashboard.layouts.app')
@section('title', 'Магазины')
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
                  список магазинов
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                  Все Магазины <span class="badge badge-pill badge-soft-secondary">{{ $stores->count() }}</span>
                </h1>

              </div>
              <div class="col-auto">

                <!-- Navigation (button group) -->
                {{-- <div class="nav btn-group d-inline-flex" role="tablist">
                  <button class="btn btn-white active" id="companiesListTab" data-toggle="tab" data-target="#companiesListPane" role="tab" aria-controls="companiesListPane" aria-selected="true">
                    <span class="fe fe-list"></span>
                  </button>
                  <button class="btn btn-white" id="companiesCardsTab" data-toggle="tab" data-target="#companiesCardsPane" role="tab" aria-controls="companiesCardsPane" aria-selected="false">
                    <span class="fe fe-grid"></span>
                  </button>
                </div> <!-- / .nav --> --}}

                <!-- Buttons -->
                <a href="{{ route('stores.create') }}" class="btn btn-primary ml-2">
                  Добавить магазин
                </a>

              </div>
            </div> <!-- / .row -->
            {{-- <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap active">
                      Все магазины <span class="badge badge-pill badge-soft-secondary">627</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Активные <span class="badge badge-pill badge-soft-secondary"></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Неактивные <span class="badge badge-pill badge-soft-secondary"></span>
                    </a>
                  </li>
                </ul>

              </div>
            </div> --}}
          </div>
        </div>

        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="companiesListPane" role="tabpanel" aria-labelledby="companiesListTab">

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-order", "item-name", "item-phone", "item-location", "item-categories", "item-owner", "item-created", "item-status"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="companiesList">
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
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-phone">Телефон</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-location">Адрес</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-categories">Категории</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-owner">Создатель</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-created">Дата создания</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-status">Статус</a>
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">
                    @forelse ($stores as $key => $store)
                    <tr class="table-{{ $store->is_active ? 'success' : 'danger' }}">
                      <td class="item-order">
                        {{ ++$key }}
                      </td>
                      <td class="item-name">
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="{{ Storage::url($store->avatar) }}" alt="...">
                        </div><a class="text-reset" href="team-overview.html">{{ $store->name }}</a>
                      </td>
                      <td class="item-phone">
                        <a class="text-reset" href="profile-posts.html">{{ $store->user->phone }}</a>
                      </td>
                      <td class="item-location">
                        {{ $store->city->name }}
                      </td>
                      <td class="item-categories">
                        @foreach ($store->product->unique('category') as $product)
                          @if ($store->product->keys()->last())
                            {{ $name = $product->category->name }}
                          @else
                            {{ $name = $product->category->name.', ' }}
                          @endif
                        @endforeach
                      </td>
                      <td class="item-owner">
                        <a class="text-reset" href="profile-posts.html">{{ $store->user->name }}</a>
                      </td>
                      <td class="item-created">
                        <time datetime="2020-01-14">{{ $store->created_at->format('d/m/Y') }}</time>
                      </td>
                      <td class="item-status">
                        <!-- Badge -->
                        <div class="badge badge-primary">
                            {{ $store->is_active ? 'Активен' : 'Неактивен' }}
                        </div>
                      </td>
                      <td class="text-right">
                        <form class="d-inline" action="{{ route('stores.destroy', $store) }}" method="POST">
                            @csrf
                            <button type="submit" href="{{ route('stores.destroy', $store->id) }}"  class="btn btn-danger m-1 pull-right">
                                <i class="fe fe-trash"> </i></button>
                            @method('DELETE')
                        </form>
                        <a href="{{ route('ft-store.edit', $store->slug) }}" class="btn btn-primary m-1 pull-right">
                            <i class="fe fe-edit"> </i>
                        </a>
                        <form class="d-inline" action="{{ route('ft-store.toggle', $store) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button href="{{ route('ft-store.toggle', $store) }}" type="submit" class="btn btn-{{ $store->is_active ? 'warning' : 'success'}} m-1 fa-pull-right">
                                <i class="fe fe-{{ $store->is_active ? 'x' : 'check'}}" aria-hidden="true"></i>
                            </button>
                        </form>
                      </td>
                    </tr>

                    @empty
                        <tr>
                          <td>
                            Извините ничего не найдено
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
                           {{ $stores ->links() }}
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
