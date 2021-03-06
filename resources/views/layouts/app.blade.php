<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/445a82fc53.js" crossorigin="anonymous"></script>
    {{--  <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>  --}}
    <title>Fason.tj - @yield('title')</title>
    <meta name="description" content="@yield('seo-desc')">
    <meta name="keywords" content="@yield('seo-keywords')">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="apple-touch-icon" href="/storage/favicon.jpg">
    <link rel="icon" type="image/jpg"  href="/storage/favicon.jpg" />


    <meta property="og:title" content="@yield('og:title') - Fason.tj" />
    <meta property="og:site_name" content="FASON.TJ" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="@yield('og:description')" />
    <meta property="og:url" content="https://fason.tj/" />

    <meta property="og:image" content="@yield('og:image')" />
    <meta property="og:image:alt" content="@yield('og:image:alt') - Fason" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W352P4J3KX"></script>
<script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-W352P4J3KX');
    </script>
  </head>
  <body>
    @yield('header')

    @yield('content')
    @if(Request::is('/'))
        @yield('footer')
    @else
        {{-- ?????????? ?????????????? --}}

<div class="modal fade mb-custom-login" id="enter_site" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="border-0 modal-header">
                <button type="button" class="close d-none d-lg-block h3" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <span data-dismiss="modal" aria-label="Close" class="mb-pre--close font-weight-bold d-md-block d-lg-none">
                  <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.414 6.707H3.828L9.121 1.414L7.707 0L0 7.707L7.707 15.414L9.121 14L3.828 8.707H18.414V6.707Z" fill="#545454"/>
                  </svg>
                  ??????????
                </span>
            </div>
            <div class="text-center bg-white modal-body">
                <img src="/storage/theme/logo_fason.svg" alt="" class="my-3" width="160">
                <p class="text-muted mb-pre--text">
                   ?????????????????????????????????? ???? ??????????, ?????????? ???????????? ?? ?????????????? ?????????????????????? ????????????.
                </p>
                <form id="sms-confirmed" class="text-center" route="{{ route('sms-confirmed') }}"  onsubmit="return false">
                  <div class="text-left input-group btn-group-fs">
                    <div class="input-group-prepend position-relative">
                      <div class="input-group-text btn-link btn-custom-fs text-decoration-none">+992</div>
                    </div>
                    <input inputmode="numeric" pattern="[0-9]*" data-inputmask="'alias': 'phonebe'" name="phone" class="shadow-none form-control" id="phone" placeholder="?????????????? ?????????? ????????????????" form="add_address" required>
                  </div>
                  <button  type="button" class="my-4 btn btn-danger rounded-11 btn-lg" id="send-code">???????????????? ??????</button>
                  <div class="my-3 enter-code" style="display: none">
                    <div class="text-center form-group">
                      <input type="number" name="code" id="code" class="form-control" id="code" placeholder="?????????????? ??????">
                    </div>
                      <h2 id="count-down" class="my-3">01:00</h2>
                      <div class="pre--info">
                        <p class="text-muted mb-pre--text sms--true">?????? ?????????? ???????????? ?????? ?? ?????????? ?????????????????? ?????? ?????????????????????????? ???????????? ???????????? ????????????????</p>
                        <p class="text-muted mb-pre--text sms--false" style="display: none">???????? ???? ???? ???????????????? ?????? ?? ?????????? <br> <button type="button" class="btn btn-link send-code text-decoration-none">?????????????????? ?????? ????????????????</button></p>
                      </div>
                      <button type="button" class="px-5 btn btn-danger rounded-11 btn-lg" id="btn-login">????????</button>
                  </div>
                </form>
                <p class="privacy-policy mb-pre--text">
                  <a href="{{ route('useful_links.privacy_policy') }}" class="privacy-policy">
                    ???????????????????????? ?? ???????????????????????????????? ??????????????????????
                  </a>
                </p>


            </div>
            <div class="border-0 modal-footer"></div>
        </div>
    </div>
</div>
<!--Modal-3-->
<div class="modal fade mb-custom-login" id="adressChange" tabindex="-1" aria-labelledby="adressChange"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="border-0 modal-header d-none">
      </div>
      <div class="text-center bg-white modal-body" style="z-index: 99999;overflow-y: scroll;">
        <img src="/storage/theme/logo_fason.svg" alt="" class="my-3" width="160">
        <p class="mb-0 text-muted mb-pre--text">
               ?????????????????????????????????? ???? ??????????, ?????????? ???????????? ?? ?????????????? ?????????????????????? ????????????.
        </p>
        <div class="container pb-5 text-center">
          {{-- <img src="/storage/theme/logo_fason.svg" alt=""> --}}
          <form id="add_address" class="pb-3 text-center needs-validation pb-md-0" action="{{ route('users.contacts') }}" method="POST" enctype="multipart/form-data" onsubmit="return false">
            @csrf
            <label for="profile_photo_path" class="cursor-pointer d-block user_avatar">
              <img src="/storage/theme/no-photo.svg" alt="" width="100" height="100" class="object-cover rounded-circle" id="main-poster">
              <div class="mt-3 text-center">
                <h6>???????????????? ????????</h6>
              </div>
            </label>
            <div class="custom-file d-none">
              <input type="file" accept="image/*"  class="custom-file-input" id="profile_photo_path" lang="es" name="profile_photo_path">
            </div>
            <div class="my-3 text-left input-group btn-group-fs">
              <div class="input-group-prepend position-relative">
                <div class="px-1 input-group-text btn-link btn-custom-fs text-decoration-none"></div>
              </div>
              <input type="text" class="form-control" placeholder="??????.." name="name" autocomplete="off" required>
              <div class="invalid-feedback">
                ?????????????? ???????? ??????
              </div>
            </div>
            <div class="mb-3 text-left input-group btn-group-fs">
              <div class="input-group-prepend position-relative">
                <div class="px-1 input-group-text btn-link btn-custom-fs text-decoration-none"></div>
              </div>
              <input type="text" class="form-control" placeholder="?????????? ????????..." name="address" autocomplete="off" required>
              <div class="invalid-feedback">
                ?????????????? ?????? ??????????
              </div>
            </div>
            <h5 class="text-secondary">??????????:</h5>
            <div class="form-row justify-content-around">
              @php
              $cities = App\Models\City::get();
              @endphp
              @foreach($cities as $city)
                <div class="px-4 form-group form-check col-6 col-lg-3 px-lg-0">
                  <input class="form-check-input" type="radio" id="city_{{ $city->id }}" name="city_id" value="{{ $city->id }}" required>
                  <label class="form-check-label" for="city_{{ $city->id }}">{{ $city->name }}</label>
                  <div class="invalid-feedback">???????????????? ?????? ??????????</div>
                </div>
              @endforeach

            </div>
            <p class="mb-0 privacy-policy mb-pre--text">
              <a href="{{ route('useful_links.privacy_policy') }}" class="privacy-policy">
                ???????????????? ????????????????????????????????????
              </a>
            </p>
            <button type="submit" class="btn btn-danger rounded-11 btn-lg" id="btn-add_address">??????????????????</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('script')
  </body>
</html>


