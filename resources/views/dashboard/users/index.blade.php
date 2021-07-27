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
                  Все {{ request()->is('dashboard/users*') ? 'Пользователи' : 'Клиенты' }} <span class="badge badge-pill badge-soft-secondary">{{ $users->total() }}</span>
                </h1>

              </div>
            @permission('create-employee')
                <div class="col-auto">
                    @if(request()->is('dashboard/users*'))
                    <!-- Buttons -->
                    <a href="{{ route('users.create') }}" class="btn btn-primary ml-2">
                    Добавить сотрудника
                    </a>
                    @endif
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
            <div class="card" data-list='{"valueNames": ["item-order", "item-name", "item-email", "item-phone", "item-company", "item-address", "item-registration-date"]}' id="contactsList">
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
                                    <input class="form-control" type="text" placeholder="Поиск" data-item="{{ (request()->is('dashboard/users')) ? 'users' : 'clients' }}" id="search" value="{{ request()->search }}" autocomplete="off">
                                </div>
                            </form>
                        </div>
                    </div> <!-- / .row -->
                </div>
                <div id="{{ (request()->is('dashboard/users')) ? 'users' : 'clients' }}">
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
                            <th>
                                <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-company">
                                Магазин
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
                                        <img class="avatar-img rounded-circle" src="/storage/{{ empty($user->profile_photo_path)  ? 'theme/no-photo.svg' :  $user->profile_photo_path}}" alt="...">
                                    </div>
                                    <a class="text-reset" href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
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
                                    <a class="text-reset" href="{{ isset($user->store->name) ? route('showStoreInfo', $user->store->id) : 'javascrip:void();' }}">{{ $user->store->name ?? '' }}</a>
                                    </td>
                                    <td class="text-right">
                                        @permission('delete-employee')
                                            <form class="d-inline" action="{{ route('users.destroy', $user) }}" method="POST">
                                                @csrf
                                                <button type="submit" href="{{ route('users.destroy', $user->id) }}"  class="btn btn-danger m-1 pull-right delete-confirm">
                                                <i class="fe fe-trash"> </i></button>
                                                @method('DELETE')
                                            </form>
                                        @endpermission
                                        @permission('update-employee')
                                            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary m-1 pull-right">
                                                <i class="fe fe-edit"> </i>
                                            </a>
                                        @endpermission
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
                                        <img class="avatar-img rounded-circle" src="/storage/{{ $user->profile_photo_path == ''? 'theme/no-photo.svg' : $user->profile_photo_path }}" alt="...">
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
                                    <td class="item-company">
                                    <!-- Link -->
                                    <a class="text-reset" href="{{ isset($user->store->name) ? route('showStoreInfo', $user->store->id) : 'javascrip:void();' }}">{{ $user->store->name ?? '' }}</a>
                                    </td>
                                    <td class="item-registration-date">
                                    {{ $user->created_at->format('H:m:s, d/m/Y') ?? '' }}
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('users.show', $user) }}" class="btn btn-warning m-1">
                                            <i class="fe fe-eye" aria-hidden="true"></i>
                                        </a>
                                        @permission('update-employee')
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary m-1">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        @endpermission
                                        @permission('delete-employee')
                                        <form class="d-inline" action="{{ route('users.destroy', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger m-1 pull-right delete-confirm">
                                            <i class="fe fe-trash"> </i></button>
                                            @method('DELETE')
                                        </form>
                                        @endpermission
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
                        <nav>
                            {{ $users->links() }}
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
