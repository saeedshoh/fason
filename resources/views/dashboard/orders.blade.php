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
                    <h1 class="header-title">
                      Orders
                    </h1>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <a href="#" class="btn btn-primary lift">
                      New order
                    </a>

                  </div>
                </div> <!-- / .row -->
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Nav -->
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                      <li class="nav-item">
                        <a href="#!" class="nav-link active">
                          All <span class="badge badge-pill badge-soft-secondary">823</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link">
                          Pending <span class="badge badge-pill badge-soft-secondary">24</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link">
                          Processing <span class="badge badge-pill badge-soft-secondary">3</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link">
                          Refunded <span class="badge badge-pill badge-soft-secondary">71</span>
                        </a>
                      </li>
                    </ul>

                  </div>
                </div>
              </div>
            </div>

            <!-- Card -->
            <div class="card" data-list='{"valueNames": ["orders-order", "orders-product", "orders-date", "orders-total", "orders-status", "orders-method"]}'>
              <div class="card-header">

                <!-- Search -->
                <form>
                  <div class="input-group input-group-flush">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fe fe-search"></i>
                      </span>
                    </div>
                    <input class="form-control list-search" type="search" placeholder="Search">
                  </div>
                </form>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="bulkActionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bulk action
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bulkActionDropdown">
                    <a class="dropdown-item" href="#!">Action</a>
                    <a class="dropdown-item" href="#!">Another action</a>
                    <a class="dropdown-item" href="#!">Something else here</a>
                  </div>
                </div>

              </div>
              <div class="table-responsive">
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox-all custom-control-input" name="ordersSelect" id="ordersSelectAll">
                          <label class="custom-control-label" for="ordersSelectAll">&nbsp;</label>
                        </div>

                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-order">
                          Order
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-product">
                          Product
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-date">
                          Date
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-total">
                          Total
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-status">
                          Status
                        </a>
                      </th>
                      <th colspan="2">
                        <a href="#" class="text-muted list-sort" data-sort="orders-method">
                          Payment method
                        </a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6520
                      </td>
                      <td class="orders-product">
                        5' x 3' Wall Poster
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-30">07/30/18</time>

                      </td>
                      <td class="orders-total">
                        $55.25
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Mastercard
                      </td>
                      <td class="text-right">

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

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6521
                      </td>
                      <td class="orders-product">
                        XL Logo Tee
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-30">07/30/18</time>

                      </td>
                      <td class="orders-total">
                        $14.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Paypal
                      </td>
                      <td class="text-right">

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

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6522
                      </td>
                      <td class="orders-product">
                        Flexfit Hat
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-28">07/28/18</time>

                      </td>
                      <td class="orders-total">
                        $25.50
                      </td>
                      <td class="orders-sratus">

                        <!-- Badge -->
                        <div class="badge badge-soft-warning">
                          Processing
                        </div>

                      </td>
                      <td class="orders-method">
                        Visa
                      </td>
                      <td class="text-right">

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

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6523
                      </td>
                      <td class="orders-product">
                        Reversible Hoodie
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-27">07/27/18</time>

                      </td>
                      <td class="orders-total">
                        $64.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-danger">
                          Cancelled
                        </div>

                      </td>
                      <td class="orders-method">
                        Amex
                      </td>
                      <td class="text-right">

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

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6524
                      </td>
                      <td class="orders-product">
                        Geometric Print Shorts
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-25">07/25/18</time>

                      </td>
                      <td class="orders-total">
                        $31.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Paypal
                      </td>
                      <td class="text-right">

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

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6525
                      </td>
                      <td class="orders-product">
                        Super Mug
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-22">07/22/18</time>

                      </td>
                      <td class="orders-total">
                        $9.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Mastercard
                      </td>
                      <td class="text-right">

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

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6526
                      </td>
                      <td class="orders-product">
                        MD Pocket Tee
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-22">07/22/18</time>

                      </td>
                      <td class="orders-total">
                        $19.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-warning">
                          Processing
                        </div>

                      </td>
                      <td class="orders-method">
                        Amex
                      </td>
                      <td class="text-right">

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

                      </td>
                    </tr>
                    <tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6527
                      </td>
                      <td class="orders-product">
                        Custom Coffee Blend
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-21">07/21/18</time>

                      </td>
                      <td class="orders-total">
                        $11.99
                      </td>
                      <td class="orders-sratus">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Visa
                      </td>
                      <td class="text-right">

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

                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div>

    </div>
    <!-- / .main-content -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="{{ asset('js/dashboard/app.js') }}"></script>

  
  </body>
</html>
