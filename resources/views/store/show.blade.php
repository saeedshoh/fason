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
  <section class="content profile mt-0 mt-md-4">
    <div class="container px-md-2">
      <div class="row">
        @if($store->is_moderation)
          <div class="alert alert-warning w-100" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">Внимание!</h4>
            <p>На данный момент Ваш магазин находится <span class="alert-link">в процессе модерации</span>. Вы можете <span class="alert-link">добавлять товары и вносить изменения</span>.</p>
            <hr>
            <p class="mb-0">Данные отображаются покупателям после одобрения магазина.</p>
          </div>
        @elseif($store->is_active == 2)
          <div class="alert alert-danger w-100" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">Внимание!</h4>
            <p>Ваш магазин отключен. При выключении магазина учитите, что другие пользователи не смогут видеть ваши товары, пока вы не восстановите магазин. Для подробной информации свяжитесь с модератором: <br> Телефон для справки <a href="tel:+992000029641"class="alert-link"> (+992) 000 02 9641</a></p>
          </div>
          @elseif($store->is_active == 0)
          <div class="alert alert-danger w-100" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">Внимание!</h4>
            <p>Ваш магазин отключен со стороны администрации.Товары данного магазина не будут видны другим пользователям, пока магазин не будет включен. Для подробной информации свяжитесь с модератором: <br> Телефон для справки <a href="tel:+992000029641"class="alert-link"> (+992) 000 02 9641</a></p>
          </div>
        @endif
      <script>
        $(".alert").alert();
      </script>
        <!--store logo start-->
        <div class="col-12 d-none d-lg-block col-lg-3 px-0 px-md-2">
          <div class="text-center">
            <div class="position-relative d-inline-block">
            <img src="/storage/{{ $store->avatar ?? '/theme/avatar_store.svg'}}" class="w-100 rounded store-image" alt=""  height="216">
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-9 px-0 px-md-2">
          <div class="position-relative d-inline-block w-100">
            <h6 class="font-weight-bold mb-3 d-none d-md-block store-info">Информация о магазине</h6>
            <img src="/storage/{{ $store->cover ?? '/theme/banner_store.svg'}}" class="w-100 rounded store-image object-cover" alt=""  height="216">

            <div class="mobile-avatar position-absolute w-lg-100">
              <img src="/storage/{{ $store->avatar ?? '/theme/avatar_store.svg'}}" class="store-image d-block d-md-none rounded-circle bordered-white" width="90" height="90" alt="">
            </div>
          </div>
          </div>
        <!--store logo end-->
        <!--store-info start-->
        <div class="col-12 mt-lg-4 px-md-2 d-none d-md-block">
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
              <div class="d-flex justify-content-center justify-content-md-end w-100 store-controls mt-3 mt-md-0 px-3">
                <a class="btn btn-danger rounded-11 my-1" href="{{ route('ft-store.edit', $store->slug) }}">Изменить</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Info about store show mobile ---->
        <div class="col-12 d-block d-md-none d-lg-none mt-5">
            <!-- Card -->
            <div class="card mb-3">
              <div class="card-header bg-white">

                <h4 class="card-header-title font-weight-bold">
                  Информация о магазине
                </h4>

              </div>
              <div class="card-body">
                <!-- Card -->
                <ul class="list-group list-group-flush">

                  <li class=" d-flex align-items-center justify-content-between px-0 border-bottom border__lightBlue py-3">
                    <div>Телефон</div>
                    <div>
                        <a href="tel:{{ $store->user->phone ?? '' }}" class="text-body">{{ $store->user->phone ?? '' }}</a>
                    </div>
                  </li>
                  <li class=" d-flex align-items-center justify-content-between px-0 border-bottom border__lightBlue py-3">
                    <div>Город</div>
                    <div>
                         {{ $store->city->name ?? ''}}
                    </div>
                  </li>
                  <li class="d-flex align-items-center justify-content-between px-0 border-bottom border__lightBlue py-3">
                    <div>Имя</div>
                    <div> {{ $store->name ?? ''}} </div>
                  </li>
                  <li class="d-flex align-items-center justify-content-between px-0 py-3">
                    <div>Адрес</div>
                    <div> {{ $store->address ?? ''}}</div>
                  </li>
                </ul>

              </div>
            </div>
            <div class="d-flex justify-content-center justify-content-md-end w-100 store-controls mt-3 mt-md-0 px-3">
                <a class="btn btn-danger rounded-11 my-1" href="{{ route('ft-store.edit', $store->slug) }}">Изменить</a>
            </div>
        </div>
        <!--End Info about store show mobile -->

      </div>
    </div>
    <!--customer-navs start-->
    <!--customer-navs start-->
  <div class="container-fluid bg-white py-3 d-none d-md-block">
    <div class="container px-md-0">
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
  <div class="container px-md-0">
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
    </ul>
    <!--Tab-content>-->
    <div class="tab-content mb-5" id="myTabContent">
      <!--all-product-->
      <div class="tab-pane fade show active" id="all-product" role="tabpanel" aria-labelledby="all-product-tab">
        <div class="all-product container px-md-2 mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($products as $product)
              @if(\Carbon\Carbon::parse($product->deleted_at)->diffInDays(\Carbon\Carbon::now()) <= 14)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0 h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container mt-3">
                    <span class="text-secondary">
                      @if($product->product_status->id == 1 && $product->deleted_at == null)
                        В модерации
                      @elseif ($product->deleted_at != null)
                        Товар удалён
                        @if($product->deleted_at->diffInDays(now()) > 0)

                          <p class="mt-1"><img height="15px" width="15px" src="/storage/theme/icons/clock.svg"> До удаления
                          @if($product->deleted_at->diffInDays(now()) === 1)
                            {{ $product->deleted_at->diffInDays(now()) }} день
                          @elseif($product->deleted_at->diffInDays(now()) === 2 || $product->deleted_at->diffInDays(now()) === 3 || $product->deleted_at->diffInDays(now()) === 4)
                            {{ $product->deleted_at->diffInDays(now()) }} дня
                          @else
                            {{ $product->deleted_at->diffInDays(now()) }} дней
                          @endif</p>
                        @endif
                      @elseif ($product->product_status->id == 3)
                        Товар отклонён
                      @elseif ($product->product_status->id == 4)
                        Товар скрыт, обновите!
                      @elseif ($product->product_status->id == 5)
                        Товара нет в наличии
                      @elseif ($product->product_status->id == 6)
                        Товар удалён модератором
                      @else
                        <div class="public_card_custom">Опубликовано</div>
                        <img height="15px" width="15px" src="/storage/theme/icons/clock.svg"> До скрытия
                        @if( $product->beforeHiding()  === 1)
                          {{  $product->beforeHiding() }} день
                        @elseif( $product->beforeHiding() === 2 ||  $product->beforeHiding() === 3 || $product->beforeHiding() === 4)
                          {{ $product->beforeHiding() }} дня
                        @else
                          {{ $product->beforeHiding() }} дней
                        @endif
                      @endif
                    </span>
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @empty
                <span class="mb-5 mt-3 col-12">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--All product-end-->
      <!--Published-tab-->
      <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
        <div class="all-product container px-md-2 mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($acceptedProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0 h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container mt-3">
                    <span class="text-secondary">
                        <div class="public_card_custom">Опубликовано</div>
                        <img height="15px" width="15px" src="/storage/theme/icons/clock.svg"> До скрытия
                        @if($product->beforeHiding() === 1)
                            {{ $product->beforeHiding() }} день
                        @elseif($product->beforeHiding() === 2 || $product->beforeHiding() === 3 || $product->beforeHiding() === 4)
                            {{ $product->beforeHiding() }} дня
                        @else
                            {{ 15 - $product->beforeHiding() }} дней
                        @endif
                    </span>
                    <h4 class="product-name shop-subject mt-2" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-5 mt-3 col-12">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--Published-tab end-->
      <!--On Checking-->
      <div class="tab-pane fade" id="onChecking" role="tabpanel" aria-labelledby="onChecking-tab">
        <div class="all-product container px-md-2 mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($onCheckProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0 h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container mt-3">
                    <span class="text-secondary">
                      В модерации
                    </span>
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                        <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                        <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                <span class="mb-5 mt-3 col-12">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--On Checking end-->
      <!--Hidden-->
      <div class="tab-pane fade" id="hidden" role="tabpanel" aria-labelledby="hidden-tab">
        <div class="all-product container px-md-2 mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($hiddenProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0 h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container mt-3">
                    <span class="text-secondary">
                      Товар скрыт, обновите!
                    </span>
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                <span class="mb-5 mt-3 col-12">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--Hidden end-->
      <!--Declined-->
      <div class="tab-pane fade" id="declined" role="tabpanel" aria-labelledby="declined-tab">
        <div class="all-product container px-md-2 mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($canceledProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0 h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container mt-3">
                    <span class="text-secondary">
                      Товар отклонён
                    </span>
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-5 mt-3 col-12">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--Declined end-->
      <!--Not in stock-->
      <div class="tab-pane fade" id="notInStock" role="tabpanel" aria-labelledby="notInStock-tab">
        <div class="all-product container px-md-2 mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($notInStock as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0 h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container mt-3">
                    <span class="text-secondary">
                      Товара нет в наличии
                    </span>
                    <h4 class="product-name shop-subject mt-3" >{{ Str::limit($product->name, 30) }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-5 mt-3 col-12">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
      </div>
      <!--Declined end-->
      <!--On Delete-->
      <div class="tab-pane fade" id="deleted-products" role="tabpanel" aria-labelledby="deleted-tab">
        <div class="all-product container px-md-2 mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($deletedProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0 h-100 w-100">
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container mt-3">
                    <span class="text-secondary">
                      @if ($product->deleted_at != null)
                        Товар удалён
                        @if($product->deleted_at->diffInDays(now()) != 0)
                        <p class="mt-1"><img height="15px" width="15px" src="/storage/theme/icons/clock.svg"> До удаления
                            @if($product->deleted_at->diffInDays(now()) === 1)
                                {{ $product->deleted_at->diffInDays(now()) }} день
                            @elseif($product->deleted_at->diffInDays(now()) === 2 || $product->deleted_at->diffInDays(now()) === 3 || $product->deleted_at->diffInDays(now()) === 4)
                                {{ $product->deleted_at->diffInDays(now()) }} дня
                            @else
                                {{ $product->deleted_at->diffInDays(now()) }} дней
                            @endif</p>
                        @endif
                      @elseif ($product->product_status->id == 6)
                        Товар удалён модератором
                      @endif
                    </span>
                    <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price_after_margin }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  <span class="mb-5 mt-3 col-12">Извените ничего не найдено</span>
              @endforelse
            </div>
        </div>
    </div>

    </div>
  </div>
  </section>
@endsection
