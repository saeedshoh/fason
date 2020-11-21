@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
    <div id="tables">
        <!-- Header -->
        <div class="header mt-md-5">
            <div class="header-body">
                <!-- Title -->
                <div class="text-right container" >
                    <h3 class="header-pretitle text-left">
                        Категории
                    </h3>
                </div>
                <!-- Subtitle -->
            </div>
        </div>
    @if (session()->get('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <!-- Table -->
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col"><h4 class="card-header-title">
                        Все категории
                    </h4></div>
                    <div class="col-auto">
                        <a href="{{ route('categories.create')}}" class="btn btn-success pull-right">
                        <i class="fe fe-plus-square-o mr-15 "> Создать</i>
                        </a>
                    </div>
                </div>
            </div>
        <div class="table-responsive">
        <table class="table table-sm table-hover mb-0 table-bordered">
            <thead class="active">
                <th> №</th>
                <th> Название </th>
                <th> Изображение </th>
                <th class="text-right"> Действие </th>
            </thead>
        <tbody class="table-hover">
            @forelse ( $categories as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td colspan="1" ><p maxlength="10" >{{$item->name}}</p></td>
                <td><img width="100" src="/storage/{{ $item->icon }}"></td>
                <td class="text-right" >
                    <form class="formi" action="{{ route('categories.destroy', $item) }}" method="POST">
                        @csrf 
                        <button type="submit" href="{{ route('categories.destroy', $item->id) }}"  class="btn btn-danger m-1 pull-right">
                            <i class="fe fe-trash"> </i></button>                            
                        @method('DELETE')
                    </form>
                    <a href="{{ route('categories.edit', $item) }}" class="btn btn-primary m-1 pull-right">
                        <i class="fe fe-edit"> </i>
                    </a>
                    <a href="{{ route('categories.show', $item) }}" class="btn btn-warning m-1 fa-pull-right">
                        <i class="fe fe-eye" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        <h2>Данные отсутствуют </h2>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
        </div>
        </div>
    </div>
    </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">{{$categories->links()}}</li>
            </ul>
        </nav>
    </div>
</div>
@endsection