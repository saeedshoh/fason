<div class="table-responsive">
    <table class="table table-sm table-nowrap card-table">
    <thead>
        <tr>
        <th>

            <!-- Checkbox -->
            <div class="custom-control custom-checkbox table-checkbox">
            <input type="checkbox" class="list-checkbox-all custom-control-input" name="ordersSelect" id="ordersSelectAll">
            <label class="custom-control-label" for="ordersSelectAll">&nbsp;</label>
            </div>

        </th>
        <th>
            <a href="#" class="text-muted list-sort" data-sort="orders-order">
            Номер заказа
            </a>
        </th>
        <th>
            <a href="#" class="text-muted list-sort" data-sort="orders-product">
            Товар
            </a>
        </th>
        <th>
            <a href="#" class="text-muted list-sort" data-sort="orders-date">
            Дата
            </a>
        </th>
        <th>
            <a href="#" class="text-muted list-sort" data-sort="orders-total">
            Сумма
            </a>
        </th>

        <th>
            <a href="#" class="text-muted list-sort" data-sort="orders-method">
            Кол/во
            </a>
        </th>
        <th colspan="2">
            <a href="#" class="text-muted list-sort" data-sort="orders-status">
            Статус
            </a>
        </th>
        </tr>
    </thead>
    <tbody class="list">
        @forelse ($orders as $order)
        <tr>
            <td>

            <!-- Checkbox -->
            <div class="custom-control custom-checkbox table-checkbox">
                <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
            </div>

            </td>
            <td class="orders-order">
            #{{ $order->id }}
            </td>
            <td class="orders-product">
            {{ $order->name }}
            </td>
            <td class="orders-date">

            <!-- Time -->

            <time datetime="{{ $order->updated_at->format('d-m-y') }}">{{ $order->updated_at->format('d/m/y') }}</time>

            </td>
            <td class="orders-total">
            {{ $order->total }} TJS
            </td>

            <td class="orders-method">
            {{ $order->quantity }} шт
            </td>
            <td class="orders-status">
            <!-- Badge -->
            <div class="badge @if($order->order_status_id == 1) badge-soft-warning @elseif($order->order_status_id == 2) badge-soft-success @else badge-soft-danger @endif">
                {{ $order->order_status->name }}
            </div>

            </td>
            <td class="text-right">

            </td>
        </tr>
        @empty

        @endforelse

    </tbody>
    </table>
</div>
<div class="card-footer d-flex justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg">
            <li class="page-item">
            {{ $orders->links() }}
            </li>
        </ul>
    </nav>
</div>
