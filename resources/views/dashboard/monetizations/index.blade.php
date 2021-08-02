@extends('dashboard.layouts.app')
@section('title', 'Монетизации')
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
                  Все монетизации <span class="badge badge-pill badge-soft-secondary">{{ $monetizations->total()}}</span>
                </h1>

              </div>

              @permission('create-monitization')
                <div class="col-auto">
                  <!-- Buttons -->
                  <a href="{{ route('monetizations.create') }}" class="btn btn-primary ml-2">
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
                      <a href="{{ route('monetizations.index') }}" class="nav-link text-nowrap active">
                        Обшие <span class="badge badge-pill badge-soft-secondary">{{ $monetizations->total() - $personalisations_count - $monetizations_categories_count }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('personalisations.index') }}" class="nav-link text-nowrap">
                        По магазинам <span class="badge badge-pill badge-soft-secondary">{{ $personalisations_count }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categoryMonetizations.index') }}" class="nav-link text-nowrap">
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
        <div class="card" data-list='{"valueNames": ["monetizations-order", "monetizations-min", "monetizations-max", "monetizations-margin", "monetizations-status", "monetizations-added_val"]}'>
          <div class="card-header">

            <!-- Search -->
            <form>
              <div class="input-group input-group-flush">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fe fe-search"></i>
                  </span>
                </div>
                <input class="form-control list-search" type="search" placeholder="Поиск" autocomplete="off">
              </div>
            </form>

          </div>
          <div class="table-responsive">
            <table class="table table-sm table-nowrap card-table">
              <thead>
                <tr>

                  <th>
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
                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="monetizations-added_val">
                       Добавочная стоимость
                    </a>
                  </th>
                  <th></th>

                </tr>
              </thead>
              <tbody class="list">
                @forelse ($monetizations as $key => $monetization)
                @if($monetization->stores->isEmpty() && $monetization->categories->isEmpty())
                <tr>
                  <td class="monetizations-order py-0">
                    #{{ $monetization->id }}
                  </td>
                  <td class="monetizations-min py-0">
                    {{ $monetization->min}}
                  </td>
                  <td class="monetizations-max py-0">
                    {{ $monetization->max}}
                  </td>
                  <td class="monetizations-margin py-0">
                    {{ $monetization->margin ?? '0'}}%
                  </td>
                  <td class="monetizations-added_val py-0">
                    {{ $monetization->added_val ?? '0'}}
                  </td>
                  <td class="text-right py-0">

                    @permission('delete-monitization')
                      <form class="d-inline" action="{{ route('monetizations.destroy', $monetization) }}" method="POST">
                          @csrf
                          <button type="submit" href="{{ route('monetizations.destroy', $monetization->id) }}"  class="btn btn-danger m-1 pull-right delete-confirm">
                              <i class="fe fe-trash"> </i></button>
                          @method('DELETE')
                      </form>
                    @endpermission

                    @permission('update-monitization')
                      <a href="{{ route('monetizations.edit', $monetization) }}" class="btn btn-primary m-1 pull-right">
                          <i class="fe fe-edit"> </i>
                      </a>
                    @endpermission

                  </td>
                </tr>
                @endif
                @empty
                    <tr>
                        <td class="text-muted h4" colspan="12">Список монетизаций пуст</td>
                    </tr>
                @endforelse

              </tbody>
            </table>
            <div class="text-muted h4 no-result p-3 m-1" style="display: none">Список монетизаций пуст</div>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                {{ $monetizations->links() }}
            </nav>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
