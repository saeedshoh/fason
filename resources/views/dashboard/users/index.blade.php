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
                  список пользователей
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                  Все Пользователи
                </h1>

              </div>
              <div class="col-auto">

                <!-- Navigation (button group) -->
                <div class="nav btn-group d-inline-flex" role="tablist">
                  <button class="btn btn-white active" id="contactsListTab" data-toggle="tab" data-target="#contactsListPane" role="tab" aria-controls="contactsListPane" aria-selected="true">
                    <span class="fe fe-list"></span>
                  </button>
                  <button class="btn btn-white" id="contactsCardsTab" data-toggle="tab" data-target="#contactsCardsPane" role="tab" aria-controls="contactsCardsPane" aria-selected="false">
                    <span class="fe fe-grid"></span>
                  </button>
                </div> <!-- / .nav -->

                <!-- Buttons -->
                <a href="#!" class="btn btn-primary ml-2">
                  Add contact
                </a>

              </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap active">
                      Все пользователи <span class="badge badge-pill badge-soft-secondary">823</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Активные <span class="badge badge-pill badge-soft-secondary"></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Неактивные <span class="badge badge-pill badge-soft-secondary"></span>
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
                    
                    @forelse($users as $key => $user)

                    <tr>
                      <td>

                        {{ ++$key }}

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">{{ $user->name }}</a>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:{{ $user->email }}">{{ $user->email }}</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:{{ $user->phone }}">{{ $user->phone }}</a>

                      </td>

                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">{{ $user->store->name ?? '' }}</a>

                      </td>
                      <td class="text-right">
                        <form class="d-inline" action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf 
                            <button type="submit" href="{{ route('users.destroy', $user->id) }}"  class="btn btn-danger m-1 pull-right">
                                <i class="fe fe-trash"> </i></button>
                            @method('DELETE')
                        </form>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary m-1 pull-right">
                            <i class="fe fe-edit"> </i>
                        </a>
                        <a href="{{ route('users.show', $user) }}" class="btn btn-warning m-1 fa-pull-right">
                            <i class="fe fe-eye" aria-hidden="true"></i>
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
                           {{ $users->links() }}
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