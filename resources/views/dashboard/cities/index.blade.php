@extends('dashboard.layouts.app')
@section('title', 'Все категории')
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
                  список городов
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                   Все города <span class="badge badge-pill badge-soft-secondary"> {{ $cities->total() }}</span>
                </h1>

              </div>
              <div class="col-auto">

                <!-- Buttons -->
                <a href="{{ route('cities.create')}}" class="btn btn-primary ml-2">
                  Добавить
                </a>

              </div>
            </div> <!-- / .row -->
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
            <div class="card" data-list='{"valueNames": ["item-name", "item-order"]}' id="contactsList">
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
                                    <input class="list-search form-control" type="search" placeholder="Поиск" data-item="cities" id="search" value="{{ request()->search }}">
                                </div>
                            </form>
                        </div>
                    </div> <!-- / .row -->
                </div>
                <div id="cities">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-nowrap card-table">
                            <thead>
                                <tr>
                                <th style="width: 50px;">
                                    <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-order">
                                        №
                                    </a>
                                </th>
                                <th>
                                    <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-name">
                                        Название
                                    </a>
                                </th>
                                <th class="text-right">

                                </th>
                                </tr>
                            </thead>
                            <tbody class="list font-size-base">
                                @forelse ($cities as $key => $item)
                                <tr>
                                <td class="item-order">
                                    {{ ++$key }}
                                </td>
                                <td class="item-name">
                                    <a class="item-name text-reset" href="{{ route('attr_val.index', ['id'=> $item->id]) }}">{{ $item->name }}</a>
                                </td>

                                <td class="text-right">
                                    <form class="d-inline" action="{{ route('cities.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="button" class="btn btn-danger m-1 pull-right delete-confirm">
                                            <i class="fe fe-trash"> </i></button>
                                    </form>
                                    <a href="{{ route('cities.edit', $item) }}" class="btn btn-primary m-1 pull-right">
                                        <i class="fe fe-edit"> </i>
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
                                {{ $cities->links() }}
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
