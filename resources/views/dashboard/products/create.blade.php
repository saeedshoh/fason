@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid dashboard">
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
                        <a href="{{ route('products.index')}}" class="btn btn-primary ml-2">
                            Все товары
                        </a>

                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data" id="add_product" class="add-product" novalidate onsubmit="return false">
                @csrf
                @method('POST')
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                            <!-- Form -->
                                <div class="form-row">
                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="name">Название</label>

                                        <input type="text" class="form-control" placeholder="Введите название товара" id="name" name="name" value="{{ old('name') }}" required>
                                        <small class="invalid-feedback">
                                        Введите название товара
                                        </small>

                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="cat_parent">Родительская категория</label>
                                        <select class="form-control" id="cat_parent" name="category_id" required>
                                            <option value="" disabled selected>Выберите категорию</option>
                                            @foreach($categories->where('parent_id', 0) as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="invalid-feedback">
                                            Выберите категорию
                                        </small>
                                    </div>
                                </div>
                                <div class="form-row" id="subCategories">
                                    <div class="col-12 col-md-12 mb-3" id="cat_child">
                                <!--        <label for="cat_child">Под-категория</label>-->
                                <!--        <select class="form-control" id="cat_child" name="category_id" >-->
                                <!--            <option disabled>Выберите подкатегорию</option>-->
                                <!--        </select>-->
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="price">Цена</label>
                                        <input type="number" inputmode="numeric" pattern="[0-9]*" class="form-control" name="price" placeholder="Введите название категори" id="price" value="{{ old('price') }}" required>
                                        <small class="invalid-feedback">
                                            Введите цену товара
                                        </small>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="quantity">Количество</label>
                                        <input type="number" inputmode="numeric" pattern="[0-9]*" class="form-control" id="quantity" placeholder="Введите название категори"  name="quantity" value="{{ old('quantity') }}" required>
                                        <small class="invalid-feedback">
                                            Введите кол/во товара
                                        </small>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12 mb-3">
                                        <label for="description">Описание</label>
                                        <textarea class="form-control" maxlength="1000" id="description" rows="3" name="description" required style="resize: vertical" placeholder="Введите описание">{{ old('description') }}</textarea>
                                        <small class="invalid-feedback">
                                            Введите описание товара
                                        </small>
                                    </div>
                                </div>

                                <div id="attributes" class="d-flex justify-content-between"></div>

                                <!-- Button -->
                                <input type="hidden" name="product_status_id" value="2">

                                <button data-previous="{{ session('previous_product') }}" class="btn btn-primary mt-4 add-product-btn" type="submit">Добавить</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-12 mb-3">
                                        <label for="store_id">Магазин</label>
                                        <select class="custom-select" data-toggle="select" name="store_id" required>
                                            @foreach($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="invalid-feedback">
                                                Выберите магазин
                                        </small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto text-center">
                                        <label for="image">
                                            <img src="/storage/theme/icons/add_product_plus.svg" class="img-fluid rounded" id="main-poster" style="max-width: 120px;">
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <label for="image">Выберите</label>
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="image">Выберите файл</label>
                                            <input type="file" accept="image/*" name="image" form="add_product" id="image" class="custom-file-input @error('image')is-invalid @enderror" lang="ru">
                                            <small class="text-muted">Размер > 480px * 480px</small>
                                            <div class="invalid-feedback">
                                                Выберите изображение
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr>

                                        <div class="add-product-secondary" id="preview-product-secondary">
                                            <div id="db-preview-image">
                                            <input class="d-none" id="gallery" type="file" name="gallery" form="add_product">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body {
      position: relative;
    }
</style>

@endsection
