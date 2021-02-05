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
                    <div class="col-md-3 px-0 px-md-2 position-relative">
                        <div class="text-center">
                            @if($user->profile_photo_path == '')
                                <label for="avatar" class="cursor-pointer d-block user_avatar">
                                        <svg width="100" height="116" viewBox="0 0 496 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M248 8C111 8 0 119 0 256C0 393 111 504 248 504C385 504 496 393 496 256C496 119 385 8 248 8ZM248 104C296.6 104 336 143.4 336 192C336 240.6 296.6 280 248 280C199.4 280 160 240.6 160 192C160 143.4 199.4 104 248 104ZM248 448C189.3 448 136.7 421.4 101.5 379.8C120.3 344.4 157.1 320 200 320C202.4 320 204.8 320.4 207.1 321.1C220.1 325.3 233.7 328 248 328C262.3 328 276 325.3 288.9 321.1C291.2 320.4 293.6 320 296 320C338.9 320 375.7 344.4 394.5 379.8C359.3 421.4 306.7 448 248 448Z" fill="#E5E5E5"/>
                                        </svg>
                                        <h6>Добавить аватар</h6>
                                        <input type="file" class="d-none" id="avatar" name="profile_photo_path">
                                </label>
                            @else
                                <img src="/storage/{{ $user->profile_photo_path }}" class="w-100 rounded" id="avatar-poster">
                                <div class="edit-store-logo position-absolute w-100">
                                    <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt="">
                                        Изменить
                                        <input type="file" class="d-none" id="avatar" name="profile_photo_path">
                                    </label>
                                </div>
                            @endif
                            {{-- <div class="edit-store-logo position-absolute w-100">
                                <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt="">
                                    Изменить
                                    <input type="file" class="d-none" id="avatar" name="profile_photo_path">
                                </label>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="text-center d-none d-md-block">
                        <img src="/storage/{{ $user->profile_photo_path }}" class="w-100 rounded" id="avatar-poster" height="216">
                        <div class="edit-store-logo position-absolute w-100">
                          <label for="avatar" class="btn btn-edit rounded-pill"><img src="/storage/theme/icons/camera.svg" class="mw-100 align-text-top" alt="">
                            Изменить
                            <input type="file" class="d-none" id="avatar" name="avatar">
                          </label>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-3 text-md-left text-center">
                        <img class="img-fluid" src="/storage/theme/itpark.png" alt="">
                    </div> --}}
                    <div class="col-md-6 mt-md-0 mt-3">
                        <div class="form-row">
                            <label class="font-weight-bold col-12 col-lg-6 h5">Город:</label>
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

                          <div class="mt-5">
                            <button type="submit" class="btn btn-danger px-5 rounded-11">Сохранить</button>
                          </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
