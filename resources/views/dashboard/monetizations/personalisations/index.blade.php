@extends('dashboard.layouts.app')
@section('title', 'Персонализированные')
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
                  список монетизаций
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Все монетизации <span class="badge badge-pill badge-soft-secondary">{{ $monetizations->count() }}</span>
                </h1>

              </div>
              <div class="col-auto">
                <!-- Buttons -->
                <a href="{{ route('monetizations.create') }}" class="btn btn-primary ml-2">
                  Добавить
                </a>
              </div>
            </div>
            <div class="row align-items-center">
                <div class="col">

                  <!-- Nav -->
                  <ul class="nav nav-tabs nav-overflow header-tabs">
                    <li class="nav-item">
                      <a href="{{ route('monetizations.index') }}" class="nav-link text-nowrap">
                        Обшие <span class="badge badge-pill badge-soft-secondary">{{ $monetizations->count() - $personalisations->count() - $monetizationsCategories->count() }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('personalisations.index') }}" class="nav-link text-nowrap active">
                        Персонализированные <span class="badge badge-pill badge-soft-secondary">{{ $personalisations->count() }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categoryMonetizations.index') }}" class="nav-link text-nowrap">
                          По категориям <span class="badge badge-pill badge-soft-secondary">{{ $monetizationsCategories->count() }}</span>
                        </a>
                    </li>
                  </ul>

                </div>
              </div>
          </div>
        </div>

        <!-- Card -->
        <div class="card" data-list='{"valueNames": ["monetizations-order", "monetizations-min", "monetizations-max", "monetizations-margin", "monetizations-status"]}'>
          <div class="card-header">

            <!-- Search -->
            <form>
              <div class="input-group input-group-flush">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fe fe-search"></i>
                  </span>
                </div>
                <input class="form-control list-search" type="search" placeholder="Поиск">
              </div>
            </form>

          </div>
          <div class="table-responsive">
            <table class="table table-sm table-nowrap card-table">
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

                  {{-- <th>
                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="monetizations-order">
                      №
                    </a>
                  </th>
                  <th>
                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="monetizations-min">
                      Сумма от
                    </a>
                  </th>
                  <th>
                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="monetizations-max">
                      Сумма до
                    </a>
                  </th>
                  <th>
                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="monetizations-margin">
                      Процентная ставка
                    </a>
                  </th>
                  <th>
                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="monetizations-status">
                      Статус
                    </a>
                  </th> --}}
                  <th></th>

                </tr>
              </thead>
              <tbody class="list">
                @forelse ($personalisations as $key => $personalisation)
                <tr>
                    <td class="item-order">
                        {{ ++$key }}
                    </td>
                    <td class="item-name">
                        <div class="avatar avatar-xs align-middle mr-2">
                            <img class="avatar-img rounded-circle" src="{{ Storage::url($personalisation->avatar) }}" alt="...">
                        </div>
                        <a class="text-reset" href="{{ route('showStoreMonetization', $personalisation) }}">{{ $personalisation->name }}</a>
                    </td>
                    <td class="item-phone">
                        <span class="text-reset">{{ $personalisation->user->phone }}</span>
                    </td>
                    <td class="item-location">
                        {{ $personalisation->city->name }}
                    </td>
                  {{-- <td class="monetizations-order">
                    #{{ ++$key}}
                  </td>
                  <td class="monetizations-min">
                    {{ $monetization->min}}
                  </td>
                  <td class="monetizations-max">
                    {{ $monetization->max}}
                  </td>
                  <td class="monetizations-margin">
                    {{ $monetization->margin}}%
                  </td>
                  <td class="monetizations-status">
                    <!-- Badge -->
                    <div class="badge badge-primary">
                      {{ $monetization->is_active ? 'Активен' : 'Неактивен' }}
                    </div>
                  </td> --}}
                  <td class="text-right">
                    <a href="{{ route('showStoreMonetization', $personalisation) }}" class="btn btn-warning m-1 fa-pull-right">
                        <i class="fe fe-eye" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>
                @empty
                    <tr>
                        <td class="text-muted h4" colspan="12">Список монетизаций пуст</td>
                    </tr>
                @endforelse

              </tbody>
            </table>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg">
                    <li class="page-item">
                    </li>
                </ul>
            </nav>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
