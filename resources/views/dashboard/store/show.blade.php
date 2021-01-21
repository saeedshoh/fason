@extends('dashboard.layouts.app')
@section('title', 'Магазины')
@extends('dashboard.layouts.aside')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-12 col-xl-12">
              <!-- Content -->
              <div class="card card-body p-5">
                <div class="row">
                  <div class="col text-center">

                    <!-- Logo -->
                    <img src="{{ Storage::url($store->avatar) }}" alt="..." class="img-fluid mb-4" style="max-width: 2.5rem;">

                    <!-- Title -->
                    <h2 class="mb-2">
                      {{ $store->name }}
                    </h2>

                  </div>
                </div> <!-- / .row -->
                <div class="row">
                  <div class="col-12 col-md-12">

                    <!-- Heading -->
                    <h6 class="text-uppercase text-muted">
                      Информация о магазине
                    </h6>

                    <!-- Text -->
                    <p class="text-muted mb-4">
                      Название: <strong class="text-body">{{ $store->name }}</strong> <br>
                      Владелец: <strong class="text-body">{{ $store->user->name }}</strong> <br>
                      Адрес: <strong class="text-body">{{ $store->address }}</strong> <br>
                      Город: <strong class="text-body">{{ $store->city->name }}</strong> <br>
                      Активен: <strong class="text-body">{{ $store->is_active == 1 ? 'Да' : 'Нет' }}</strong> <br>
                    </p>
                  </div>
                </div> <!-- / .row -->
                <div class="row">
                  <div class="col-12">
                    <!-- Table -->
                    <div class="table-responsive">
                      <table class="table my-4">
                        <thead>
                          <tr>
                            <th class="px-0 bg-transparent border-top-0">
                              <span class="h6">Товар</span>
                            </th>
                            <th class="px-0 bg-transparent border-top-0">
                              <span class="h6">Количество</span>
                            </th>
                            <th class="px-0 bg-transparent border-top-0 text-right">
                              <span class="h6">Итого</span>
                            </th>
                            <th class="px-0 bg-transparent border-top-0 text-right">
                                <span class="h6">Время</span>
                              </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="px-0">
                                    <a href="{{ route('ft-products.single', $order->slug) }}">{{ $order->name }}</a>
                                    </td>
                                    <td class="px-0">
                                    {{ $order->quantity }}
                                    </td>
                                    <td class="px-0 text-right">
                                    {{ $order->total }} TJS
                                    </td>
                                    <td class="px-0 text-right">
                                        {{ $order->updated_at->format('d-m-y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="card-footer d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg">
                                <li class="page-item">
                                   {{ $orders->links() }}
                                </li>
                            </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>
    </div>
@endsection
