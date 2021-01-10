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

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('monetizations.update', $monetization) }}" method="POST" class="mb-4" novalidate>
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="col mb-3 mr-3">
                                    <label for="min">Сумма от</label>
                                    <input type="number" class="form-control @error('min') is-invalid @enderror" id="min" placeholder="Введите название категори" name="min" value="{{ old('min') ? old('min') : $monetization->min }}" required="">
                                    @error('min')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col mb-3 mr-3">
                                    <label for="max">Сумма до</label>
                                    <input type="number" class="form-control @error('max') is-invalid @enderror" id="max" placeholder="Введите название категори" name="max" value="{{ old('max') ? old('max') : $monetization->max }}" required="">
                                    @error('max')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col mb-3">
                                    <label for="margin">Процентная ставка</label>
                                    <input type="number" class="form-control @error('margin') is-invalid @enderror" id="margin" placeholder="Введите название категори" name="margin" value="{{ old('margin') ? old('margin') : $monetization->margin }}" required="">
                                    @error('margin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-4" type="submit">Изменить</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
