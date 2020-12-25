@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')

@section('content')
  <section>
    <div class="container mt-3">
       <!--tabs-->
        <div class="order-tab bg-white rounded p-3">
            <div class="container">
            <ul class="nav nav-pills justify-content-between" id="myTab" role="tablist">
                <li class="nav-item w-50 text-center" role="presentation">
                    <a class="nav-link active" id="buy-tab" data-toggle="tab" href="#buy" role="tab" aria-controls="buy" aria-selected="true">Покупка</a>
                </li>
                @if ($is_store != null)
                <li class="nav-item w-50 text-center" role="presentation">
                    <a class="nav-link" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="sell" aria-selected="false">Продажа</a>
                </li>
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                <!--buy tabs-->
                <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                <!--success order-->

                @forelse ($orders as $order)
               
                    <div class="@if ($order->order_status_id == 1) in-road-card @elseif($order->order_status_id == 2) declined-card @else success-card @endif">
                        <div class="text-right d-block d-lg-none">
                            <h6 class="@if ($order->order_status_id == 1) text-warning @elseif($order->order_status_id == 2) text-danger @else text-success @endif ">{{ $order->order_status->name }}</h6>
                        </div>
                        <div class="row border-top border-bottom my-2 py-3 align-items-center position-relative">
                            <div class="col-12 col-lg-6">
                                <div class="d-flex w-100 justify-content-start justify-lg-content-center status">
                                <img class="d-none d-md-block mr-3 rounded" src="{{ Storage::url($order->product->image) }}" width="64" >
                                <div class="d-flex flex-column align-self-center w-100">
                                    <h5 class="h5">{{ $order->product->name }}</h5>
                                    <div class="d-flex justify-content-between">
                                        <small class="text-secondary">Дата заказа: {{ $order->created_at->format('d.m.Y') }}</small>
                                        <h6 class="h6 text-secondary d-block d-lg-none">
                                            <span class="text-uppercase">Цена</span>: <span class="text-danger"> {{ $order->total }} Сомони</span>
                                        </h6>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                            <div class="col-2 d-none d-lg-block">
                                <h6 class="h6">Дата заказа</h6>
                                <h4 class="h4 font-weight-bold">{{ $order->created_at->format('d.m.Y') }}</h4>
                            </div>
                            <div class="col-2 d-none d-lg-block">
                                <h6 class="h6">Цена</h6>
                                <h4 class="h4 font-weight-bold @if ($order->order_status_id == 1) text-warning @elseif($order->order_status_id == 2) text-danger @else text-success @endif ">{{ $order->total }} Сомони</h4>
                            </div>
                            <div class="col-2 d-none d-lg-block">
                                <h6 class="h6">Статус</h6>
                                <h4 class="h5 font-weight-bold @if ($order->order_status_id == 1) text-warning @elseif($order->order_status_id == 2) text-danger @else text-success @endif ">{{ $order->order_status->name }}</h4>
                            </div>
                            <a href="{{ route('ft-products.single', $order->product->slug) }}" class="stretched-link"></a>
                        </div>
                    </div>
                @empty
                    <p>У вас нет заказов</p>
                @endforelse

                </div>
                <div class="tab-pane fade" id="sell" role="tabpanel" aria-labelledby="sell-tab">
                @forelse ($sales as $sale)
                    @if ($sale->product->store_id == Auth::user()->id)
                    <div class="@if ($sale->store_status_id == 1) in-road-card @elseif($sale->order_status_id == 2) declined-card @else success-card @endif">
                        <div class="text-right d-block d-lg-none">
                            <h6 class="@if ($sale->store_status_id == 1) text-warning @elseif($sale->order_status_id == 2) text-danger @else text-success @endif ">{{ $sale->order_status->name }}</h6>
                        </div>
                        <div class="row border-top border-bottom my-2 py-3 align-items-center position-relative">
                            <div class="col-12 col-lg-6">
                                <div class="d-flex w-100 justify-content-start justify-lg-content-center status">
                                <img class="d-none d-md-block mr-3 rounded" src="{{ Storage::url($sale->product->image) }}" width="64" >
                                <div class="d-flex flex-column align-self-center w-100">
                                    <h5 class="h5">{{ $sale->product->name}}</h5>
                                    <div class="d-flex justify-content-between">
                                        <small class="text-secondary">Дата заказа: {{ $sale->created_at->format('d.m.Y') }}</small>
                                        <h6 class="h6 text-secondary d-block d-lg-none">
                                            <span class="text-uppercase">Цена</span>: <span class="text-danger"> {{ $sale->total }} Сомони</span>
                                        </h6>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                            <div class="col-2 d-none d-lg-block">
                                <h6 class="h6">Дата заказа</h6>
                                <h4 class="h4 font-weight-bold">{{ $sale->created_at->format('d.m.Y') }}</h4>
                            </div>
                            <div class="col-2 d-none d-lg-block">
                                <h6 class="h6">Цена</h6>
                                <h4 class="h4 font-weight-bold @if ($sale->order_status_id == 1) text-warning @elseif($sale->order_status_id == 2) text-danger @else text-success @endif ">{{ $sale->total }} Сомони</h4>
                            </div>
                            <div class="col-2 d-none d-lg-block">
                                <h6 class="h6">Статус</h6>
                                <h4 class="h5 font-weight-bold @if ($sale->order_status_id == 1) text-warning @elseif($sale->order_status_id == 2) text-danger @else text-success @endif ">{{ $sale->order_status->name }}</h4>
                            </div>
                            <a href="{{ route('ft-products.single', $sale->product->slug) }}" class="stretched-link"></a>
                        </div>
                    </div>
                    @endif
                @empty
                    <p>У вас нет заказов</p>
                @endforelse
                </div>
            </div>
            </div>
        </div>
    <!--tabs end-->
    </div>
  </section>
@endsection