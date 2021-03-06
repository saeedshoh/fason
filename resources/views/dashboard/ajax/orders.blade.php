<div class="table-responsive">
    <table class="table table-sm table-nowrap card-table">
        <thead>
            <tr>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-order">
                    №
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-client">
                Клиент
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-client-info">
                Контакты клиента
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-product">
                Товар
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-store">
                Магазин
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-store-info">
                Контакты магазина
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-date">
                Дата заказа
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-total">
                Цена
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-margin">
                Маржа
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="orders-status">
                Статус
                </a>
            </th>

            </tr>
        </thead>
        <tbody class="list">
        @forelse ($orders as $key => $order)
        <tr class="table-@if($order->order_status->id == 1)warning @elseif($order->order_status->id == 2)danger @elseif($order->order_status->id == 4)primary @elseif($order->order_status->id == 5)secondary @else()success @endif">
            <td class="orders-order">
                #{{ $order->id}}
            </td>
            <td class="orders-client">
                <a href="{{ route('orders.show', $order) }}">
                {{ $order->user->name ?? $order->user->phone}}
                </a>
            </td>
            <td class="orders-client-info">
                {{ 'Тел: '.$order->user->phone.', Адрес:'.$order->user->address}}
            </td>
            <td class="orders-product">
                {{ $order->no_scope_product->name}}
            </td>
            <td class="orders-store">
                {{ $order->no_scope_product->no_scope_store->name}}
            </td>
            <td class="orders-store-info">
                {{ 'Тел: '.$order->no_scope_product->no_scope_store->user->phone.', Адрес: '.$order->no_scope_product->no_scope_store->address }}
            </td>
            <td class="orders-date">
                <!-- Time -->
                <time datetime="{{ $order->created_at->format('d/m/Y') }}">{{ $order->created_at->format('d-m-Y') }}</time>
            </td>
            <td class="orders-total">
                {{ $order->total}} Сомони
            </td>
            <td class="orders-margin">
                {{ $order->margin}} Сомони
            </td>
            <td class="orders-status">
                <!-- Badge -->
                <div class="badge badge-primary">
                {{ $order->order_status->name }}
                </div>
            </td>
            </tr>
            @empty
                <tr>
                    <td class="text-muted h4" colspan="12">Список заказов пуст</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>
<div class="card-footer d-flex justify-content-center">
    {{ $orders->links() }}
</div>
