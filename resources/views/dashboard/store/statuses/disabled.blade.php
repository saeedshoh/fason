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
                                Отключенные <span class="badge badge-pill badge-soft-danger">{{ $stores->where('is_active', 0)->count() }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('stores.disabledUser') }}" class="nav-link">
                                    Отключенные клиентом <span class="badge badge-pill badge-soft-info">{{ $disabledUserCount }}</span>
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
                                    <input class="form-control" type="text" placeholder="Поиск" data-item="stores" id="search" value="{{ request()->search }}">
                                </div>
                            </form>
                        </div>
                    </div> <!-- / .row -->
                </div>
                <div id="stores">
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
                                    <td class="item-order">
                                        {{ ++$key }}
                                    </td>
                                    <td class="item-name">
                                        <div class="avatar avatar-xs align-middle mr-2">
                                        <img class="avatar-img rounded-circle" src="{{ Storage::url($store->avatar) }}" alt="...">
                                        </div><a class="text-reset" href="{{ route('showStoreInfo', $store->id) }}">{{ $store->name }}</a>
                                    </td>
                                    <td class="item-address">
                                        {{ $store->address }}
                                    </td>
                                    <td class="item-location">
                                        {{ $store->city->name }}
                                    </td>
                                    <td class="item-created">
                                        <time datetime="2020-01-14">{{ $store->created_at->format('d/m/Y') }}</time>
                                    </td>
                                    <td class="item-status">
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
                                    <td class="text-right">
                                        {{-- <form class="d-inline" action="{{ route('stores.destroy', $store) }}" method="POST">
                                            @csrf
                                            <button type="submit" href="{{ route('stores.destroy', $store->id) }}"  class="btn btn-danger m-1 pull-right delete-confirm">
                                                <i class="fe fe-trash"> </i></button>
                                            @method('DELETE')
                                        </form> --}}
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

      </div>
    </div> <!-- / .row -->
  </div>
@endsection