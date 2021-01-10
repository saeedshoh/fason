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
                            Добавление значении для атрибута
                        </h6>
        
                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            {{ $parent->name }}
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
                        <form action="{{ route('attr_val.update', ['id' => $parent->id, 'val_id' => $attribute->id]) }}" method="POST" class="needs-validation mb-4" enctype="multipart/form-data" accept-charset="utf-8">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="name">Введите название</label>
                                        <input type="text" class="form-control" id="name" placeholder="Введите название" name="name" value="{{ old('name') ?? $attribute->name }}" required="">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="value">Введите значение</label>
                                    @if( $parent->name == 'Цвет')
                                        <input type="color" class="form-control" id="value" placeholder="Введите значение" name="value" value="{{ old('value') ?? $attribute->value}}" required="">
                                    @else
                                        <input type="text" class="form-control" id="value" placeholder="Введите значение" name="value" value="{{ old('value') ?? $attribute->value }}" required="">
                                    @endif

                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                    <input type="hidden" name="attribute_id" value="{{ $parent->id }}">
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-2" type="submit">Изменить</button>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection