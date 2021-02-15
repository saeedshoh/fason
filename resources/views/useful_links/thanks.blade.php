@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Товар добавлен
@endsection
@extends('layouts.footer')
@section('content')
<div class="container bg-white">
    <div class="my-5 p-4 text-center">
      <img class="my-5" src="/storage/theme/thanks.svg" width="250px" alt="">
      <div class="mb-3 pb-5 pb-lg-0 ">
        <h4>
          {{ $title }}
        </h4>
        @if(isset($description))
        <p>
          {{ $description }}
        </p>
        @endif
        <a class="rounded-11 btn btn-outline-danger  ml-md-2 my-1" href="{{ route('home') }}">На главную</a>
      </div>
    </div>
  </div>
@endsection
