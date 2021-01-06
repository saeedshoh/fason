@extends('layouts.app')
@section('name')
@extends('layouts.header')
@extends('layouts.footer')

@section('content')
<section>
    <div class="container mt-3">
      <div class="d-flex mb-3 justify-content-between align-items-center">
        <a href="{{ $back }}" class="text-danger font-weight-bold text-decoration-none"> <img src="/storage/theme/icons/back.svg" alt="">
          назад</a>
          <h6 class="text-secondary mb-0">Результаты поиска:</h6>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 my-3 active-product">
        @forelse ($products as $product)
            <div class="col d-flex align-items-center justify-content-center mb-4 px-1 px-md-2">
                <div class="card rounded shadow border-0">
                    <svg class="position-absolute favorite" data-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15">
                        <path d="M8.57555 2.3052C5.73968 -2.07522 0 0.311095 0 5.08284C0 8.66606 7.86879 14.2712 8.57555 15C9.28716 14.2712 16.7646 8.66606 16.7646 5.08284C16.7646 0.347271 11.4167 -2.07522 8.57555 2.3052Z" fill="#C4C4C4"/>
                    </svg>
                    <img class="img-fluid rounded" src="{{ Storage::url($product->image) }}" alt="">
                    <div class="container">
                        <h4 class="product-name shop-subject mt-3" >{{ $product->name }}</h4>
                        <div class="price-place d-flex justify-content-between align-items-center mb-3 text-danger">
                            <span class="font-weight-bold">{{ $product->price }} сомони</span>
                            <a href="{{ route('ft-products.single', $product->slug) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                Извините ничего не найдено
        @endforelse
      </div>
    </div>
  </section>
@endsection
