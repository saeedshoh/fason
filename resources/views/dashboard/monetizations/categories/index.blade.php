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
                        Обшие <span class="badge badge-pill badge-soft-secondary">{{ $monetizations->count() - $personalisations_count - $monetizations_categories_count }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('personalisations.index') }}" class="nav-link text-nowrap">
                        По магазинам <span class="badge badge-pill badge-soft-secondary">{{ $personalisations_count }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categoryMonetizations.index') }}" class="nav-link text-nowrap active">
                          По категориям <span class="badge badge-pill badge-soft-secondary">{{ $monetizations_categories_count }}</span>
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

        <!-- Card -->
        <div class="card" data-list='{"valueNames": ["item-order", "item-name", "item-min", "item-max", "item-margin", "item-added_val"]}'>
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
                    <th></th>
                </tr>
              </thead>
              <tbody class="list">
                @forelse ($monetizationsCategories as $key => $monetizationCategory)
                    @if ($monetizationCategory->monetizations_count !== 0)
                    <tr>
                        <td class="item-order py-0">
                            #{{ $monetizationCategory->id }}
                        </td>
                        <td class="item-name py-0">
                            <span class="text-reset ">{{ $monetizationCategory->name }}</span>
                        </td>
                        <td class="text-right py-0">
                            <a href="{{ route('showCategoryMonetization', $monetizationCategory) }}" class="btn btn-warning m-1 fa-pull-right">
                                <i class="fe fe-eye" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @else
                    @endif
                @empty
                    <tr>
                        <td class="text-muted h4" colspan="12">Список монетизаций пуст</td>
                    </tr>
                @endforelse
              </tbody>
            </table>

            <div class="text-muted h4 no-result p-3 m-1 py-0" style="display: none">Список монетизаций пуст</div>

          </div>
          <div class="card-footer d-flex justify-content-center">
            {{ $monetizationsCategories->links() }}
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
