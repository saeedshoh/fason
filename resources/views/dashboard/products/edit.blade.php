
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
                            изменение товара
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Изменение
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
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
            </div>
            @endif
            <!-- Form -->
            <form action="{{ route('test_update', $product) }}" method="POST" enctype="multipart/form-data" class="edit-product" novalidate id="add_product" onsubmit="return false">
                @csrf
                @method('put')
           
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    
                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="name">Название</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Введите название категори" name="name" value="{{ old('name') ?? $product->name }}" required="">
                                        <small class="invalid-feedback">
                                            Введите название товара
                                        </small>
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="category_id">Категории</label>
                                        <select class="custom-select @error('category_id') is-invalid @enderror" id="cat_parent" name="category_id">
                                            <option value="0" selected>Выберите категорию</option>
                                            @if ($grandParent)
                                                @forelse ($allCategories->where('parent_id', 0) as $cat)
                                                    <option value="{{ $cat->id }}" {{ $cat->id == $grandParent->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                @empty
                                                    Извините ничего не найдено
                                                @endforelse
                                        </select>
                                        <small class="invalid-feedback">
                                            Выберите категорию
                                        </small>
                                    </div>
                                </div>
                                <div class="form-row" id="subCategories">
                                    <div class="form-group col-12 col-md-12 mb-3">
                                        <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                                        <div class="input_placeholder_style">
                                        <select class="input_placeholder_style form-control position-relative @error('category_id') is-invalid @enderror" id="cat_child" name="subcategory">
                                            <option disabled>Выберите категорию</option>
                                            @forelse ($allCategories->where('parent_id', $grandParent->id) as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $parent->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @empty
                                                Извините ничего не найдено
                                            @endforelse
                                        </select>
                                        <small class="invalid-feedback">
                                            Выберите категорию
                                        </small>
                                        </div>
                                    </div>
                                    <div id="child_div" class="form-group col-12 col-md-12 mb-3">
                                        <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                                        <div class="input_placeholder_style">
                                            <select class="input_placeholder_style form-control position-relative @error('category_id') is-invalid @enderror" id="cat_child" name="category_id">
                                                <option disabled>Выберите категорию</option>
                                                @forelse ($allCategories->where('parent_id', $category->parent_id) as $cat)
                                                    <option value="{{ $cat->id }}" {{ $cat->id == $category->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                @empty
                                                    Извините ничего не найдено
                                                @endforelse
                                            </select>
                                            <small class="invalid-feedback">
                                                Выберите категорию
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                @elseif($parent)
                                    @forelse ($allCategories->where('parent_id', 0) as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $parent->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @empty
                                        Извините ничего не найдено
                                    @endforelse
                                </select>
                                <small class="invalid-feedback">
                                    Выберите категорию
                                </small>
                            </div>
                        </div>
                        <div class="form-row" id="subCategories">
                            <div class="form-group col-12 col-md-12 mb-3">
                                <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                                <select class="custom-select @error('category_id') is-invalid @enderror" id="cat_child" name="category_id">
                                    <option disabled>Выберите категорию</option>
                                    @forelse ($allCategories->where('parent_id', $category->parent_id) as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $category->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @empty
                                        Извините ничего не найдено
                                    @endforelse
                                </select>
                                <small class="invalid-feedback">
                                    Выберите категорию
                                </small>
                            </div>
                        </div>
                                @else
                                    @forelse ($allCategories->where('parent_id', 0) as $cat)

                                    <option value="{{ $cat->id }}" {{ $cat->id == $category->id ? 'selected' : '' }}>{{ $cat->name }}</option>

                                    @empty
                                        Извините ничего не найдено
                                    @endforelse
                                </select>
                                <small class="invalid-feedback">
                                    Выберите категорию
                                </small>
                            </div>
                        </div>
                        <div class="form-row" id="subCategories">
                            <div class="form-group col-12 col-md-12 mb-3">
                                <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>

                                <select class="custom-select @error('category_id') is-invalid @enderror" id="cat_child" name="category_id">

                                    <option disabled>Выберите категорию</option>
                                </select>
                                <small class="invalid-feedback">
                                    Выберите категорию
                                </small>
                            </div>
                        </div>
                            @endif
                                <div class="form-row">

                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="quantity">Кол/во товаров</label>
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Введите кол/во товаров" name="quantity" value="{{ old('quantity') ?? $product->quantity }}" required="">
                                        <small class="invalid-feedback">
                                            Введите кол/во товара
                                        </small> 
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="price">Цена</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Введите цену" name="price" value="{{ old('price') ?? $product->price }}" required="">
                                        <small class="invalid-feedback">
                                            Введите цену товара
                                        </small>
                                    </div>

                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="description">Описание</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="5"> {{ old('description') ?? $product->description }}</textarea>
                                        <small class="invalid-feedback">
                                            Введите описание товара
                                        </small>
                                    </div>
                                    <div id="attributes" class="row">
                                        @foreach ($attributes as $index => $attribute)
                                        <div class="form-check form-check">
                                            <input class="form-check-input js-attribute"  {{ $attribute->is_checked ? 'checked' : 'data-check=true' }} name="attribute[{{ $attribute->slug }}][id]" type="checkbox" id="{{ $attribute->slug.'Checkbox'.$index}}" value="{{ $attribute->id }}">
                                            <label class="form-check-label" for="{{ $attribute->slug.'Checkbox'.$index}}">{{ $attribute->name }}</label>
                                            @if ($attribute->is_checked)
                                            <select class="input_placeholder_style form-control" name="attribute[{{ $attribute->slug }}][value][]" multiple="">
                                                <option disabled="">Выберите значение</option>
                                                @foreach ($attrValues->where('attribute_id', $attribute->id) as $attrValue)
                                                    <option {{ $attrValue->is_checked ? 'selected' : '' }} value="{{ $attrValue->id }}">{{ $attrValue->name }}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Button -->
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="product_status_id" value="1">
                                <button class="btn btn-primary mt-4 add-product-btn" type="submit"><i class="fe fe-edit"> </i> Изменить</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-12 col-md-12 mb-3">
                                        <label>Магазин</label>
                                        <select class="custom-select" data-toggle="select" name="store_id" required>
                                            @foreach($stores as $store)
                                                <option value="{{ $store->id }} " {{ $product->store_id == $store->id ? 'selected' : ''}}>{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="invalid-feedback">
                                                Выберите магазин
                                        </small>
                                    </div>
                                    <div class="col-12 col-md-12 mb-3">
                                        <div class="row">
                                            <div class="col-auto text-center">
                                                <img src="{{ Storage::url($product->image) }}" alt="..." class="img-fluid rounded" id="main-poster" style="max-width: 120px;">
                                            </div>
                                            <div class="col-auto">
                                                <label for="image">Изображение</label>
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="image">Выберите файл</label>
                                                    <input value="{{ old('image') ?? $product->image}} " type="file" accept="image/*"  name="image" form="add_product" id="image" class="custom-file-input @error('image')is-invalid @enderror" lang="ru">
                                                    <small class="text-muted">Размер > 480px * 480px</small>
                                                    @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div id="db-preview-image" class="add-product-secondary" data-edit="true">
                                            <input class="d-none" id="gallery" type="file" name="gallery" form="add_product">
                                            @if(!empty($product->gallery))
                                            <div class="preview row">
                                                @foreach(json_decode($product->gallery) as $gallery)
                                                    <div class="preview-image col-3">
                                                        <div class="profile-pic">
                                                            <img src="{{ Storage::url($gallery) }}" data-image-src="{{ $gallery }}" class="preview-element-image  pic-item" alt="{{ $product->name }}" width="89" height="100" style="object-fit: contain;">
                                                            <div class="deleteImage text-white" data-name="{{ $gallery }}">&times;</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row justify-content-end">
                <div class="card col-md-6 col-12">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <form class="d-inline" action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                    <button class="btn btn-danger delete-confirm" type="submit"><i class="fe fe-trash"> </i> Удалить</button>
                                @method('DELETE')
                            </form>
                            <form class="d-inline" action="{{ route('products.decline', $product) }}" method="POST">
                                @csrf
                                <button class="btn btn-warning text-white" type="submit"><i class="fe fe-x-circle"> </i> Отклонить</button>
                                @method('POST')
                            </form>
                            <form class="d-inline" action="{{ route('products.publish', $product) }}" method="POST">
                                @csrf
                                <button class="btn btn-success" type="submit"><i class="fe fe-copy"> </i> Опубликовать</button>
                                @method('POST')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
      position: relative;
    }
</style>
@endsection
