@extends('dashboard.layouts.app')
@section('title', 'Все категории')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="header">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                список категории
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title text-truncate">
                                Категории <span class="badge badge-pill badge-soft-secondary"> {{ $allCategories->count() }}</span>
                            </h1>

                        </div>
                        @permission('create-categories')
                        <div class="col-auto">

                            <!-- Buttons -->
                            <a href="{{ route('categories.create')}}" class="btn btn-primary ml-2">
                                Добавить
                            </a>

                        </div>
                        @endpermission
                    </div> <!-- / .row -->
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Nav -->
                            <ul class="nav nav-tabs nav-overflow header-tabs">
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link text-nowrap ">
                                        Все <span class="badge badge-pill badge-soft-secondary">{{ $allCategories->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.active') }}" class="nav-link text-nowrap active">
                                        Активные <span class="badge badge-pill badge-soft-success">{{ count($allCategories->where('is_active', 1)) }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.inactive') }}" class="nav-link text-nowrap">
                                        Неактивные <span class="badge badge-pill badge-soft-danger">{{ count($allCategories->where('is_active', 0)) }}</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            @if (session('class'))
            <div class="alert alert-{{ session()->get('class') }}">
                {{session()->get('message')}}
            </div>
            @endif

            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">

                    <!-- Card -->
                    <div class="card" data-list='{"valueNames": ["item-name", "item-order", "item-parent", "item-position"]}' id="contactsList">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Form -->
                                    <div class="input-group input-group-flush">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fe fe-search"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" type="text" placeholder="Поиск" data-item="categories/actives" id="search" value="{{ request()->search }}" autocomplete="off">
                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                        <div id="categories_actives">
                            <div class="table-responsive" id="active">
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
                                        <tr class="table-success">
                                            <td>
                                                #{{ $category->id }}
                                            </td>
                                            <td>
                                                <!-- Avatar -->
                                                <div class="avatar avatar-xs align-middle mr-2">
                                                    @if($category->parent_id == '0')
                                                    <img class="avatar-img rounded-circle" src="/storage/{{ $category->icon }}">
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
                                                <a href="{{ route('categories.show', $category) }}" class="btn btn-warning m-1">
                                                    <i class="fe fe-eye" aria-hidden="true"></i>
                                                </a>
                                                @permission('update-categories')
                                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary m-1">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                                @endpermission
                                                @permission('delete-categories')
                                                <form class="d-inline" action="{{ route('categories.destroy', $category) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger m-1 delete-confirm">
                                                        <i class="fe fe-trash"></i>
                                                    </button>
                                                    @method('DELETE')
                                                </form>
                                                @endpermission
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
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div> <!-- / .row -->
</div>
@endsection
