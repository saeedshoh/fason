@extends('dashboard.layouts.app')
@section('title', 'Все баннера')
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
                  список баннеров
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                   Все баннера <span class="badge badge-pill badge-soft-secondary"> {{ $banners->count() }}</span>
                </h1>

              </div>
              <div class="col-auto">

                <!-- Buttons -->
                <a href="{{ route('banners.create')}}" class="btn btn-primary ml-2">
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

                        №

                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
                      </th>
                      <th>
                        Позиция
                      </th>
                      <th class="text-right">

                      </th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">

                    @forelse ($banners as $key => $banner)
                    <tr>
                      <td>

                        {{ ++$key }}

                      </td>

                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/storage/{{ $banner->image }}">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Баннер {{ ++$key }}</a>

                      </td>
                      <td>
                        {{ $banner->position }}
                      </td>
                      <td class="text-right">
                        <form class="d-inline" action="{{ route('banners.destroy', $banner) }}" method="POST">
                            @csrf
                            <button type="submit" href="{{ route('banners.destroy', $banner->id) }}"  class="btn btn-danger m-1 pull-right delete-confirm">
                                <i class="fe fe-trash"> </i></button>
                            @method('DELETE')
                        </form>
                        <a href="{{ route('banners.edit', $banner) }}" class="btn btn-primary m-1 pull-right">
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
