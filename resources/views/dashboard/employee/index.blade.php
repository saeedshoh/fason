@extends('dashboard.layouts.app')
@section('title', 'Сотрудники')
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
                  Contacts
                </h1>

              </div>
              <div class="col-auto">

                <!-- Navigation (button group) -->
                <div class="nav btn-group d-inline-flex" role="tablist">
                  <button class="btn btn-white active" id="contactsListTab" data-toggle="tab" data-target="#contactsListPane" role="tab" aria-controls="contactsListPane" aria-selected="true">
                    <span class="fe fe-list"></span>
                  </button>
                  <button class="btn btn-white" id="contactsCardsTab" data-toggle="tab" data-target="#contactsCardsPane" role="tab" aria-controls="contactsCardsPane" aria-selected="false">
                    <span class="fe fe-grid"></span>
                  </button>
                </div> <!-- / .nav -->

                <!-- Buttons -->
                <a href="#!" class="btn btn-primary ml-2">
                  Add contact
                </a>

              </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap active">
                      All contacts <span class="badge badge-pill badge-soft-secondary">823</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Your contacts <span class="badge badge-pill badge-soft-secondary">231</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Deleted <span class="badge badge-pill badge-soft-secondary">22</span>
                    </a>
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </div>

        <!-- Tab content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
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
                        <option value="5">5 per page</option>
                        <option value="10" selected>10 per page</option>
                        <option value="*">All</option>
                      </select>
                    </form>

                  </div>
                  <div class="col-auto">

                    <!-- Dropdown -->
                    <div class="dropdown">

                      <!-- Toggle -->
                      <button class="btn btn-sm btn-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-sliders mr-1"></i> Filter <span class="badge badge-primary ml-1 d-none">0</span>
                      </button>

                      <!-- Menu -->
                      <form class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                        <div class="card-header">

                          <!-- Title -->
                          <h4 class="card-header-title">
                            Filters
                          </h4>

                          <!-- Link -->
                          <button class="btn btn-sm btn-link text-reset d-none" type="reset">
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
                                    <option value="*" selected>Any</option>
                                    <option value="Designer">Designer</option>
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
                        <a class="list-sort text-muted" data-sort="item-title" href="#">Job title</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-email" href="#">Email</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-phone" href="#">Phone</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-score" href="#">Lead score</a>
                      </th>
                      <th colspan="2">
                        <a class="list-sort text-muted" data-sort="item-company" href="#">Company</a>
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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Dianna Smiley</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Designer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">diana.smiley@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-4890">(988) 568-3568</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-danger">1/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Twitter</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Ab Hadley</a>

                      </td>
                      <td class="">

                        <!-- Text -->
                        <span class="item-title">Developer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">ab.hadley@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(650) 430-9876</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-success">8/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Google</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Adolfo Hess</a>

                      </td>
                      <td class="">

                        <!-- Text -->
                        <span class="item-title">Owner</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">adolfo.hess@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(968) 682-1364</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-success">7/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Google</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-4.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Daniela Dewitt</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Designer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">daniela.dewitt@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-489">(650) 430-9876</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-warning">4/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Twitch</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-5.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Founder</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">miyah.myles@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(935) 165-8435</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-danger">3/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Facebook</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-6.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Ryu Duke</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Designer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">ryu.duke@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(937) 596-0152</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-warning">6/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Netflix</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-7.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Glen Rouse</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Designer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">glen.rouse@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(689) 798-4635</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-success">9/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Netflix</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Daniela Dewitt</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Developer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">daniela.dewitt@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(937) 568-8946</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-success">7/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Uber</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Adolfo Hess</a>

                      </td>
                      <td class="">

                        <!-- Text -->
                        <span class="item-title">Founder</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">adolfo.hess@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(568) 498-0365</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-success">10/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Amazon</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Glen Rouse</a>

                      </td>
                      <td class="">

                        <!-- Text -->
                        <span class="item-title">Owner</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">glen.rouse@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-67890">(968) 135-6458</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-warning">6/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Twitch</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-4.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Designer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">miyah.myles@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(650) 430-9876</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-success">8/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Twitter</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-5.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Dianna Smiley</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Developer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">dianna.smiley@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(968) 165-8790</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-warning">5/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Google</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-6.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Glen Rouse</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Owner</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">glen.rouse@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(937) 596-0152</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-danger">2/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Uber</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-7.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Adolfo Hess</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Designer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">adolfo.hess@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(689) 798-4635</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-warning">4/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Netflix</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-8.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Daniela Dewitt</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Owner</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">daniela.dewitt@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(365) 489-1365</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-success">9/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Uber</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Owner</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">miyah.myles@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-4890">(968) 165-8920</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-warning">5/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Twitch</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Glen Rouse</a>

                      </td>
                      <td class="">

                        <!-- Text -->
                        <span class="item-title">Designer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">glen.rouse@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(689) 263-4856</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-danger">3/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Facebook</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-3.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Ab Hadley</a>

                      </td>
                      <td class="">

                        <!-- Text -->
                        <span class="item-title">Founder</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">ab.hadley@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(346) 795-1685</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-success">9/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Lyft</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-4.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Daniela Dewitt</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Developer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">daniela.dewitt@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-489">(892) 678-0028</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-success">10/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Microsoft</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-5.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Daniela Dewitt</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Developer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">daniela.dewitt@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(036) 000-8935</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-danger">1/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Lyft</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-6.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Adolfo Hess</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Founder</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">adolfo.hess@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(968) 264-8964</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-danger">2/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Google</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-7.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Adolfo Hess</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Owner</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">adolfo.hess@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(158) 167-0680</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-warning">5/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Uber</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Miyah Myles</a>

                      </td>
                      <td>

                        <!-- Text -->
                        <span class="item-title">Owner</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">miyah.myles@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(038) 876-3917</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-warning">6/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Twitter</a>

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
                          <img class="avatar-img rounded-circle" src="/assets/img/avatars/profiles/avatar-2.jpg" alt="...">
                        </div> <a class="item-name text-reset" href="profile-posts.html">Ryu.Duke</a>

                      </td>
                      <td class="">

                        <!-- Text -->
                        <span class="item-title">Designer</span>

                      </td>
                      <td>

                        <!-- Email -->
                        <a class="item-email text-reset" href="mailto:john.doe@company.com">ryu.duke@company.com</a>

                      </td>
                      <td>

                        <!-- Phone -->
                        <a class="item-phone text-reset" href="tel:1-123-456-7890">(862) 0057-9806</a>

                      </td>
                      <td>

                        <!-- Badge -->
                        <span class="item-score badge badge-soft-danger">1/10</span>

                      </td>
                      <td>

                        <!-- Link -->
                        <a class="item-company text-reset" href="team-overview.html">Amazon</a>

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
          <div class="tab-pane fade" id="contactsCardsPane" role="tabpanel" aria-labelledby="contactsCardsTab">

            <!-- Cards -->
            <div data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 9, "pagination": {"paginationClass": "list-pagination"}}' id="contactsCards">

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
                      <i class="fe fe-sliders mr-1"></i> Filter <span class="badge badge-primary ml-1 d-none">0</span>
                    </button>

                    <!-- Menu -->
                    <form class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                      <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                          Filters
                        </h4>

                        <!-- Link -->
                        <button class="btn btn-sm btn-link text-reset d-none" type="reset">
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
                                  <option value="*" selected>Any</option>
                                  <option value="Designer">Designer</option>
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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Dianna Smiley</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Designer</span> at <span class="item-company">Twitter</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Twitter</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-danger">1/10</span>

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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Ab Hadley</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Developer</span> at <span class="item-company">Google</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Google</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-success">8/10</span>

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
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckBoxThree">
                            <label class="custom-control-label" for="cardsCheckBoxThree"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Adolfo Hess</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Owner</span> at <span class="item-company">Google</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Google</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-success">7/10</span>

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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Daniela Dewitt</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Designer</span> at <span class="item-position">Twitch</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Twitch</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-warning">4/10</span>

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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Miyah Myles</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Founder</span> at <span class="item-company">Facebook</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Facebook</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-danger">3/10</span>

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
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckBoxSix">
                            <label class="custom-control-label" for="cardsCheckBoxSix"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-6.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Ryu Duke</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Owner</span> at <span class="item-company">Netflix</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Netflix</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-warning">6/10</span>

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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-7.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Glen Rouse</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Designer</span> at <span class="item-position">Netflix</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Netflix</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-success">9/10</span>

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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Miyah Myles</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Designer</span> at <span class="item-company">Google</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Google</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-success">10/10</span>

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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Ryu Duke</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Developer</span> at <span class="item-company">Microsoft</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Microsoft</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-warning">6/10</span>

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
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckBoxTen">
                            <label class="custom-control-label" for="cardsCheckBoxTen"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Glen Rouse</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Owner</span> at <span class="item-company">Uber</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Uber</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-danger">2/10</span>

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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Dianna Smiley</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Designer</span> at <span class="item-position">Twitter</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Twitter</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-warning">6/10</span>

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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Daniela Dewitt</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Founder</span> at <span class="item-company">Netflix</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Netflix</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-success">8/10</span>

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
                            <input type="checkbox" class="list-checkbox custom-control-input" id="cardsCheckBoxThirteen">
                            <label class="custom-control-label" for="cardsCheckBoxThirteen"></label>
                          </div>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-6.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Ab Hadley</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Owner</span> at <span class="item-company">Lyft</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Lyft</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-warning">4/10</span>

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
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a href="profile-posts.html" class="avatar avatar-xl card-avatar">
                        <img src="..//assets/img/avatars/profiles/avatar-7.jpg" class="avatar-img rounded-circle" alt="...">
                      </a>

                      <!-- Body -->
                      <div class="text-center mb-5">

                        <!-- Heading -->
                        <h2 class="card-title">
                          <a class="item-name" href="profile-posts.html">Adolfo Hess</a>
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted mb-3">
                          <span class="item-title">Designer</span> at <span class="item-position">Google</span>
                        </p>

                        <!-- Buttons -->
                        <a class="btn btn-sm btn-white" href="tel:tel:1-123-456-7890">
                          <i class="fe fe-phone mr-1"></i> Call
                        </a>
                        <a class="btn btn-sm btn-white" href="mailto:john.doe@company.com">
                          <i class="fe fe-mail mr-1"></i> Email
                        </a>

                      </div>

                      <!-- Divider -->
                      <hr class="card-divider mb-0">

                      <!-- List group -->
                      <div class="list-group list-group-flush mb-n3">
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Company</small>

                            </div>
                            <div class="col-auto">

                              <!-- Text -->
                              <small>Google</small>

                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col">

                              <!-- Text -->
                              <small>Lead Score</small>

                            </div>
                            <div class="col-auto">

                              <!-- Badge -->
                              <span class="item-score badge badge-soft-success">7/10</span>

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

      </div>
    </div> <!-- / .row -->
  </div>
@endsection