@section('header')
<header class="d-block" style="font-family: 'Montserrat', sans-serif;">
    <div class="container-fluid bg-white px-0">
      <div class="d-none d-md-block" style="background:url({{ Storage::url($header_banner->image ?? '') }}); height:80px; background-position:center;"></div>
      <div class="container">
        <div class="row py-3 px-3 px-lg-0">
          <div class="col-6 col-md-6 col-lg-2 px-0 order-1 order-lg-0">
            <a class="logo" href="{{ route('home') }}"><img src="/storage/theme/logo_fason.svg" alt="fason" width="120"></a>
          </div>
          <div class="col-md-12 col-lg-10 px-0 align-self-center order-2 order-lg-1">
            <div class="search-nav d-flex align-self-center align-items-center justify-content-between position-relative">
              <form class="form-inline my-2 my-lg-0 d-flex justify-content-center justify-content-lg-end w-100">
                <div class="position-relative w-75 mobile-header">
                  <input  class="form-control main-search pl-5 pl-lg-3" type="search" placeholder="поиск товаров ..." aria-label="Search">
                  <div class="search-result shadow-lg rounded ">

                  </div>
                </div>
                <button class="btn-danger rounded-11  border-0 px-2 nav-link btn mx-2 search-btn" type="submit">
                  <i class="fas fa-search d-none d-lg-inline-block"></i><i class="fas fa-search d-inline-block text-pinky d-lg-none"></i> <span class="d-none d-lg-inline-block">Поиск</span></button>
              </form>
                <!-- Button trigger modal -->
              <button class="btn-danger rounded-11  border-0 nav-link btn d-flex align-items-center filter-btn" data-toggle="modal" data-target="#filter_for_subject" type="submit">
                <i class="fas fa-filter d-none d-lg-inline-block"></i> <i class="fas fa-filter d-block d-lg-none text-pinky"></i> <span class="d-none d-lg-inline-block"> Фильтр</span>
              </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="filter_for_subject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h6 class="modal-title ml-4 font-weight-bold">Фильтр</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"><img src="/storage/theme/icons/close icon.svg" alt=""></span>
                    </button>
                  </div>
                  <div class="modal-body mx-4">
                    <div class="row">
                      {{-- <div class="col-md-6 col-lg-4 line-test__category fix_modal-line">
                        <div class="d-flex justify-content-between align-items-center mt-4">
                          <h5 class="captions-of__modal ">Категории</h5><img src="/storage/theme/icons/delete.svg" alt="delete_ctg">
                        </div>
                        <div class="categories__modal overflow-auto">
                          <div class="form-check mt-3">
                            @forelse ($categories as $category)
                            <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="cats-{{$category->id}}">
                            <label class="sort-checkbox__category form-check-label" for="cats-{{$category->id}}">
                              {{ $category->name }}
                            </label>
                            @empty
                              Извените ничего не найдено
                          @endforelse

                          </div>
                        </div>

                      </div> --}}

                      <div class="col-md-6 col-lg-4 line-test__category fix_modal-line">
                        <div class="d-flex justify-content-between align-items-center mt-4">
                          <h5 class="captions-of__modal ">Сортировать</h5>
                        </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1" checked>Сначала новые</label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Сначала дешевые</label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Сначала дорогие</label>
                          </div>
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
                       <h5 class="captions-of__modal mt-5">Цена</h5>
                       <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="from-price">от</label>
                          <input type="number" placeholder="0" class="form-control" id="from-price">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="untill-price">до</label>
                          <input type="number" placeholder="99999" class="form-control" id="untill-price">
                        </div>
                      </div>
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

          @guest
            <div class="col-6 col-md-6 col-lg-3 d-block d-lg-none order-1 order-lg-2 px-0">
              <button type="button" class="mr-0 mr-lg-2 btn btn-danger rounded-11 float-right px-3"  data-toggle="modal" data-target="#enter_site" >
              <i class="fas fa-sign-in-alt"></i>  Вход
              </button>
            </div>
          @endguest
          @auth
          <div class="col-6 col-md-6 col-lg-3 d-block d-lg-none order-1 order-lg-2 px-0 dropdown text-right">
            <a class="text-decoration-none text-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownProfileLink"> 
              <img class="rounded-circle" src="{{ Auth::user()->profile_photo_path ?? 'storage/theme/no-photo.svg' }}" alt="">
              <span class="text-small mr-2">{{ Auth::user()->phone }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownProfileLink">
              <a class="dropdown-item" href="#">Профиль</a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                @csrf

                <button type="submit" class="btn btn-outline-dark border-0 px-0">
                  <i class="fas fa-sign-out-alt"></i> Выход
                </button>
              </form>
            </div>
          </div>
          @endauth
        </div>
      </div>
    </div>
    <div class="mobile-nav row m-0 d-flex d-md-none w-100 bg-light align-items-center">
      <div class="col border-right text-center">
        <a href="{{ route('home') }}" class="text-decoration-none d-flex flex-column pt-2">
          <img src="/storage/theme/icons/home.svg" alt="">
          <span class="mobile-nav--title">Главная</span>
        </a>
      </div>
      <div class="col border-right text-center">
        <a href="{{ route('favorite.index') }}" class="text-decoration-none  d-flex flex-column pt-2">
          <img src="/storage/theme/icons/favourite-mob.svg" alt="">
          <span class="mobile-nav--title">Сохраненные</span>
        </a>
      </div>
      @if ($is_store != null)
        @auth
        <div class="col border-right add-good  text-center">
          <a href="" class="text-decoration-none  d-flex flex-column pt-2">
            <img src="/storage/theme/icons/plus.svg" alt="">
            <span class="mobile-nav--title">Добавить</span>
          </a>
        </div>
        @endauth
      @endif
      <div class="col text-center">
        <a href="{{ route('ft-order.orders') }}" class="text-decoration-none d-flex flex-column pt-2">
          <img src="/storage/theme/icons/orderes-mob.svg" alt="">
          <span class="mobile-nav--title">Заказы</span>
        </a>
      </div>
      @if ($is_store == null)
        @auth
        <div class="col border-left text-center">
          <a href="{{ route('ft-store.create') }}" class="text-decoration-none  d-flex flex-column pt-2">
            <i class="fas fa-door-open"></i>
            <span class="mobile-nav--title">Магазин</span>
          </a>
        </div>
        @endauth
        @guest
        <div class="col border-left text-center">
          <a href="" data-toggle="modal" data-target="#enter_site" class="text-decoration-none  d-flex flex-column pt-2">
            <img src="/storage/theme/icons/store-mob.svg" alt="">
            <span class="mobile-nav--title">
              Магазин</span>
            </a>
        </div>
        @endguest
      @else
      <div class="col border-left text-center">
        <a href="{{ route('ft-store.show', $is_store->slug) }}" class="text-decoration-none d-flex flex-column pt-2">
          <img src="/storage/theme/icons/store-mob.svg" alt="">
          <span class="mobile-nav--title">Магазин</span>
        </a>
      </div>
      @endif

    </div>
  </header>
@endsection
