<div class="table-responsive">
    <table class="table table-sm card-table">
    <thead>
        <tr>

        <th>
            <a href="javascript:void(0);" class="text-muted list-sort" data-sort="logs-order">
            №
            </a>
        </th>
        <th>
            <a href="javascript:void(0);" class="text-muted list-sort" data-sort="logs-user-id">
            Сотрудник
            </a>
        </th>
        <th>
            <a href="javascript:void(0);" class="text-muted list-sort" data-sort="logs-action">
            Действие
            </a>
        </th>
        <th>
            <a href="javascript:void(0);" class="text-muted list-sort" data-sort="logs-table">
            Таблица
            </a>
        </th>
        <th>
            <a href="javascript:void(0);" class="text-muted list-sort" data-sort="logs-description">
            Описание
            </a>
        </th>
        <th></th>

        </tr>
    </thead>
    <tbody class="list">
        @forelse ($logs as $log)
        <tr>
        <td class="logs-order">
            #{{ $log->id }}
        </td>
        <td class="logs-user-id">
            {{ $log->user->name}}
        </td>
        <td class="logs-action">
                @if ($log->action == 1)
                    <div class="badge badge-primary">
                        Создание
                    </div>
                @elseif($log->action == 2)
                    <div class="badge badge-warning">
                        Изменение
                    </div>
                @elseif($log->action == 3)
                    <div class="badge badge-danger">
                        Удаление
                    </div>
                @endif
            {{ $log->max}}
        </td>
        <td class="logs-table">
            {{ $log->table}}
        </td>
        <td class="logs-description">
            {{ $log->description }}
        </td>
        </tr>
        @empty
            <tr>
                <td class="text-muted h4" colspan="12">Список логов пуст</td>
            </tr>
        @endforelse

    </tbody>
    </table>
</div>
<div class="card-footer d-flex justify-content-center">
    {{ $logs->links() }}
</div>
