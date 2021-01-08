@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
{{-- @extends('errors::minimal') --}}

@section('title', __('Not Found'))
{{-- @section('code', '404') --}}
{{-- @section('message', __('Not Found')) --}}
@section('content')
    <div class="p-3 h-100 d-flex flex-column text-center" >
      <div class="container mt-5 mb-2">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h1 class="cover-heading mb-5">Упс!&nbsp;</h1>
            <p class="lead mb-5">Страница не найдена пожалуйста вернитесь на главную или&nbsp;<br>проверьте правильность вашей ссылки</p>
            <a href="{{ route('home') }}" class="btn btn-lg btn-danger rounded-11 mb-5"><b class="">Назад в главную</b></a>
          </div>
        </div>
      </div>
    </div>
@endsection
