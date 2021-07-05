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
                            Добавление категории
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Добавление
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
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
            @endif
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('categories.store') }}" method="POST" class="mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate id="create_category">

                            @csrf
                            @method('POST')
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Введите название категори" name="name" value="{{ old('name') }}" autocomplete="off" required="">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="parent_id">Родительская категории</label>
                                    <select class="custom-select @error('parent_id') is-invalid @enderror" name="parent_id">
                                        <option value="0" selected>Родительская</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small class="text-muted">
                                        * По умолчанию станет родительской
                                    </small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="attribute">Аттрибут для категори</label>
                                    <select class="custom-select @error('attribute') is-invalid @enderror" id="attribute" name="attribute[]" multiple>
                                        <option disabled selected value="">Выберите аттрибут</option>
                                        @foreach($attributes as $attribute)
                                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('attribute')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small class="text-muted">
                                        * Зажмите ctrl или cmd затем выберите
                                    </small>
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-4" type="submit">Добавить</button>

                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Активность категории</label>
                                    <select class="custom-select @error('is_active') is-invalid @enderror" name="is_active" id="is_active" form="create_category">
                                        <option value="1">Активен</option>
                                        <option value="0">Неактивен</option>
                                    </select>
                                    @error('is_active')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small class="text-muted">
                                        * По умолчанию активен
                                    </small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="icon">Иконка</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="icon">Выберите файл</label>
                                        <input value="{{old('icon')}}" type="file" accept="image/*"  name="icon" form="create_category" id="icon" class="custom-file-input @error('icon') is-invalid @enderror" lang="ru" required>
                                    </div>
                                    @error('icon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small class="text-muted">Внимание размер: 64px * 64px</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
