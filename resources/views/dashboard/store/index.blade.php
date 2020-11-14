@extends('dashboard.layouts.app')
@section('title', 'Магазины')
@extends('dashboard.layouts.aside')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">

        <!-- Header -->
        <div class="header">
          <div class="header-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Overview
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                  Companies
                </h1>

              </div>
              <div class="col-auto">

                <!-- Navigation (button group) -->
                <div class="nav btn-group d-inline-flex" role="tablist">
                  <button class="btn btn-white active" id="companiesListTab" data-toggle="tab" data-target="#companiesListPane" role="tab" aria-controls="companiesListPane" aria-selected="true">
                    <span class="fe fe-list"></span>
                  </button>
                  <button class="btn btn-white" id="companiesCardsTab" data-toggle="tab" data-target="#companiesCardsPane" role="tab" aria-controls="companiesCardsPane" aria-selected="false">
                    <span class="fe fe-grid"></span>
                  </button>
                </div> <!-- / .nav -->

                <!-- Buttons -->
                <a href="{{ route('store.create') }}" class="btn btn-primary ml-2">
                  Добавить магазин
                </a>

              </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap active">
                      All companies <span class="badge badge-pill badge-soft-secondary">627</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Your companies <span class="badge badge-pill badge-soft-secondary">198</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Deleted <span class="badge badge-pill badge-soft-secondary">29</span>
                    </a>
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </div>

        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="companiesListPane" role="tabpanel" aria-labelledby="companiesListTab">

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-name", "item-industry", "item-location", "item-owner", "item-created"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="companiesList">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Form -->
                    <form>
                      <div class="input-group input-group-flush">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fe fe-search"></i>
                          </span>
                        </div>
                        <input class="list-search form-control" type="search" placeholder="Search">
                      </div>
                    </form>

                  </div>
                  <div class="col-auto mr-n3">

                    <!-- Select -->
                    <form>
                      <select class="custom-select custom-select-sm form-control-flush" data-toggle="select" data-options='{"minimumResultsForSearch": -1}'>
                        <option value="5" selected>5 per page</option>
                        <option value="10">10 per page</option>
                        <option value="*">All</option>
                      </select>
                    </form>

                  </div>
                  <div class="col-auto">

                    <!-- Dropdown -->
                    <div class="dropdown">

                      <!-- Toggle -->
                      <button class="btn btn-sm btn-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-sliders mr-1"></i> Filter <span class="badge badge-primary ml-1">1</span>
                      </button>

                      <!-- Menu -->
                      <form class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                        <div class="card-header">

                          <!-- Title -->
                          <h4 class="card-header-title">
                            Filters
                          </h4>

                          <!-- Link -->
                          <button class="btn btn-sm btn-link text-reset" type="reset">
                            <small>Clear filters</small>
                          </button>

                        </div>
                        <div class="card-body">

                          <!-- List group -->
                          <div class="list-group list-group-flush mt-n4 mb-4">
                            <div class="list-group-item">
                              <div class="row">
                                <div class="col">

                                  <!-- Text -->
                                  <small>Title</small>

                                </div>
                                <div class="col-auto">

                                  <!-- Select -->
                                  <select class="custom-select custom-select-sm" name="item-title" data-toggle="select" data-options='{"minimumResultsForSearch": -1}'>
                                    <option value="*">Any</option>
                                    <option value="Designer" selected>Designer</option>
                                    <option value="Developer">Developer</option>
                                    <option value="Owner">Owner</option>
                                    <option value="Founder">Founder</option>
                                  </select>

                                </div>
                              </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                              <div class="row">
                                <div class="col">

                                  <!-- Text -->
                                  <small>Lead scrore</small>

                                </div>
                                <div class="col-auto">

                                  <!-- Select -->
                                  <select class="custom-select custom-select-sm" name="item-score" data-toggle="select" data-options='{"minimumResultsForSearch": -1}'>
                                    <option value="*" selected>Any</option>
                                    <option value="1/10">1+</option>
                                    <option value="2/10">2+</option>
                                    <option value="3/10">3+</option>
                                    <option value="4/10">4+</option>
                                    <option value="5/10">5+</option>
                                    <option value="6/10">6+</option>
                                    <option value="7/10">7+</option>
                                    <option value="8/10">8+</option>
                                    <option value="9/10">9+</option>
                                    <option value="10/10">10</option>
                                  </select>

                                </div>
                              </div> <!-- / .row -->
                            </div>
                          </div>

                          <!-- Button -->
                          <button class="btn btn-block btn-primary" type="submit">
                            Apply filter
                          </button>

                        </div>
                      </form>

                    </div>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox-all custom-control-input" id="listCheckboxAll">
                          <label class="custom-control-label" for="listCheckboxAll"></label>
                        </div>

                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-name" href="#">Name</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-industry" href="#">Industry</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-location" href="#">Location</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-owner" href="#">Owner</a>
                      </th>
                      <th colspan="2">
                        <a class="list-sort text-muted" data-sort="item-created" href="#">Created at</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list font-size-base">
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxOne">
                          <label class="custom-control-label" for="listCheckboxOne"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-1.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Launchday</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Web design</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">Los Angeles, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Dianna Smiley</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-01-14">Jan 14, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxTwo">
                          <label class="custom-control-label" for="listCheckboxTwo"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-2.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Medium Corporation</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Publishing</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Ab Hadley</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-03-22">Mar 22, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxThree">
                          <label class="custom-control-label" for="listCheckboxThree"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-3.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Lyft</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Transportation</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Adolfo Hess</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-04-01">Apr 01, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxFour">
                          <label class="custom-control-label" for="listCheckboxFour"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-4.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">PayPal</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Finance</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Jose, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-4.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Daniela Dewitt</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-05-09">May 09, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxFive">
                          <label class="custom-control-label" for="listCheckboxFive"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-5.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Dropbox Inc.</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">File hosting</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-5.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-06-16">Jun 16, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxSix">
                          <label class="custom-control-label" for="listCheckboxSix"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-6.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Squarespace</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Hosting</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">New York City</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-6.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Ryu Duke</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-08-22">Aug 22, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxSeven">
                          <label class="custom-control-label" for="listCheckboxSeven"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-7.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Github</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Hosting</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">Redmond, WA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-7.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Glen Rouse</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-03-05">Mar 05, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxEight">
                          <label class="custom-control-label" for="listCheckboxEight"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-8.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Slack</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Messaging</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-5.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-04-30">Apr 30, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxNine">
                          <label class="custom-control-label" for="listCheckboxNine"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-1.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Launchday</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Web design</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">Los Angeles, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Dianna Smiley</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-01-14">Jan 14, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxTen">
                          <label class="custom-control-label" for="listCheckboxTen"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-2.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Medium Corporation</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Publishing</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Ab Hadley</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-03-22">Mar 22, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxEleven">
                          <label class="custom-control-label" for="listCheckboxEleven"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-3.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Lyft</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Transportation</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Adolfo Hess</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-04-01">Apr 01, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxTwelve">
                          <label class="custom-control-label" for="listCheckboxTwelve"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-4.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">PayPal</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Finance</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Jose, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-4.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Daniela Dewitt</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-05-09">May 09, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxThirteen">
                          <label class="custom-control-label" for="listCheckboxThirteen"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-5.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Dropbox Inc.</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">File hosting</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-5.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-06-16">Jun 16, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxFourteen">
                          <label class="custom-control-label" for="listCheckboxFourteen"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-6.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Squarespace</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Hosting</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">New York City</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-6.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Ryu Duke</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-08-22">Aug 22, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxFifteen">
                          <label class="custom-control-label" for="listCheckboxFifteen"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-7.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Github</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Hosting</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">Redmond, WA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-7.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Glen Rouse</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-03-05">Mar 05, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxSixteen">
                          <label class="custom-control-label" for="listCheckboxSixteen"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-8.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Slack</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Messaging</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-5.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-04-30">Apr 30, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxSeventeen">
                          <label class="custom-control-label" for="listCheckboxSeventeen"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-1.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Launchday</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Web design</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">Los Angeles, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Dianna Smiley</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-01-14">Jan 14, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxEighteen">
                          <label class="custom-control-label" for="listCheckboxEighteen"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-2.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Medium Corporation</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Publishing</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Ab Hadley</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-03-22">Mar 22, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxNineteen">
                          <label class="custom-control-label" for="listCheckboxNineteen"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-3.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Lyft</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Transportation</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Adolfo Hess</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-04-01">Apr 01, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxTwenty">
                          <label class="custom-control-label" for="listCheckboxTwenty"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-4.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">PayPal</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Finance</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Jose, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-4.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Daniela Dewitt</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-05-09">May 09, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxTwentyOne">
                          <label class="custom-control-label" for="listCheckboxTwentyOne"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-5.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Dropbox Inc.</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">File hosting</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-5.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-06-16">Jun 16, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxTwentyTwo">
                          <label class="custom-control-label" for="listCheckboxTwentyTwo"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-6.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Squarespace</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Hosting</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">New York City</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-6.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Ryu Duke</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-08-22">Aug 22, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxTwentyThree">
                          <label class="custom-control-label" for="listCheckboxTwentyThree"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-7.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Github</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Hosting</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">Redmond, WA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-7.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Glen Rouse</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-03-05">Mar 05, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" id="listCheckboxTwentyFour">
                          <label class="custom-control-label" for="listCheckboxTwentyFour"></label>
                        </div>

                      </td>
                      <td>

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/teams/team-logo-8.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="team-overview.html">Slack</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-industry">Messaging</span>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-location">San Francisco, CA</span>

                      </td>
                      <td class="item-phone">

                        <!-- Avatar -->
                        <div class="avatar avatar-xs align-middle mr-2">
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-5.jpg" alt="...">
                        </div> <a class="item-owner text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <time class="item-created" datetime="2020-04-30">Apr 30, 2020</time>

                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a class="dropdown-ellipses dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex justify-content-between">

                <!-- Pagination (prev) -->
                <ul class="list-pagination-prev pagination pagination-tabs card-pagination">
                  <li class="page-item">
                    <a class="page-link pl-0 pr-4 border-right" href="#">
                      <i class="fe fe-arrow-left mr-1"></i> Prev
                    </a>
                  </li>
                </ul>

                <!-- Pagination -->
                <ul class="list-pagination pagination pagination-tabs card-pagination"></ul>

                <!-- Pagination (next) -->
                <ul class="list-pagination-next pagination pagination-tabs card-pagination">
                  <li class="page-item">
                    <a class="page-link pl-4 pr-0 border-left" href="#">
                      Next <i class="fe fe-arrow-right ml-1"></i>
                    </a>
                  </li>
                </ul>

                <!-- Alert -->
                <div class="list-alert alert alert-dark alert-dismissible border fade" role="alert">

                  <!-- Content -->
                  <div class="row align-items-center">
                    <div class="col">

                      <!-- Checkbox -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cardAlertCheckbox" checked disabled>
                        <label class="custom-control-label text-white" for="cardAlertCheckbox"><span class="list-alert-count">0</span> deal(s)</label>
                      </div>

                    </div>
                    <div class="col-auto mr-n3">

                      <!-- Button -->
                      <button class="btn btn-sm btn-white-20">
                        Edit
                      </button>

                      <!-- Button -->
                      <button class="btn btn-sm btn-white-20">
                        Delete
                      </button>

                    </div>
                  </div> <!-- / .row -->

                  <!-- Close -->
                  <button type="button" class="list-alert-close close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>

                </div>

              </div>
            </div>

          </div>
          <div class="tab-pane fade" id="companiesCardsPane" role="tabpanel" aria-labelledby="companiesCardsTab">

            <!-- Cards -->
            <div data-list='{"valueNames": ["item-name", "item-industry", "item-location", "item-owner", "item-created"], "page": 9, "pagination": {"paginationClass": "list-pagination"}}' id="companiesCards">

              <!-- Header -->
              <div class="row align-items-center mb-4">
                <div class="col">

                  <!-- Form -->
                  <form>
                    <div class="input-group input-group-lg input-group-merge">
                      <input class="list-search form-control form-control-prepended" type="search" placeholder="Search">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <span class="fe fe-search"></span>
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
                <div class="col-auto mr-n3">

                  <!-- Select -->
                  <form>
                    <select class="custom-select custom-select-sm form-control-flush" data-toggle="select" data-options='{"minimumResultsForSearch": -1}'>
                      <option value="1" selected>9 per page</option>
                      <option value="5">All</option>
                    </select>
                  </form>

                </div>
                <div class="col-auto">

                  <!-- Dropdown -->
                  <div class="dropdown">

                    <!-- Toggle -->
                    <button class="btn btn-sm btn-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fe fe-sliders mr-1"></i> Filter <span class="badge badge-primary ml-1">1</span>
                    </button>

                    <!-- Menu -->
                    <form class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                      <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                          Filters
                        </h4>

                        <!-- Link -->
                        <button class="btn btn-sm btn-link text-reset" type="reset">
                          <small>Clear filters</small>
                        </button>

                      </div>
                      <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush mt-n4 mb-4">
                          <div class="list-group-item">
                            <div class="row">
                              <div class="col">

                                <!-- Text -->
                                <small>Title</small>

                              </div>
                              <div class="col-auto">

                                <!-- Select -->
                                <select class="custom-select custom-select-sm" name="item-title" data-toggle="select" data-options='{"minimumResultsForSearch": -1}'>
                                  <option value="*">Any</option>
                                  <option value="Designer" selected>Designer</option>
                                  <option value="Developer">Developer</option>
                                  <option value="Owner">Owner</option>
                                  <option value="Founder">Founder</option>
                                </select>

                              </div>
                            </div> <!-- / .row -->
                          </div>
                          <div class="list-group-item">
                            <div class="row">
                              <div class="col">

                                <!-- Text -->
                                <small>Lead scrore</small>

                              </div>
                              <div class="col-auto">

                                <!-- Select -->
                                <select class="custom-select custom-select-sm" name="item-score" data-toggle="select" data-options='{"minimumResultsForSearch": -1}'>
                                  <option value="*" selected>Any</option>
                                  <option value="1/10">1+</option>
                                  <option value="2/10">2+</option>
                                  <option value="3/10">3+</option>
                                  <option value="4/10">4+</option>
                                  <option value="5/10">5+</option>
                                  <option value="6/10">6+</option>
                                  <option value="7/10">7+</option>
                                  <option value="8/10">8+</option>
                                  <option value="9/10">9+</option>
                                  <option value="10/10">10</option>
                                </select>

                              </div>
                            </div> <!-- / .row -->
                          </div>
                        </div>

                        <!-- Button -->
                        <button class="btn btn-block btn-primary" type="submit">
                          Apply filter
                        </button>

                      </div>
                    </form>

                  </div>

                </div>
              </div> <!-- / .row -->

              <!-- Body -->
              <div class="list row">
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxOne">
                            <label class="custom-control-label" for="cardsCheckboxOne"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-1.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Launchday</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Launchday is a SaaS website builder with a focus on quality, easy to build product sites.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Dianna Smiley</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Web design</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxTwo">
                            <label class="custom-control-label" for="cardsCheckboxTwo"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-2.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Medium Corporation</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Medium is an online publishing platform developed by Evan Williams, and launched in August 2012.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Ab Hadley</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Publishing</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxThree">
                            <label class="custom-control-label" for="cardsCheckboxThree"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-3.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Lyft</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Lyft is an on-demand transportation company based in San Francisco, California.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Adolfo Hess</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Transportation</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxFour">
                            <label class="custom-control-label" for="cardsCheckboxFour"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-4.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">PayPal</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          PayPal is a worldwide online payments system that supports online money transfers and services.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Daniela Dewitt</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Finance</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxFive">
                            <label class="custom-control-label" for="cardsCheckboxFive"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-5.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Dropbox Inc.</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Dropbox is a file hosting service that offers cloud storage, file synchronization, a personal cloud.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Miyah Myles</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">File hosting</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxSix">
                            <label class="custom-control-label" for="cardsCheckboxSix"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-6.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Squarespace</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Squarespace provides software as a service for website building and hosting. Headquartered in NYC.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Ryu Duke</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Hosting</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxSeven">
                            <label class="custom-control-label" for="cardsCheckboxSeven"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-7.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Github</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          GitHub is a web-based hosting service for version control of code using Git.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Glen Rouse</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Hosting</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxEight">
                            <label class="custom-control-label" for="cardsCheckboxEight"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-8.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Slack</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Slack is a cloud-based set of team collaboration tools and services, founded by Stewart Butterfield.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Messaging</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Miyah Myles</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Messaging</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxNine">
                            <label class="custom-control-label" for="cardsCheckboxNine"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-1.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Launchday</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Launchday is a SaaS website builder with a focus on quality, easy to build product sites.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Dianna Smiley</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Web design</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxTen">
                            <label class="custom-control-label" for="cardsCheckboxTen"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-2.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Medium Corporation</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Medium is an online publishing platform developed by Evan Williams, and launched in August 2012.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Ab Hadley</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Publishing</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxEleven">
                            <label class="custom-control-label" for="cardsCheckboxEleven"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-3.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Lyft</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Lyft is an on-demand transportation company based in San Francisco, California.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Adolfo Hess</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Transportation</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxTwelve">
                            <label class="custom-control-label" for="cardsCheckboxTwelve"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-4.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">PayPal</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          PayPal is a worldwide online payments system that supports online money transfers and services.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Daniela Dewitt</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Finance</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxThirteen">
                            <label class="custom-control-label" for="cardsCheckboxThirteen"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-5.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Dropbox Inc.</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Dropbox is a file hosting service that offers cloud storage, file synchronization, a personal cloud.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Miyah Myles</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">File hosting</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxFourteen">
                            <label class="custom-control-label" for="cardsCheckboxFourteen"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-6.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Squarespace</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Squarespace provides software as a service for website building and hosting. Headquartered in NYC.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Ryu Duke</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Hosting</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxFifteen">
                            <label class="custom-control-label" for="cardsCheckboxFifteen"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-7.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Github</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          GitHub is a web-based hosting service for version control of code using Git.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Contact</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Glen Rouse</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Hosting</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6 col-xl-4">

                  <!-- Card -->
                  <div class="card">
                    <div class="card-body">

                      <!-- Header -->
                      <div class="row align-items-center">
                        <div class="col">

                          <!-- Checkbox -->
                          <div class="custom-control custom-control-circle custom-checkbox">
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckboxSixteen">
                            <label class="custom-control-label" for="cardsCheckboxSixteen"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#!" class="dropdown-item">
                                Action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Another action
                              </a>
                              <a href="#!" class="dropdown-item">
                                Something else here
                              </a>
                            </div>
                          </div>

                        </div>
                      </div> <!-- / .row -->

                      <!-- Image -->
                      <a href="team-overview.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/teams/team-logo-8.jpg" class="avatar-img rounded" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="team-overview.html">Slack</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-0">
                          Slack is a cloud-based set of team collaboration tools and services, founded by Stewart Butterfield.
                        </p>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Messaging</small>

                            </div>
                            <div class="col-auto">

                              <!-- Link -->
                              <a href="profile-posts.html">
                                <small class="item-owner">Miyah Myles</small>
                              </a>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Industry</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small class="item-industry">Messaging</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div>

              <!-- Pagination -->
              <div class="row no-gutters">

                <!-- Pagination (prev) -->
                <ul class="col list-pagination-prev pagination pagination-tabs justify-content-start">
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fe fe-arrow-left mr-1"></i> Prev
                    </a>
                  </li>
                </ul>

                <!-- Pagination -->
                <ul class="col list-pagination pagination pagination-tabs justify-content-center"></ul>

                <!-- Pagination (next) -->
                <ul class="col list-pagination-next pagination pagination-tabs justify-content-end">
                  <li class="page-item">
                    <a class="page-link" href="#">
                      Next <i class="fe fe-arrow-right ml-1"></i>
                    </a>
                  </li>
                </ul>

              </div>

              <!-- Alert -->
              <div class="list-alert alert alert-dark alert-dismissible border fade" role="alert">

                <!-- Content -->
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Checkbox -->
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="listAlertCheckbox" checked disabled>
                      <label class="custom-control-label text-white" for="listAlertCheckbox"><span class="list-alert-count">0</span> deal(s)</label>
                    </div>

                  </div>
                  <div class="col-auto mr-n3">

                    <!-- Button -->
                    <button class="btn btn-sm btn-white-20">
                      Edit
                    </button>

                    <!-- Button -->
                    <button class="btn btn-sm btn-white-20">
                      Delete
                    </button>

                  </div>
                </div> <!-- / .row -->

                <!-- Close -->
                <button type="button" class="list-alert-close close" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>

              </div>

            </div>

          </div>
        </div>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection