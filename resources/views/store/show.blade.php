@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
 <!--Header-end-->
  <section class="content profile mt-0 mt-md-5">
    <div class="container">
      <div class="row">
        <!--store logo start-->
        <div class="col-12 col-lg-3">
          <div class="text-center">
            <div class="position-relative d-inline-block">
            <img src="{{ Storage::url($stores->avatar) }}" class="img-fluid rounded" alt="">
              <button class="btn p-0 position-absolute change-avatar-icon"><img src="img/camera.svg" class="" alt=""></button>
            </div>
          </div>
        </div>
        <!--store logo end-->
        <!--store-info start-->
        <div class="col-12 col-lg-9">
          <div class="d-none d-lg-block">
            <p>Copywright will prowide is wonderful serenity has taken possession of my entire as soul, like these sweet
              mornings of spring which I enjoy with my whole heart. I am alone standards.</p>
            <a href="#" class="copywright__gideline mt-3 text-success"> Политика и конфеденцальность </a>
          </div>
          <div class="my-5 my-lg-3">
            <div class="row">
              <div class="col-12 col-md-6">
                <h3 class="font-weight-bold">Телефон:</h3>
              </div>
              <div class="col-12 col-md-6">
                <div class="text-left text-md-right">
                  <h5 class="font-weight-bold h5">
                    {{ $stores->user->phone ?? '' }}
                  </h5>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <h3 class="font-weight-bold">Город:</h3>
              </div>
              <div class="col-12 col-md-6">
                <div class="text-left text-md-right">
                  <h5 class="font-weight-bold h5">
                    {{ $stores->city->name ?? ''}}
                  </h5>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <h3 class="font-weight-bold">Имя:</h3>
              </div>
              <div class="col-12 col-md-6">
                <div class="text-left text-md-right">
                  <h5 class="font-weight-bold h5">
                    {{ $stores->user->name ?? ''}}
                  </h5>
                </div>
              </div>
              <div class="ccol-12 col-md-6">
                <h3 class="font-weight-bold">Адрес:</h3>
              </div>
              <div class="col-12 col-md-6">
                <div class="text-left text-md-right">
                  <h5 class="font-weight-bold h5">
                    {{ $stores->address ?? ''}}
                  </h5>
                </div>
              </div>
              <div class="offset-0 offset-md-6 col-12 col-md-6">
                <div class="text-center text-md-right">
                  <a class="btn btn-danger rounded-11" href="#">Изменить</a>
                </div>
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
          <a class="btn btn-danger w-100 rounded-11" href="#"><img class="mr-1" src="/storage/theme/icons/store.svg" alt="">  Мои товары</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="#"><img class="mr-1" src="/storage/theme/icons/orders.svg" alt="">  История продаж</a>
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
        <a class="nav-link active border-0 font-weight-bold" id="all-product-tab" data-toggle="tab" href="#all-product"  aria-selected="true">Все {{ count($products) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="published-tab" data-toggle="tab" href="#published"  aria-selected="false">Опубликованные {{ count($acceptedProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="onChecking-tab" data-toggle="tab" href="#onChecking" aria-selected="false">На проверке {{ count($onCheckProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="hidden-tab" data-toggle="tab" href="#hidden" aria-selected="false">Скрыты {{ count($hiddenProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="declined-tab" data-toggle="tab" href="#declined" aria-selected="false">Отклоненные {{ count($canceledProducts) }}</a>
      </li>
      <li class="nav-item position-relative">
        <a class="nav-link border-0 font-weight-bold" id="onDelete-tab" data-toggle="tab" href="#onDelete"  aria-selected="false">Удалено {{ count($deletedProducts) }}</a>
      </li>
    </ul>
    <!--Tab-content>-->
    <div class="tab-content" id="myTabContent">
      <!--all-product-->
      <div class="tab-pane fade show active" id="all-product" role="tabpanel" aria-labelledby="all-product-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($products as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0">
                  <svg class="position-absolute favorite" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
                    <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                  </svg>
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  Извените ничего не найдено
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
                <div class="card rounded shadow border-0">
                  <svg class="position-absolute favorite" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
                    <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                  </svg>
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  Извените ничего не найдено
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
                <div class="card rounded shadow border-0">
                  <svg class="position-absolute favorite" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
                    <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                  </svg>
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  Извените ничего не найдено
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
                <div class="card rounded shadow border-0">
                  <svg class="position-absolute favorite" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
                    <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                  </svg>
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  Извените ничего не найдено
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
                <div class="card rounded shadow border-0">
                  <svg class="position-absolute favorite" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
                    <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                  </svg>
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  Извените ничего не найдено
              @endforelse
            </div>
        </div>
      </div>
      <!--Declined end-->
      <!--On Delete-->
      <div class="tab-pane fade" id="onDelete" role="tabpanel" aria-labelledby="onDelete-tab">
        <div class="all-product container mt-5">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
              @forelse ($deletedProducts as $product)
              <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0">
                  <svg class="position-absolute favorite" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
                    <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                  </svg>
                  <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                  <div class="container">
                    <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                    <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                      <span class="font-weight-bold">{{ $product->price }} сомони</span>
                      <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                  Извените ничего не найдено
              @endforelse
            </div>
        </div>
      </div>
      <!--On Delete end-->
    </div>
    <!--Tab content end-->
    <div class="text-center">
        <a class="btn btn-danger px-5 rounded-11" href="{{ route('ft_product.add_product') }}"><img class="mr-1" src="/storage/theme/icons/add.svg" alt="">Добавить товар</a>
    </div>
  </div>
      <h4 class="text-secondary mt-4 text-center w-100">Определение статусов по цвету</h4>
      <div class="products-status position-relative row justify-content-center text-center">
        <div class="info-status__products status-success col-12 col-lg-2 mx-1"> Заказ выполнен</div>
        <div class="info-status__products status-cancled col-12 col-lg-2 mx-1"> Заказ отменен </div>
        <div class="info-status__products status-preparing col-12 col-lg-2  mx-1"> В пути</div>
      </div>
    </div>
  </section>
@endsection
