@extends('layouts.app')
@extends('layouts.header')

@extends('layouts.footer')

@section('title', $product->name)
@section('seo-desc', $product->description)
@section('seo-keywords', $product->name)
@section('og:title', $product->name)
@section('og:description', $product->description)
@section('og:image', Storage::url($product->image))
@section('og:image:alt', $product->name)


@section('content')
  <section>
    <div class="container mt-lg-5">
      <div class="row">
        <!--slider-proiduct-and-description-->
        <div class="col-12 col-lg-5 px-md-0">
          <div class="d-flex align-items-baseline mb-3 justify-content-between">
            <a href="javascript:history.back()" class="text-pinky font-weight-bold text-decoration-none">
              <img src="/storage/theme/icons/back.svg" alt="">
              назад</a>
              <h6 class="d-block d-lg-none text-secondary">Информация о товаре</h6>
          </div>
          <div class="d-block d-lg-none my-3">
            <a href="{{ route('ft-category.category', $product->category->slug) }}" class="text-secondary font-weight-bold text-decoration-none">{{ $product->category->name }}</a>

            <h3 class="h3 font-weight-bold">{{ $product->name }}</h3>

           </p>
          </div>
          <!--desktop slider-->
          <div class="product-img-holder">
            <img src="{{ Storage::url($product->image) }}" class="rounded  pic-main  img-fluid" alt="" height="373px">
            <div class="add-product-secondary my-2 row">
                <div class="col-3 mt-3">
                  <img src="{{ Storage::url($product->image ) }}" data-image-src="{{ Storage::url($product->image) }}" class="mw-100 pic-item rounded shadow pic-item-active" alt="{{ $product->name }}">
                </div>
                @if(!empty($product->gallery))
                  @foreach (json_decode($product->gallery) as $gallery)
                    <div class="col-3 mt-3">
                        <img src="{{ Storage::url($gallery) }}" data-image-src="{{ Storage::url($gallery) }}" class="mw-100 pic-item rounded shadow" alt="{{ $product->name }}">
                    </div>
                  @endforeach
                @endif

            </div>
          </div>
          <!--desktop slider end-->
          </div>
        <div>
        </div>
        <div class="col-12 d-block d-lg-none order-2">
          <!-- <div class="my-3">
            <div class="d-flex mt-3 gap-3 att-show-row flex-wrap flex-column px-0">
              @foreach ($product->attribute_variation->groupBy('attribute_id') as $key => $item)
                  <div class="row px-3 flex-wrap mobAttrs">
                    <span class="pr-2">{{ $item->first()->attribute->name }}:</span>
                    @foreach ($product->attribute_variation as $attribute)
                      @if ($key == $attribute->attribute_id)
                        <label class="radio-container mr-2">
                          {{ $attribute->attribute_value->name }}
                          <input type="radio" data-name="{{ $item->first()->attribute->name }}:" name="{{ $attribute->attribute_value->attribute_id }}" value="{{ $attribute->attribute_value->id }}">
                          <span class="radio-checkmark"></span>
                        </label>
                      @endif
                    @endforeach
                  </div>
              @endforeach
            </div>
          </div> -->

          <nav>
            Магазин: <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="text-muted font-weight-bold text-decoration-none"> {{ $product->store->name }}     </a>
          </nav>
          <div class="d-flex flex-column">
            <span>
              Количество: {{ $order->quantity }}
            </span>
            @foreach ($order->attribute_values as $attribute_value)
            <span>
              {{ $attribute_value->attribute->name ?? '' }} - {{ $attribute_value->name ?? '' }}@if(!$loop->last), @endif</span>
            @endforeach
          </div>
        </div>
        <div class="col-12 col-lg-6 order-lg-2  order-2">

          <div class="my-3">
            <h4 class="font-weight-bold">Описание товара:</h4>
            <p class="text-secondary text-semi-bold">{{ $product->description }}</p>
          </div>
        </div>
        <div class="mt-3 d-block d-lg-none w-100 order-2 pb-3 pb-md-0">
          <div class="my-3 text-center d-flex justify-content-around pb-md-0 pb-5">
            <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="rounded-11 btn btn-danger mr-md-2 my-1">
              <img class="mr-1" src="/storage/theme/icons/store.svg" alt=""> В магазин продавца
            </a>
          </div>
        </div>
        <!--slider-proiduct-and-description-end-->
        <!--product-information-and-attribute-->
        <div class="col-12 col-lg-7 order-lg-1 px-md-5">
          <h3 class="h3 title mt-3 mt-lg-2 d-none d-lg-block">Информация о товаре</h3>
          <div class="mt-3 mt-lg-5 d-none d-lg-block ">

            <div class="mt-3">
              <a href="{{ route('ft-category.category', $product->category->slug) }}" class="text-muted  font-weight-bold text-decoration-none">{{ $product->category->name }}</a>
              <h3 class="mt-2 mb-3 font-weight-bold">{{ $product->name }}</h3>
              <nav class="text-muted">
                Магазин: <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="text-muted text-decoration-none"> {{ $product->store->name }}     </a>
              </nav>
              <div class="my-3 px-0 d-flex flex-column">
                <!-- <div class="d-flex mt-3 gap-3 att-show-row flex-column">
                  @foreach ($product->attribute_variation->groupBy('attribute_id') as $key => $item)
                  <div class="row px-3 flex-wrap desktopAttrs">
                    <span class="pr-2">{{ $item->first()->attribute->name }}:</span>
                    @foreach ($product->attribute_variation as $attribute)
                      @if ($key == $attribute->attribute_id)
                        <label class="radio-container mr-2">
                          {{ $attribute->attribute_value->name }}
                          <input type="radio" data-name="{{ $item->first()->attribute->name }}:" name="{{ $attribute->attribute_value->attribute_id }}"  value="{{ $attribute->attribute_value->id }}">
                          <span class="radio-checkmark"></span>
                        </label>
                      @endif
                    @endforeach
                    </div>
                  @endforeach
                </div> -->
                <span>
                  Количество: {{ $order->quantity }}
                </span>
                @foreach ($order->attribute_values as $attribute_value)
                <span>
                  {{ $attribute_value->attribute->name ?? '' }} - {{ $attribute_value->name ?? '' }}@if(!$loop->last), @endif</span>
                @endforeach
              </div>
            </div>
          </div>
          <div class="row align-items-center mt-lg-3 prod-controls">
            <div class="col-12 py-3">
              <div class="text-center text-md-left">
                <h5 class="mb-0"><span class="text-danger price mb-price" id="price">{{ $order->total + $order->margin }}</span> <span class="mb-currency">Сомони</span></h5>
              </div>
            </div>
            <div class="col-4 my-md-0 my-3 text-center d-none">
              <div class="position-relative d-flex align-items-center number justify-content-center">
                <form id="number-spinner-horizontal" class="t-neutral">
                  <fieldset class="spinner spinner--horizontal l-contain--medium flex-row flex-nowrap">
                     <button class="spinner__button spinner__button--left js-spinner-horizontal-subtract" data-type="subtract" title="Subtract 1" aria-controls="spinner-input">- </button>
                     <input type="number" class="spinner__input js-spinner-input-horizontal" id="spinner-input" disabled value="1" min="1" max="{{ $product->quantity  }}" step="1" pattern="[0-9]*" role="alert" aria-live="assertlive" />
                     <button data-type="add" class="spinner__button spinner__button--right js-spinner-horizontal-add" title="Add 1" aria-controls="spinner-input">+ </button>
                   </fieldset>
                 </form>
              </div>
            </div>
          </div>
          <div class="mt-3 mt-sm-5 d-lg-flex justify-content-end info-product_footer d-none order-1">
            <div class="my-3 text-center d-flex justify-content-end w-100 pb-md-0 pb-5">
              <a href="{{ route('ft-store.guest', $product->store->slug) }}" class="rounded-11 btn btn-danger mr-md-2 my-1">
                <img class="mr-1" src="/storage/theme/icons/store.svg" alt=""> В магазин продавца
              </a>
            </div>
          </div>
        </div>
        <!--product-information-and-attribute-end-->
      </div>
    </div>
  </section>
  <section class="divide"></section>


@endsection
