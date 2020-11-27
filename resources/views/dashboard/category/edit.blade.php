
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
                        <form action="{{ route('categories.update', $category) }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate id="create_category">

                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control" id="name" placeholder="Введите название категори" name="name" value="{{ old('name') ?? $category->name }}" required="">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="parent_id">Родительская категории</label>
                                    <select class="custom-select" data-toggle="select" name="parent_id">
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}" {{ old('parent_id') ?? $category->parent_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">
                                        * По умолчанию станет родительской
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
                                    <select class="custom-select" name="is_active" id="is_active" form="create_category">
                                        <option value="1" {{ old('is_active') ?? $category->is_active == '1' ? 'selected' : ''}}>Активен</option>
                                        <option value="0" {{ old('is_active') ?? $category->is_active == '0' ? 'selected' : ''}}>Неактивен</option>
                                    </select>
                                    <small class="text-muted">
                                        * По умолчанию активен
                                    </small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="icon">Иконка</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="icon">Выберите файл</label>
                                        <input value="{{ old('icon') ?? $category->icon}} " type="file" name="icon" form="create_category" id="icon" class="custom-file-input @error('icon')is-invalid @enderror" lang="ru" required>
                                    </div>
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