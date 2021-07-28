@section('aside')



      <!-- NAVIGATION
      ================================================== -->

      <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
        <div class="container-fluid">

          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Brand -->

          <a class="navbar-brand text-left" href="{{ route('home') }}">
            <img src="/storage/theme/logo_fason.svg" class="navbar-brand-img" alt="...">

          </a>


          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidebarCollapse">


            <!-- Navigation -->
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? ' active' : '' }}" href="{{ route('dashboard.name') }}">
                  <i class="fe fe-home"></i> Главная
                </a>
              </li>

              @permission('read-categories')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/categories*') || request()->is('dashboard/categories/actives*') || request()->is('dashboard/categories/inactives*') ? ' active' : '' }}" href="{{ route('categories.index') }}">
                    <i class="fe fe-layers"></i> Категории
                  </a>
                </li>
              @endpermission

              @permission('read-products')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/products*') ? ' active' : '' }}" href="{{ route('products.index') }}">
                    <i class="fe fe-grid"></i> Товары @if($newProductsDashboard > 0)<span class="badge badge-soft-success ml-2">{{ $newProductsDashboard }} @endif</span>
                  </a>
                </li>
              @endpermission

              @permission('read-products')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/attributes*') || request()->is('dashboard/attribute*') ? ' active' : '' }}" href="{{ route('attributes.index') }}" href="{{ route('attributes.index') }}">
                    <i class="fe fe-git-branch"></i> Аттрибуты
                  </a>
                </li>
              @endpermission


              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/cities*') ? ' active' : '' }}" href="{{ route('cities.index') }}" href="{{ route('cities.index') }}">
                  <i class="fe fe-map-pin"></i> Города
                </a>
              </li>

              @permission('read-orders')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/orders*') ? ' active' : '' }}" href="{{ route('orders.index') }}">
                    <i class="fe fe-shopping-bag"></i> Заказы @if($newOrders > 0)<span class="badge badge-soft-success ml-2">{{ $newOrders }} @endif
                  </a>
                </li>
              @endpermission


              @permission('read-employee')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/users*') && (isset($user) && $user->status == 1) ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <i class="fe fe-users"></i> Пользователи
                  </a>
                </li>
              @endpermission


              @permission('read-stores')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/stores*') ? ' active' : '' }}" href="{{ route('stores.index') }}">
                    <i class="fe fe-shopping-cart"></i> Магазины @if($newStores > 0)<span class="badge badge-soft-success ml-2">{{ $newStores }} @endif
                  </a>
                </li>
              @endpermission


              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/clients*') || (isset($user) && $user->status == 2) ? 'active' : '' }}" href="{{ route('clients.index') }}">
                  <i class="fe fe-briefcase"></i> Клиенты
                </a>
              </li>

              @permission('read-banners')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/sliders*') || request()->is('dashboard/banners*') ? '' : 'collapsed' }}" href="#sidebarBasics" data-toggle="collapse" role="button" aria-expanded="{{ request()->is('dashboard/sliders*') || request()->is('dashboard/banners*') ? 'true' : 'false' }}" aria-controls="sidebarBasics">
                    <i class="fe fe-clipboard"></i> Баннера
                  </a>
                  <div class="collapse {{ request()->is('dashboard/sliders*') || request()->is('dashboard/banners*') ? 'show' : '' }}" id="sidebarBasics">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item ">
                        <a href="{{ route('banners.sliders') }}" class="nav-link {{ request()->is('dashboard/sliders*') ? 'active' : '' }}">
                          Слайдер
                        </a>
                      </li>
                      <li class="nav-item ">
                        <a href="{{ route('banners.index') }}" class="nav-link {{ request()->is('dashboard/banners*') ? 'active' : '' }}">
                          Баннера
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              @endpermission


              @permission('read-monitization')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/monetizations*') ? ' active' : '' }}" href="{{ route('monetizations.index') }}">
                    <i class="fe fe-dollar-sign"></i> Монетизации
                  </a>
                </li>
              @endpermission

              @permission('read-roles')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/roles*') ? ' active' : '' }}" href="{{ route('roles.index') }}">
                    <i class="fe fe-lock"></i> Роли
                  </a>
                </li>
              @endpermission


              @permission('read-logs')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard/logs*') ? ' active' : '' }}" href="{{ route('logs') }}">
                    <i class="fe fe-clock"></i> Логи
                  </a>
                </li>
              @endpermission
            </ul>

            <!-- Push content down -->
            <div class="mt-auto"></div>

            <!-- User (md) -->
            <div class="navbar-user d-none d-md-flex" id="sidebarUser">

              <!-- Dropup -->
              <div class="dropup">

                <!-- Toggle -->
                <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-sm avatar-online">
                    <img src="/storage/{{ Auth::user()->profile_photo_path ?? 'theme/no-photo.svg' }}" class="avatar-img rounded-circle" alt="...">
                  </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                  <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                    @csrf
                    <button type="submit" class="dropdown-item border-0 px-0">
                      Выход
                    </button>
                  </form>
                </div>

              </div>

            </div>

          </div> <!-- / .navbar-collapse -->

        </div>
    </nav>
@endsection
