@extends('dashboard.layouts.app')
@section('title', 'Все категории')
@extends('dashboard.layouts.aside')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">

        <!-- Header -->
        <div class="header">
          <div class="header-body border-0">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h1 class="header-title text-truncate">
                   Количество товаров на главной странице
                </h1>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>
        @if (session()->get('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">

            <form method="POST" action="{{ route('updateItemsForPage', $itemsForPage) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col-md-6">
                    <input class="form-control" name="qty" type="number" value="{{ old('qty') ?? $itemsForPage->qty }}" autocomplete="off">
                    <button class="btn btn-success mt-3 float-right">Сохранить</button>
                </div>
            </form>

          </div>
        </div>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection
