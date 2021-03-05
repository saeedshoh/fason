@section('footer')

{{-- Место Модалок --}}

<div class="modal fade mb-custom-login" id="enter_site" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close d-none d-lg-block h3" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <span data-dismiss="modal" aria-label="Close" class="mb-pre--close font-weight-bold d-md-block d-lg-none">
                  <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.414 6.707H3.828L9.121 1.414L7.707 0L0 7.707L7.707 15.414L9.121 14L3.828 8.707H18.414V6.707Z" fill="#545454"/>
                  </svg>
                  Назад
                </span>
            </div>
            <div class="modal-body text-center">
                <img src="/storage/theme/logo_fason.svg" alt="" class="my-3" width="160">
                <p class="text-muted mb-pre--text">
                   Зарегистрируйтесь на нашем сайте, чтобы купить или продать необходимые товары.
                </p>
                <form id="sms-confirmed" class="text-center" route="{{ route('sms-confirmed') }}"  onsubmit="return false">
                  <div class="input-group text-left  btn-group-fs">
                    <div class="input-group-prepend position-relative">
                      <div class="input-group-text btn-link btn-custom-fs text-decoration-none">+992</div>
                    </div>
                    <input inputmode="numeric" pattern="[0-9]*" data-inputmask="'alias': 'phonebe'" name="phone" class="form-control shadow-none" id="phone" placeholder="Введите номер телефона" form="add_address" required>
                  </div>
                  <p class="text-danger wrong-phone-number text-left mt-1 font-weight-bold mt-2" style="display: none;">Такого номера не существует !</p>
                  <button  type="button" class="btn btn-danger rounded-11 btn-lg my-4" id="send-code">Получить код</button>
                  <div class="enter-code my-3" style="display: none">
                    <div class="form-group text-center">
                      <input inputmode="numeric" pattern="[0-9]*" data-inputmask="'alias': 'phonebe'" name="code" id="code" class="form-control" id="code" placeholder="Введите код">
                      <p class="text-danger wrong-code text-left mt-1" style="display: none;">Введен не правильный код</p>
                    </div>
                      <h2 id="count-down" class="my-3">01:00</h2>
                      <div class="pre--info">
                        <p class="text-muted mb-pre--text sms--true">Вам будет выслан смс с кодом активации для подтверждения вашего номера телефона</p>
                        <p class="text-muted mb-pre--text sms--false" style="display: none">Если вы не получили СМС с кодом <br> <button type="button" class="btn btn-link send-code  text-decoration-none">Отправить код повторно</button></p>
                      </div>
                      <button type="button" class="btn btn-danger rounded-11 px-5 btn-lg" id="btn-login">Вход</button>
                  </div>
                </form>
                <p class="privacy-policy mb-pre--text">
                  <a href="{{ route('useful_links.privacy_policy') }}" class="privacy-policy">
                    Ознакомитесь с пользовательским соглашением
                  </a>
                </p>


            </div>
            <div class="modal-footer border-0"></div>
        </div>
    </div>
</div>
<!--Modal-3-->
<div class="modal fade mb-custom-login" id="adressChange" tabindex="-1" aria-labelledby="adressChange"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-md">
  <div class="modal-content">
    <div class="modal-header border-0 d-none">
    </div>
    <div class="modal-body text-center">
      <img src="/storage/theme/logo_fason.svg" alt="" class="my-3" width="160">
      <p class="text-muted mb-pre--text mb-0">
         Зарегистрируйтесь на нашем сайте, чтобы купить или продать необходимые товары.
      </p>
      <div class="container text-center">
        <img src="img/logo fason.svg" alt="">
        <form id="add_address" class="text-center" action="{{ route('users.contacts') }}" method="POST" enctype="multipart/form-data" onsubmit="return false">
          @csrf
          <label for="profile_photo_path" class="cursor-pointer d-block user_avatar">
            <svg width="80" height="80" viewBox="0 0 496 512" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M248 8C111 8 0 119 0 256C0 393 111 504 248 504C385 504 496 393 496 256C496 119 385 8 248 8ZM248 104C296.6 104 336 143.4 336 192C336 240.6 296.6 280 248 280C199.4 280 160 240.6 160 192C160 143.4 199.4 104 248 104ZM248 448C189.3 448 136.7 421.4 101.5 379.8C120.3 344.4 157.1 320 200 320C202.4 320 204.8 320.4 207.1 321.1C220.1 325.3 233.7 328 248 328C262.3 328 276 325.3 288.9 321.1C291.2 320.4 293.6 320 296 320C338.9 320 375.7 344.4 394.5 379.8C359.3 421.4 306.7 448 248 448Z" fill="#E5E5E5"/>
            </svg>
            <img src="" alt="" width="100" height="100" style="display: none" class="rounded-circle">
            <div class="text-center mt-3">
              <h6>Добавить фото</h6>
            </div>
          </label>
          <div class="custom-file d-none">
            <input type="file" class="custom-file-input" id="profile_photo_path" lang="es" name="profile_photo_path">
          </div>
          <div class="input-group text-left  btn-group-fs my-3">
            <div class="input-group-prepend position-relative">
              <div class="input-group-text btn-link btn-custom-fs text-decoration-none px-1"></div>
            </div>
            <input type="text" class="form-control" placeholder="Имя.." name="name" required>
          </div>
          <div class="input-group text-left  btn-group-fs mb-3">
            <div class="input-group-prepend position-relative">
              <div class="input-group-text btn-link btn-custom-fs text-decoration-none px-1"></div>
            </div>
            <input type="text" class="form-control" placeholder="Адрес дома..." name="address" required>
          </div>
          <h5 class="text-secondary">Город:</h5>
          <div class="form-row justify-content-around">
            <div class="form-group mb-0">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dushanbe" value="1" name="city_id" required>
                <label class="form-check-label text-dark" for="dushanbe">
                  Душанбе
                </label>
              </div>
            </div>
          </div>
          <p class="privacy-policy mb-pre--text mb-0">
            <a href="{{ route('useful_links.privacy_policy') }}" class="privacy-policy">
              Политика конфиденциальности
            </a>
          </p>
          <button type="submit" class="btn btn-danger rounded-11 btn-lg" id="btn-add_address">Сохранить</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

{{-- Раздел Футера --}}
<footer class="mt-5 mb-5 mb-sm-0">
    <div class="container border-top border-bottom py-4">
      <div class="row">
        <div class="col-12 mb-4">
          <img src="/storage/theme/logo_fason.svg" alt="" width="120">
        </div>

        <div class="col-12 col-lg-4">
          <p>Fason.tj - предоставляет всем предпринимателям возможность бесплатно размещать товары на площадке, так же мы облегчаем работу как продаваца так и покупателя и осуществляем доставку.</p>
        </div>
        <div class="footer_links col-lg-4">
          <ul class="p-0 p-lg m-0">
            <li> <a class="text-pinky" href="{{ route('useful_links.help') }}">Правила размещения информации</a></li>
            <li> <a class="text-pinky" href="{{ route('useful_links.privacy_policy') }}">Политика и конфиденциальности</a></li>
          </ul>
        </div>

        <div class="footer_links col-12 col-lg-4">
          <ul class="p-0 p-lg m-0">
            <li> <a class="text-pinky" href="{{ route('useful_links.delivery') }}">Доcтавка</a></li>
            <li> <a class="text-pinky" href="{{ route('useful_links.return') }}">Возврат</a></li>
            <li> <a class="text-pinky" href="{{ route('useful_links.saller') }}">Как стать продавцом</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-2 col-8 col-md-5 mt-2 pl-0 d-flex justify-content-between">
        <a href="https://www.instagram.com/fasontj/"><img src="storage/theme/icons/Instagram.svg" alt=""></a>
      </div>
    </div>

    <div class="container mt-3 text-center">
      <div class="row" >
        <div class="col-12">
          <p class="copyright_text_footer">© Fason.tj. Все права защищены Любое копирование и воспроизведение текста, в том числе частичное и в любых формах, без письменного разрешения правообладателя запрещено.</p>
        </div>
      </div>
    </div>
  </footer>
@endsection
