@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="header">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                    показать категорию
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title text-truncate">
                        Показать
                    </h1>

                </div>
                <div class="col-auto">

                    <!-- Buttons -->
                    <a href="{{ route('categories.index')}}" class="btn btn-primary ml-2">
                    Все категории
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
        <!-- List group -->
            <div class="list-group list-group-flush list-group-focus">
                <div class="list-group-item" href="../team-overview.html">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <!-- Avatar -->
                            <div class="avatar">
                                <img src="/storage/{{ $category->icon ?? 'camera.svg'}}" alt="..." class="avatar-img rounded">
                            </div>
                        </div>
                        <div class="col ml-n2">
                            <!-- Title -->
                            <p class="text-body text-focus mb-1 name">
                                <span class="font-weight-bold">Название:</span> {{ $category->name }}
                            </p>
                            <p class="text-body text-focus mb-1 name">
                                <span class="font-weight-bold">Аттрибуты:</span>
                                @forelse ($category->attributes as $attribute)
                                    <span>{{ $attribute->name }}@if(!$loop->last),@endif</span>
                                @empty
                                    <span>Пусто</span>
                                @endforelse
                            </p>
                            <!-- Time -->
                            <p class="small text-muted mt-3 mb-0">
                                <span class="fe fe-clock"></span>  <span class="font-weight-bold">Дата создание:</span>  <time datetime="{{ $category->created_at }}">{{ $category->created_at }}</time>
                            </p>
                        </div>
                        <div class="col-auto">
                            <!-- Buttons -->
                            <a href="{{ route('categories.edit', $category)}}" class="btn btn-primary ml-2">
                            Изменить
                            </a>
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
