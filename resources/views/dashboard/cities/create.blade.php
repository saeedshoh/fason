@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <!-- Header -->
            <div class="header">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Добавление города
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Добавление
                        </h1>

                        </div>
                        <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{ route('cities.index')}}" class="btn btn-primary ml-2">
                            Все города
                        </a>

                        </div>
                    </div>
                </div>
            </div>
        @if($errors->any())
            <ul class="list-group ">
                @foreach($errors->all() as $error)
                    <li class=" list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('cities.store') }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate>
                            @csrf
                            @method('POST')
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Название</label>

                                    <input type="text" class="form-control" id="name" placeholder="Введите название города" name="name" value="{{ old('name') }}" autocomplete="off" required="">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-2" type="submit">Добавить</button>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
