

@extends('layouts.app')
@extends('layouts.header')
@section('title')
    История продаж
@endsection
@extends('layouts.footer')
@section('content')
 <!--Header-end-->
  <section class="content profile mt-0 mt-md-4">
    <div class="container px-md-2">
      <div class="row">
        @if($stores->is_moderation)
        <div class="alert alert-warning w-100" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="alert-heading">Внимание!</h4>
          <p>На данный момент Ваш магазин находится <span class="alert-link">в процессе модерации</span>. Вы можете <span class="alert-link">добавлять товары и вносить изменения</span>.</p>
          <hr>
          <p class="mb-0">Данные отображаются покупателям после одобрения магазина.</p>
        </div>
      @elseif($stores->is_active == 2)
        <div class="alert alert-danger w-100" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="alert-heading">Внимание!</h4>
          <p>Ваш магазин отключен. При выключении магазина учитите, что другие пользователи не смогут видеть ваши товары, пока вы не восстановите магазин. Для подробной информации свяжитесь с модератором: <br> Телефон для справки <a href="tel:+992000029641"class="alert-link"> (+992) 000 02 9641</a></p>
        </div>
        @elseif($stores->is_active == 0)
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
      <div class="col-12 d-none d-md-block col-lg-3 px-0 px-md-2">
        <div class="text-center">
          <div class="position-relative d-inline-block">
          <img src="/storage/{{ $stores->avatar ?? '/theme/avatar_store.svg'}}" class="w-100 rounded store-image" alt=""  height="216">
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-9 px-0 px-md-2">
        <div class="position-relative d-inline-block w-100">
          <h6 class="font-weight-bold mb-3 d-block d-md-none store-info">Информация о магазине</h6>
          <img src="/storage/{{ $stores->cover ?? '/theme/banner_store.svg'}}" class="w-100 rounded store-image" alt=""  height="216">
          <div class="mobile-avatar position-absolute w-lg-100">
            <img src="/storage/{{ $stores->avatar ?? '/theme/avatar_store.svg'}}" class="shadow store-image d-block d-md-none rounded-circle" width="90" height="90" alt="">
          </div>
        </div>
        </div>
      <!--store logo end-->
      <!--store-info start-->
      <div class="col-12 mt-lg-4 px-md-2">
        <div class="d-none d-lg-block">
          <p>{{ $stores->description ?? '' }}</p>
          <a href="{{ route('useful_links.privacy_policy') }}" class="copywright__gideline mt-3 text-success"> Политика и конфеденцальность </a>
        </div>
        <div class="my-5 my-lg-3">
          <div class="row">
            <div class="col-6 col-md-5 my-1 md:my-0">
              <h4 class="font-weight-bold">Телефон:</h4>
            </div>
            <div class="col-6 col-md-7 my-1 md:my-0">
              <h5 class="text-left text-md-right">
                {{ $stores->user->phone ?? '' }}
              </h5>
            </div>
            <div class="col-6 col-md-5 my-1 md:my-0">
              <h4 class="font-weight-bold">Город:</h4>
            </div>
            <div class="col-6 col-md-7 my-1 md:my-0">
              <h5 class="text-left text-md-right">
                {{ $stores->city->name ?? ''}}
              </h5>
            </div>
            <div class="col-6 col-md-5 my-1 md:my-0">
              <h4 class="font-weight-bold">Имя:</h4>
            </div>
            <div class="col-6 col-md-7 my-1 md:my-0">
              <h5 class="text-left text-md-right">
                {{ $stores->name ?? ''}}
              </h5>
            </div>
            <div class="col-6 col-md-5 my-1 md:my-0">
              <h4 class="font-weight-bold">Адрес:</h4>
            </div>
            <div class="col-6 col-md-7 my-1 md:my-0">
              <h5 class="text-left text-md-right">
                {{ $stores->address ?? ''}}
              </h5>
            </div>
            <div class="d-flex justify-content-center justify-content-md-end w-100 store-controls mt-3 mt-md-0 px-3">
              <a class="btn btn-danger rounded-11 my-1" href="{{ route('ft-store.edit', $stores->slug) }}">Изменить</a>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <!--customer-navs start-->
    <!--customer-navs start-->
  <div class="container-fluid bg-white py-3 d-none d-md-block">
    <div class="container px-md-0">
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
  <div class="container mt-3 mb-5 px-md-2" id="accordion">
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3">
      @forelse ($stores->orders as $order)
        <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
          <div class="row  mx-0">
            <div class="info-status__products @if($order->order_status_id == 3)status-success @elseif($order->order_status_id == 2)status-preparing @else()status-canceled @endif col-12 mb-1"></div>
            <div class="card rounded shadow border-0  h-100 w-100">
              <img class="img-fluid rounded" src="{{ Storage::url($order->no_scope_product->image) }}" alt="">
              <div class="container">
                <h4 class="product-name shop-subject mt-3" >{{ $order->no_scope_product->name }}</h4>
                <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                  <span class="font-weight-bold">{{ round($order->no_scope_product->price_after_margin) }} сомони</span>
                  <a href="{{ route('ft-products.single', $order->no_scope_product->slug) }}" class="stretched-link"></a>
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
  </div>
  </section>
@endsection
