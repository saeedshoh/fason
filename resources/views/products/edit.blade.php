@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Изменение товара
@endsection
@extends('layouts.footer')
@section('content')
{{--  {{ dd($category) }}
{{ dd($allCategories->where('parent_id', $category->id)) }}  --}}
<section class="content" >
    <div class="container">
      <h2 class="title text-center w-100 mt-5 mb-4 d-none d-lg-block">Изменить Товар</h2>
      <div class="row d-flex justify-content-between" >
        <!--add image start-->
        <div class="col-lg-5 col-12 w-100 add-product" >
          <div class="d-flex justify-content-between align-items-baseline">
          <a href="{{ route('ft-store.show', $is_store->slug) }}" class="text-pinky font-weight-bold text-decoration-none" > <img src="/storage/theme/icons/back.svg" alt=""> Назад</a>
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
                    {{--  <div class="col-3 text-center product_image mb-3" data-image="true">  --}}
                        <div class="preview-image col-3">
                            <div class="profile-pic">
                                <img src="{{ Storage::url($gallery) }}" data-image-src="{{ $gallery }}" class="preview-element-image  pic-item" alt="{{ $product->name }}">
                                <div class="deleteImage text-white" data-name="{{ $gallery }}">&times;</div>
                            </div>
                        </div>
                    {{--  </div>  --}}
                @endforeach
            @endif
            
          </div>
          {{--  <form method="post" action="" enctype="multipart/form-data" id="myform">
            <input type="file" accept="image/*"  id="galler" class="d-none" name="galler" multiple >
          </form>  --}}
        </div>
        <!--add image end-->
        <!--Main attributes of product start-->
        <div class="col-12 col-lg-7 mt-5">
          <form action="{{ route('test_update', $product) }}" method="POST" enctype="multipart/form-data" class="needs-validation {{ $errors->all() == true ? 'was-validated' : '' }}" novalidate id="add_product" onsubmit="return false">
            @csrf
            @method('PUT')
            <input type="text" id="gallery" class="d-none" name="gallery" value="{{ $product->gallery }}">

            <input type="file" accept="image/*"  id="image" class="d-none" name="image" value="{{ $product->image }}">
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
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </select>
                                <div class="invalid-feedback">
                                    Выберите категорию
                                </div>
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
                                <div class="invalid-feedback">
                                    Выберите категорию
                                </div>
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
                                        <div class="invalid-feedback">
                                            Выберите категорию
                                        </div>
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
                                        <div class="invalid-feedback">
                                            Выберите категорию
                                        </div>
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
                            <div class="invalid-feedback">
                                Выберите категорию
                            </div>
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
                                        <div class="invalid-feedback">
                                            Выберите категорию
                                        </div>
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
                            <div class="invalid-feedback">
                                Выберите категорию
                            </div>
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
                                        <div class="invalid-feedback">
                                            Выберите категорию
                                        </div>
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
                    <div class="invalid-feedback">
                        Введите название товара
                    </div>
                </div>
            </div>
            <div class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                <label for="description" class="input_caption mr-2 text-left text-md-right">Описание товара: </label>
                <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group  w-md-100">
                    <div class="input-group-prepend position-relative">
                        <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                    </div>
                    <textarea class="input_placeholder_style form-control position-relative border-left-0 @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{ old('description') ?? $product->description }}</textarea>
                    <div class="invalid-feedback">
                        Введите описание товара
                    </div>
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
                    <div class="invalid-feedback">
                        Введите кол/во товара
                    </div>
                    </div>
                </div>
                <div class="form-group  d-flex flex-column flex-md-row mb-4 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                    <label for="price" class="input_caption mr-2 text-left text-md-right">Цена: <span class="badge badge-pill badge-danger">в сомони</span></label>
                    <div class="w-sm-100 w-75 input_placeholder_style position-relative input-group  w-md-100">
                        <div class="input-group-prepend position-relative">
                            <div class="input-group-text px-1  btn-custom-fs bg-white "></div>
                        </div>
                    <input type="number" inputmode="numeric" pattern="[0-9]*" class="numeric input_placeholder_style form-control position-relative border-left-0 @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') ?? $product->price }}">
                    <div class="invalid-feedback">
                        Введите цену товара
                    </div>
                    </div>
                </div>
                <div id="attributes" class="form-group d-flex flex-column mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
                    @foreach ($attributes as $index => $attribute)
                        <div class="form-check w-50 d-flex flex-wrap">
                                <input class="form-check-input js-attribute"  {{ $attribute->is_checked ? 'checked' : 'data-check=true' }} name="attribute[{{ $attribute->slug }}][id]" type="checkbox" id="{{ $attribute->slug.'Checkbox'.$index}}" value="{{ $attribute->id }}">
                                <label class="form-check-label" for="{{ $attribute->slug.'Checkbox'.$index}}">{{ $attribute->name }}</label>
                            @if ($attribute->is_checked)
                                @if ($attribute->slug == 'cvet')
                                    <div class="Selects d-flex flex-wrap justify-content-between form-group" name="attribute[cvet][value]">
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
                                @else
                                    <select class="input_placeholder_style form-control" name="attribute[{{ $attribute->slug }}][value][]" multiple="">
                                        <option disabled="">Выберите значение</option>
                                        @foreach ($attrValues->where('attribute_id', $attribute->id) as $attrValue)
                                            <option {{ $attrValue->is_checked ? 'selected' : '' }} value="{{ $attrValue->id }}">{{ $attrValue->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            @endif
                        </div>
                    @endforeach
                    <div id="color_attr"></div>
                    {{-- @foreach ($attributes as $index => $attribute)
                        <div class="form-check w-50">
                            <input class="form-check-input js-attribute"  {{ $attribute->is_checked ? 'checked' : 'data-check=true' }} name="attribute[{{ $attribute->slug }}][id]" type="checkbox" id="{{ $attribute->slug.'Checkbox'.$index}}" value="{{ $attribute->id }}">
                            <label class="form-check-label" for="{{ $attribute->slug.'Checkbox'.$index}}">{{ $attribute->name }}</label>
                            @if ($attribute->is_checked)
                                @foreach ($attrValues->where('attribute_id', $attribute->id) as $attrValue)
                                    @if (substr($attrValue->value, 0, 1) == '#')
                                        <label class="checkbox-container">
                                            <input cheked="" class="form-check-input" name="cvet" value="1" type="checkbox">
                                            <span class="checkmark" style="background: {{ $attrValue->value }}; width: 25px; height: 25px;"></span>
                                        </label>
                                    @endif
                                @endforeach
                                @foreach ($attrValues->where('attribute_id', $attribute->id) as $attrValue)
                                    @if (substr($attrValue->value, 0, 1) != '#')
                                    @php
                                            $isset_select = true;
                                    @endphp
                                    @endif
                                @endforeach
                                @foreach ($attrValues->where('attribute_id', $attribute->id) as $attrValue)
                                    @if (substr($attrValue->value, 0, 1) != '#' && $isset_select)
                                    <select class="input_placeholder_style form-control" name="attribute[{{ $attribute->slug }}][value]" multiple="">
                                            <option {{ $attrValue->is_checked ? 'selected' : '' }} value="{{ $attrValue->id }}">{{ $attrValue->name }}</option>
                                        </select>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endforeach --}}
                    {{-- @foreach ($product->attribute_variation->groupBy('attribute_id') as $key => $item)
                        <div class="row">
                            <span>{{ $item->first()->attribute->name }}:</span>
                            @foreach ($product->attribute_variation as $attribute)
                            @if ($key == $attribute->attribute_id)
                                @if (substr($attribute->attribute_value->value, 0, 1) == '#')
                                    <label class="checkbox-container">
                                    <input cheked="" class="form-check-input" name="cvet" value="1" type="checkbox">
                                    <span class="checkmark" style="background: {{ $attribute->attribute_value->value }}; width: 25px; height: 25px;"></span>
                                    </label>
                                @else
                                <nav class="att-show text-capitalize px-3">
                                    {{ $attribute->attribute_value->name }}
                                </nav>
                                @endif
                            @endif
                            @endforeach
                        </div>
                    @endforeach --}}
                </div>
                <input type="hidden" name="store_id" value="{{ Auth::user()->store->id }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_status_id" value="1">
                <div class="form-group d-flex flex-row mb-5 mb-lg-2 justify-content-center justify-content-md-end align-items-start align-items-md-center">
                    <button id="submitAddProduct" type="submit" class="add-product-btn w-75 font-weight-bold btn-danger border-0 my-5 my-lg-3 rounded py-2 w-lg-75"> Изменить </button>
                </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
