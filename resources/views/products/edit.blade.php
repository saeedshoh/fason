@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Изменение товара
@endsection
@extends('layouts.footer')
@section('content')
<section class="content" >
    <div class="container">
      <h2 class="title text-center w-100 mt-5 mb-4 d-none d-lg-block">Изменить Товар</h2>
      <div class="row d-flex justify-content-between" >
        <!--add image start-->
        <div class="col-lg-5 col-12 w-100 add-product" >
          <div class="d-flex justify-content-between align-items-baseline">
          <a href="javascript:history.back()" class="text-pinky font-weight-bold text-decoration-none" > <img src="/storage/theme/icons/back.svg" alt=""> Назад</a>
          <h5 class="text-secondary mt-5 mb-4 d-flex d-lg-none" >Изменить Товар</h5>
          </div>
          <div class="my-3">
            <label for="image">
                <img src="{{ Storage::url($product->image) }}" class="p-0 btn mw-100 w-100 rounded @error('image') border-danger @enderror" id="main-poster" height="373" style="object-fit: cover;">
                <small class="text-danger mt-2 font-weight-bold image-validate d-none">
                    Выберите изображение
                </small>
            </label>
          </div>
          <div id="db-preview-image" class="add-product-secondary" data-edit="true">
            <input class="d-none" id="gallery" type="file" name="gallery" form="add_product">

            @if(!empty($product->gallery))
                @foreach(json_decode($product->gallery) as $gallery)
                    <div class="preview-image col-3">
                        <div class="profile-pic">
                            <img src="{{ Storage::url($gallery) }}" data-image-src="{{ $gallery }}" class="preview-element-image  pic-item" alt="{{ $product->name }}">
                            <div class="deleteImage text-white" data-name="{{ $gallery }}">&times;</div>
                        </div>
                    </div>
                @endforeach
            @endif

          </div>
        </div>
        <!--add image end-->
        <!--Main attributes of product start-->
        <div class="col-12 col-lg-7 mt-5">
          <form action="{{ route('test_update', $product) }}" method="POST" enctype="multipart/form-data" class="edit-product {{ $errors->all() == true ? 'was-validated' : '' }}" novalidate id="add_product" onsubmit="return false">
            @csrf
            @method('PUT')
            <input type="text" id="gallery" class="d-none" name="gallery" value="{{ $product->gallery }}">

            <input type="file" accept="image/*" id="image" class="d-none" name="image" value="{{ $product->image }}">
            <div class="form-group d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                <label for="cat_parent" class="input_caption mr-2 text-left text-md-right">Категории:</label>
                <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group w-md-100">
                    <div class="input-group-prepend position-relative">
                        <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                    </div>
                    <select class="strartline_stick input_placeholder_style custom-select position-relative border-left-0 @error('category_id') is-invalid @enderror" id="cat_parent" name="category_id">
                    <option >Выберите категорию</option>
                    @if($hasParentCategory)
                            @forelse ($allCategories->where('parent_id', 0) as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $category->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @empty
                                    Извините ничего не найдено
                                @endforelse
                                    </select>
                                    @error('category_id')
                                    <small class="invalid-feedback">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </select>
                                <small class="invalid-feedback">
                                    Выберите категорию
                                </small>
                            </div>
                        </div>
                        <div id="categories-row"></div>

                    @elseif ($grandParent)
                            @forelse ($cat_parent as $cat)
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
                        <div id="categories-row">
                            <div id="subCategories">
                                <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                                    <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                                    <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group w-md-100">
                                        <div class="input-group-prepend position-relative">
                                            <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                                        </div>
                                        <select class="input_placeholder_style form-control position-relative border-left-0 @error('category_id') is-invalid @enderror" id="cat_child" name="subcategory">
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
                                <div id="child_div" class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                                    <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                                    <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group w-md-100">
                                        <div class="input-group-prepend position-relative">
                                            <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                                        </div>
                                        <select class="input_placeholder_style form-control position-relative border-left-0 @error('category_id') is-invalid @enderror" id="cat_child" name="category_id">
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
                        </div>
                    @elseif($parent)
                                @forelse ($cat_parent as $cat)
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
                        <div id="categories-row">
                            <div id="subCategories">
                                <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                                    <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                                    <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group w-md-100">
                                        <div class="input-group-prepend position-relative">
                                            <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                                        </div>
                                        <select class="input_placeholder_style form-control position-relative border-left-0 @error('category_id') is-invalid @enderror" id="cat_child" name="category_id">
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
                        </div>
                    @else
                        @forelse ($cat_parent as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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
                            <div id="subCategories">
                                <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                                    <label for="cat_child" class="input_caption mr-2 text-left text-md-right">Под-категории:</label>
                                    <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group w-md-100">
                                        <div class="input-group-prepend position-relative">
                                            <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                                        </div>
                                        <select class="input_placeholder_style form-control position-relative border-left-0 @error('category_id') is-invalid @enderror" id="cat_child" name="category_id">
                                            <option disabled>Выберите категорию</option>
                                        </select>
                                        <small class="invalid-feedback">
                                            Выберите категорию
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

            <div class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                <label for="name" class="input_caption mr-2 text-left text-md-right">Название товара:</label>
                <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group  w-md-100">
                    <div class="input-group-prepend position-relative">
                        <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                    </div>
                    <input type="text" class="input_placeholder_style form-control position-relative border-left-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $product->name }}">
                    <small class="invalid-feedback">
                        Введите название товара
                    </small>
                </div>
            </div>
            <div class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                <label for="description" class="input_caption mr-2 text-left text-md-right">Описание товара: </label>
                <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group  w-md-100">
                    <div class="input-group-prepend position-relative">
                        <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                    </div>
                    <textarea class="input_placeholder_style form-control position-relative border-left-0 @error('description') is-invalid @enderror" maxlength="1000" id="description" rows="5" name="description" style="resize: vertical">{{ old('description') ?? $product->description }}</textarea>
                    <small class="invalid-feedback">
                        Введите описание товара
                    </small>
                </div>
            </div>
            <div>
                <div class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                    <label for="quantity" class="input_caption mr-2 text-left text-md-right">Кол/во в наличии:</label>
                    <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group  w-md-100">
                        <div class="input-group-prepend position-relative">
                            <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                        </div>
                    <input type="number" inputmode="numeric" pattern="[0-9]*" class="numeric input_placeholder_style form-control position-relative border-left-0 @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') ?? $product->quantity }}">
                    <small class="invalid-feedback">
                        Введите кол/во товара
                    </small>
                    </div>
                </div>
                <div class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                    <label for="price" class="input_caption mr-2 text-left text-md-right">Цена: <span class="badge badge-pill badge-danger">в сомони</span></label>
                    <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group  w-md-100">
                        <div class="input-group-prepend position-relative">
                            <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                        </div>
                    <input type="number" inputmode="numeric" pattern="[0-9]*" class="numeric input_placeholder_style form-control position-relative border-left-0 @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') ?? $product->price }}">
                    <small class="invalid-feedback">
                        Введите цену товара
                    </small>
                    </div>
                </div>
                <div class="append-div w-75 ml-auto mb-3 d-flex flex-column flex-wrap"></div>
                <div id="attributes" class="form-group  d-flex flex-column mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-end my-3">
                    @foreach ($attributes as $index => $attribute)
                        <div class="form-check form-check w-75 p-0 attr__checkboxes mb-2">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                {{-- <div id="st-attribute_val" class="font-weight-semibold input_caption"></div> --}}
                                <label class="form-check-label bg-secondary px-3 text-capitalize py-1 text-white cursor-pointer">{{ $attribute->name }}</label>
                                <label class="m-0 cursor-pointer" for="{{ $attribute->slug.'Checkbox'.$index}}"><img class="add__attr-icon" onContextMenu="return false;" src="{{ $attribute->is_checked ? '/storage/theme/delete_attr.svg' : '/storage/theme/plus_add_attr.svg' }}"></label>
                            </div>
                            <input class="form-check-input js-attribute d-none"  {{ $attribute->is_checked ? 'checked' : 'data-check=true' }} name="attribute[{{ $attribute->slug }}][id]" type="checkbox" id="{{ $attribute->slug.'Checkbox'.$index}}" value="{{ $attribute->id }}">
                            @if ($attribute->is_checked)
                                {{-- @if ($attribute->slug == 'cvet')
                                    <div class="Selects d-flex flex-wrap form-group" name="attribute[cvet][value]">
                                        @foreach ($attrValues->where('attribute_id', $attribute->id) as $attrValue)
                                            <label class="checkbox-container">
                                                <input {{ $attrValue->is_checked == true ? 'checked' : '' }} class="form-check-input" name="checkSvet" value="{{ $attrValue->id }}" type="checkbox">
                                                <span class="checkmark" style="background: {{ $attrValue->value }}; width: 25px; height: 25px;"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <div id="color_attr">
                                        <input type="text" id="colors_input" name="cvet" class="form-control d-none" value="@foreach ($attrValues->where('attribute_id', $attribute->id)->where('is_checked', 'true') as $attrValue){{ $loop->last ? $attrValue->id : $attrValue->id.',' }}@endforeach">
                                    </div>
                                @else --}}
                                    <select class="input_placeholder_style form-control st-attribute_add mt-3 other-attr" name="attribute[{{ $attribute->slug }}][value][]" multiple id="st-attribute_select">
                                        <option disabled="">Выберите значение</option>
                                        @foreach ($attrValues->where('attribute_id', $attribute->id) as $attrValue)
                                            <option {{ $attrValue->is_checked ? 'selected' : '' }} value="{{ $attrValue->id }}">{{ $attrValue->name }}</option>
                                        @endforeach
                                    </select>
                                {{-- @endif --}}
                            @endif
                        </div>
                    @endforeach
                    <div id="color_attr"></div>
                </div>
                <input type="hidden" name="store_id" value="{{ Auth::user()->store->id }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_status_id" value="1">
                <div class="form-group d-flex flex-row mb-5 mb-lg-2 justify-content-center justify-content-md-end align-items-start align-items-md-center">
                    <button id="submitAddProduct" type="submit" class="add-product-btn w-75 font-weight-bold btn-danger border-0 mb-5 mt-lg-3 py-2 w-lg-75 rounded-11 add_append"> Изменить </button>
                </div>

            </div>
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
