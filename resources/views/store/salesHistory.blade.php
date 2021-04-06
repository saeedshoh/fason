

@extends('layouts.app')
@extends('layouts.header')
@section('title')
    История продаж
@endsection
@extends('layouts.footer')
@section('content')
 <!--Header-end-->
  <section class="content profile mt-0 mt-md-5">
    <div class="container">
      <div class="row">
        <!--store logo start-->
        <div class="col-12 col-lg-3 px-0">
          <div class="text-center">
            <div class="position-relative d-inline-block">
            <img src="/storage/{{$store->avatar ?? '/theme/avatar_store.svg' }}" class="img-fluid" alt="">
              <button class="btn p-0 position-absolute change-avatar-icon"><img src="img/camera.svg" class="" alt=""></button>
            </div>
          </div>
        </div>
        <!--store logo end-->
        <!--store-info start-->
        <div class="col-12 col-lg-9">
          <div class="d-none d-lg-block">
            <p>{{ $stores->description ?? '' }}</p>
            <a href="{{ route('useful_links.privacy_policy') }}" class="copywright__gideline mt-3 text-success"> Политика и конфеденцальность </a>
          </div>
          <div class="my-5 my-lg-3">
            <div class="row">
              <div class="col-4">
                <h3 class="font-weight-bold">Телефон:</h3>
              </div>
              <div class="col-8 align-self-center">
                <h5 class="font-weight-bold text-left text-md-right mb-1">
                  {{ $stores->user->phone ?? '' }}
                </h5>
              </div>
              <div class="col-4">
                <h3 class="font-weight-bold">Город:</h3>
              </div>
              <div class="col-8 align-self-center">
                <h5 class="font-weight-bold text-left text-md-right mb-1">
                  {{ $stores->city->name ?? ''}}
                </h5>
              </div>
              <div class="col-4">
                <h3 class="font-weight-bold">Имя:</h3>
              </div>
              <div class="col-8 align-self-center">
                <h5 class="font-weight-bold text-left text-md-right mb-1">
                  {{ $stores->name ?? ''}}
                </h5>
              </div>
              <div class="col-4">
                <h3 class="font-weight-bold">Адрес:</h3>
              </div>
              <div class="col-8 align-self-center">
                <h5 class="font-weight-bold text-left text-md-right mb-1">
                  {{ $stores->address ?? ''}}
                </h5>
              </div>
              <div class="offset-0 offset-md-6 col-12 col-md-6 mt-md-0 mt-3">
                <div class="text-center text-md-right">
                  <a class="btn btn-danger col-6 col-sm-4 rounded-11" href="{{ route('ft-store.edit', $stores->id) }}">Изменить</a>
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
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('ft-store.show', $stores->slug) }}"><img class="mr-1" src="/storage/theme/icons/store.svg" alt="">  Мои товары</a>
        </div>
        <div class="col-md-6 col-lg-3 my-3 my-lg-0">
          <a class="btn btn-danger w-100 rounded-11" href="{{ route('salesHistory', $stores->slug) }}"><img class="mr-1" src="/storage/theme/icons/orders.svg" alt="">  История продаж</a>
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
  <div class="container mt-3 mb-5" id="accordion">
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
      @forelse ($stores->orders as $order)
        <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
          <div class="row  mx-0">
            <div class="info-status__products @if($order->order_status_id == 3)status-success @elseif($order->order_status_id == 2)status-preparing @else()status-canceled @endif col-12 mb-1"></div>
            <div class="card rounded shadow border-0  h-100 w-100">
              <img class="img-fluid rounded" src="{{ Storage::url($order->product->image) }}" alt="">
              <div class="container">
                <h4 class="product-name shop-subject mt-3" >{{ $order->product->name }}</h4>
                <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                  <span class="font-weight-bold">{{ round($order->product->price_after_margin) }} сомони</span>
                  <a href="{{ route('ft-products.single', $order->product->slug) }}" class="stretched-link"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
          Извените ничего не найдено
      @endforelse
    </div>
    <h4 class="text-secondary mt-4 text-center w-100">Определение статусов по цвету</h4>
      <div class="products-status position-relative row justify-content-center text-center pb-5 pb-lg-0">
        <div class="info-status__products status-success col-12 col-lg-2 mx-1"> Заказ выполнен</div>
        <div class="info-status__products status-canceled col-12 col-lg-2 mx-1"> Заказ отменен </div>
        <div class="info-status__products status-preparing col-12 col-lg-2 mx-1"> В ожидании</div>
      </div>
      {{-- @forelse ($months as $month => $items)
          <div class="card">
              <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $month }}" aria-expanded="true" aria-controls="collapseOne">
                          {{ $month }}
                      </button>
                  </h5>
              </div>

              <div id="collapse{{ $month }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  @foreach ($items as $order)
                      <div class="row border-top border-bottom my-2 py-3 align-items-center position-relative">
                          <div class="col-12 col-lg-6">
                              <div class="d-flex w-100 justify-content-start justify-lg-content-center status">
                                  <img class="d-none d-md-block mr-3 rounded" src="{{ Storage::url($order->product->image) }}" width="64" >
                                  <div class="d-flex flex-column align-self-center w-100">
                                      <h5 class="h5">{{ $order->product->name }}</h5>
                                      <div class="d-flex justify-content-between">
                                          <small class="text-secondary">Дата заказа: {{ $order->updated_at->format('d.m.Y') }}</small>
                                          <h6 class="h6 text-secondary d-block d-lg-none">
                                              <span class="text-uppercase">Цена</span>: <span class="text-danger"> {{ $order->total }} Сомони</span>
                                          </h6>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-2 d-none d-lg-block">
                              <h6 class="h6">Дата заказа</h6>
                              <h4 class="h4 font-weight-bold">{{ $order->updated_at->format('d.m.Y') }}</h4>
                          </div>
                          <div class="col-2 d-none d-lg-block">
                              <h6 class="h6">Цена</h6>
                              <h4 class="h4 font-weight-bold">{{ $order->total }} Сомони</h4>
                          </div>
                          <div class="col-2 d-none d-lg-block">
                              <h6 class="h6">Кол-во</h6>
                              <h4 class="h5 font-weight-bold">{{ $order->quantity }}</h4>
                          </div>
                          <a href="{{ route('ft-products.single', $order->product->slug) }}" class="stretched-link"></a>
                      </div>
                  @endforeach
              </div>
          </div>
      @empty
          <p>У вас нет заказов</p>
      @endforelse --}}

  </div>
  <!--customer-navs end-->
  {{-- <div class="container">
    <div class="text-center">
        <a class="btn btn-danger col-6 col-sm-2 rounded-11" href="{{ route('ft_product.add_product') }}"><img class="mr-1" src="/storage/theme/icons/add.svg" alt="">Добавить товар</a>
    </div>
  </div> --}}

  </section>
@endsection
