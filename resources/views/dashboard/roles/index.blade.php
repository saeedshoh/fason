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
                        <input class="list-search form-control" type="search" placeholder="Search">
                      </div>
                    </form>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        №
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-email" href="#">E-mail</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-phone" href="#">Телефон</a>
                      </th>
                      <th colspan="2">
                        <a class="list-sort text-muted" data-sort="item-company" href="#">Магазин</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">
                    
                    @forelse($roles as $key => $role)

                    <tr>
                      <td>

                        {{ ++$key }}

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">{{ $role->name }}</a>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:{{ $role->email }}">{{ $role->email }}</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:{{ $role->phone }}">{{ $role->phone }}</a>

                      </td>

                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">{{ $role->store->name ?? '' }}</a>

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