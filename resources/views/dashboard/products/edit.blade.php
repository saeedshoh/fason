
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
            <div class="row">
            
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('products.update', $product) }}" method="POST" class="mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate id="create_category">

                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="category_id">Категории</label>
                                    <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id">
                                        <option value="0" selected>Сделать родительской</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" class="font-weight-bold" {{ $product->category_id == $category->id ? 'selected' : ''}}>
                                            {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Введите название категори" name="name" value="{{ old('name') ?? $product->name }}" required="">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="quantity">Кол/во товаров</label>
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Введите кол/во товаров" name="quantity" value="{{ old('quantity') ?? $product->quantity }}" required="">
                                    @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="price">Цена</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Введите цену" name="price" value="{{ old('price') ?? $product->price }}" required="">
                                    @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="description">Описание</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="5"> {{ old('description') ?? $product->description }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Button -->
                            <input type="hidden" name="store_id" value="{{ $product->store_id }}">
                            <input type="hidden" name="product_status_id" value="1">
                            <button class="btn btn-primary mt-4" type="submit"><i class="fe fe-edit"> </i> Изменить</button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Магазин</label>
                                    <input type="text" class="form-control " disabled value="{{ $product->store->name}}">
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-auto text-center">
                                            <img src="{{ Storage::url($product->image) }}" alt="..." class="img-fluid rounded" style="max-width: 120px;">
                                        </div>
                                        <div class="col-auto">
                                            <label for="image">Image</label>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">Выберите файл</label>
                                                <input value="{{ old('image') ?? $product->image}} " type="file" name="image" form="create_category" id="image" class="custom-file-input @error('image')is-invalid @enderror" lang="ru">
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
                                    <div class="row">
                                        
                                        {{-- @forelse ($product->gallery as $gallery)
                                            <div class="avatar avatar-lg avatar-4by3">
                                                <img src="{{ Store::url($gallery) }}" alt="..." class="avatar-img rounded">
                                            </div>
                                        @empty
                                            
                                        @endforelse --}}
                                        
                                        <div class="col-12">
                                            <label for="gallery">Галерея</label>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="gallery">Выберите файл</label>
                                                <label class="custom-file-label" for="gallery">Выберите файл для галереи</label>
                                                <input value="{{ old('gallery') ?? $product->icon}} " type="file" multiple name="gallery" form="create_category" id="gallery" class="custom-file-input @error('gallery')is-invalid @enderror" lang="ru">
                                                <small class="text-muted">Размер > 480px * 480px</small>
                                                @error('gallery')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <form class="d-inline" action="{{ route('products.destroy', $product) }}" method="POST">
                                    @csrf 
                                        <button class="btn btn-danger" type="submit"><i class="fe fe-trash"> </i> Удалить</button>
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
</div>
@endsection