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
                            Изменение аттрибутов
                        </h6>
        
                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Изменение
                        </h1>
        
                        </div>
                        <div class="col-auto">
        
                        <!-- Buttons -->
                        <a href="{{ route('attributes.index')}}" class="btn btn-primary ml-2">
                            Все аттрибуты
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
                        <form action="{{ route('attributes.update', $attribute) }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidates>
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control" id="name" placeholder="Введите название категори" name="name" value="{{ old('name') ?? $attribute->name }}" required="">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="category_id">Категории</label>
                                    <select class="custom-select" data-toggle="select" name="category_id">
                                        @foreach($categories as $category)
                                    <option value="{{ $category->id }} {{ old('category_id') ?? $attribute->category_id == $category->id ? 'selected' : ''}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">
                                        * По умолчанию станет родительской
                                    </small>
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-4" type="submit">Измененить</button>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection