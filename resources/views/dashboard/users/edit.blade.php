@extends('dashboard.layouts.app')
@section('title', 'Пользователи')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">

        <!-- Header -->
        <div class="header mt-md-5">
          <div class="header-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h1 class="header-title">
                  Изменение информации клиента
                </h1>

              </div>
          </div>
        </div>
        <!-- Form -->
        <form  method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
          <div class="row justify-content-between align-items-center  pt-4">
            <div class="col">
              <div class="row align-items-center">
                <div class="col-auto">

                  <!-- Avatar -->
                  <div class="avatar user_avatar">
                    <img class="avatar-img rounded-circle" src="{{ $user->profile_photo_path != '' ? Storage::url($user->profile_photo_path) : '/storage/theme/no-photo.svg' }}" alt="...">
                    <input type="file" accept="image/*"  id="profile_photo_path" class="d-none" name="profile_photo_path">
                  </div>

                </div>
                <div class="col ml-n2">

                  <!-- Heading -->
                  <h4 class="mb-1">
                    Ваш аватар
                  </h4>

                  <!-- Text -->
                  <small class="text-muted">
                    PNG или JPG шириной и высотой не более 1000 пикселей.
                  </small>

                </div>
              </div> <!-- / .row -->
              @error('profile_photo_path')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-auto">

              <!-- Button -->
              <label for="profile_photo_path" class="btn btn-sm btn-primary">
                Загрузить
              </label>

            </div>
          </div> <!-- / .row -->

          <!-- Divider -->
          <hr class="my-5">

          <div class="row">
            <div class="col-md-12">

              <!-- First name -->
              <div class="form-group">

                <!-- Label -->
                <label>
                  Ф.И.О
                </label>

                <!-- Input -->
                <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" autocomplete="off">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

              </div>

            </div>
            <div class="col-12 col-md-6">

                <!-- First name -->
                <div class="form-group">

                <!-- Label -->
                <label>
                  Телефон
                </label>

                <!-- Input -->
                <input type="text" class="form-control mb-3 @if($user->status == 2)text-muted @endif @error('phone')is-invalid @enderror" placeholder="(___)___-____" data-mask="(000) 000-0000" autocomplete="off" maxlength="14"  name="phone" value="{{ old('phone') ?? $user->phone }}" @if($user->status == 2) disabled @endif>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                </div>

            </div>
            @if($user->status == 1)
            <div class="col-12 col-md-6">

                <!-- Email address -->
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        E-mail
                    </label>

                    <!-- Input -->
                    <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

            </div>
            @endif
            <div class="col-md-6">

                <!-- Address -->
                <div class="form-group">

                <!-- Label -->
                <label>
                  Адрес
                </label>

                <!-- Input -->
                <input type="text" class="form-control @error('address')is-invalid @enderror" name="address" value="{{ old('address') ?? $user->address }}" autocomplete="off">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                </div>

            </div>
            @if($user->status != 1)
            <div class="col-md-6">

                <!-- First name -->
                <div class="form-group">

                <!-- Label -->
                <label>
                  Город
                </label>

                <!-- Input -->
                <select class="form-control @error('city_id')is-invalid @enderror" name="city_id" id="city">
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $city->id == $user->city_id ? 'selected' : '' }} >{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
            </div>
            @endif
            @if($user->status == 1)
            <div class="col-12 col-md-6">

                <!-- Phone -->
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        Роль
                    </label>

                    <!-- Input -->
                    <select class="custom-select @error('role')is-invalid @enderror" data-toggle="select" name="role">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

            </div>
            <div class="col-12 col-md-6">

                <!-- Birthday -->
                <div class="form-group">

                    <!-- Label -->
                    <label>
                    Пароль
                    </label>

                    <!-- Input -->
                    <input class="form-control flatpickr-input @error('password')is-invalid @enderror"  type="password" name="password" autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

              </div>
              <div class="col-12 col-md-6">

                <!-- Birthday -->
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        Подтвердить пароль
                    </label>

                    <!-- Input -->
                    <input class="form-control flatpickr-input @error('password_confirmation')is-invalid @enderror"  type="password" name="password_confirmation" autocomplete="new-password">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

            </div>
            @endif
            </div> <!-- / .row -->
          <button class="btn btn-primary mt-4 float-right" type="submit"><i class="fe fe-edit"> </i> Изменить</button>

        </form>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection
