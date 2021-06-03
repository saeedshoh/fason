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

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Раздел
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Добавление
                </h1>

              </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="account-general.html" class="nav-link active">
                      Личная информация
                    </a>
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </div>

        <!-- Form -->
        <form  method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf

          <div class="row justify-content-between align-items-center">
            <div class="col">
              <div class="row align-items-center">
                <div class="col-auto">

                  <!-- Avatar -->
                  <div class="avatar user_avatar">
                    <img class="avatar-img rounded-circle" src="/storage/theme/no-photo.svg">
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
            <div class="col-12">

              <!-- First name -->
              <div class="form-group">

                <!-- Label -->
                <label>
                  Ф.И.О
                </label>

                <!-- Input -->
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

              </div>

            </div>

            <div class="col-12  col-md-6">

              <!-- Phone -->
              <div class="form-group">

                <!-- Label -->
                <label>
                  Телефон
                </label>

                <!-- Input -->
                <input type="text" class="form-control mb-3" placeholder="(___)___-____" data-mask="(000) 000-0000" autocomplete="off" maxlength="14"  name="phone" value="{{ old('phone') }}">

              </div>

            </div>
            <div class="col-12 col-md-6">

                <!-- Phone -->
                <div class="form-group">

                  <!-- Label -->
                  <label>
                    Должность
                  </label>

                  <!-- Input -->
                  <select class="custom-select" data-toggle="select" name="role">
                    @foreach ($roles as $role)

                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                    @endforeach
                  </select>

                </div>

              </div>
              <div class="col-6">

                <!-- Email address -->
                <div class="form-group">

                  <!-- Label -->
                  <label class="mb-1">
                    E-mail
                  </label>

                  <!-- Input -->
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                </div>

              </div>
              <div class="col-6">

                <!-- Address -->
                <div class="form-group">

                  <!-- Label -->
                  <label class="mb-1">
                    Адрес
                  </label>

                  <!-- Input -->
                  <input type="text" class="form-control" name="address" value="{{ old('address') }}">

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
                <input class="form-control flatpickr-input"  type="password" name="password" required autocomplete="new-password">

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
                  <input class="form-control flatpickr-input"  type="password" name="password_confirmation" required autocomplete="new-password">

                </div>

              </div>
          </div> <!-- / .row -->

          <!-- Button -->
          <button class="btn btn-primary">
            Сохранить
          </button>


        </form>

        <br><br>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection
