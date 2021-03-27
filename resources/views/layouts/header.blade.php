@section('header')
<header class="d-block" style="font-family: 'Montserrat', sans-serif;">
    <div class="container-fluid bg-white px-0">
      @isset($header_banner)
        <div class="d-none d-md-block position-relative" style="background:url({{ Storage::url( $header_banner ? $header_banner->image : '') }}); {{ $header_banner ? 'height:80px; background-position:center;' : '' }}">
          <a href="{{ $header_banner ? $header_banner->url : '#' }}" class="stretched-link"></a>
        </div>
      @endisset
      <div class="container">
        <div class="row py-3 px-3 px-lg-0">
          <div class="col-6 col-md-6 col-lg-2 px-0 order-1 order-lg-0">
            <a class="logo" href="{{ route('home') }}"><img src="/storage/theme/logo_fason.svg" alt="fason" width="120"></a>
          </div>
          <div class="col-md-12 col-lg-10 px-0 align-self-center order-2 order-lg-1">
            <div class="search-nav d-flex align-self-center align-items-center justify-content-between position-relative">
              <form action="{{ route('search') }}" class="form-inline my-2 my-lg-0 d-flex justify-content-center justify-content-lg-end w-100">
                <div class="position-relative w-75 mobile-header">
                  <input  class="form-control main-search pl-5 pl-lg-3" name="q" required type="search" placeholder="поиск товаров ..." aria-label="Search">
                  <div class="search-result shadow-lg rounded ">

                  </div>
                </div>
                <button class="btn-danger rounded-11  border-0 px-2 nav-link btn mx-2 search-btn" type="submit">
                  <i class="fas fa-search d-none d-lg-inline-block"></i><i class="fas fa-search d-inline-block text-pinky d-lg-none"></i> <span class="d-none d-lg-inline-block">Поиск</span></button>
              </form>
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


                    </div>
                  </div>
                  <div class="modal-footer border-1 d-flex justify-content-end mt-1">
                    <button type="button" id="filter" class="change-bttn__modal btn btn-outline-danger rounded-pill px-5 ">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @guest
            <div class="col-6 col-md-6 col-lg-3 d-block d-lg-none order-1 order-lg-2 px-0">
              <button type="button" class="mr-0 mr-lg-2 btn btn-danger rounded-11 float-right px-3" data-toggle="modal" data-target="#enter_site">
                <i class="fas fa-sign-in-alt"></i>  Вход
              </button>
            </div>
          @endguest
          @auth
          <div class="col-6 col-md-6 col-lg-3 d-block d-lg-none order-1 order-lg-2 px-0 dropdown text-right">
            <a class="text-decoration-none text-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownProfileLink">
              <img class="rounded-circle mr-1" src="/storage/{{ Auth::user()->profile_photo_path ?? 'theme/no-photo.svg' }}" alt="" width="32" height="32">
              <span class="text-small mr-2">{{ Auth::user()->phone }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownProfileLink">
              <a class="dropdown-item" href="{{ route('profile') }}">Профиль</a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                @csrf
                <button type="submit" class="btn btn-link text-dark text-decoration-none border-0 px-0">
                  <i class="fas fa-sign-out-alt"></i> Выход
                </button>
              </form>
            </div>

          </div>
          @endauth
        </div>
      </div>
    </div>
    <div class="mobile-nav row m-0 d-flex d-lg-none w-100 bg-light align-items-center">
      <div class="col text-center px-0">
        <a href="{{ route('home') }}" class="text-decoration-none d-flex flex-column pt-2 align-items-center">
          <img src="/storage/theme/icons/home.svg" width="19">
          <span class="mobile-nav--title">Главная</span>
        </a>
      </div>
      @auth
      <div class="col text-center px-0">
        <a href="{{ route('favorite.index') }}" class="text-decoration-none  d-flex flex-column pt-2 align-items-center">
          <img src="/storage/theme/icons/favourite-mob.svg" width="19">
          <span class="mobile-nav--title">Сохраненные</span>
        </a>
      </div>
      @endauth
      @guest
      <div class="col text-center px-0">
        <a data-toggle="modal" data-target="#enter_site" class="text-decoration-none  d-flex flex-column pt-2 align-items-center">
          <img src="/storage/theme/icons/favourite-mob.svg" width="19">
          <span class="mobile-nav--title">Сохраненные</span>
        </a>
      </div>
      @endguest

      @auth
        @if ($is_store != null)
          <div class="col add-good text-center position-relative px-0">
            <a href="{{ $is_store == null ? route('ft-store.create') : route('ft_product.add_product') }}" class="text-decoration-none d-flex flex-column pt-2 align-items-center">
              <img class="add-icon " src="/storage/theme/icons/plus.svg">
              <span class="mobile-nav--title mt-3">Добавить</span>
            </a>
          </div>
        @endif
      @endauth

      @auth
      <div class="col text-center px-0">
        <a href="{{ route('ft-order.orders') }}" class="text-decoration-none d-flex flex-column pt-2 align-items-center">
        @isset($is_store->orders)
            @if ($is_store->orders->where('order_status_id', 1)->count() > 0)
                <sub class="h6 bg-danger rounded-circle m-0 float-right ml-3 mt-n3 text-white px-1">{{ $is_store->orders->where('order_status_id', 1)->count() }}</sub>
            @endif
        @endisset
        <img src="/storage/theme/icons/orderes-mob.svg" width="19">
        <span class="mobile-nav--title">Заказы</span>
        </a>
      </div>
      @endauth
      @guest
      <div class="col text-center px-0">
        <a data-toggle="modal" data-target="#enter_site" class="text-decoration-none d-flex flex-column pt-2 align-items-center">
        @isset($is_store->orders)
            @if ($is_store->orders->where('order_status_id', 1)->count() > 0)
                <sub class="h6 bg-danger rounded-circle m-0 float-right ml-3 mt-n3 text-white px-1">{{ $is_store->orders->where('order_status_id', 1)->count() }}</sub>
            @endif
        @endisset
        <img src="/storage/theme/icons/orderes-mob.svg" width="19">
        <span class="mobile-nav--title">Заказы</span>
        </a>
      </div>
      @endguest
      @if ($is_store == null)
        @auth
        <div class="col text-center px-0">
          <a href="{{ route('ft-store.create') }}" class="text-decoration-none  d-flex flex-column pt-2 align-items-center">
            <i class="fas fa-door-open text-pinky" width="19"></i>
            <span class="mobile-nav--title text-pinky">Магазин</span>
          </a>
        </div>
        @endauth
        @guest
        <div class="col text-center px-0">
          <a href="" data-toggle="modal" data-target="#enter_site" class="text-decoration-none  d-flex flex-column pt-2 align-items-center">
            <img src="/storage/theme/icons/opened-exit-door.svg" width="19">
            <span class="mobile-nav--title">
              Магазин</span>
            </a>
        </div>
        @endguest
      @else
      <div class="col text-center px-0">
        <a href="{{ route('ft-store.show', $is_store->slug) }}" class="text-decoration-none d-flex flex-column pt-2 align-items-center">
          <img src="/storage/theme/icons/store-mob.svg" width="19">
          <span class="mobile-nav--title">Магазин</span>
        </a>
      </div>
      @endif

    </div>
  </header>
@endsection
