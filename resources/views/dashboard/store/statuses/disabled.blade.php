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
                    Все Магазины <span class="badge badge-pill badge-soft-secondary">{{ $storesCount }}</span>
                    </h1>

                </div>
                <div class="col-auto">

                </div>
                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                            <a href="{{ route('stores.index') }}" class="nav-link">
                                Все магазины <span class="badge badge-pill badge-soft-secondary">{{ $storesCount }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{ route('stores.accepted') }}" class="nav-link">
                                Активные <span class="badge badge-pill badge-soft-success">{{ $acceptedCount }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{ route('stores.moderation') }}" class="nav-link">
                                В модерации <span class="badge badge-pill badge-soft-warning">{{ $moderationCount }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{ route('stores.disabled') }}" class="nav-link active">
                                Отключенные <span class="badge badge-pill badge-soft-danger">{{ $stores->total() }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('stores.disabledUser') }}" class="nav-link">
                                    Отключенные клиентом <span class="badge badge-pill badge-soft-info">{{ $disabledUserCount }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('stores.starred') }}" class="nav-link">
                                  Звёзды <span class="badge badge-pill badge-success">{{ $starredCount }}</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="companiesListPane" role="tabpanel" aria-labelledby="companiesListTab">

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-order", "item-name", "item-location", "item-owner", "item-status"]}' id="companiesList">
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
                                    <input class="form-control" type="text" placeholder="Поиск" data-item="stores/disabled" id="search" value="{{ request()->search }}" autocomplete="off">
                                </div>
                            </form>
                        </div>
                    </div> <!-- / .row -->
                </div>
                <div id="stores_disabled">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-nowrap card-table">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-order">№</a>
                                    </th>
                                    <th width="10"></th>
                                    <th>
                                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-name">Название</a>
                                    </th>
                                    <th>
                                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-location">Адрес</a>
                                    </th>
                                    <th>
                                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-location">Город</a>
                                    </th>
                                    <th>
                                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-owner">Дата</a>
                                    </th>
                                    <th>
                                        <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-status">Статус</a>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="list font-size-base">
                                @forelse ($stores as $key => $store)
                                <tr class="@if($store->is_moderation) table-warning @elseif($store->is_active == 0) table-danger @else table-success @endif">
                                    <td class="item-order py-0">
                                        #{{ $store->id }}
                                    </td>
                                    <td class="py-0">
                                        <div class="d-flex align-items-start flex-column" style="width:fit-content;">
                                            @if($loop->iteration == 1 && $stores->currentPage() == 1)
                                            @else
                                            <div class="mb-1">
                                                <a class="btn btn-sm btn-outline-info change-order" data-id="{{ $store->id  }}" data-type="0" data-table="stores" data-order_number="{{ $store->order_number }}">
                                                    <i class="fe fe-arrow-up"></i>
                                                </a>
                                            </div>
                                            @endif

                                            @if($stores->perPage()*($stores->currentPage()-1)+$loop->iteration != $stores->total())
                                            <div class="mt-1">
                                                <a class="btn btn-sm btn-outline-info change-order" data-id="#{{ $store->id }}" data-type="1" data-table="stores" data-order_number="{{ $store->order_number }}">
                                                    <i class="fe fe-arrow-down"></i>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="item-name py-0">
                                        <div class="avatar avatar-xs align-middle mr-2">
                                        <img class="avatar-img rounded-circle" src="{{ Storage::url($store->avatar) }}" alt="...">
                                        </div><a class="text-reset" href="{{ route('showStoreInfo', $store->id) }}">{{ $store->name }}</a>
                                    </td>
                                    <td class="item-address py-0">
                                        {{ $store->address }}
                                    </td>
                                    <td class="item-location py-0">
                                        {{ $store->city->name ?? '' }}
                                    </td>
                                    <td class="item-created py-0">
                                        <time datetime="2020-01-14">{{ $store->created_at->format('d/m/Y') }}</time>
                                    </td>
                                    <td class="item-status py-0">
                                        <!-- Badge -->
                                        <div class="badge badge-primary">
                                            @if($store->is_moderation)
                                                В модерации
                                            @elseif($store->is_active == 0)
                                                Неактивен
                                            @else
                                                Активен
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-right py-0">
                                        <form class="d-inline" action="{{ route('ft-store.star', $store->store_id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" class="btn @if($store->no_scope_store->starred_at) btn-success @else btn-danger @endif m-1">
                                                <i class="fe fe-star" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('showStoreInfo', $store->id) }}" class="btn btn-secondary m-1 pull-right">
                                            <i class="fe fe-eye" aria-hidden="true"></i>
                                        </a>
                                        <form class="d-inline" action="{{ route('ft-store.toggle', $store->store_id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" class="btn @if($store->is_moderation)btn-primary @elseif($store->is_active == 0) btn-success @else btn-warning @endif m-1 fa-pull-right">
                                                <i class="fe @if($store->is_moderation) fe-feather @elseif($store->is_active == 0) fe-check @else fe-x @endif" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                    <tr>
                                        <td class="text-muted h4">
                                            Извините ничего не найдено
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <nav>
                            {{ $stores ->links() }}
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
