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
            <div class="row align-items-center">
              <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  список значение атрибута
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                   {{ $parent->name }}
                </h1>

              </div>
              <div class="col-auto">

                <!-- Buttons -->
                <a href="{{ route('attr_val.create', ['id' => $parent->id] )}}" class="btn btn-primary ml-2">
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
                      Все значения <span class="badge badge-pill badge-soft-secondary">{{ $attributes->count() }}</span>
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
                        <a class="list-sort text-muted" data-sort="item-name" href="#">Значение</a>
                      </th>
                      <th class="text-right">

                      </th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">
                    @forelse ($attributes as $key => $item)
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        {{ ++$key }}

                      </td>
                      <td>
                        <a class="item-name text-reset" href="profile-posts.html">{{ $item->name }}</a>
                      </td>
                      <td>
                        <a class="item-name text-reset" href="profile-posts.html">

                            @if ($parent->name == 'Цвет')

                            <span class="badge text-white" style="background-color: {{ $item->value }}">
                                    Цвет
                            </span>
                            @else
                            {{ $item->value }}
                            @endif
                        </a>
                      </td>

                      <td class="text-right">
                        <form class="d-inline" action="{{ route('attr_val.destroy', ['id' => $parent->id, 'val_id' => $item]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger m-1 pull-right">
                                <i class="fe fe-trash"> </i></button>
                            @method('DELETE')
                        </form>
                        <a href="{{ route('attr_val.edit', ['id' => $parent->id, 'val_id' => $item]) }}" class="btn btn-primary m-1 pull-right">
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
                           {{ $attributes->links() }}
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
