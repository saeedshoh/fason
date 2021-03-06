@extends('dashboard.layouts.app')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
    <!-- Form -->
    <form action="{{ route('banners.store') }}" method="POST" class="mb-4" enctype="multipart/form-data" accept-charset="utf-8" id="create_category">

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
                                    <div class="col-12 col-md-12 mb-4">
                                        <label for="type">Тип</label>
                                        <select class="custom-select @error('type') is-invalid @enderror" name="type" id="type">
                                            @if(Str::contains($back, 'sliders'))
                                            <option value="1">Слайдер</option>
                                            @else
                                            <option value="2">Баннер</option>
                                            @endif
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
                                    <div class="col-12 col-md-12 mb-4">
                                        <label for="position">Позиция</label>
                                        <select class="form-control" name="position" id="position">
                                            @if(Str::contains($back, 'banners'))
                                            @for ($i = 1; $i < 3; $i++) <option value="{{ $i }}" {{ in_array($i, $banners_position) ? 'disabled' : '' }}>{{ $i }} {{ in_array($i, $banners_position) ? " - занят" : '' }}</option>
                                                @endfor
                                                @else
                                                @for ($i = 1; $i < 11; $i++) <option value="{{ $i }}" {{ in_array($i, $sliders_position) ? 'disabled' : '' }}>{{ $i }} {{ in_array($i, $sliders_position) ? '- занят' : '' }}</option>
                                                    @endfor
                                                    @endif
                                        </select>
                                        @error('position')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 mb-4">
                                        <label for="url">Ссылка на баннер</label>
                                        <input value="{{old('icon')}}" type="text" autocomplete="off" name="url" id="url" class="form-control @error('url') is-invalid @enderror">

                                        @error('url')
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


                                @csrf
                                @method('POST')
                                <div class="form-row">
                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="image">Изображения</label> <span id="bannerSize" class=" badge badge-warning"> @if(Str::contains($back, 'sliders')) 653x379 @else 1600x80 @endif</span>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input my" id="image">
                                            <input type="hidden" name="image" class="image-value">
                                            <label class="custom-file-label your" for="image">Выберите файл</label>
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 mb-3">
                                        <label for="image">
                                            <img src="/storage/theme/icons/add_product_plus.svg" class="img-fluid rounded" id="main-poster" style="max-height: 140px;" style="object-fit: cover">
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-4" type="submit" onclick="start_preloader()">Добавить</button>
                                <input type="hidden" name="previous" value="{{ url()->previous() }}">

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
function start_preloader(){
        $('.success-preloader').removeClass('d-none');
    }
</script>
<script>
    $('#position').change(function(){
        const position = $(this).val()
        const type = $('#type').val()
        if(type == 2){
            if(position == 1)
                $('#bannerSize').text('1600x80')
            else
            $('#bannerSize').text('1140x136')
        }
    })
}
</script>
<style>
    body {
        position: relative;
    }
</style>
@endsection
<div class="success-preloader d-none">
    <img src="/storage/Spinner-1s-200px.svg" alt="" srcset="">
</div>
