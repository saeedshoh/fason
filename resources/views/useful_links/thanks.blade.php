@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Товар добавлен
@endsection
@extends('layouts.footer')
@section('content')
<div class="container bg-white px-0">
    <div class="mt-lg-5 py-lg-5 py-3 text-center">
      <img class="my-5" src="/storage/theme/thanks.svg" width="250px" alt="">
      <div class="mb-3 pb-lg-0">
        <h5>
          {{ $title }}
        </h5>
        @if(isset($description))
        <p>
          {{ $description }}
        </p>
        @endif
        <a class="rounded-11 btn btn-outline-danger mt-4" href="{{ route('home') }}">На главную</a>
      </div>
    </div>
  </div>
@endsection


