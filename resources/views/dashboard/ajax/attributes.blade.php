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
        <th class="text-right">

        </th>
        </tr>
    </thead>
    <tbody class="list font-size-base">
        @forelse ($attributes as $key => $item)
        <tr>
        <td>

            <!-- Checkbox -->
            #{{ $item->id }}

        </td>
        <td>
            <a class="item-name text-reset" href="{{ route('attr_val.index', ['id'=> $item->id]) }}">{{ $item->name }}</a>
        </td>

        <td class="text-right">
            <form class="d-inline" action="{{ route('attributes.destroy', $item) }}" method="POST">
                @csrf
                <button type="submit" href="{{ route('attributes.destroy', $item->id) }}"  class="btn btn-danger m-1 pull-right delete-confirm">
                    <i class="fe fe-trash"> </i></button>
                @method('DELETE')
            </form>
            <a href="{{ route('attributes.edit', $item) }}" class="btn btn-primary m-1 pull-right">
                <i class="fe fe-edit"> </i>
            </a>
            <a href="{{ route('attr_val.index', ['id'=> $item->id]) }}" class="btn btn-success m-1 pull-right">
                <i class="fe fe-eye"> </i>
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
    <nav>
        {{ $attributes->links() }}
    </nav>
</div>
