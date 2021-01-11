@extends('dashboard.layouts.app')
@section('title', 'Пользователи')
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
                  список ролей
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                  Все роли
                </h1>

              </div>

            </div> <!-- / .row -->
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap active">
                      Все роли <span class="badge badge-pill badge-soft-secondary">823</span>
                    </a>
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </div>

        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-order", "item-name", "item-description", "item-permissions"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
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
                        <input class="list-search form-control" type="search" placeholder="Search">
                      </div>
                    </form>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-hover card-table">
                  <thead>
                    <tr>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-order">№</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-name">Роль</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-description">Описание</a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-permissions">Разрешения</a>
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">

                    @forelse($roles as $key => $role)

                    <tr>
                      <td class="item-order">
                        {{ ++$key }}
                      </td>
                      <td class="item-name">
                        {{ $role->display_name }}
                      </td>
                      <td class="item-description">
                        {{ $role->description }}
                      </td>
                      <td class="item-permissions">
                        @foreach($role->permissions as $permission)
                            @if($loop->last)
                                {{ $permission->display_name }}
                            @else
                                {{ $permission->display_name.', ' }}
                            @endif
                        @endforeach
                      </td>
                      <td class="text-right">
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary m-1 pull-right">
                            <i class="fe fe-edit"> </i>
                        </a>
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
