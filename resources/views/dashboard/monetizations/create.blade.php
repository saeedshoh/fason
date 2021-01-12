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

                <div class="col-lg-6 mx-auto">
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
                                        <select class="custom-select @error('store_id') is-invalid @enderror" name="store_id">
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
                                <div class="row mb-5">
                                    <div class="col">
                                        <label for="min">Сумма от</label>
                                        <input type="number" class="form-control @error('min') is-invalid @enderror" id="min" placeholder="Введите сумму от" name="min" value="{{ old('min') }}" required="">
                                        @error('min')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="max">Сумма до</label>
                                        <input type="number" class="form-control @error('max') is-invalid @enderror" id="max" placeholder="Введите сумму до" name="max" value="{{ old('max') }}" required="">
                                        @error('max')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="margin">Процентная ставка</label>
                                        <input type="number" class="form-control @error('margin') is-invalid @enderror" id="margin" placeholder="Введите процентную ставку" name="margin" value="{{ old('margin') }}" required="">
                                        @error('margin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- Button -->
                                        <button class="btn btn-primary mt-2" type="submit">Добавить</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
