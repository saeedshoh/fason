@section('footer')

{{-- Место Модалок --}}

<div class="modal fade" id="enter_site" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true"><img src="storage/theme/icons/close icon.svg" alt=""> </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-required__head-txt  d-flex justify-content-center mb-3">
                    <img class="text-center" src="./storage/theme/logo.png" alt="">
                </div>
                <div class="regist-on-site px-4 d-flex justify-content-center">   
                    <form class="w-100">                   
                    <div class="input-group">
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+992</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">+991</a>
                            <a class="dropdown-item" href="#">+772</a>
                            <a class="dropdown-item" href="#">+11</a>
                        </div>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                        </div>
                    </div>
                    
                    <div class="form-group row mt-4">
                        <div class="col-sm-12 ">
                        <p class="text-center sms-code__txt mb-2">Я получил СМС</p>
                        <input type="email" class="form-control" id="colFormLabel" placeholder="КОД">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-required__head-txt d-flex justify-content-center mt-4">
                    <h3 class="sms-timer__txt">0:59</h3>
                </div>

                <div class="mt-4">
                    <p class="text-center mb-0 eror-sms__code">Если вы не получили СМС с кодом</p>
                    <p class="text-center mb-0 eror-sms__code" ><a href="">Отправить код повторно </a></p>
                </div>

                <div class="privacy-policy__terms-of-use mt-3">
                    <p class="text-center mb-0 eror-sms__code"><a href=""> Ознакомиться с пользовательским соглашением и полотикой конфиденциальности  </a></p>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button  type="button" class="text-center price-and-amount__buy-bttn custom-bttn btn-secondary rounded px-4">Вход</button>
                </div>

            </div>
            <div class="modal-footer border-0"></div>
        </div>
    </div>
</div>

{{-- Раздел Футера --}}
<footer class="mt-5">
    <div class="container border-top border-bottom py-4">
      <div class="row">
        <div class="col-12 mb-4">
          <img src="storage/theme/logo.png" alt="">
        </div>

        <div class="col-12 col-lg-3"> <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p> </div>
        <div class="footer_links col-lg-3"> 
          <ul class="p-0 p-lg">
            <li> <a href="">Помощь</a></li>
            <li> <a href="">Оферта</a></li>
            <li> <a href="">Предложени</a></li>
          </ul>
        </div>

        <div class="footer_links col-12 col-lg-3"> 
          <ul class="p-0 p-lg">
            <li> <a href="">Доcтавка</a></li>
            <li> <a href="">Возврат</a></li>
            <li> <a href="">Как стать продавцом</a></li>
          </ul>
        </div>         
        <div class="footer_links col-12 col-lg-3"> 
          <ul class="p-0 p-lg">
            <li> <a href="">О нас</a></li>
            <li> <a href="">Тел: 992 9333</a></li>
            <li> <a href="">Тел: 223 23 09</a></li>
          </ul>
        </div>          
      </div>

      <div class="col-lg-2 col-8 col-md-5 mt-2 pl-0 d-flex justify-content-between">
        <a href="#"><img src="storage/theme/icons/Facebook.svg" alt=""></a>
        <a href="#"><img src="storage/theme/icons/Twitter.svg" alt=""></a>
        <a href="#"><img src="storage/theme/icons/Google.svg" alt=""></a>
        <a href="#"><img src="storage/theme/icons/Instagram.svg" alt=""></a>
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