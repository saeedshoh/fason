@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')

<section class="content" >
    <div class="container">
      <h2 class="title text-center w-100 mt-5 mb-4 d-none d-lg-block">Добавить Товар</h2>
      <div class="row d-flex justify-content-between" >
        <!--add image start-->
        <div class="col-lg-5 col-12 w-100 add-product" >
          <div class="d-flex justify-content-between align-items-baseline">
          <a href="#" class="text-pinky font-weight-bold text-decoration-none" > <img src="/storage/theme/icons/back.svg" alt=""> Назад</a>
          <h5 class="text-secondary mt-5 mb-4 d-flex d-lg-none" >Изменить Товар</h5>
          </div>
          <div class="my-3">
            <label for="image">
              <img src="/storage/theme/icons/add_prod-img.svg" class="mw-100 w-100" id="main-poster">
            </label>
          </div>
          <div class="row add-product-secondary" id="preview-product-secondary">
            <div class="col-3 text-center">
              <label for="gallery">
                  <img src="/storage/theme/icons/add_prod-secondary.svg" class="mw-100"  alt="">
              </label>
            </div>
            <div class="col-3 text-center">
              <label for="gallery">
                <img src="/storage/theme/icons/add_prod-secondary.svg" class="mw-100"  alt="">
              </label>
            </div>
            <div class="col-3 text-center">
              <label for="gallery">
                <img src="/storage/theme/icons/add_prod-secondary.svg" class="mw-100"  alt="">
              </label>
            </div>
            <div class="col-3 text-center">
              <label for="gallery">
                <img src="/storage/theme/icons/add_prod-secondary.svg" class="mw-100" alt="">
              </label>
            </div>
          </div>
        </div>
        <!--add image end-->
        <!--Main attributes of product start-->
        <div class="col-12 col-lg-7 mt-5 mt-lg-0">
          <form action="{{ route('ft-products.store', $product->id) }}" method="POST" enctype="multipart/form-data" id="add_product">
            @csrf
            @method('PATCH')
            <input type="file" id="gallery" class="d-none" name="gallery[]" multiple form="add_product">

            <input type="file" id="image" class="d-none" name="image">
            <div class="form-group d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="cat_parent" class="input_caption mr-2 text-left text-md-right">Категории:</label>
              <div class="w-75 input_placeholder_style">
                <select class="strartline_stick input_placeholder_style form-control position-relative @error('category_id') is-invalid @enderror" id="cat_parent" name="category_id">
                  <option >Выберите категорию</option>
                  @forelse ($cat_parent as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                  @empty
                      Извините ничего не найдено
                  @endforelse
                </select>
                @error('category_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под- категории:</label>
              <div class="w-75 input_placeholder_style">
                <select class="input_placeholder_style form-control position-relative @error('category_id') is-invalid @enderror" id="cat_child" name="">
                  <option>Выберите категорию</option>
                  @forelse ($cat_parent as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @empty
                      Извините ничего не найдено
                  @endforelse
                </select>
                @error('category_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="name" class="input_caption mr-2 text-left text-md-right">Название товара:</label>
              <div class="w-75 input_placeholder_style">
                <input type="text" class="input_placeholder_style form-control position-relative @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $product->name }}">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="description" class="input_caption mr-2 text-left text-md-right">Описание товара: </label>
              <div class="w-75 input_placeholder_style">
                <textarea class="input_placeholder_style form-control position-relative  @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{ old('description') ?? $product->description }}</textarea>
                @error('description')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="container-fluid">
              <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                <label for="quantity" class="input_caption mr-2 text-left text-md-right">Кол/во в наличии:</label>
                <div class="w-75 input_placeholder_style">
                  <input type="number" class="input_placeholder_style form-control position-relative @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
                  @error('quantity')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="form-group d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                <label for="price" class="input_caption mr-2 text-left text-md-right">Цена: </label>
                <div class="w-75 input_placeholder_style">
                  <input type="number" class="input_placeholder_style form-control position-relative @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                  @error('price')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <input type="hidden" name="store_id" value="{{ Auth::user()->store->id }}">
              <input type="hidden" name="product_status_id" value="1">
              <div class="form-group d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                <button type="submit" class="w-75 font-weight-bold btn-danger border-0  mb-2 rounded py-2 w-lg-75"> Добавить </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
