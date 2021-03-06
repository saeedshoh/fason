<div class="table-responsive">
    <table class="table table-sm table-hover table-nowrap card-table cs__table">
        <thead>
            <tr>
                <th style="width: 50px;">
                    <a class="list-sort text-muted" data-sort="item-order" href="#">№</a>
                </th>
                <th>
                    <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
                </th>
                <th>
                    <a class="list-sort text-muted" data-sort="item-position" href="#">Позиция</a>
                </th>
                <th>
                    <a class="list-sort text-muted" data-sort="item-parent" href="#">Родитель</a>
                </th>
                <th class="text-right">

                </th>
            </tr>
        </thead>
        <tbody class="list">

            @forelse ($categories as $category)
            <tr class="{{ $category->is_active ? 'table-success ' : 'table-danger' }}">
                <td>
                    #{{ $category->id }}
                </td>
                <td>
                    <!-- Avatar -->
                    <div class="avatar avatar-xs align-middle mr-2">
                        @if($category->parent_id == '0')
                        <img class="avatar-img rounded-circle" src="/storage/{{ $category->icon ?? 'camera.svg' }}">
                        @endif
                    </div>
                    <a class="item-name text-reset" href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                </td>
                <td>
                    <select data-id="{{ $category->id }}" class="item-order text-reset form-control order_no" name="order_no" id="order_no">
                        @foreach ($allCategories->where('parent_id', $category->parent_id)->sortBy('order_no') as $sibling)
                        <option {{ $sibling->order_no == $category->order_no ? 'selected' : '' }} value="{{ $sibling->order_no }}">{{ $loop->iteration }}</option>
                        @endforeach
                    </select>
                </td>
                @if ($category->parent_id != null)
                <td>
                    <div class="avatar avatar-xs align-middle mr-2">
                        @if(!@isset($category->parent->parent->id))
                        <img class="avatar-img rounded-circle" src="/storage/{{ $category->parent ? $category->parent->icon : '' }}">
                        @endif
                    </div>
                    <a class="item-parent text-reset" href="{{ route('categories.show', $category) }}">{{ $category->parent ? $category->parent->name : '' }}</a>
                </td>
                @else
                <td>

                </td>
                @endif

                <td class="d-flex justify-content-end">
                    @permission('delete-categories')
                    <form class="d-inline" action="{{ route('categories.destroy', $category) }}" method="POST">
                        @csrf
                        <button type="submit" href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger m-1 pull-right delete-confirm">
                            <i class="fe fe-trash"></i>
                        </button>
                        @method('DELETE')
                    </form>
                    @endpermission
                    @permission('update-categories')
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary m-1 pull-right">
                        <i class="fe fe-edit"></i>
                    </a>
                    @endpermission
                    <a href="{{ route('categories.show', $category) }}" class="btn btn-warning m-1 fa-pull-right">
                        <i class="fe fe-eye" aria-hidden="true"></i>
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
        {{ $categories->links() }}
    </nav>
</div>
