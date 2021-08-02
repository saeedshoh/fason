<div class="table-responsive">
    <table class="table table-sm table-hover table-nowrap card-table">
        <thead>
            <tr>
            <th style="width: 50px;">
                <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-order">
                    №
                </a>
            </th>
            <th>
                <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-name">
                    Название
                </a>
            </th>
            <th class="text-right">

            </th>
            </tr>
        </thead>
        <tbody class="list font-size-base">
            @forelse ($cities as $key => $item)
            <tr>
            <td class="item-order py-0">
                #{{ $item->id }}
            </td>
            <td class="item-name py-0">
                <a class="item-name text-reset" href="{{ route('attr_val.index', ['id'=> $item->id]) }}">{{ $item->name }}</a>
            </td>

            <td class="text-right py-0">
                <form class="d-inline" action="{{ route('cities.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn btn-danger m-1 pull-right delete-confirm">
                        <i class="fe fe-trash"> </i></button>
                </form>
                <a href="{{ route('cities.edit', $item) }}" class="btn btn-primary m-1 pull-right">
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
    <nav>
        {{ $cities->links() }}
    </nav>
</div>
