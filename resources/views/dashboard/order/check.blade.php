@extends('dashboard.layouts.app')
@section('title', 'Заказы')
@extends('dashboard.layouts.aside')

@section('content')
    <style>
        @media print {
            .header {
                display: none;
            }
            .card {
                border: 2px solid #252525;
            }
        }
    </style>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">

        <!-- Header -->
        <div class="header mt-md-5">
            <div class="header-body">
              <div class="row align-items-center">
                <div class="col">

                  <!-- Pretitle -->
                  <h6 class="header-pretitle">
                    Чек
                  </h6>

                  <!-- Title -->
                  <h1 class="header-title">
                    Заказ #{{ $order->id }}
                  </h1>

                </div>
                <div class="col-auto">

                  <!-- Buttons -->
                  <a href="#!" class="btn btn-white lift">
                    Скачать
                  </a>
                  <a href="#!" class="btn btn-primary ml-2 lift action-print">
                    Распечатать
                  </a>

                </div>
              </div> <!-- / .row -->
            </div>
          </div>

        <!-- Card -->
        <div class="row">
            <div class="col-lg-6 col-6">
                <div class="card">
                    <div class="card-body">

                      <!-- Title -->
                      <nav class="text-center my-4">
                        <img src="/storage/theme/logo_fason.svg" alt="fason" width="120">
                      </nav>

                      <!-- Price -->
                      <div class="row no-gutters align-items-center justify-content-center mb-5">
                        <div class="col-auto">
                          <div class="h2 mb-0"> {!! QrCode::size(120)->generate(route('ft-products.single', $order->no_scope_product->slug)) !!}</div>
                        </div>
                      </div> <!-- / .row -->
                      <!-- Features -->
                      <div class="mb-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Имя покупателя: </small> <small>{{ $order->user->name }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Магазин: </small> <small>{{ $order->no_scope_product->store->name }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Номер заказа: </small> <small>{{ $order->id }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Название товара: </small> <small>{{ $order->no_scope_product->name }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Цена товара: </small> <small>{{ ($order->total + $order->margin)/$order->quantity }} Сомони</small>
                            </li>
                            @if ($attributes)
                                @foreach ($attributes as $attribute)
                                    <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                        <small>{{ $attribute->attribute->name }}: </small> <small>{{ $attribute->name }}</small>
                                    </li>
                                @endforeach
                            @endif
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Кол-во: </small> <small>{{ $order->quantity }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Телефон: </small> <small>{{ $order->user->phone }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Город: </small> <small>{{ $order->user->city->name ?? '' }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Адрес: </small>
                                <div id="address-input">
                                    <a href="javascript:void();" class="ml-auto mr-1 d-none" id="save-changes" data-id="{{ $order->id }}">
                                        <span class="fe fe-check text-success my-auto"></span>
                                    </a>
                                    <small>
                                        <input type="text" name="address" id="address" class="border-0 bg-transparent text-right" value="{{ $order->address }}" autocomplete="off">
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Примечание к заказу: </small> <small>{{ $order->comment }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <strong>Итог c учётом НДС: </strong> <strong>{{ $order->total + $order->margin }} Сомони</strong>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <div class="col-6">
                                    <nav class="text-left my-4 p-ml-5">
                                        <img src="/storage/theme/logo_fason.svg" alt="fason" width="120">
                                    </nav>
                                </div>
                                <div class="col-6 text-right">
                                    <p class="font-weight-bold h3">Спасибо за покупку !</p>
                                    <small>Дата / время: <strong>{{ $order->created_at }}</strong></small>
                                </div>
                            </li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6  col-6">
                <div class="card">
                    <div class="card-body">
                      <!-- Title -->
                      <nav class="text-center my-4">
                        <img src="/storage/theme/logo_fason.svg" alt="fason" width="120">
                      </nav>

                      <!-- Price -->
                      <div class="row no-gutters align-items-center justify-content-center mb-5">
                        <div class="col-auto">
                          <div class="h2 mb-0"> {!! QrCode::size(120)->generate(route('ft-products.single', $order->no_scope_product->slug)) !!}</div>
                        </div>
                      </div> <!-- / .row -->
                      <!-- Features -->
                      <div class="mb-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Имя Продавца:</small> <small>{{ $order->no_scope_product->store->user->name }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Магазин: </small> <small>{{ $order->no_scope_product->store->name }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Номер заказа: </small> <small>{{ $order->id }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Название товара: </small> <small>{{ $order->no_scope_product->name }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Цена товара: </small> <small>{{ $order->total }} Сомони</small>
                            </li>
                            @if ($attributes)
                                @foreach ($attributes as $attribute)
                                    <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                        <small>{{ $attribute->attribute->name }}: </small> <small>{{ $attribute->name }}</small>
                                    </li>
                                @endforeach
                            @endif
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Кол-во: </small> <small>{{ $order->quantity }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Телефон Продавца: </small> <small>{{ $order->no_scope_product->store->user->phone }}</small>
                            </li>

                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Город Продавца: </small> <small>{{ $order->no_scope_product->store->city->name ?? '' }}</small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Адрес продавца: </small>
                                <small>
                                    {{-- {{ $order->no_scope_product->store->address }} --}}
                                    <div id="store-address-input">
                                        <a href="javascript:void();" class="ml-auto mr-1 d-none" id="store-save-changes" data-id="{{ $order->no_scope_product->store->id }}">
                                            <span class="fe fe-check text-success my-auto"></span>
                                        </a>
                                        <small>
                                            <input type="text" name="store-address" id="store-address" class="border-0 bg-transparent text-right" value="{{ $order->no_scope_product->store->address }}">
                                        </small>
                                    </div>
                                </small>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <strong>Итог: </strong> <strong>{{ $order->total * $order->quantity }} Сомони</strong>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <div class="col-6">
                                    <nav class="text-left my-4 p-ml-5">
                                        <img src="/storage/theme/logo_fason.svg" alt="fason" width="120">
                                    </nav>
                                </div>
                                <div class="col-6 text-right">

                                    <small>Оператор: <strong>{{ Auth::user()->name }}</strong></small><br>
                                    <small>Дата / время: <strong>{{ $order->created_at }}</strong></small><br>
                                    <hr class="mt-5 d-block">
                                </div>
                            </li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5 float-right">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <form class="d-inline" action="{{ route('acceptOrder', $order) }}" method="POST">
                            @csrf
                            <input type="hidden" name="previous" value="{{ url()->previous() }}">
                            <button class="btn btn-primary mx-2"><i class="fe fe-check"> </i> В пути</button>
                        </form>
                        <form class="d-inline" action="{{ route('completeOrder', $order) }}" method="POST">
                            @csrf
                            <input type="hidden" name="previous" value="{{ url()->previous() }}">
                            <button class="btn btn-success mx-2"><i class="fe fe-check"> </i> Выполнено</button>
                        </form>
                        <form class="d-inline" action="{{ route('declineOrder', $order) }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="previous" value="{{ url()->previous() }}">
                            <button class="btn btn-danger mx-2"><i class="fe fe-x-circle"> </i> Отклонить</button>
                        </form>
                        <form class="d-inline" action="{{ route('returnsOrder', $order) }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="previous" value="{{ url()->previous() }}">
                            <button class="btn btn-secondary mx-2"><i class="fe fe-info"> </i> Возврат</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
@endsection
