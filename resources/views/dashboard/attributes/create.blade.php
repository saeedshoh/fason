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
        
                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Добавление аттрибутов 
                        </h6>
        
                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Добавление
                        </h1>
        
                        </div>
                        <div class="col-auto">
        
                        <!-- Buttons -->
                        <a href="{{ route('attributes.index')}}" class="btn btn-primary ml-2">
                            Все аттрибуты
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
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('attributes.store') }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate>
                            @csrf
                            @method('POST')
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Название</label>

                                    <input type="text" class="form-control" id="name" placeholder="Введите название категори" name="name" value="{{ old('name') }}" required="">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-2" type="submit">Добавить</button>

                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('attribute-values.store') }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Атрибут</label>
                                    <select class="form-control pl-2 @error('attribute_id') is-invalid @enderror" name="attribute_id" id="attribute_id">
                                        <option disabled selected value>Выберите атрибут</option>
                                        @foreach ($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="name">Название значения атрибута</label>
                                <div class="col-12 col-md-12 mb-3">
                                    <input type="text" class="form-control" id="att_name" placeholder="Введите название значения атрибута" name="name" value="{{ old('name') }}" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="name">Добавленная стоимость значения атрибута</label>
                                <div class="col-12 col-md-12 mb-3">
                                    <input type="text" class="form-control" id="att_value" placeholder="Введите доб. стоимость значения атрибута" name="value" value="{{ old('value') }}" required="">
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-2" type="submit">Добавить</button>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection