@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Мои заказы
@endsection
@extends('layouts.footer')

@section('content')
  <section>
    <div class="container mt-3 mb-5 px-md-0">
       <!--tabs-->
        <div class="order-tab bg-white rounded px-0 p-md-3">
            <div class="pb-5 pb-lg-0">
                <ul class="nav nav-pills justify-content-between" id="myTab" role="tablist">
                    @if($sales)
                        {{-- @if(count($sales->where('order_status_id', 1)) > 0) --}}
                            <li class="nav-item {{ $is_store ? 'w-50' : 'w-100' }} text-center pr-1" role="presentation">
                                <a class="nav-link orders px-1 py-0" id="buy-tab" data-toggle="tab" href="#buy" role="tab" aria-controls="buy" aria-selected="false">Покупка</a>
                            </li>
                            @if ($is_store)
                                <li class="nav-item w-50 text-center pl-1" role="presentation">
                                    <a class="nav-link orders active px-1 py-0" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="sell" aria-selected="true">Продажа</a>
                                </li>
                            @endif
                        {{-- @endif --}}
                    @else
                        <li class="nav-item {{ $is_store ? 'w-50' : 'w-100' }} text-center pr-1" role="presentation">
                            <a class="nav-link orders active px-1 py-0" id="buy-tab" data-toggle="tab" href="#buy" role="tab" aria-controls="buy" aria-selected="true">Покупка</a>
                        </li>
                        @if ($is_store)
                            <li class="nav-item w-50 text-center pl-1" role="presentation">
                                <a class="nav-link orders px-1 py-0" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="sell" aria-selected="false">Продажа</a>
                            </li>
                        @endif
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent">
                    <!--buy tabs-->
                    <div class="tab-pane fade @if($sales) @if(count($sales->where('order_status_id', 1)) == 0)show active @endif @else()show active @endif" id="buy" role="tabpanel" aria-labelledby="buy-tab">

                        <!--success order-->
                        @forelse ($orders as $order)
                        <div class="text-right d-block d-lg-none mt-3">
                            <h6 class="pr-2 @if ($order->order_status_id == 3)text-success @elseif($order->order_status_id == 1)text-warning @elseif($order->order_status_id == 4)text-skyblue @elseif($order->order_status_id == 5)text-secondary @else()text-danger @endif ">{{ $order->order_status->name }}</h6>
                        </div>
                        <div class="border borderRounded my-3 @if ($order->order_status_id == 3)border-success @elseif($order->order_status_id == 1)border-warning @elseif($order->order_status_id == 4)border-primary @elseif($order->order_status_id == 5)border-secondary @else()border-danger @endif">

                            <div class="row mx-0 my-2 align-items-start position-relative">
                                <div class="col-12 col-lg-6 px-2 px-sm-3 border-left border_left @if ($order->order_status_id == 3)border-success @elseif($order->order_status_id == 1)border-warning @elseif($order->order_status_id == 4)border-primary @elseif($order->order_status_id == 5)border-secondary @else()border-danger @endif">
                                    <div class="d-flex w-100 justify-content-start justify-lg-content-center status align-items-center">
                                    <img class="mr-3 rounded" src="{{ Storage::url($order->no_scope_product->image) }}"  width="90" height="90">
                                    <div class="d-flex flex-column align-self-center w-100">

                                        <h5 class="h5 text-truncate order-title">{{ $order->no_scope_product->name }}</h5>
                                        <div>
                                            <div class="d-lg-none d-flex flex-column mb-2">
                                                <small class="text-secondary w-100 mr-2">
                                                    <img width="12px" src="/storage/calendar.svg" class="mr-1" style="vertical-align: text-top;">

                                                    {{ $order->created_at->format('d.m.Y') }}
                                                </small>
                                                <small class="text-secondary w-100 mr-2">
                                                    <img width="12px"  src="/storage/wall-clock.svg"  class="mr-1" style="vertical-align: text-top;">

                                                    {{ $order->created_at->format('G:i:s') }}
                                                </small>
                                                <!-- <small class="text-secondary w-100 mr-2">
                                                    <img width="12px" src="/storage/theme/icons/shopping-bag.svg" class="mr-1" style="vertical-align: text-top;">
                                                    {{ $order->quantity }}</small> -->
                                            </div>
                                            <!-- @if (count($order->attribute_values)>0)
                                            <svg xmlns="http://www.w3.org/2000/svg" height="12px" width="12px" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 476.241 476.241" style="enable-background:new 0 0 476.241 476.241;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M467.759,8.483c-19.264-19.264-62.824-4.752-101.336,33.752c-8.212,8.177-15.672,17.077-22.288,26.592l-87.848,6.76    c-1.903,0.147-3.691,0.97-5.04,2.32L2.342,326.819c-3.123,3.124-3.123,8.188,0,11.312l135.76,135.768    c3.124,3.123,8.188,3.123,11.312,0l248.912-248.904c1.35-1.349,2.173-3.137,2.32-5.04l6.768-88.2    c0.393-0.13,0.773-0.296,1.136-0.496c9.089-6.391,17.601-13.565,25.44-21.44C472.511,71.307,487.023,27.739,467.759,8.483z     M343.983,132.251c-1.87-2.048-3.051-4.63-3.376-7.384c2.564,0.725,4.904,2.087,6.8,3.96c6.249,6.247,6.251,16.378,0.003,22.627    s-16.378,6.251-22.627,0.003s-6.251-16.378-0.003-22.627c0.001-0.001,0.002-0.002,0.003-0.003c0.08-0.08,0.168-0.128,0.248-0.2    c0.994,5.631,3.655,10.835,7.64,14.936c3.178,3.07,8.242,2.982,11.312-0.196C346.977,140.266,346.977,135.351,343.983,132.251z     M384.919,215.779l-241.16,241.152L19.311,332.475L260.462,91.331l73.544-5.664c-4.023,7.706-6.945,15.938-8.68,24.456    c-4.453,1.554-8.504,4.082-11.856,7.4c-12.499,12.495-12.502,32.756-0.007,45.255s32.756,12.502,45.255,0.007    c12.499-12.495,12.502-32.756,0.007-45.255c-0.002-0.002-0.005-0.005-0.007-0.007c-4.496-4.529-10.253-7.596-16.52-8.8    c2.618-8.653,6.385-16.916,11.2-24.568l41.92-3.2L384.919,215.779z M422.695,98.499c-4.349,4.303-8.914,8.38-13.68,12.216    l2.912-37.84c0.34-4.405-2.955-8.252-7.361-8.592c-0.41-0.032-0.822-0.032-1.231,0l-37.912,2.92    c3.868-4.759,7.978-9.317,12.312-13.656c32.184-32.184,68.088-44.36,78.712-33.752C467.071,30.403,454.871,66.315,422.695,98.499z    "/>
                                                    </g>
                                                </g>
                                                </svg>
                                            @endif
                                            @foreach ($order->attribute_values as $attribute_value)
                                            <small class="text-secondary w-100">
                                                {{ $attribute_value->attribute->name ?? '' }} - {{ $attribute_value->name ?? '' }}@if(!$loop->last), @endif</small>
                                            @endforeach -->
                                            <h6 class="h6 text-secondary d-block d-lg-none">
                                                <span class="text-uppercase">Цена</span>: <span class=" @if ($order->order_status_id == 1) text-warning @elseif($order->order_status_id == 2) text-danger @elseif($order->order_status_id == 4)text-skyblue @elseif($order->order_status_id == 5)text-secondary @else text-success @endif "> {{ $order->total+$order->margin }} Сомони</span>
                                            </h6>
                                        </div>

                                    </div>
                                    </div>
                                </div>
                                <div class="col-2 d-none d-lg-block">
                                    <h6 class="h6">Дата заказа</h6>
                                    <h5 class="font-weight-bold d-flex align-items-center flex-wrap">
                                        <img class="mr-1" width="18px"  src="/storage/calendar.svg">
                                        {{ $order->created_at->format('d.m.Y') }}</h5>
                                    <h5 class="font-weight-bold d-flex align-items-center flex-wrap">
                                        <img class="mr-1" width="18px"  src="/storage/wall-clock.svg">
                                        {{  $order->created_at->format('G:i:s') }}
                                    </h5>
                                </div>
                                <div class="col-2 d-none d-lg-block">
                                    <h6 class="h6">Цена</h6>
                                    <h5 class="font-weight-bold @if ($order->order_status_id == 1) text-warning @elseif($order->order_status_id == 2) text-danger @elseif($order->order_status_id == 4) text-skyblue @elseif($order->order_status_id == 5)text-secondary @else text-success @endif ">{{ $order->total+$order->margin }} Сомони</h5>
                                </div>
                                <div class="col-2 d-none d-lg-block">
                                    <h6 class="h6">Статус</h6>
                                    <h5 class="font-weight-bold @if ($order->order_status_id == 1) text-warning @elseif($order->order_status_id == 2) text-danger @elseif($order->order_status_id == 4) text-skyblue @elseif($order->order_status_id == 5)text-secondary @else text-success @endif ">{{ $order->order_status->name }}</h5>
                                </div>
                                <a href="{{ route('ft-order.single', $order->id) }}" class="stretched-link"></a>
                            </div>
                        </div>

                        @empty
                        <div class="row mx-0 border-top border-bottom my-2 py-3 align-items-center position-relative">
                            <p class="m-0">У вас нет покупок</p>
                        </div>
                        @endforelse

                    </div>
                    @if ($is_store)
                        <div class="tab-pane fade @if($sales) @if(count($sales->where('order_status_id', 1)) > 0)show active @endif @endif" id="sell" role="tabpanel" aria-labelledby="sell-tab">
                            @forelse ($sales as $sale)
                            <div class="text-right d-block d-lg-none mt-3">
                                <h6 class="pr-2 @if ($sale->order_status_id == 3)text-success @elseif($sale->order_status_id == 4)text-skyblue @elseif($sale->order_status_id == 5)text-secondary @elseif($sale->order_status_id == 1)text-warning @elseif($sale->order_status_id == 4) text-skyblue @else()text-danger @endif ">{{ $sale->order_status->name }}</h6>
                            </div>
                                <div class="border borderRounded my-3 @if ($sale->order_status_id == 3)border-success @elseif($sale->order_status_id == 4)border-primary @elseif($sale->order_status_id == 5)border-secondary @elseif($sale->order_status_id == 1)border-warning @else()border-danger @endif">

                                    <div class="row mx-0 my-2 align-items-start position-relative">
                                        <div class="col-12 col-lg-6 px-2 px-sm-3 border-left border_left  @if ($sale->order_status_id == 3)border-success @elseif($sale->order_status_id == 4)border-primary @elseif($sale->order_status_id == 5)border-secondary @elseif($sale->order_status_id == 1)border-warning @else()border-danger @endif">
                                            <div class="d-flex w-100 justify-content-start justify-lg-content-center status align-items-center">
                                            <img class="mr-3 rounded" src="{{ Storage::url($sale->no_scope_product->image) }}" width="90" height="90">
                                                <div class="d-flex flex-column align-self-center w-100">
                                                    <h5 class="h5 text-truncate order-title">{{ $sale->no_scope_product->name}}</h5>
                                                    <div>
                                                        <div class="d-lg-none d-flex flex-column mb-2">
                                                            <small class="text-secondary w-100">
                                                                <img width="12px" src="/storage/calendar.svg" class="mr-1" style="vertical-align: text-top;">
                                                                {{ $sale->created_at->format('d.m.Y') }}
                                                            </small>
                                                            <small class="text-secondary w-100">
                                                                <img width="12px"  src="/storage/wall-clock.svg"  class="mr-1" style="vertical-align: text-top;">
                                                                {{ $sale->created_at->format('G:i:s') }}
                                                            </small>
                                                                <!-- <small class="text-secondary w-100">
                                                                    <img width="12px" src="/storage/theme/icons/shopping-bag.svg" class="mr-1" style="vertical-align: text-top;">
                                                                    {{ $sale->quantity }}
                                                                </small> -->
                                                        </div>
                                                        <!-- @if (count($sale->attribute_values)>0)
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="12px" width="12px" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 476.241 476.241" style="enable-background:new 0 0 476.241 476.241;" xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path d="M467.759,8.483c-19.264-19.264-62.824-4.752-101.336,33.752c-8.212,8.177-15.672,17.077-22.288,26.592l-87.848,6.76    c-1.903,0.147-3.691,0.97-5.04,2.32L2.342,326.819c-3.123,3.124-3.123,8.188,0,11.312l135.76,135.768    c3.124,3.123,8.188,3.123,11.312,0l248.912-248.904c1.35-1.349,2.173-3.137,2.32-5.04l6.768-88.2    c0.393-0.13,0.773-0.296,1.136-0.496c9.089-6.391,17.601-13.565,25.44-21.44C472.511,71.307,487.023,27.739,467.759,8.483z     M343.983,132.251c-1.87-2.048-3.051-4.63-3.376-7.384c2.564,0.725,4.904,2.087,6.8,3.96c6.249,6.247,6.251,16.378,0.003,22.627    s-16.378,6.251-22.627,0.003s-6.251-16.378-0.003-22.627c0.001-0.001,0.002-0.002,0.003-0.003c0.08-0.08,0.168-0.128,0.248-0.2    c0.994,5.631,3.655,10.835,7.64,14.936c3.178,3.07,8.242,2.982,11.312-0.196C346.977,140.266,346.977,135.351,343.983,132.251z     M384.919,215.779l-241.16,241.152L19.311,332.475L260.462,91.331l73.544-5.664c-4.023,7.706-6.945,15.938-8.68,24.456    c-4.453,1.554-8.504,4.082-11.856,7.4c-12.499,12.495-12.502,32.756-0.007,45.255s32.756,12.502,45.255,0.007    c12.499-12.495,12.502-32.756,0.007-45.255c-0.002-0.002-0.005-0.005-0.007-0.007c-4.496-4.529-10.253-7.596-16.52-8.8    c2.618-8.653,6.385-16.916,11.2-24.568l41.92-3.2L384.919,215.779z M422.695,98.499c-4.349,4.303-8.914,8.38-13.68,12.216    l2.912-37.84c0.34-4.405-2.955-8.252-7.361-8.592c-0.41-0.032-0.822-0.032-1.231,0l-37.912,2.92    c3.868-4.759,7.978-9.317,12.312-13.656c32.184-32.184,68.088-44.36,78.712-33.752C467.071,30.403,454.871,66.315,422.695,98.499z    "/>
                                                                </g>
                                                            </g>
                                                            </svg>
                                                        @endif
                                                        @foreach ($sale->attribute_values as $attribute_value)
                                                        <small class="text-secondary w-100">
                                                            {{ $attribute_value->attribute->name ?? '' }} - {{ $attribute_value->name ?? '' }} @if(!$loop->last), @endif</small>
                                                            @endforeach -->
                                                        <h6 class="h6 text-secondary d-block d-lg-none">
                                                            <span class="text-uppercase">Цена</span>: <span class=" @if ($sale->order_status_id == 1) text-warning @elseif($sale->order_status_id == 2) text-danger @elseif($sale->order_status_id == 4) text-skyblue @elseif($sale->order_status_id == 5)text-secondary @else text-success @endif "> {{ $sale->total }} Сомони</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 d-none d-lg-block">
                                            <h6 class="h6">Дата заказа</h6>
                                            <h5 class="font-weight-bold d-flex align-items-center flex-wrap">
                                                <img class="mr-1" width="18px"  src="../storage/calendar.svg">
                                                {{ $sale->created_at->format('d.m.Y') }}
                                            </h5>
                                            <h5 class="font-weight-bold d-flex align-items-center flex-wrap">
                                                <img class="mr-1" width="18px"  src="../storage/wall-clock.svg">
                                                {{  $sale->created_at->format('G:i:s') }}
                                            </h5>
                                        </div>
                                        <div class="col-2 d-none d-lg-block">
                                            <h6 class="h6">Цена</h6>
                                            <h5 class="font-weight-bold @if ($sale->order_status_id == 1) text-warning @elseif($sale->order_status_id == 2) text-danger @elseif($sale->order_status_id == 4) text-skyblue @elseif($sale->order_status_id == 5)text-secondary @else text-success @endif ">{{ $sale->total }} Сомони</h5>
                                        </div>
                                        <div class="col-2 d-none d-lg-block">
                                            <h6 class="h6">Статус</h6>
                                            <h5 class="h5 font-weight-bold @if ($sale->order_status_id == 1) text-warning @elseif($sale->order_status_id == 2) text-danger @elseif($sale->order_status_id == 4) text-skyblue @elseif($sale->order_status_id == 5)text-secondary @else text-success @endif ">{{ $sale->order_status->name }}</h5>
                                        </div>
                                        <a href="{{ route('ft-order.single', $sale->id) }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            @empty
                                <div class="row mx-0 border-top border-bottom my-2 py-3 align-items-center position-relative">
                                    <p class="m-0">У вас нет продаж</p>
                                </div>
                            @endforelse
                        </div>
                    @endif
                </div>
            </div>
        </div>
    <!--tabs end-->
    </div>
  </section>
@endsection
