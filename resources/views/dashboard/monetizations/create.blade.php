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
                            Добавление монетизаций
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Добавление
                        </h1>

                        </div>
                        <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{ route('monetizations.index')}}" class="btn btn-primary ml-2">
                            Все монетизации
                        </a>

                        </div>
                    </div>
                </div>
            </div>
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
            @endif
            <div class="row">

                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('monetizations.store') }}" method="POST" class="mb-5" novalidate>
                            @csrf
                            @method('POST')
                            <div class="form-col">
                                @if(Str::contains($previous, 'personalisations'))
                                <div class="row mb-5">
                                    <div class="col">
                                        <label for="store_id">Магазин</label>
                                        <select class="chosen-select-store custom-select @error('store_id') is-invalid @enderror" name="store_id">
                                            <option disabled selected>Выберите магазин</option>
                                            @foreach($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('store_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <small class="text-muted">
                                            * Выберите, чтобы добавить в магазин персонализированную монетизацию
                                        </small>
                                    </div>
                                </div>
                                @endif
                                @if(Str::contains($previous, 'categoryMonetizations'))
                                <div class="row mb-5">
                                    <div class="col">
                                        <label for="category_id">Категория</label>
                                        <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id">
                                            <option disabled selected>Выберите категория</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <small class="text-muted">
                                            * Выберите, чтобы добавить в категорию персонализированную монетизацию
                                        </small>
                                    </div>
                                </div>
                                @endif
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <label for="min">Сумма от</label>
                                        <input type="number" class="form-control @error('min') is-invalid @enderror" id="min" placeholder="Введите сумму от" name="min" value="{{ old('min') }}" autocomplete="off" required="">
                                        @error('min')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="max">Сумма до</label>
                                        <input type="number" class="form-control @error('max') is-invalid @enderror" id="max" placeholder="Введите сумму до" name="max" value="{{ old('max') }}" autocomplete="off" required="">
                                        @error('max')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="margin">Процентная ставка</label>
                                        <input type="number" class="form-control @error('margin') is-invalid @enderror" id="margin" placeholder="Введите процентную ставку" name="margin" value="{{ old('margin') }}" autocomplete="off" required="">
                                        @error('margin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="added_val">Добавочная стоимость</label>
                                        <input type="number" class="form-control @error('added_val') is-invalid @enderror" id="added_val" placeholder="Введите добавочную стоимость" name="added_val" value="{{ old('added_val') }}" autocomplete="off" required="">
                                        @error('added_val')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- Button -->
                                        <button class="btn btn-primary float-right" type="submit">Добавить</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="previous" value="{{ $previous }}">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
     .chosen-container-single .chosen-single {
        height: 40px;
        padding: 0.5rem 0.75rem;
        font-size: 0.9375rem;
        color: #12263F
    }

    .chosen-single div {
        padding-top: 7px;
    }
</style>
@endsection
