@section('header')
<header class="d-block" style="font-family: 'Montserrat', sans-serif;">
    <div class="container-fluid bg-white px-0">
      <div class="d-none d-md-block" style="background:url(/storage/theme/head-banner.png); height:80px; background-position:center;"></div>
      <div class="container">
        <div class="row py-3 px-3 px-lg-0">
          <div class="col-6 col-md-6 col-lg-2 px-0 order-1 order-lg-0">
            <a class="logo" href="{{ route('home') }}"><img src="/storage/theme/logo.png" alt=""></a>
          </div>
          <div class="col-md-12 col-lg-10 px-0 align-self-center order-2 order-lg-1">
            <div class="search-nav d-flex align-self-center align-items-center justify-content-between position-relative">
              <form class="form-inline my-2 my-lg-0 d-flex justify-content-center justify-content-lg-end w-100">
                <input  class="form-control rounded main-search pl-5 pl-lg-3" type="search" placeholder="поиск товаров ..." aria-label="Search">
                <button class="custom-bttn nav-link btn mx-2 rounded search-btn" type="submit">
                  <i class="fas fa-search d-none d-lg-inline-block"></i><i class="fas fa-search d-inline-block text-pinky d-lg-none"></i> <span class="d-none d-lg-inline-block">Поиск</span></button>
              </form>
                <!-- Button trigger modal -->
              <button class="custom-bttn nav-link btn rounded d-flex align-items-center filter-btn" data-toggle="modal" data-target="#filter_for_subject" type="submit">
                <i class="fas fa-filter d-none d-lg-inline-block"></i> <i class="fas fa-filter d-block d-lg-none text-pinky"></i> <span class="d-none d-lg-inline-block"> Фильтр</span>
              </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="filter_for_subject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h6 class="modal-title ml-4">Фильтер</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"><img src="/storage/theme/icons/close icon.svg" alt=""></span>
                    </button>
                  </div>
                  <div class="modal-body mx-4">
                    <div class="row">
                      <div class="col-md-6 col-lg-4 line-test__category fix_modal-line">
                        <div class="d-flex justify-content-between align-items-center mt-4">
                          <h5 class="captions-of__modal ">Категории</h5><img src="/storage/theme/icons/delete.svg" alt="delete_ctg">
                        </div>
                        <div class="categories__modal overflow-auto"> 
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck1">
                              Телефоны
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Электроника                           
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck1">
                              Автотовары 
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Компьютеры
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Компьютеры
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Компьютеры
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Компьютеры
                            </label>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                          <h5 class="captions-of__modal ">Бренды</h5><img src="/storage/theme/icons/delete.svg" alt="delete_ctg">
                        </div>                           
                        <div class="categories__modal  overflow-auto">
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck1">
                              Adidas
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              H&M                           
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck1">
                              Apple 
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Noname
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Noname
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Noname
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4 line-test__category fix_modal-line">
                        <div class="d-flex justify-content-between align-items-center mt-4">
                          <h5 class="captions-of__modal ">Магазин</h5> <img src="/storage/theme/icons/delete.svg" alt="delete_ctg">
                        </div>
                        <div class="categories__modal-markets overflow-auto"> 
                          <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck1">
                              Корвон
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Olim.H                           
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck1">
                              Aburish 
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Lactie
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Компьютеры
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Компьютеры
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Компьютеры
                            </label>
                          </div>
                        <div class="d-flex justify-content-between align-items-center mt-4"><h5 class="captions-of__modal ">Бренды</h5></div>                           
                          <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck1">
                              Adidas
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              H&M                           
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck1">
                              Apple 
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Noname
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Noname
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                            <label class="sort-checkbox__category form-check-label" for="defaultCheck2">
                              Noname
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4 line-test__category fix_modal-line">
                        <div class="mt-4"><h5 class="captions-of__modal ">Любой атребут</h5></div>
                        <div class="mt-5"><h5 class="captions-of__modal ">Город</h5></div>
                        <div class="form-check form-check-inline mt-3">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                          <label class="form-check-label" for="inlineCheckbox1">Душанбе</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                          <label class="form-check-label" for="inlineCheckbox2">Худжанд</label>
                        </div>
                        <br>
                        <div class="mt-5"><h5 class="captions-of__modal ">Цена</h5></div>                           
                        <input type="range" class="custom-range" id="customRange1">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer border-1 d-flex justify-content-end mt-1">
                    <button type="button" class="change-bttn__modal btn btn-outline-danger rounded-pill px-5 ">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-6 col-lg-3 d-block d-lg-none order-1 order-lg-2 px-0">
            <button type="button" class="custom-bttn  mr-0 mr-lg-2 rounded  float-right px-3"  data-toggle="modal" data-target="#enter_site" >
            <i class="fas fa-sign-in-alt"></i>  Вход
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="mobile-nav row-cols-5 d-flex d-md-none w-100 bg-light align-items-center">
      <div class="col d-flex flex-column justify-content-center border-right">
        <img src="/storage/theme/icons/home.svg" alt="">
      </div>
      <div class="col d-flex justify-content-center border-right align-items-center">
        <img src="/storage/theme/icons/favourite-mob.svg" alt="">
      </div>
      <div class="col d-flex justify-content-center border-right add-good">
        <img src="/storage/theme/icons/plus.svg" alt="">
      </div>
      <div class="col d-flex justify-content-center align-items-center">
        <img src="/storage/theme/icons/orderes-mob.svg" alt="">
      </div>
      <div class="col d-flex justify-content-center border-left align-items-center">
        <img src="/storage/theme/icons/store-mob.svg" alt="">
      </div>
    </div>
  </header>
@endsection