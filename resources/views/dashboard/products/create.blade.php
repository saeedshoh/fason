@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid mt-5">
    <div class="header">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="header-title">
                        Добавление нового товара
                    </h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        Назад
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
    <form action="{{ route('products.store') }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate>
                    <div class="card">
                        <div class="card-body">
                            <fieldset>
                                @csrf
                                @method('POST')
                            <!-- Form -->
                            <div class="form-group">
                                <label class="title text-bold" for="name">Название товара <span class="text-danger">*</span></label>
                                <input id="name" name="name" type="text" value="{{old('name')}}" class="form-control" placeholder="Введите название категории" required>
                            </div>
                            <textarea name="description" id="description" cols="30" rows="10">
                                
                            </textarea>
                            <label class="mt-3" for="price">Цена</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Введите цену">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="category_id"> Категория товара <p class="header-subtitle"> * Выберите категорию товара </p></label>
                            <select class="form-control mb-4 " name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <label for="inputicon"><p class="title text-bold mr-1" > Изображение <span class="text-danger">*</span> <small class="badge badge-soft-warning">1000px * 1000px</small></p></label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="icon"> Изображение товара </label>
                                <input value="{{old('image')}}" type="file" name="image" id="image" class="custom-file-input @error('icon')is-invalid @enderror" lang="en" required>
                            </div>
                            @isset($icon)
                                <img class="img-fluid" src="{{asset('storage/' . $image)}}">
                            @endisset
                            <div class="text-right">
                            <br>
                            <button type="reset" class="btn m-1 btn-warning text-light ">Сброс</button>
                            <button type="submit" class="btn m-1 btn-success">Добавить</button>
                        </div>
                    </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection