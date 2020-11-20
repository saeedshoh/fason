@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')

<section class="content" >
    <div class="container">
      <h2 class="title text-center w-100 mt-5 mb-4 d-none d-lg-block">Добавить Товар</h2>
      <div class="row d-flex justify-content-between" >
        <!--add image start-->
        <div class="col-lg-5 col-12 w-100 add-product" > 
          <div class="d-flex justify-content-between align-items-baseline">
          <a href="#" class="text-pinky font-weight-bold text-decoration-none" > <img src="/storage/theme/icons/back.svg" alt=""> Назад</a>
          <h5 class="text-secondary mt-5 mb-4 d-flex d-lg-none" >Добавить Товар</h5>
          </div>
          <div class="my-3">
            <img src="/storage/theme/icons/add_prod-img.svg" class="mw-100 w-100" alt="">
          </div>
          <div class="row add-product-secondary">
            <div class="col-3 text-center">
              <img src="/storage/theme/icons/add_prod-secondary.svg" class="mw-100"  alt="">
            </div>
            <div class="col-3 text-center">
              <img src="/storage/theme/icons/add_prod-secondary.svg" class="mw-100"  alt="">
            </div>
            <div class="col-3 text-center">
              <img src="/storage/theme/icons/add_prod-secondary.svg" class="mw-100"  alt="">
            </div>
            <div class="col-3 text-center">
              <img src="/storage/theme/icons/add_prod-secondary.svg" class="mw-100" alt="">
            </div>
          </div>
        </div>
        <!--add image end-->
        <!--Main attributes of product start-->
        <div class="col-12 col-lg-7 mt-5 mt-lg-0">
          <form>
            <div class="form-group d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="staticEmail" class="input_caption mr-2 text-left text-md-right">Категории:</label>
                <select class="strartline_stick input_placeholder_style form-control w-75 position-relative" id="staticEmail">
                  <option>Обувь</option>
                  <option>Вверх</option>
                  <option>Низ</option>
                  <option>Аксессуары</option>
                  <option>Сумки</option>
                </select>                
            </div>
            <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="staticEmail" class="input_caption mr-2 text-left text-md-right">Под- категории:</label>
                <select class="input_placeholder_style form-control position-relative w-75" id="staticEmail">
                  <option>Кроссовки</option>
                  <option>Кеды</option>
                  <option>Туфли</option>
                  <option>Сапоги</option>
                  <option>Босаножки</option>
                </select>                
            </div>
            <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="inputChar1" class="input_caption mr-2 text-left text-md-right">Название товара:</label>
                <input type="input" class="input_placeholder_style form-control w-75 position-relative" id="inputChar1" placeholder="">
            </div>
            <div class="form-group  d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
              <label for="textarea1" class="input_caption mr-2 text-left text-md-right">Описание товара : </label>
                <textarea class="input_placeholder_style form-control w-75 position-relative" id="textarea1" rows="3"></textarea>
            </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-7 col-12">
                  <div class= "w-100 d-flex align-items-center text-left">                       
                    <span class="input_caption mr-2 text-left text-md-right">Магазин : </span>
                    <a class="text-secondary text-decoration-none font-weight-bold" href="#">OLim.H...</a>
                  </div> 
                  <div class= "w-100 d-flex align-items-center justify-content-between justify-content-md-end pt-2">                       
                      <span class="input_caption m-0 text-left text-md-right"> Цвет : </span>
                    <label for="grey"  class="mx-2 color_select rounded-circle">
                      <input class="color_selector form-check-input" type="checkbox" value="" id="grey" hidden>
                    </label>
                    <label for="blue"  class="mx-2 color_select rounded-circle bg-info">
                      <input class="color_selector form-check-input" type="checkbox" value="" id="blue" hidden>
                    </label>
                    <label for="green" class="mx-2 color_select rounded-circle bg-success">
                      <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                    </label>
                    <a data-toggle="collapse" href="#addAtributeFirst" role="button" aria-expanded="false" aria-controls="addAtributeFirst"><img src="/storage/theme/icons/add-prod-icon.svg" class="mw-100 mx-2" width="42" alt=""></a>
                  </div>
                  <div class="collapse" id="addAtributeFirst">
                    <div>
                      <div class="form-group d-flex justify-content-end mt-4 align-items-center">
                        <label for="extraAttribute" class="input_caption text-right mr-2 w-50">Добавить цвет: </label>
                          <input type="text" class="form-control w-75" id="extraAttribute">
                      </div>
                    </div>
                  </div>
                  <div class="color-and-size__size-number  w-100 d-flex justify-content-between justify-content-md-end align-items-baseline pt-4"> 
                    <span class="input_caption m-0 "> Размер: </span>
                    <label for="size-41"  class="mx-2">41
                      <input class="form-check-input" type="checkbox" value="" id="size-41" hidden>
                    </label>
                    <label for="size-42"  class="mx-2">42
                      <input class="form-check-input" type="checkbox" value="" id="size-42" hidden>
                    </label>
                    <label for="size-43" class="mx-2">43
                      <input class="form-check-input" type="checkbox" value="" id="size-43" hidden>
                    </label>
                    <a data-toggle="collapse" href="#addAtributeSecond" role="button" aria-expanded="false" aria-controls="addAtributeSecond"><img src="/storage/theme/icons/add-prod-icon.svg" class="mw-100 mx-2" width="42" alt=""></a>
                  </div>
                  <div class="collapse" id="addAtributeSecond">
                    <div>
                      <div class="form-group d-flex justify-content-end mt-4 align-items-center">
                        <label for="extraAttribute" class="input_caption text-right mr-2 w-50">Добавить размер: </label>
                          <input type="text" class="form-control w-75" id="extraAttribute">
                      </div>
                    </div>
                </div>
                </div>
                <!--Main attributes of product end-->
                <!--colors of product start-->
                  <div class="col-12 col-lg-5 bg-white my-3 px-3 rounded align-self-center">
                    <div class="multy-color pt-2">
                      <div class="row d-flex justify-content-between ">
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>

                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>

                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                        <div class="col-2 px-2 text-center">
                          <label for="green" class="lil-color_select rounded-circle bg-success">
                            <input class="color_selector form-check-input" type="checkbox" value="" id="green" hidden>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--colors of product start-->
                  <!--Price and quantity start-->
                  <div class="col-lg-7 col-12">
                    <div class="form-group row mb-2">
                      <label for="inputChar1" class="input_caption col-sm-4 col-form-label ">Количество в наличии :</label>
                      <div class="col-sm-7">
                        <input type="number" class="w-100 input_placeholder_style form-control " id="inputChar1" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row mb-2">
                      <label for="inputChar1" class="input_caption col-sm-4 col-form-label ">Цена :</label>
                      <div class="col-sm-7">
                        <input type="number" class="w-100 input_placeholder_style form-control " id="inputChar1" placeholder="">
                      </div>
                    </div>
                  </div>
                  <!--Price and quantity start-->
                  <div class="col-12 col-md-5 d-flex justify-content-center align-items-md-end">
                    <button  type="button" class="font-weight-bold custom-bttn btn-secondary mr-2 mb-2 rounded px-2 w-lg-75 w-100"> Добавить </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection