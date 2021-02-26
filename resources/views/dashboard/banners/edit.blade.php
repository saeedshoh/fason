@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
      <!-- Form -->
    <form action="{{ route('banners.update', $banner) }}" method="POST" class="mb-4" enctype="multipart/form-data" accept-charset="utf-8" novalidate>

        @csrf
        @method('PATCH')
    <div class="row justify-content-center">
        <div class="col-12">

            <!-- Header -->
            <div class="header">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Изменение {{ $banner->type == 1 ? 'слайдера' : 'баннера'}}
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title text-truncate">
                            Изменение
                        </h1>

                        </div>
                        <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{ route('categories.index')}}" class="btn btn-primary ml-2">
                            Все {{ $banner->type == 1 ? 'слайдера' : 'баннера'}}
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
                                        <option value="1" {{ old('type') ??  $banner->type == 1 ? 'selected' : ''}}>Слайдер</option>
                                        <option value="2" {{ old('type') ??  $banner->type == 2 ? 'selected' : ''}}>Баннер</option>
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
                                    <select class="form-control" name="position" id="position">
                                        @if(Str::contains($back, 'banners'))1, 2
                                            @for ($i = 1; $i < 3; $i++)
                                                <option @if($i== $banner->position) selected @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        @else
                                            @for ($i = 1; $i < 11; $i++)
                                                <option @if($i== $banner->position) selected @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        @endif
                                    </select>
                                    @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-auto text-center">
                                            <img src="{{ Storage::url($banner->image) }}" alt="..." class="img-fluid rounded" id="main-poster" style="max-width: 120px;">
                                        </div>
                                        <div class="col-auto">
                                            <label for="image">Изображения</label> <span id="bannerSize" class="badge badge-warning"> @if(Str::contains($back, 'sliders')) 653x379 @else @if($banner->position == 1) 1600x80 @else 1140x136 @endif @endif</span>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">Выберите файл</label>
                                                <input type="file" name="image" id="image" class="custom-file-input " lang="ru" value="{{ $banner->image }}">
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
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
                            </div>
                            <!-- Button -->
                            <button class="btn btn-primary mt-4 px-5" type="submit">Изменить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
@section('script')
<script>
    $('#position').change(function(){
        const position = $(this).val()
        const type = $('#type').val()
        console.log(position)
        if(type == 2){
            if(position == 1)
                $('#bannerSize').text('1600x80')
            else
            $('#bannerSize').text('1140x136')
        }
    })
</script>
@endsection
