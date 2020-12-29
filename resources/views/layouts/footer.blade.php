@section('footer')

{{-- Место Модалок --}}

<div class="modal fade mb-custom-login" id="enter_site" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close d-md-none d-lg-block h3" data-dismiss="modal" aria-label="Close">
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
                <form id="sms-confirmed" class="text-center" route="{{ route('sms-confirmed') }}">
                  <div class="input-group text-left  btn-group-fs">
                    <div class="input-group-prepend position-relative">
                      <div class="input-group-text btn-link btn-custom-fs text-decoration-none">+992</div>
                    </div>
                    <input type="number" name="phone" class="form-control shadow-none" id="phone" placeholder="Введите номер телефона">
                  </div>
                  <button  type="button" class="btn btn-danger rounded-11 btn-lg my-4" id="send-code">Получить код</button>
                  <div class="enter-code my-3" style="display: none">
                    <div class="form-group text-center">
                      <input type="number" name="code" id="code" class="form-control" id="code" placeholder="Введите код">
                    </div>
                      <h2 id="count-down" class="my-3">01:00</h2>
                      <div class="pre--info">
                        <p class="text-muted mb-pre--text sms--true">Вам будет выслан смс с кодом активации для подтверждения вашего номера телефона</p>
                        <p class="text-muted mb-pre--text sms--false" style="display: none">Если вы не получили СМС с кодом <br> <button type="button" class="btn btn-link send-code  text-decoration-none">Отправить код повторно</button></p>
  
                      </div>
                      <button type="button" class="btn btn-danger rounded-11 px-5" id="btn-login">Вход</button>
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
<div class="modal fade text-left" id="adressChange" tabindex="-1" aria-labelledby="adressChange"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered buy-modal">
  <div class="modal-content">
    <div class="modal-header border-0">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="img/close-modal.svg" alt=""></span>
      </button>
    </div>
    <div class="modal-body">
      <div class="container text-center">
        <img src="img/logo fason.svg" alt="">
        <form class="my-3 mx-0 mx-sm-3 mx-lg-5">
          <div class="form-group mt-4">
            <input type="text" class="form-control" placeholder="Имя..">
          </div>
          <div class="form-group mt-4">
            <input type="text" class="form-control" placeholder="Адрес дома...">
          </div>
          <div class="text-center">
            <h5 class="text-secondary">Город:</h5>
          </div>
          <div class="form-row">
            <div class="form-group col-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dushanbe">
                <label class="form-check-label text-dark" for="dushanbe">
                  Душанбе
                </label>
              </div>
            </div>
            <div class="form-group col-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="hujand">
              </div>
            </div>
          </div>
          <div class="text-center">
            <small class="d-block d-md-none mb-3">
              <a class="privacy-policy" href="{{ route('useful_links.privacy_policy') }}">

                Ознакомиться с пользовательским соглашением и полотикой конфиденциальности 
              </a>
            </small>
            <button class="btn btn-danger rounded-11">Сохранить</button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer border-0">
      
    </div>
  </div>
</div>
</div>
{{-- Раздел Футера --}}
<footer class="mt-5">
    <div class="container border-top border-bottom py-4">
      <div class="row">
        <div class="col-12 mb-4">
          <img src="/storage/theme/logo_fason.svg" alt="" width="120">
        </div>

        <div class="col-12 col-lg-3"> 
          <p>Fason.tj - предоставляет всем предпринимателям возможность бесплатно размещать товары на площадке, так же мы облегчаем работу как продаваца так и покупателя и осуществляем доставку.</p> 
        </div>
        <div class="footer_links col-lg-3"> 
          <ul class="p-0 p-lg">
            <li> <a href="{{ route('useful_links.help') }}">Помощь</a></li>
            <li> <a href="{{ route('useful_links.privacy_policy') }}">Политика и конфиденциальности</a></li>
          </ul>
        </div>

        <div class="footer_links col-12 col-lg-3"> 
          <ul class="p-0 p-lg">
            <li> <a href="{{ route('useful_links.delivery') }}">Доcтавка</a></li>
            <li> <a href="{{ route('useful_links.return') }}">Возврат</a></li>
            <li> <a href="{{ route('useful_links.saller') }}">Как стать продавцом</a></li>
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