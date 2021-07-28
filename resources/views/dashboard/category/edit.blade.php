
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
                            изменение категории
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Изменение
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
            <!-- @if (session())
            <div class="alert alert-{{ session('class') }}">
                {{session()->get('message')}}
            </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
            @endif -->
            <div class="alert alert-danger d-none">
                <span>Введите название</span>
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                        <!-- Form -->
                        <form id="editForm" action="{{ route('categories.update', $category) }}" method="POST" class="mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate id="create_category">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="name">Название</label>
                                    <input type="hidden" value="{{ $previous }}">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Введите название категори" name="name" value="{{ old('name') ?? $category->name }}" autocomplete="off" required="">
                                    <div class="invalid-feedback" id="nameFeedback">
                                        Введите название
                                    </div>
                                    <!-- @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                        Введите название
                                    </div>
                                    @enderror -->
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="parent_id">Категории</label>
                                    <select class="custom-select @error('parent_id') is-invalid @enderror" name="parent_id">
                                        <option value="0">Сделать родительской</option>
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}" {{ $category->parent_id == $item->id ? 'selected' : '' }} class="font-weight-bold" {{ $category->id == $item->id ? 'disabled' : '' }}>
                                            {{ $item->name }}
                                            </option>
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
                                        <option value="0" @if($category->attributes->count() == 0) selected @endif>Выберите аттрибут</option>
                                        @foreach($attributes as $attribute)
                                            <option value="{{ $attribute->id }}" @foreach ($category->attributes as $select_attribute) {{ $select_attribute->id == $attribute->id ? 'selected' : '' }} @endforeach>{{ $attribute->name }}</option>
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
                            <button class="btn btn-primary mt-4" id="submitEdit" type="button">Изменить</button>
                            <input type="hidden" name="previous" value="{{ url()->previous() }}">
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
                                    <select class="custom-select  @error('is_active') is-invalid @enderror" name="is_active" id="is_active" form="create_category">
                                        <option value="1" {{ old('is_active') ?? $category->is_active == '1' ? 'selected' : ''}}>Активен</option>
                                        <option value="0" {{ old('is_active') ?? $category->is_active == '0' ? 'selected' : ''}}>Неактивен</option>
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
                                        <input value="{{ old('icon') ?? $category->icon}} " type="file" accept="image/*"  name="icon" form="create_category" id="icon" class="custom-file-input @error('icon')is-invalid @enderror" lang="ru" required>
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
