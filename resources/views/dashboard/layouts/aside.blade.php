@section('aside')

    <!-- MODALS
    ================================================== -->



    <!-- Modal: Search -->
    <div class="modal fade" id="sidebarModalSearch" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-vertical" role="document">
          <div class="modal-content">
            <div class="modal-body" data-list='{"valueNames": ["name"]}'>

              <!-- Form -->
              <form class="mb-4">
                <div class="input-group input-group-merge input-group-rounded">

                  <!-- Input -->
                  <input type="search" class="form-control form-control-prepended list-search" placeholder="Search">

                  <!-- Prepend -->
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fe fe-search"></span>
                    </div>
                  </div>

                </div>
              </form>

              <!-- List group -->
              <div class="my-n3">
                <div class="list-group list-group-flush list-group-focus list">
                  <a class="list-group-item" href="./team-overview.html">
                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="/assets/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Title -->
                        <h4 class="text-body text-focus mb-1 name">
                          Airbnb
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->
                  </a>
                  <a class="list-group-item" href="./team-overview.html">
                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="/assets/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Title -->
                        <h4 class="text-body text-focus mb-1 name">
                          Medium Corporation
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->
                  </a>
                  <a class="list-group-item" href="./project-overview.html">
                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-4by3">
                          <img src="/assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Title -->
                        <h4 class="text-body text-focus mb-1 name">
                          Homepage Redesign
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->
                  </a>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


      <!-- Modal: Activity -->
      <div class="modal fade" id="sidebarModalActivity" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-vertical" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <!-- Title -->
              <h4 class="modal-title">
                Notifications
              </h4>

              <!-- Navs -->
              <ul class="nav nav-tabs nav-tabs-sm modal-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#modalActivityAction">Action</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#modalActivityUser">User</a>
                </li>
              </ul>

            </div>
            <div class="modal-body">
              <div class="tab-content">
                <div class="tab-pane fade show active" id="modalActivityAction">

                  <!-- List group -->
                  <div class="list-group list-group-flush list-group-activity my-n3">
                    <a class="list-group-item text-reset" href="#!">
                      <div class="row">
                        <div class="col-auto">

                          <!-- Avatar -->
                          <div class="avatar avatar-sm">
                            <div class="avatar-title font-size-lg bg-primary-soft rounded-circle text-primary">
                              <i class="fe fe-mail"></i>
                            </div>
                          </div>

                        </div>
                        <div class="col ml-n2">

                          <!-- Heading -->
                          <h5 class="mb-1">
                            Launchday 1.4.0 update email sent
                          </h5>

                          <!-- Text -->
                          <p class="small text-gray-700 mb-0">
                            Sent to all 1,851 subscribers over a 24 hour period
                          </p>

                          <!-- Time -->
                          <small class="text-muted">
                            2m ago
                          </small>

                        </div>
                      </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                      <div class="row">
                        <div class="col-auto">

                          <!-- Avatar -->
                          <div class="avatar avatar-sm">
                            <div class="avatar-title font-size-lg bg-primary-soft rounded-circle text-primary">
                              <i class="fe fe-archive"></i>
                            </div>
                          </div>

                        </div>
                        <div class="col ml-n2">

                          <!-- Heading -->
                          <h5 class="mb-1">
                            New project "Goodkit" created
                          </h5>

                          <!-- Text -->
                          <p class="small text-gray-700 mb-0">
                            Looks like there might be a new theme soon.
                          </p>

                          <!-- Time -->
                          <small class="text-muted">
                            2h ago
                          </small>

                        </div>
                      </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                      <div class="row">
                        <div class="col-auto">

                          <!-- Avatar -->
                          <div class="avatar avatar-sm">
                            <div class="avatar-title font-size-lg bg-primary-soft rounded-circle text-primary">
                              <i class="fe fe-code"></i>
                            </div>
                          </div>

                        </div>
                        <div class="col ml-n2">

                          <!-- Heading -->
                          <h5 class="mb-1">
                            Dashkit 1.5.0 was deployed.
                          </h5>

                          <!-- Text -->
                          <p class="small text-gray-700 mb-0">
                            A successful to deploy to production was executed.
                          </p>

                          <!-- Time -->
                          <small class="text-muted">
                            2m ago
                          </small>

                        </div>
                      </div> <!-- / .row -->
                    </a>
                  </div>

                </div>
                <div class="tab-pane fade" id="modalActivityUser">

                  <!-- List group -->
                  <div class="list-group list-group-flush list-group-activity my-n3">
                    <a class="list-group-item text-reset" href="#!">
                      <div class="row">
                        <div class="col-auto">

                          <!-- Avatar -->
                          <div class="avatar avatar-sm avatar-online">
                            <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
                          </div>

                        </div>
                        <div class="col ml-n2">

                          <!-- Heading -->
                          <h5 class="mb-1">
                            Dianna Smiley
                          </h5>

                          <!-- Text -->
                          <p class="small text-gray-700 mb-0">
                            Uploaded the files "Launchday Logo" and "New Design".
                          </p>

                          <!-- Time -->
                          <small class="text-muted">
                            2m ago
                          </small>

                        </div>
                      </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item text-reset" href="#!">
                      <div class="row">
                        <div class="col-auto">

                          <!-- Avatar -->
                          <div class="avatar avatar-sm avatar-online">
                            <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
                          </div>

                        </div>
                        <div class="col ml-n2">

                          <!-- Heading -->
                          <h5 class="mb-1">
                            Ab Hadley
                          </h5>

                          <!-- Text -->
                          <p class="small text-gray-700 mb-0">
                            Shared the "Why Dashkit?" post with 124 subscribers.
                          </p>

                          <!-- Time -->
                          <small class="text-muted">
                            1h ago
                          </small>

                        </div>
                      </div> <!-- / .row -->
                    </a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- NAVIGATION
      ================================================== -->

      <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
        <div class="container-fluid">

          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Brand -->
          <a class="navbar-brand" href="{{ route('orders.index') }}">
            <img src="/assets/img/logo.svg" class="navbar-brand-img
            mx-auto" alt="...">
          </a>

          <!-- User (xs) -->
          <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

              <!-- Toggle -->
              <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                  <img src="/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                </div>
              </a>

              <!-- Menu -->
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                <a href="./profile-posts.html" class="dropdown-item">Profile</a>
                <a href="./account-general.html" class="dropdown-item">Settings</a>
                <hr class="dropdown-divider">
                <a href="./sign-in.html" class="dropdown-item">Logout</a>
              </div>

            </div>

          </div>

          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
              <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fe fe-search"></span>
                  </div>
                </div>
              </div>
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav">
              {{-- <li class="nav-item">
                <a class="nav-link  {{ request()->is('dashboard') ? ' active' : '' }}" href="{{ route('dashboard.name') }}">
                  <i class="fe fe-home"></i> Главная
                </a>
              </li> --}}

              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/categories') ? ' active' : '' }}" href="{{ route('categories.index') }}">
                  <i class="fe fe-layers"></i> Категории
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/products') ? ' active' : '' }}" href="{{ route('products.index') }}">
                  <i class="fe fe-grid"></i> Товары
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/attributes') ? ' active' : '' }}" href="{{ route('attributes.index') }}" href="{{ route('attributes.index') }}">
                  <i class="fe fe-git-branch"></i> Аттрибуты
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/orders*') ? ' active' : '' }}" href="{{ route('orders.index') }}">
                  <i class="fe fe-shopping-bag"></i> Заказы
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/users*') ? ' active' : '' }}" href="{{ route('users.index') }}">
                  <i class="fe fe-users"></i> Пользователи
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/stores*') ? ' active' : '' }}" href="{{ route('stores.index') }}">
                  <i class="fe fe-shopping-cart"></i> Магазин
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sidebarBasics" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBasics">
                  <i class="fe fe-clipboard"></i> Баннера
                </a>
                <div class="collapse " id="sidebarBasics">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item ">
                      <a href="{{ route('banners.sliders') }}" class="nav-link">
                        Слайдер
                      </a>
                    </li>
                    <li class="nav-item ">
                      <a href="{{ route('banners.index') }}" class="nav-link">
                        Баннера
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/monetizations*') ? ' active' : '' }}" href="{{ route('monetizations.index') }}">
                  <i class="fe fe-dollar-sign"></i> Монетизации
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/roles*') ? ' active' : '' }}" href="{{ route('roles.index') }}">
                  <i class="fe fe-dollar-sign"></i> Роли
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/logs*') ? ' active' : '' }}" href="{{ route('logs') }}">
                  <i class="fe fe-clock"></i> Логи
                </a>
              </li>
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
                    <img src="/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
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
