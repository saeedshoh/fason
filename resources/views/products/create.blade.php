@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Добавление нового товара
@endsection
@extends('layouts.footer')

@section('content')
<section class="content" >
    <div class="container">
      <h2 class="title text-center w-100 mt-5 mb-4 d-none d-lg-block">Добавить Товар</h2>
      <div class="row d-flex justify-content-between" >

        <!--add image start-->
        <div class="col-lg-5 col-12 w-100 add-product" >
          <div class="d-flex justify-content-between align-items-baseline">
          <a href="{{ route('ft-store.show', $is_store->slug) }}" class="text-pinky font-weight-bold text-decoration-none" > <img src="/storage/theme/icons/back.svg" alt=""> Назад</a>
          <h5 class="text-secondary mt-5 mb-4 d-flex d-lg-none" >Добавить Товар</h5>
          </div>
          <div class="my-3">
            <label for="image">
              <img src="/storage/theme/icons/add_product_plus.svg" class="p-0 btn mw-100 w-100 rounded @error('image') border-danger @enderror" id="main-poster" style="object-fit: cover;">
              <small class="text-danger mt-2 font-weight-bold image-validate d-none">
                Выберите изображение
              </small>
            </label>
           
          </div>
          <div class="add-product-secondary" id="preview-product-secondary">
            <div id="db-preview-image">
              <input class="d-none" id="gallery" type="file" name="gallery" form="add_product">
            </div>

          </div>
        </div>
        <!--add image end-->

        <!--Main attributes of product start-->
        <div class="col-12 col-lg-7 mt-5">
          {{--  <form action="{{ route('ft-products.store') }}" method="POST" enctype="multipart/form-data" id="add_product" class="needs-validation {{ $errors->all() == true ? 'was-validated' : '' }}" novalidate>  --}}
          <form method="POST" enctype="multipart/form-data" id="add_product" class="add-product {{ $errors->all() == true ? 'was-validated' : '' }}" novalidate onsubmit="return false">
            @csrf
            @method('POST')
              <input type="file" accept="image/*" id="image" class="d-none input_placeholder_style" name="image" required>
              <div class="form-group d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                  <label for="cat_parent" class="input_caption mr-2 text-left text-md-right">Категории:</label>
                  <div class="w-75 input_placeholder_style position-relative input-group w-md-100">
                    <div class="input-group-prepend position-relative">
                      <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                    </div>
                    <select class="strartline_stick input_placeholder_style custom-select position-relative border-left-0" id="cat_parent" name="cat_id" required>
                      <option value="">Выберите категорию</option>
                      @forelse ($cat_parent as $category)
                      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                      @empty
                          Извините ничего не найдено
                      @endforelse
                    </select>
                    <small class="invalid-feedback">
                      Выберите категорию
                    </small>
                  </div>
              </div>
              <div id="categories-row">

              </div>
            {{-- <div id="subCategories">
                <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                    <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                    <div class="w-75 input_placeholder_style">
                      <select class="input_placeholder_style form-control position-relative @error('category_id') is-invalid @enderror" id="cat_child" name="category_id" required>
                        <option selected disabled value>Выберите категорию</option>
                      </select>
                      @error('category_id')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
            </div> --}}
            <div class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="name" class="input_caption mr-2 text-left text-md-right">Название товара:</label>
              <div class="w-75 input_placeholder_style position-relative input-group  w-md-100">
                <div class="input-group-prepend position-relative">
                  <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                </div>
                <input type="text" class="input_placeholder_style form-control position-relative border-left-0" id="name" name="name" value="{{ old('name') }}" required>
                <small class="invalid-feedback">
                  Введите название товара
                </small>
              </div>
            </div>
            <div class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="description" class="input_caption mr-2 text-left text-md-right">Описание товара: </label>
              <div class="w-75 input_placeholder_style position-relative input-group w-md-100">
                <div class="input-group-prepend position-relative">
                  <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                </div>
                <textarea class="input_placeholder_style form-control position-relative border-left-0" maxlength="1000" id="description" rows="3" name="description" required style="resize: vertical">{{ old('description') }}</textarea>
                <small class="invalid-feedback">
                  Введите описание товара
                </small>
              </div>
            </div>
              <div class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                <label for="quantity" class="input_caption mr-2 text-left text-md-right">Кол/во в наличии:</label>
                <div class="w-75 input_placeholder_style position-relative input-group w-md-100">
                  <div class="input-group-prepend position-relative">
                    <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                  </div>
                  <input type="number" inputmode="numeric" pattern="[0-9]*" class="numeric input_placeholder_style form-control position-relative border-left-0" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                  <small class="invalid-feedback">
                    Введите кол/во товара
                  </small>
                </div>
              </div>

              <div class="form-group d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                <label for="price" class="input_caption mr-2 text-left text-md-right">Цена: <span class="badge badge-pill badge-danger">в сомони</span></label>
                <div class="w-75 input_placeholder_style position-relative input-group w-md-100">
                  <div class="input-group-prepend position-relative">
                    <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                  </div>
                  <input type="number" inputmode="numeric" pattern="[0-9]*" class="numeric input_placeholder_style form-control border-left-0" name="price" id="price" value="{{ old('price') }}" required>
                  <small class="invalid-feedback">
                    Введите цену товара
                  </small>
                </div>
              </div>
              <div id="attributes" class="form-group  d-flex flex-column mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-end mt-3">

            </div>
            @csrf
            <input type="hidden" name="store_id" value="{{ $store }}" required>
            <input type="hidden" name="product_status_id" value="1">
            <input type="hidden" name="store_slug" value="{{ Auth::user()->store->slug }}">
            <div class="append-div w-75 ml-auto py-2"></div>
              <div class="form-group d-flex flex-row mb-5 justify-content-center justify-content-md-end align-items-start align-items-md-center">
                <button type="submit" class="w-75 font-weight-bold btn-danger border-0  mb-5 rounded-11 py-2 w-lg-75 add-product-btn"> Добавить </button>
              </div>
            <div id="color_attr"></div>
          </form>
        </div>

      </div>
    </div>
  </section>


<style>
  body {
    position: relative;
  }
</style>
<div class="success-preloader d-none">
  <img src="/storage/Spinner-1s-200px.svg" alt="" srcset="">
</div>

@endsection
