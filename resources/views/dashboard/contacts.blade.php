<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/feather/feather.css') }}" />
  
    <!-- Title -->
    <title>Dashkit</title>

  </head>
  <body>

    <!-- MODALS
    ================================================== -->
    

    <!-- Modal: Members -->
    <div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-card card" data-list='{"valueNames": ["name"]}'>
            <div class="card-header">

              <!-- Title -->
              <h4 class="card-header-title" id="exampleModalCenterTitle">
                Add a member
              </h4>

              <!-- Close -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <div class="card-header">

              <!-- Form -->
              <form>
                <div class="input-group input-group-flush input-group-merge">

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

            </div>
            <div class="card-body">

              <!-- List group -->
              <ul class="list-group list-group-flush list my-n3">
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <a href="./profile-posts.html" class="avatar">
                        <img src="./assets/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                      </a>

                    </div>
                    <div class="col ml-n2">

                      <!-- Title -->
                      <h4 class="mb-1 name">
                        <a href="./profile-posts.html">Miyah Myles</a>
                      </h4>

                      <!-- Time -->
                      <p class="small mb-0">
                        <span class="text-success">●</span> Online
                      </p>

                    </div>
                    <div class="col-auto">

                      <!-- Button -->
                      <a href="#!" class="btn btn-sm btn-white">
                        Add
                      </a>

                    </div>
                  </div> <!-- / .row -->
                </li>
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <a href="./profile-posts.html" class="avatar">
                        <img src="./assets/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                      </a>

                    </div>
                    <div class="col ml-n2">

                      <!-- Title -->
                      <h4 class="mb-1 name">
                        <a href="./profile-posts.html">Ryu Duke</a>
                      </h4>

                      <!-- Time -->
                      <p class="small mb-0">
                        <span class="text-success">●</span> Online
                      </p>

                    </div>
                    <div class="col-auto">

                      <!-- Button -->
                      <a href="#!" class="btn btn-sm btn-white">
                        Add
                      </a>

                    </div>
                  </div> <!-- / .row -->
                </li>
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <a href="./profile-posts.html" class="avatar">
                        <img src="./assets/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                      </a>

                    </div>
                    <div class="col ml-n2">

                      <!-- Title -->
                      <h4 class="mb-1 name">
                        <a href="./profile-posts.html">Glen Rouse</a>
                      </h4>

                      <!-- Time -->
                      <p class="small mb-0">
                        <span class="text-warning">●</span> Busy
                      </p>

                    </div>
                    <div class="col-auto">

                      <!-- Button -->
                      <a href="#!" class="btn btn-sm btn-white">
                        Add
                      </a>

                    </div>
                  </div> <!-- / .row -->
                </li>
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <a href="./profile-posts.html" class="avatar">
                        <img src="./assets/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                      </a>

                    </div>
                    <div class="col ml-n2">

                      <!-- Title -->
                      <h4 class="mb-1 name">
                        <a href="./profile-posts.html">Grace Gross</a>
                      </h4>

                      <!-- Time -->
                      <p class="small mb-0">
                        <span class="text-danger">●</span> Offline
                      </p>

                    </div>
                    <div class="col-auto">

                      <!-- Button -->
                      <a href="#!" class="btn btn-sm btn-white">
                        Add
                      </a>

                    </div>
                  </div> <!-- / .row -->
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>


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
                        <img src="./assets/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
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
                        <img src="./assets/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
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
                        <img src="./assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
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
                <a class="list-group-item" href="./project-overview.html">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <div class="avatar avatar-4by3">
                        <img src="./assets/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                      </div>

                    </div>
                    <div class="col ml-n2">

                      <!-- Title -->
                      <h4 class="text-body text-focus mb-1 name">
                        Travels & Time
                      </h4>

                      <!-- Time -->
                      <p class="small text-muted mb-0">
                        <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                      </p>

                    </div>
                  </div> <!-- / .row -->
                </a>
                <a class="list-group-item" href="./project-overview.html">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <div class="avatar avatar-4by3">
                        <img src="./assets/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                      </div>

                    </div>
                    <div class="col ml-n2">

                      <!-- Title -->
                      <h4 class="text-body text-focus mb-1 name">
                        Safari Exploration
                      </h4>

                      <!-- Time -->
                      <p class="small text-muted mb-0">
                        <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                      </p>

                    </div>
                  </div> <!-- / .row -->
                </a>
                <a class="list-group-item" href="./profile-posts.html">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <div class="avatar">
                        <img src="./assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                      </div>

                    </div>
                    <div class="col ml-n2">

                      <!-- Title -->
                      <h4 class="text-body text-focus mb-1 name">
                        Dianna Smiley
                      </h4>

                      <!-- Status -->
                      <p class="text-body small mb-0">
                        <span class="text-success">●</span> Online
                      </p>

                    </div>
                  </div> <!-- / .row -->
                </a>
                <a class="list-group-item" href="./profile-posts.html">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <div class="avatar">
                        <img src="./assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                      </div>

                    </div>
                    <div class="col ml-n2">

                      <!-- Title -->
                      <h4 class="text-body text-focus mb-1 name">
                        Ab Hadley
                      </h4>

                      <!-- Status -->
                      <p class="text-body small mb-0">
                        <span class="text-danger">●</span> Offline
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
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <div class="avatar-title font-size-lg bg-primary-soft rounded-circle text-primary">
                            <i class="fe fe-git-branch"></i>
                          </div>
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          "Update Dependencies" branch was created.
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          This branch was created off of the "master" branch.
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
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <div class="avatar-title font-size-lg bg-primary-soft rounded-circle text-primary">
                            <i class="fe fe-git-branch"></i>
                          </div>
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          "Update Dependencies" branch was created.
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          This branch was created off of the "master" branch.
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
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <div class="avatar-title font-size-lg bg-primary-soft rounded-circle text-primary">
                            <i class="fe fe-git-branch"></i>
                          </div>
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          "Update Dependencies" branch was created.
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          This branch was created off of the "master" branch.
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
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
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
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
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
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-offline">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-3.jpg" alt="..." />
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          Adolfo Hess
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Exported sales data from Launchday's subscriber data.
                        </p>

                        <!-- Time -->
                        <small class="text-muted">
                          3h ago
                        </small>

                      </div>
                    </div> <!-- / .row -->
                  </a>
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-online">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
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
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
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
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-offline">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-3.jpg" alt="..." />
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          Adolfo Hess
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Exported sales data from Launchday's subscriber data.
                        </p>

                        <!-- Time -->
                        <small class="text-muted">
                          3h ago
                        </small>

                      </div>
                    </div> <!-- / .row -->
                  </a>
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-online">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
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
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
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
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-offline">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-3.jpg" alt="..." />
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          Adolfo Hess
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Exported sales data from Launchday's subscriber data.
                        </p>

                        <!-- Time -->
                        <small class="text-muted">
                          3h ago
                        </small>

                      </div>
                    </div> <!-- / .row -->
                  </a>
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-online">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
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
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
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
                  <a class="list-group-item text-reset" href="#!">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-offline">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-3.jpg" alt="..." />
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          Adolfo Hess
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Exported sales data from Launchday's subscriber data.
                        </p>

                        <!-- Time -->
                        <small class="text-muted">
                          3h ago
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


    <!-- Modal: Kanban task -->
    <div class="modal fade" id="modalKanbanTask" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-lighter">
          <div class="modal-body">

            <!-- Header -->
            <div class="row">
              <div class="col">

                <!-- Prettitle -->
                <h6 class="text-uppercase text-muted mb-3">
                  <a href="#!" class="text-reset">How to Use Kanban</a>
                </h6>

                <!-- Title -->
                <h2 class="mb-2">
                  Update Dashkit to include new components!
                </h2>

                <!-- Subtitle -->
                <p class="text-muted mb-0">
                  This is a description of this task. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna nisi, ultrices ut pharetra eget.
                </p>

              </div>
              <div class="col-auto">

                <!-- Close -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    &times;
                  </span>
                </button>

              </div>
            </div> <!-- / .row -->

            <!-- Divider -->
            <hr class="my-4">

            <!-- Buttons -->
            <div class="mb-4">
              <div class="row">
                <div class="col">

                  <!-- Reaction -->
                  <a href="#!" class="btn btn-sm btn-white">
                    😬 1
                  </a>
                  <a href="#!" class="btn btn-sm btn-white">
                    👍 2
                  </a>
                  <a href="#!" class="btn btn-sm btn-white">
                    Add Reaction
                  </a>

                </div>
                <div class="col-auto mr-n3">

                  <!-- Avatar group -->
                  <div class="avatar-group d-none d-sm-flex">
                    <a href="./profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                      <img src="./assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                    </a>
                    <a href="./profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Adolfo Hess">
                      <img src="./assets/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                    </a>
                    <a href="./profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Daniela Dewitt">
                      <img src="./assets/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                    </a>
                    <a href="./profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Miyah Myles">
                      <img src="./assets/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                    </a>
                  </div>

                </div>
                <div class="col-auto">

                  <!-- Button -->
                  <a href="#!" class="btn btn-sm btn-white">
                    Share
                  </a>

                </div>
              </div> <!-- / .row -->
            </div>

            <!-- Card -->
            <div class="card">
              <div class="card-header">

                <!-- Title -->
                <h4 class="card-header-title">
                  Files
                </h4>

                <!-- Button -->
                <a href="#!" class="btn btn-sm btn-white">
                  Add files
                </a>

              </div>
              <div class="card-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <a href="./project-overview.html" class="avatar">
                          <img src="./assets/img/files/file-1.jpg" alt="..." class="avatar-img rounded">
                        </a>

                      </div>
                      <div class="col ml-n2">

                        <!-- Title -->
                        <h4 class="mb-1">
                          <a href="./project-overview.html">Launchday logo</a>
                        </h4>

                        <!-- Time -->
                        <p class="card-text small text-muted">
                          1.5mb PNG Dave
                        </p>

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
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <a href="./project-overview.html" class="avatar">
                          <img src="./assets/img/files/file-1.jpg" alt="..." class="avatar-img rounded">
                        </a>

                      </div>
                      <div class="col ml-n2">

                        <!-- Title -->
                        <h4 class="mb-1">
                          <a href="./project-overview.html">Launchday logo</a>
                        </h4>

                        <!-- Time -->
                        <p class="card-text small text-muted">
                          1.5mb PNG Dave
                        </p>

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
                  </div>
                </div>

              </div>
            </div>

            <!-- Card -->
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-auto">

                    <!-- Avatar -->
                    <div class="avatar avatar-sm">
                      <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                    </div>

                  </div>
                  <div class="col ml-n2">

                    <!-- Form -->
                    <form class="mt-1">
                      <textarea class="form-control form-control-flush form-control" data-toggle="autosize" rows="1" placeholder="Leave a comment"></textarea>
                    </form>

                  </div>
                  <div class="col-auto align-self-end">

                    <!-- Icons -->
                    <div class="text-muted mb-2">
                      <a href="#!" class="text-reset mr-3">
                        <i class="fe fe-camera"></i>
                      </a>
                      <a href="#!" class="text-reset mr-3">
                        <i class="fe fe-paperclip"></i>
                      </a>
                      <a href="#!" class="text-reset">
                        <i class="fe fe-mic"></i>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="card-body">

                <!-- Comments -->
                <div class="comment mb-3">
                  <div class="row">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <a class="avatar avatar-sm" href="./profile-posts.html">
                        <img src="./assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                      </a>

                    </div>
                    <div class="col ml-n2">

                      <!-- Body -->
                      <div class="comment-body">

                        <div class="row">
                          <div class="col">

                            <!-- Title -->
                            <h5 class="comment-title">
                              Ab Hadley
                            </h5>

                          </div>
                          <div class="col-auto">

                            <!-- Time -->
                            <time class="comment-time">
                              11:12
                            </time>

                          </div>
                        </div> <!-- / .row -->

                        <!-- Text -->
                        <p class="comment-text">
                          Looking good Dianna! I like the image grid on the left, but it feels like a lot to process and doesn't really <em>show</em> me what the product does? I think using a short looping video or something similar demo'ing the product might be better?
                        </p>

                      </div>

                    </div>
                  </div> <!-- / .row -->
                </div>
                <div class="comment">
                  <div class="row">
                    <div class="col-auto">

                      <!-- Avatar -->
                      <a class="avatar avatar-sm" href="./profile-posts.html">
                        <img src="./assets/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                      </a>

                    </div>
                    <div class="col ml-n2">

                      <!-- Body -->
                      <div class="comment-body">

                        <div class="row">
                          <div class="col">

                            <!-- Title -->
                            <h5 class="comment-title">
                              Adolfo Hess
                            </h5>

                          </div>
                          <div class="col-auto">

                            <!-- Time -->
                            <time class="comment-time">
                              11:12
                            </time>

                          </div>
                        </div> <!-- / .row -->

                        <!-- Text -->
                        <p class="comment-text">
                          Any chance you're going to link the grid up to a public gallery of sites built with Launchday?
                        </p>

                      </div>

                    </div>
                  </div> <!-- / .row -->
                </div>

              </div>
            </div>

            <!-- Card -->
            <div class="card mb-0">
              <div class="card-header">

                <!-- Title -->
                <h4 class="card-header-title">
                  Activity
                </h4>

              </div>
              <div class="card-body">
                <div class="list-group list-group-flush list-group-activity my-n3">
                  <div class="list-group-item">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          Johnathan Goldstein
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Uploaded the files “Launchday Logo” and “Revisiting the Past”.
                        </p>

                        <!-- Time -->
                        <small class="text-muted">
                          2m ago
                        </small>

                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          Johnathan Goldstein
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Uploaded the files “Launchday Logo” and “Revisiting the Past”.
                        </p>

                        <!-- Time -->
                        <small class="text-muted">
                          2m ago
                        </small>

                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item">
                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Heading -->
                        <h5 class="mb-1">
                          Johnathan Goldstein
                        </h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Uploaded the files “Launchday Logo” and “Revisiting the Past”.
                        </p>

                        <!-- Time -->
                        <small class="text-muted">
                          2m ago
                        </small>

                      </div>
                    </div> <!-- / .row -->
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <!-- Modal: Kanban task -->
    <div class="modal fade" id="modalKanbanTaskEmpty" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-lighter">
          <div class="modal-body">

            <!-- Header -->
            <div class="row">
              <div class="col">

                <!-- Prettitle -->
                <h6 class="text-uppercase text-muted mb-3">
                  <a href="#!" class="text-reset">How to Use Kanban</a>
                </h6>

                <!-- Title -->
                <h2 class="mb-2">
                  Update Dashkit to include new components!
                </h2>

                <!-- Subtitle -->
                <textarea class="form-control form-control-flush form-control-auto" data-toggle="autosize" rows="1" placeholder="Add a description..."></textarea>

              </div>
              <div class="col-auto">

                <!-- Close -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    &times;
                  </span>
                </button>

              </div>
            </div> <!-- / .row -->

            <!-- Divider -->
            <hr class="my-4">

            <!-- Buttons -->
            <div class="mb-4">
              <div class="row">
                <div class="col">

                  <!-- Button -->
                  <a href="#!" class="btn btn-sm btn-white">
                    Add Reaction
                  </a>

                </div>
                <div class="col-auto">

                  <!-- Button -->
                  <a href="#!" class="btn btn-sm btn-white">
                    Share
                  </a>

                </div>
              </div> <!-- / .row -->
            </div>

            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="dropzone dropzone-multiple" data-toggle="dropzone" data-options='{"url": "https://"}'>

                  <!-- Fallback -->
                  <div class="fallback">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileUpload" multiple>
                      <label class="custom-file-label" for="customFileUpload">Choose file</label>
                    </div>
                  </div>

                  <!-- Preview -->
                  <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                    <li class="list-group-item">
                      <div class="row align-items-center">
                        <div class="col-auto">

                          <!-- Image -->
                          <div class="avatar">
                            <img class="avatar-img rounded" src="data:image/svg+xml,%3csvg3c/svg%3e" alt="..." data-dz-thumbnail>
                          </div>

                        </div>
                        <div class="col ml-n3">

                          <!-- Heading -->
                          <h4 class="mb-1" data-dz-name>...</h4>

                          <!-- Text -->
                          <small class="text-muted" data-dz-size></small>

                        </div>
                        <div class="col-auto">

                          <!-- Dropdown -->
                          <div class="dropdown">
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#" class="dropdown-item" data-dz-remove>
                                Remove
                              </a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </li>
                  </ul>

                </div>
              </div>
            </div>

            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-auto">

                    <!-- Avatar -->
                    <div class="avatar avatar-sm">
                      <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                    </div>

                  </div>
                  <div class="col ml-n2">

                    <!-- Form -->
                    <form class="mt-1">
                      <textarea class="form-control form-control-flush" data-toggle="autosize" rows="1" placeholder="Leave a comment"></textarea>
                    </form>

                  </div>
                  <div class="col-auto align-self-end">

                    <!-- Icons -->
                    <div class="text-muted mb-2">
                      <a href="#!" class="text-reset mr-3">
                        <i class="fe fe-camera"></i>
                      </a>
                      <a href="#!" class="text-reset mr-3">
                        <i class="fe fe-paperclip"></i>
                      </a>
                      <a href="#!" class="text-reset">
                        <i class="fe fe-mic"></i>
                      </a>
                    </div>

                  </div>
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
        <a class="navbar-brand" href="./index.html">
          <img src="./assets/img/logo.svg" class="navbar-brand-img 
          mx-auto" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

          <!-- Dropdown -->
          <div class="dropdown">

            <!-- Toggle -->
            <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-sm avatar-online">
                <img src="./assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
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
            <li class="nav-item">
              <a class="nav-link" href="/">
                <i class="fe fe-home"></i> Главная
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/orders">
                <i class="fe fe-shopping-bag"></i> Заказы
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/contacts">
                <i class="fe fe-users"></i> Клиенты
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/store">
                <i class="fe fe-shopping-cart"></i> Магазин
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/employee">
                <i class="fe fe-briefcase"></i> Сотрудники
              </a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                <span class="fe fe-bell"></span> Notifications
              </a>
            </li>
          </ul>

          <!-- Divider -->
          <hr class="navbar-divider my-3">

          <!-- Heading -->
          <h6 class="navbar-heading">
            Дополнительное
          </h6>

          <!-- Navigation -->
          <ul class="navbar-nav mb-md-4">
            <li class="nav-item">
              <a class="nav-link" href="#sidebarBasics" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBasics">
                <i class="fe fe-clipboard"></i> Basics
              </a>
              <div class="collapse " id="sidebarBasics">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item ">
                    <a href="./docs/getting-started.html" class="nav-link">
                      Getting Started
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a href="./docs/design-file.html" class="nav-link">
                      Design File
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
                <i class="fe fe-book-open"></i> Components
              </a>
              <div class="collapse " id="sidebarComponents">
                <ul class="nav nav-sm flex-column">
                  <li>
                    <a href="./docs/components.html#alerts" class="nav-link">
                      Alerts
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#autosize" class="nav-link">
                      Autosize
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#avatars" class="nav-link">
                      Avatars
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#badges" class="nav-link">
                      Badges
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#breadcrumb" class="nav-link">
                      Breadcrumb
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#buttons" class="nav-link">
                      Buttons
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#buttonGroup" class="nav-link">
                      Button group
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#cards" class="nav-link">
                      Cards
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#charts" class="nav-link">
                      Charts
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#checklist" class="nav-link">
                      Checklist
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#dropdowns" class="nav-link">
                      Dropdowns
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#forms" class="nav-link">
                      Forms
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#icons" class="nav-link">
                      Icons
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#kanban" class="nav-link">
                      Kanban
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#lists" class="nav-link">
                      Lists
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#map" class="nav-link">
                      Map
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#modals" class="nav-link">
                      Modal
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#navs" class="nav-link">
                      Navs
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#navbarDocs" class="nav-link">
                      Navbar
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#pageHeaders" class="nav-link">
                      Page headers
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#pagination" class="nav-link">
                      Pagination
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#popovers" class="nav-link">
                      Popovers
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#progress" class="nav-link">
                      Progress
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#socialPosts" class="nav-link">
                      Social post
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#spinners" class="nav-link">
                      Spinners
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#tables" class="nav-link">
                      Tables
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#toasts" class="nav-link">
                      Toasts
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#tooltips" class="nav-link">
                      Tooltips
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#typography" class="nav-link">
                      Typography
                    </a>
                  </li>
                  <li>
                    <a href="./docs/components.html#utilities" class="nav-link">
                      Utilities
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./docs/changelog.html">
                <i class="fe fe-git-branch"></i> Changelog <span class="badge badge-primary ml-auto">v1.6.1</span>
              </a>
            </li>
          </ul>

          <!-- Push content down -->
          <div class="mt-auto"></div>

          

          
          <!-- User (md) -->
          <div class="navbar-user d-none d-md-flex" id="sidebarUser">

            <!-- Icon -->
            <a href="#sidebarModalActivity" class="navbar-user-link" data-toggle="modal">
              <span class="icon">
                <i class="fe fe-bell"></i>
              </span>
            </a>

            <!-- Dropup -->
            <div class="dropup">

              <!-- Toggle -->
              <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                  <img src="./assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                </div>
              </a>

              <!-- Menu -->
              <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                <a href="./profile-posts.html" class="dropdown-item">Profile</a>
                <a href="./account-general.html" class="dropdown-item">Settings</a>
                <hr class="dropdown-divider">
                <a href="./sign-in.html" class="dropdown-item">Logout</a>
              </div>

            </div>

            <!-- Icon -->
            <a href="#sidebarModalSearch" class="navbar-user-link" data-toggle="modal">
              <span class="icon">
                <i class="fe fe-search"></i>
              </span>
            </a>

          </div>
          

        </div> <!-- / .navbar-collapse -->

      </div>
    </nav>

    
    
    
    

    <!-- MAIN CONTENT
    ================================================== -->
    <div class="main-content">

      

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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-1.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-2.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-3.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-4.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-5.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-6.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-7.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-1.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-2.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-3.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-4.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-5.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-6.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-7.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-8.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-1.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-2.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-3.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-4.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-5.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-6.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-7.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-1.jpg" alt="...">
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
                              <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-2.jpg" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-6.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-7.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-5.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-6.jpg" class="avatar-img rounded-circle" alt="...">
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
                            <img src="../assets/img/avatars/profiles/avatar-7.jpg" class="avatar-img rounded-circle" alt="...">
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

    </div> <!-- / .main-content -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="{{ asset('js/dashboard/app.js') }}"></script>

  
  </body>
</html>
