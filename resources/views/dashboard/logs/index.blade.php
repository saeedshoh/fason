@extends('dashboard.layouts.app')
@section('title', 'Логи')
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
                  логи
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Все логи <span class="badge badge-pill badge-soft-secondary">{{ $logs->total() }}</span>
                </h1>

              </div>
            </div>
          </div>
        </div>

        <!-- Card -->
        <div class="card" data-list='{"valueNames": ["logs-order", "logs-user-id", "logs-action", "logs-table", "logs-description"]}'>
            <div class="card-header">

                <!-- Search -->
                <form>
                <div class="input-group input-group-flush">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fe fe-search"></i>
                    </span>
                    </div>
                    <input class="form-control" type="search" placeholder="Поиск" data-item="logs" id="search" value="{{ request()->search }}">
                </div>
                </form>

            </div>
            <div id="logs">
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
                                {{ $log->user->name ?? 'Пользователь был удален' }}
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
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
