@extends('dashboard.layouts.app')
@section('title', 'Пользователи')
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
                  список пользователей
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                  Все {{ request()->is('dashboard/users*') ? 'Пользователи' : 'Клиенты' }} <span class="badge badge-pill badge-soft-secondary">{{ $users->count() }}</span>
                </h1>

              </div>
              <div class="col-auto">

                {{-- <!-- Navigation (button group) -->
                <div class="nav btn-group d-inline-flex" role="tablist">
                  <button class="btn btn-white active" id="contactsListTab" data-toggle="tab" data-target="#contactsListPane" role="tab" aria-controls="contactsListPane" aria-selected="true">
                    <span class="fe fe-list"></span>
                  </button>
                  <button class="btn btn-white" id="contactsCardsTab" data-toggle="tab" data-target="#contactsCardsPane" role="tab" aria-controls="contactsCardsPane" aria-selected="false">
                    <span class="fe fe-grid"></span>
                  </button>
                </div> <!-- / .nav --> --}}

                @if(request()->is('dashboard/users*'))
                <!-- Buttons -->
                <a href="{{ route('users.create') }}" class="btn btn-primary ml-2">
                  Добавить сотрудника
                </a>
                @endif

              </div>
            </div> <!-- / .row -->
            {{-- <div class="row align-items-center">
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
            </div> --}}
          </div>
        </div>

        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-order", "item-name", "item-email", "item-phone", "item-address", "item-company", "item-registration-date"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
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
                        <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-order">
                          №
                        </a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-name">
                          ФИО
                        </a>
                      </th>
                      @if(request()->is('dashboard/users*'))

                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-email">
                          E-mail
                        </a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-phone">
                          Телефон
                        </a>
                      </th>
                      <th colspan="2">
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-company">
                          Магазин
                        </a>
                      </th>

                      @else

                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-address">
                          Адрес
                        </a>
                      </th>
                      <th>
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-phone">
                          Телефон
                        </a>
                      </th>
                      <th colspan="2">
                        <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-registration-date">
                          Время регистрации
                        </a>
                      </th>

                      @endif
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">
                    @if(request()->is('dashboard/users*'))

                      @forelse($users as $key => $user)
                      <tr>
                        <td class="item-order">
                          {{ ++$key }}
                        </td>
                        <td class="item-name">
                          <!-- Avatar -->
                          <div class="avatar avatar-xs align-middle mr-2">
                            <img class="avatar-img rounded-circle" src="/storage/{{ $user->profile_photo_path }}" alt="...">
                          </div>
                          <a class="text-reset" href="profile-posts.html">{{ $user->name }}</a>
                        </td>
                        <td class="item-email">
                          <!-- Email -->
                          <a class="text-reset" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </td>
                        <td class="item-phone">
                          <!-- Phone -->
                          <a class="text-reset" href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                        </td>
                        <td class="item-company">
                          <!-- Link -->
                          <a class="text-reset" href="team-overview.html">{{ $user->store->name ?? '' }}</a>
                        </td>
                        <td class="text-right">
                          <form class="d-inline" action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            <button type="submit" href="{{ route('users.destroy', $user->id) }}"  class="btn btn-danger m-1 pull-right delete-confirm">
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
                        <td class="text-muted h4" colspan="12">
                          Извините ничего не найдено
                        </td>
                      </tr>
                      @endforelse

                    @else

                      @forelse($users as $key => $user)
                      <tr>
                        <td class="item-order">{{ ++$key }}</td>
                        <td class="item-name">
                          <!-- Avatar -->
                          <div class="avatar avatar-xs align-middle mr-2">
                            <img class="avatar-img rounded-circle" src="/storage/{{ $user->profile_photo_path }}" alt="...">
                          </div>
                          <a class="text-reset" href="{{ route('clients.show', $user) }}">{{ $user->name }}</a>
                        </td>
                        <td class="item-address">
                          {{ $user->address ?? '' }}
                        </td>
                        <td class="item-phone">
                          <!-- Phone -->
                          <a class="text-reset" href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                        </td>
                        <td class="item-registration-date">
                          {{ $user->created_at->format('H:m:s, d/m/Y') ?? '' }}
                        </td>
                        <td class="text-right">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary m-1 pull-right">
                                <i class="fe fe-edit"></i>
                            </a>
                            <form class="d-inline" action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                <button type="submit" href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger m-1 pull-right">
                                <i class="fe fe-trash"> </i></button>
                                @method('DELETE')
                            </form>
                          {{-- <a href="{{ route('users.edit', $user) }}" class="btn btn-primary m-1 pull-right">
                            <i class="fe fe-edit"> </i>
                          </a>
                          <a href="{{ route('users.show', $user) }}" class="btn btn-warning m-1 fa-pull-right">
                            <i class="fe fe-eye" aria-hidden="true"></i>
                          </a> --}}
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td class="text-muted h4" colspan="12">
                          Извините ничего не найдено
                        </td>
                      </tr>
                      @endforelse

                    @endif
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
