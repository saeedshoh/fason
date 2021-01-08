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
                            Добавление товара
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Добавление
                        </h1>

                        </div>
                        <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{ route('categories.index')}}" class="btn btn-primary ml-2">
                            Все товары
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

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('products.store') }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate id="create_product">

                            @csrf
                            @method('POST')
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control" id="name" placeholder="Введите название товара" name="name" value="{{ old('name') }}" required="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="cat_parent">Родительская категория</label>
                                    <select class="form-control" id="cat_parent" name="cat_parent">
                                        <option disabled>Выберите категорию</option>
                                        @foreach($categories->where('parent_id', 0) as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row" id="subCategories">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="cat_child">Под-категория</label>
                                    <select class="form-control" id="cat_child" name="categoy_id">
                                        <option disabled>Выберите подкатегорию</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="price">Цена</label>
                                    <input type="number" class="form-control" id="price" placeholder="Введите название категори" name="price" value="{{ old('price') }}" required="">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="quantity">Количество</label>
                                    <input type="number" class="form-control" id="quantity" placeholder="Введите название категори" name="quantity" value="{{ old('quantity') }}" required="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <label for="description">Описание</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Введите описание">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <!-- Button -->
                            <input type="hidden" name="product_status_id" value="2">

                            <button class="btn btn-primary mt-4" type="submit">Добавить</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <label for="store_id">Магазин</label>
                                    <select class="custom-select" data-toggle="select" name="store_id">
                                        @foreach($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="image">Изображение</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="icon">Выберите файл</label>
                                        <input value="{{old('image')}}" type="file" name="image" form="create_product" id="image" class="custom-file-input @error('image')is-invalid @enderror" lang="ru" required>
                                    </div>
                                    <small class="text-muted">Внимание размер: </small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="gallery">Галерея</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="icon">Выберите файл</label>
                                        <input value="{{old('image')}}" type="file" name="gallery[]" form="create_product" id="gallery" class="custom-file-input @error('gallery')is-invalid @enderror" lang="ru" multiple required>
                                    </div>
                                    <small class="text-muted">Внимание размер: </small>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
