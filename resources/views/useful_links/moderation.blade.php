@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Магазин в модерации
@endsection
@extends('layouts.footer')
@section('content')
<div class="container bg-white px-0">
    <div class="mt-lg-5 py-lg-5 py-3 text-center">
      <img class="my-5" src="/storage/theme/thanks.svg" width="180px" alt="">
      <div class="mb-5 pb-5 pb-lg-0">
        <h5 class="px-3 px-lg-0">
          {{ $title }}
        </h5>
        @if(isset($description))
        <p>
          {{ $description }}
        </p>
        @endif
        <a class="rounded-11 btn btn-outline-danger mt-4" href="{{ $is_back ? route('stores.index') : route('ft-store.show', $route) }}">Вернуться в магазин</a>
      </div>
    </div>
  </div>
@endsection


