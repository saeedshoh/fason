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
                  список сотрудников
                </h6>

                <!-- Title -->
                <h1 class="header-title text-truncate">
                  Все сотрудники
                </h1>
              </div>
              <div class="col-auto">


                <!-- Buttons -->
                <a href="#!" class="btn btn-primary ml-2">
                  Добавить сотрудников
                </a>

              </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap active">
                      Все сотрудники <span class="badge badge-pill badge-soft-secondary">823</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Активные <span class="badge badge-pill badge-soft-secondary">231</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link text-nowrap">
                      Не активные <span class="badge badge-pill badge-soft-secondary">22</span>
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

                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        №
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
                      </th>
                      <th>
                        <a class="list-sort text-muted" data-sort="item-title" href="#">Должность</a>
                      </th>
                      <th colspan="2">
                        <a class="list-sort text-muted" data-sort="item-email" href="#">E-mail</a>
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
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg">
                        <li class="page-item">
                          
                        </li>
                    </ul>
                </nav>
              </div>
            </div>

          </div>

        </div>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection