@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Мой профиль
@endsection
@extends('layouts.footer')
@section('content')
<section>
    <div class="container">
        <div class="mt-3">
            <div class="row d-flex justify-content-center my-4">
                <h3>Мой профиль</h3>
            </div>
            <form action="{{ route('ft_profile.update') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-3 px-0 px-md-2 position-relative">
                        <div class="text-center">
                            @if($user->profile_photo_path == '')
                                <label for="avatar" class="cursor-pointer d-block user_avatar">
                                        <img id="avatar-poster" src="/storage/theme/no-photo.svg" alt="avatar" class="rounded-pill" height="90" width="90" style="object-fit: cover;">
                                        <h6 class="mt-3 font-weight-bold">Добавить аватар</h6>
                                        <input type="file" accept="image/*"  class="d-none" id="avatar" name="profile_photo_path">
                                </label>

                            @else
                                <img src="/storage/{{ $user->profile_photo_path }}" class="rounded-pill" height="90" width="90" id="avatar-poster"  style="object-fit: cover;">
                                <div class="edit-store-logo position-absolute w-100 edit-pofile-img">
                                    <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt="">
                                        Изменить
                                        <input type="file" accept="image/*"  class="d-none" id="avatar" name="profile_photo_path">
                                    </label>
                                </div>
                            @endif
                            {{-- <div class="edit-store-logo position-absolute w-100">
                                <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt="">
                                    Изменить
                                    <input type="file" accept="image/*"  class="d-none" id="avatar" name="profile_photo_path">
                                </label>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="text-center d-none d-md-block">
                        <img src="/storage/{{ $user->profile_photo_path }}" class="w-100 rounded" id="avatar-poster" height="216">
                        <div class="edit-store-logo position-absolute w-100">
                          <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt="">
                            Изменить
                            <input type="file" accept="image/*"  class="d-none" id="avatar" name="avatar">
                          </label>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-3 text-md-left text-center">
                        <img class="img-fluid" src="/storage/theme/itpark.png" alt="">
                    </div> --}}
                    <div class="col-lg-6 mt-md-0 mt-3">
                        <label class="font-weight-bold col-12 col-lg-6 h5 pl-0">Город:</label>
                        <div class="form-row flex-column ml-0 ml-lg-4">
                            @foreach ($cities as $city)
                                <div class="form-group form-check col-6 col-lg-3 px-4 px-lg-0">
                                    <input class="form-check-input" type="radio" id="{{ $city->name }}" name="city_id" value="{{ $city->id }}" {{ $user->city_id == $city->id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $city->name }}">
                                        {{ $city->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            <label class="font-weight-bold h5" for="name">Имя:</label>
                            <div class="input-group text-left  btn-group-fs">
                                <div class="input-group-prepend position-relative">
                                  <div class="input-group-text btn-link btn-custom-fs text-decoration-none px-1"></div>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $user->name }}">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="font-weight-bold h5" for="name">Адрес:</label>
                            <div class="input-group text-left  btn-group-fs">
                                <div class="input-group-prepend position-relative">
                                  <div class="input-group-text btn-linkwdwd btn-custom-fs text-decoration-none px-1"></div>
                                </div>
                                <input type="text" class="form-control" id="adress" name="address" value="{{ old('address') ?? $user->address }}">
                            </div>
                        </div>

                          <div class="my-5 text-center">
                            <button type="submit" class="btn mb-5 btn-danger px-5 rounded-11">Сохранить</button>
                          </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
