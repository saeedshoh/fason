@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <!-- Header -->
            <div class="header">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Информация о товаре
                        </h1>

                        </div>
                        <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{ route('products.index')}}" class="btn btn-primary ml-2">
                            Все товары
                        </a>

                        </div>
                    </div>
                </div>
            </div>
            @if($errors->any())
                <ul class="list-group ">
                    @foreach($errors->all() as $error)
                        <li class=" list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="container-fluid">
                <div class="row justify-content-center">
                  <div class="col-12 col-lg-12 col-xl-12">
                    <!-- Content -->
                    <div class="card card-body p-5">
                        <div class="row">
                            <div class="col text-center">

                            <!-- Logo -->
                            <img src="{{ Storage::url($product->image) }}" alt="..." class="img-fluid mb-4" style="max-width: 15rem;">

                            <!-- Title -->
                            <h2 class="mb-2">
                                {{ $product->name }}
                            </h2>

                            </div>
                        </div> <!-- / .row -->
                    <div class="row">
                        <div class="col-12 col-md-6">

                        <!-- Heading -->
                        <h6 class="text-uppercase text-muted">
                            Информация о товаре
                        </h6>

                        <!-- Text -->
                        <p class="text-muted mb-4">
                            Название: <strong class="text-body">{{ $product->name }}</strong> <br>
                            Описание: <strong class="text-body">{{ $product->description }}</strong> <br>
                            Категория: <strong class="text-body">{{ $product->category->name }}</strong> <br>
                            Количество: <strong class="text-body">{{ $product->quantity }}</strong> <br>
                            Цена: <strong class="text-body">{{ $product->price_after_margin }} TJS</strong> <br>

                        </p>
                        </div>
                        <div class="col-12 col-md-6 text-md-right">
                            Магазин: <a href="{{ route('showStoreInfo', $product->store->id) }}">{{ $product->store->name }}</a><br>
                            Город: <strong class="text-body">{{ $product->store->city->name }}</strong> <br>
                            Статус: <strong class="text-body">{{ $product->product_status->name }}</strong> <br>

                          </div>
                    </div> <!-- / .row -->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
