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
                    Обновление категории
                </p>
            </div>
        </div>
    @if($errors->any())
        <ul class="list-group ">
            @foreach($errors->all() as $error)
                <li class=" list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('categories.store') }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate>
                    <div class="card">
                        <div class="card-body">
                            <fieldset>
                                @csrf
                                @method('POST')
                            <!-- Form -->
                            <div class="form-group">
                                <label class="title text-bold" for="name">Название <span class="text-danger">*</span></label>
                                <input id="name" name="name" type="text" value="{{$category->name}}" class="form-control" placeholder="Введите название категории" required>
                            </div>
                            <label for="category_id"> Родительская категории <p class="header-subtitle"> * По умолчанию станет родительской </p></label>
                            <select class="form-control mb-4 " name="category_id"id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="is_active">Активность категории <p class="header-subtitle"> * По умолчанию активен </p> </label> 
                            <select class="form-control mb-4" name="is_active"id="is_active">
                                    <option value="1">Активен</option>
                                    <option value="0">Неактивен</option>
                                    {{-- <option value="{{ $category->is_active=0 }}">Неактивен</option> --}}
                            </select>
                            <label for="inputicon"><p class="title text-bold mr-1" > Иконка <span class="text-danger">*</span> <small class="badge badge-soft-warning">1000px * 1000px</small></p></label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="icon"> Иконка категории </label>
                                <input value="{{$category->icon}}" type="file" name="icon" id="icon" class="custom-file-input @error('icon')is-invalid @enderror" lang="en" required>
                            </div>
                            @isset($icon)
                                <img class="img-fluid" src="{{asset('storage/' . $icon)}}">
                            @endisset
                            <div class="text-right">
                            <br>
                            <button type="reset" class="btn m-1 btn-warning text-light ">Сброс</button>
                            <button type="submit" class="btn m-1 btn-success">Обновить</button>
                        </div>
                    </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection