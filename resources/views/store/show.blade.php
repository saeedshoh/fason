@extends('layouts.app')
@extends('layouts.header')

@section('title', $store->name)
@section('seo-desc', $store->description)
@section('seo-keywords', $store->name)
@section('og:title', $store->name)
@section('og:description', $store->description)
@section('og:image', Storage::url($store->avatar))
@section('og:image:alt', $store->name)

@extends('layouts.footer')
@section('content')
 <!--Header-end-->
  <section class="content profile mt-0 mt-md-3">
    <div class="container">

      @if($store->is_moderation)
        <div class="col-12  px-0 px-md-2">
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <p>Ваши изменения вступят в силу как только <span class="alert-link">пройдут модерацию!</span>
          </div>
        </div>
      @elseif($store->is_active == 0)
      <div class="col-12  px-0 px-md-2">
        <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="alert-heading">Внимание!</h4>
          <p>Ваш магазин отключен. Для подробной информации свяжитесь с модератором: <br> Телефон для справки <span class="alert-link">XXXXXXXXX</span></p>
        </div>
      </div>
      @else
        <div class="col-12  px-0 px-md-2">
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">Внимание!</h4>
            <p>На данный момент Ваш магазин находится <span class="alert-link">в процессе модерации</span>. Вы можете <span class="alert-link">добавлять товары и вносить изменения</span>.</p>
            <hr>
            <p class="mb-0">Данные отображаются покупателям после одобрения магазина.</p>
          </div>
        </div>
      @endif
      <script>
        $(".alert").alert();
      </script>
      <div class="row">


        <!--store logo start-->
        <div class="col-12 d-none d-md-block col-lg-3 px-0 px-md-2">
          <div class="text-center">
            <div class="position-relative d-inline-block">
            <img src="/storage/{{ $store->avatar ?? '/theme/avatar_store.svg'}}" class="w-100 rounded store-image" alt=""  height="216">
              {{-- <button class="btn p-0 position-absolute change-avatar-icon"><img src="img/camera.svg" class="" alt=""></button> --}}
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-9 px-0 px-md-2">
            <div class="text-center">
              <div class="position-relative d-inline-block">
                <h6 class="font-weight-bold mb-3 d-block d-md-none store-info">Информация о магазине</h6>
              <img src="/storage/{{ $store->cover ?? '/theme/banner_store.svg'}}" class="w-100 rounded store-image" alt=""  height="216">
              <div class="mobile-avatar position-absolute w-lg-100">
                <img src="/storage/{{ $store->avatar ?? '/theme/avatar_store.svg'}}" class="shadow store-image d-block d-md-none rounded-circle" width="90" height="90" alt="">
              </div>
              </div>
            </div>
          </div>
        <!--store logo end-->
        <!--store-info start-->
        <div class="col-12 mt-lg-4">
          <div class="d-none d-lg-block">
            <p>{{ $store->description ?? '' }}</p>
            <a href="{{ route('useful_links.privacy_policy') }}" class="copywright__gideline mt-3 text-success"> Политика и конфеденцальность </a>
          </div>
          <div class="my-5 my-lg-3">
            <div class="row">
              <div class="col-6 col-md-5 my-1 md:my-0">
                <h4 class="font-weight-bold">Телефон:</h4>
              </div>
              <div class="col-6 col-md-7 my-1 md:my-0">
                <h5 class="text-left text-md-right">
                  {{ $store->user->phone ?? '' }}
                </h5>
              </div>
              <div class="col-6 col-md-5 my-1 md:my-0">
                <h4 class="font-weight-bold">Город:</h4>
              </div>
              <div class="col-6 col-md-7 my-1 md:my-0">
                <h5 class="text-left text-md-right">
                  {{ $store->city->name ?? ''}}
                </h5>
              </div>
              <div class="col-6 col-md-5 my-1 md:my-0">
                <h4 class="font-weight-bold">Имя:</h4>
              </div>
              <div class="col-6 col-md-7 my-1 md:my-0">
                <h5 class="text-left text-md-right">
                  {{ $store->name ?? ''}}
                </h5>
              </div>
              <div class="col-6 col-md-5 my-1 md:my-0">
                <h4 class="font-weight-bold">Адрес:</h4>
              </div>
              <div class="col-6 col-md-7 my-1 md:my-0">
                <h5 class="text-left text-md-right">
                  {{ $store->address ?? ''}}
                </h5>
              </div>
              <div class="d-flex justify-content-center justify-content-md-end w-100 store-controls mt-3 mt-md-0">
                <button type="button" class="rounded-11 btn btn-outline-secondary mr-2 my-1 delete-store">
                  <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="-40 0 427 427.00131" width="15px"><path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/></svg>
                  Отключить
                </button>
                <a class="btn btn-danger rounded-11 my-1" href="{{ route('ft-store.edit', $store->slug) }}">Изменить</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--customer-navs start-->
    <!--customer-navs start-->
  <div class="container-fluid bg-white py-3 d-none d-md-block">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('ft-store.show', $store->slug) }}"><img class="mr-1" src="/storage/theme/icons/store.svg" alt="">  Мои товары</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('salesHistory', $store->slug) }}"><img class="mr-1" src="/storage/theme/icons/orders.svg" alt="">  История продаж</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('ft_product.add_product') }}"><img class="mr-1" src="/storage/theme/icons/add.svg" alt="">Добавить товар</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('favorite.index') }}"><img class="mr-1" src="/storage/theme/icons/saved.svg" alt="">  Сохраненные</a>
        </div>
      </div>
    </div>
  </div>
  <!--customer-navs end-->
  <!--tabs with goods start-->
  <div class="container">
    <ul class="nav nav-tabs customer-tab border-0">
      <li class="nav-item position-relative">
        <a class="nav-link active" id="all-product-tab" data-toggle="tab" href="#all-product"  aria-selected="true">Все товары {{ count($products) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link" id="deleted-tab" data-toggle="tab" href="#deleted-products"  aria-selected="true">Удаленные {{ count($deletedProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link" id="onChecking-tab" data-toggle="tab" href="#onChecking" aria-selected="false">На проверке {{ count($onCheckProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link " id="hidden-tab" data-toggle="tab" href="#hidden" aria-selected="false">Скрыты {{ count($hiddenProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link" id="declined-tab" data-toggle="tab" href="#declined" aria-selected="false">Отклонённые {{ count($canceledProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link" id="notInStock-tab" data-toggle="tab" href="#notInStock" aria-selected="false">Нет в наличии {{ count($notInStock) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link " id="published-tab" data-toggle="tab" href="#published"  aria-selected="false">Опубликовано {{ count($acceptedProducts) }}</a>
      </li>
      {{-- <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="onDelete-tab" data-toggle="tab" href="#onDelete"  aria-selected="false">Удалено {{ count($deletedProducts) }}</a>
      </li> --}}
    </ul>
    <!--Tab-content>-->
    <div class="tab-content mb-5" id="myTabContent">
      <!--all-product-->
      <div class="tab-pane fade show active" id="all-product" role="tabpanel" aria-labelledby="all-product-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($products as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container mt-3">
                    <span class="text-secondary">
                      @if($product->product_status->id == 1)
                        В модерации
                      @else
                        <img height="15px" width="15px" src="/storage/theme/icons/clock.svg"> До скрытия
                        @if(substr(($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d'), -1) == 1) {{ ($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d') }} день
                          @elseif(in_array(substr(($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d'), -1), ['2','3','4'])) {{ ($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d') }} дня
                          @else {{ ($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d') }} дней
                        @endif
                      @endif
                    </span>
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ round($product->price_after_margin) }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-4">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--All product-end-->
      <!--Published-tab-->
      <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($acceptedProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container mt-3">
                    <span class="text-secondary"><img height="15px" width="15px" src="/storage/theme/icons/clock.svg"> До скрытия
                            @if(substr(($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d'), -1) == 1) {{ ($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d') }} день
                            @elseif(in_array(substr(($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d'), -1), ['2','3','4'])) {{ ($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d') }} дня
                            @else {{ ($product->updated_at->format('d')+7) - \Carbon\Carbon::now()->format('d') }} дней
                            @endif
                    </span>
                    <h4 class="product-name shop-subject mt-2" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ round($product->price_after_margin) }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-4">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--Published-tab end-->
      <!--On Checking-->
      <div class="tab-pane fade" id="onChecking" role="tabpanel" aria-labelledby="onChecking-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($onCheckProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <span class="text-secondary">
                      В модерации
                    </span>
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ round($product->price_after_margin) }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-4">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--On Checking end-->
      <!--Hidden-->
      <div class="tab-pane fade" id="hidden" role="tabpanel" aria-labelledby="hidden-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($hiddenProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ round($product->price_after_margin) }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-4">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--Hidden end-->
      <!--Declined-->
      <div class="tab-pane fade" id="declined" role="tabpanel" aria-labelledby="declined-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($canceledProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ round($product->price_after_margin) }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-4">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--Declined end-->
      <!--Not in stock-->
      <div class="tab-pane fade" id="notInStock" role="tabpanel" aria-labelledby="notInStock-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($notInStock as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0  h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ round($product->price_after_margin) }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-4">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--Declined end-->
      <!--On Delete-->
      <div class="tab-pane fade" id="deleted-products" role="tabpanel" aria-labelledby="deleted-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($deletedProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0">
                  <svg class="position-absolute favorite @if (Auth::check() && $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()) $product->favorite->where('status', 1)->where('user_id', Auth::user()->id)->first()->product_id == $product->id ? active : '' @endif" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
                    <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                  </svg>
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-4">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
    </div>

    </div>
    <!--Tab content end-->
    <div class="d-none d-lg-block text-center mt-1 mb-5 mb-lg-0">
        {{-- @if($store->is_active == 1) --}}
        <a class="btn btn-danger col-6 col-sm-2 rounded-11 mb-5" href="{{ route('ft_product.add_product') }}"><img class="mr-1" src="/storage/theme/icons/add.svg" alt="">Добавить товар</a>
        {{-- @else
        <div class="alert alert-warning" role="alert">
            Магазин еще не прошел модерацию.
        </div>
        @endif --}}
    </div>
  </div>
  </section>
@endsection
