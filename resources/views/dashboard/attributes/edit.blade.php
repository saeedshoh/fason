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
                            Изменение аттрибутов
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Изменение
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
                        @if(isset($attribute))
                        <!-- Form -->
                        <form action="{{ route('attributes.update', $attribute) }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidates>
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Введите название категори" name="name" value="{{ old('name') ?? $attribute->name }}" autocomplete="off" required="">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-2" type="submit">Измененить</button>
                            <input type="hidden" name="previous" value="{{ url()->previous() }}">
                        </form>
                        @else
                        <!-- Form -->
                        <form action="{{ route('attribute-values.update', $attributeValue) }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidates>
                            @csrf
                            @method('PUT')
                                <div class="form-row">
                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="attribute_id">Атрибут</label>
                                        <select class="form-control pl-2 @error('attribute_id') is-invalid @enderror" name="attribute_id" id="attribute_id">
                                            <option disabled selected value>Выберите атрибут</option>
                                            @foreach ($attributes as $attribute)
                                            <option value="{{ $attribute->id }}" @if($attributeValue->attribute_id==$attribute->id)selected @endif>{{ $attribute->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="att_name">Название значения атрибута</label>
                                        <input type="text" class="form-control" id="att_name" placeholder="Введите название значения атрибута" name="name" value="{{ old('name') ? old('name') : $attributeValue->name }}" autocomplete="off" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="att_value">Добавленная стоимость значения атрибута</label>
                                        <input type="text" class="form-control" id="att_value" placeholder="Введите доб. стоимость значения атрибута" name="value" value="{{ old('value') ? old('value') : $attributeValue->value }}" autocomplete="off" required="">
                                    </div>
                                </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-2" type="submit">Изменить</button>
                            <input type="hidden" name="previous" value="{{ url()->previous() }}">
                        </form>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
