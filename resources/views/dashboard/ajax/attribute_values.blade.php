<div class="table-responsive">
    <table class="table table-sm table-hover table-nowrap card-table">
        <thead>
            <tr>
            <th style="width: 50px;">
                <!-- Checkbox -->
                №
            </th>
            <th>
                <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
            </th>
            <th>
                <a class="list-sort text-muted" data-sort="item-name" href="#">Значение</a>
            </th>
            <th class="text-right">

            </th>
            </tr>
        </thead>
        <tbody class="list font-size-base">
            @forelse ($attributes as $key => $item)
            <tr>
            <td>
                <!-- Checkbox -->
                {{ ++$key }}
            </td>
            <td>
                <a class="item-name text-reset" href="{{ route('attr_val.edit', ['id' => $parent->id, 'val_id' => $item]) }}">{{ $item->name }}</a>
            </td>
            <td>
                <a class="item-name text-reset" href="{{ route('attr_val.edit', ['id' => $parent->id, 'val_id' => $item]) }}">

                    @if ($parent->name == 'Цвет')

                    <span class="badge text-white" style="background-color: {{ $item->value }}">
                            Цвет
                    </span>
                    @else
                    {{ $item->value }}
                    @endif
                </a>
            </td>

            <td class="text-right">
                <form class="d-inline" action="{{ route('attr_val.destroy', ['id' => $parent->id, 'val_id' => $item]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger m-1 pull-right delete-confirm">
                        <i class="fe fe-trash"> </i></button>
                    @method('DELETE')
                </form>
                <a href="{{ route('attr_val.edit', ['id' => $parent->id, 'val_id' => $item]) }}" class="btn btn-primary m-1 pull-right">
                    <i class="fe fe-edit"> </i>
                </a>
            </td>
            </tr>
            @empty
            <tr>
                <td class="text-muted h4" colspan="7">
                    <span>Данные отсутствуют </span>
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
            {{ $attributes->links() }}
            </li>
        </ul>
    </nav>
</div>
