@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
      <!-- Form -->
    <form action="{{ route('banners.store') }}" method="POST" class="mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate id="create_category">

    <div class="row justify-content-center">
        <div class="col-12">
  
            <!-- Header -->
            <div class="header">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">
        
                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Добавление баннера и слайдера
                        </h6>
        
                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Добавление
                        </h1>
        
                        </div>
                        <div class="col-auto">
        
                        <!-- Buttons -->

                        <a href="{{ route('banners.index')}}" class="btn btn-primary ml-2">
                            Все баннера
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
            
               
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="type">Тип</label>
                                    <select class="custom-select @error('type') is-invalid @enderror" name="type" id="type">
                                        <option value="1">Слайдер</option>
                                        <option value="2">Баннер</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small class="text-muted">
                                        * По умолчанию активен
                                    </small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="position">Позиция</label>
                                    <input value="{{old('icon')}}" type="number" name="position" id="position" class="form-control @error('position') is-invalid @enderror"  required>

                                    @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small class="text-muted">Внимание введите позицию: например - 1, 2, 3</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                      
                            @csrf
                            @method('POST')
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="image" >Изображения</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image" >Выберите файл</label>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                      </div>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="url">Ссылка на баннер</label>
                                    <input value="{{old('icon')}}" type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror"  required>

                                    @error('url')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-4" type="submit">Добавить</button>

                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection