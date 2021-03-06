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
                  список атрибутов
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                   Все аттрибуты <span class="badge badge-pill badge-soft-secondary"> {{ $attributes->total() }}</span>
                </h1>

              </div>

              @permission('create-attributes')
                <div class="col-auto">
                  <!-- Buttons -->
                  <a href="{{ route('attributes.create')}}" class="btn btn-primary ml-2">
                    Добавить
                  </a>
                </div>
              @endpermission

            </div> <!-- / .row -->
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
                                    <input class="list-search form-control" type="search" placeholder="Поиск" data-item="attributes" id="search" value="{{ request()->search }}" autocomplete="off">
                                </div>
                            </form>

                        </div>
                    </div> <!-- / .row -->
                </div>
                <div id="attributes">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-nowrap card-table">
                        <thead>
                            <tr>
                            <th style="width: 50px;">
                                <!-- Checkbox -->
                                <a class="list-sort text-muted" data-sort="item-order" href="#">№</a>
                            </th>
                            <th>
                                <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
                            </th>
                            <th class="text-right">

                            </th>
                            </tr>
                        </thead>
                        <tbody class="list font-size-base">
                            @forelse ($attributes as $key => $item)
                            <tr>
                            <td class="item-order py-0">
                                <!-- Checkbox -->
                                #{{ $item->id }}
                            </td>
                            <td class="py-0">
                                <a class="item-name text-reset" href="{{ route('attr_val.index', ['id'=> $item->id]) }}">{{ $item->name }}</a>
                            </td>

                            <td class="text-right py-0">
                                 @permission('delete-attributes')
                                  <form class="d-inline" action="{{ route('attributes.destroy', $item) }}" method="POST">
                                      @csrf
                                      <button type="submit" href="{{ route('attributes.destroy', $item->id) }}"  class="btn btn-danger m-1 pull-right delete-confirm">
                                          <i class="fe fe-trash"> </i></button>
                                      @method('DELETE')
                                  </form>
                                @endpermission

                                @permission('update-attributes')
                                  <a href="{{ route('attributes.edit', $item) }}" class="btn btn-primary m-1 pull-right">
                                      <i class="fe fe-edit"> </i>
                                  </a>
                                @endpermission

                                <a href="{{ route('attr_val.index', ['id'=> $item->id]) }}" class="btn btn-success m-1 pull-right">
                                    <i class="fe fe-eye"> </i>
                                </a>
                            </td>

                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted h4 py-0" colspan="7">
                                    <span>Данные отсутствуют </span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <nav>
                            {{ $attributes->links() }}
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
