@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
    <div class="header mt-md-5">
        <div class="header-body">
            <!-- Title -->
            <h4 class="header-pretitle text-bold">
            <strong> Категории </strong>
            </h4>
            <!-- Subtitle -->
            <p class="header-subtitle">
                Просмотр категории
            </p>
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
                    <img src="{{ '/storage/'.$category->icon }}" alt="..." class="avatar-img rounded">
                </div>
                </div>
                <div class="col ml-n2">
                <!-- Title -->
                <h4 class="text-body text-focus mb-1 name">
                    {{ $category->name }}
                </h4>
                <!-- Time -->
                <p class="small text-muted mt-3 mb-0">
                    <span class="fe fe-clock"></span> <time datetime="2018-05-24"> Created {{ $category->created_at }}</time>
                </p>
                </div>
            </div> <!-- / .row -->
            </div>
        </div>
        </div>
    </div>
</div>
@endsection