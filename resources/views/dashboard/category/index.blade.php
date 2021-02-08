@extends('dashboard.layouts.app')
@section('title', 'Все категории')
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
                  список категории
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                   Все категории  <span class="badge badge-pill badge-soft-secondary"> {{ $categories->count() }}</span>
                </h1>

              </div>
              <div class="col-auto">

                <!-- Buttons -->
                <a href="{{ route('categories.create')}}" class="btn btn-primary ml-2">
                  Добавить
                </a>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>
        @if (session()->get('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif

        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-name", "item-order", "item-parent"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Form -->
                    <form>
                      <div class="input-group input-group-flush">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fe fe-search"></i>
                          </span>
                        </div>
                        <input class="list-search form-control" type="search" placeholder="Найти">
                      </div>
                    </form>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                  <thead>
                    <tr>
                      <th style="width: 50px;">

                        №

                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-order" href="#">Позиция</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-parent" href="#">Родитель</a>
                      </th>
                      <th class="text-right">

                      </th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">

                    @forelse ( $categories as $key => $category)
                    <tr>
                      <td>

                        {{ ++$key }}

                      </td>

                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/storage/{{ $category->icon }}">
                        </div> <a class="item-name text-reset" href="profile-posts.html">{{ $category->name }}</a>

                      </td>
                      <td>
                        <select data-id="{{ $category->id }}" class="item-order text-reset form-control order_no" name="order_no" id="order_no">
                            @foreach ($allCategories->where('parent_id', $category->parent_id)->sortBy('order_no') as $sibling)
                                <option {{ $sibling->order_no == $category->order_no ? 'selected' : '' }}  value="{{ $sibling->order_no }}">{{ $loop->iteration }}</option>
                            @endforeach
                        </select>
                      </td>
                      @if ($category->parent_id != null)
                        <td>
                          <div class="avatar avatar-xs align-middle mr-2">
                            <img class="avatar-img rounded-circle" src="/storage/{{ $category->parent ? $category->parent->icon : '' }}">
                          </div> <a class="item-parent text-reset" href="profile-posts.html">{{ $category->parent ? $category->parent->name : '' }}</a>
                        </td>
                      @else
                          <td>

                          </td>
                      @endif

                      <td class="text-right">
                        <form class="d-inline" action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            <button type="submit" href="{{ route('categories.destroy', $category->id) }}"  class="btn btn-danger m-1 pull-right delete-confirm">
                                <i class="fe fe-trash"> </i></button>
                            @method('DELETE')
                        </form>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary m-1 pull-right">
                            <i class="fe fe-edit"> </i>
                        </a>
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-warning m-1 fa-pull-right">
                            <i class="fe fe-eye" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                    @isset($category->children)
                      @foreach($category->children as $category)
                      <tr>
                        <td>
                          {{ ++$key }}
                        </td>
                        <td>
                          <!-- Avatar -->
                          <div class="avatar avatar-xs align-middle ml-5 mr-2">
                            <img class="avatar-img rounded-circle" src="/storage/{{ $category->icon }}">
                          </div> <a class="item-name text-reset" href="profile-posts.html">&emsp;{{ $category->name }}</a>
                        </td>
                        <td>
                          {{ $category->parent->name }}
                        </td>
                        <td class="text-right">
                          <form class="d-inline" action="{{ route('categories.destroy', $category) }}" method="POST">
                              @csrf
                              <button type="submit" href="{{ route('categories.destroy', $category->id) }}"  class="btn btn-danger m-1 pull-right delete-confirm">
                                  <i class="fe fe-trash"> </i></button>
                              @method('DELETE')
                          </form>
                          <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary m-1 pull-right">
                              <i class="fe fe-edit"> </i>
                          </a>
                          <a href="{{ route('categories.show', $category) }}" class="btn btn-warning m-1 fa-pull-right">
                              <i class="fe fe-eye" aria-hidden="true"></i>
                          </a>
                        </td>

                        </tr>
                      @endforeach
                    @endisset
                    @empty
                    <tr>
                        <td colspan="7">
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
                           {{ $categories->links() }}
                        </li>
                    </ul>
                </nav>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection
