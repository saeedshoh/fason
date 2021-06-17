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
                    <img class="avatar-img rounded-circle" src="/storage/{{ $user->profile_photo_path  ?? 'theme/no-photo.svg' }}" alt="...">
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
                    <img class="avatar-img rounded-circle" src="/storage/{{ $user->profile_photo_path ?? 'theme/no-photo.svg' }}" alt="...">
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
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg">
            <li class="page-item">
            {{ $users->links() }}
            </li>
        </ul>
    </nav>
</div>
