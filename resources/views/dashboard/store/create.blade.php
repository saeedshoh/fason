@extends('dashboard.layouts.app')
@section('title', 'Магазины')
@extends('dashboard.layouts.aside')

@section('content')
    <div class="main-content">

      

      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                      Добавление магазина
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                      Добавить новый Магазин
                    </h1>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
          <form class="mb-4">

              <!-- Team name -->
              <div class="form-group">

                <!-- Label -->
                <label for="name">
                  Название магазина
                </label>

                <!-- Input -->
                <input type="text" class="form-control" id="name" name="name">

              </div>

              <!-- Team description -->
              <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                  Описание магазина
                </label>

                <!-- Text -->
                <small class="form-text text-muted">
                  This is how others will learn about the project, so make it good!
                </small>

                <!-- Textarea -->
                <div data-toggle="quill"></div>

              </div>

              <!-- Team members -->
              <div class="form-group">

                <!-- Label -->
                <label>
                  Add team members
                </label>

                <!-- Select -->
                <select class="form-control" data-toggle="select" multiple>
                  <option data-avatar-src="assets/img/avatars/profiles/avatar-1.jpg">
                    Dianna Smiley
                  </option>
                  <option data-avatar-src="assets/img/avatars/profiles/avatar-2.jpg">
                    Ab Hadley
                  </option>
                  <option data-avatar-src="assets/img/avatars/profiles/avatar-3.jpg">
                    Adolfo Hess
                  </option>
                  <option data-avatar-src="assets/img/avatars/profiles/avatar-4.jpg">
                    Daniela Dewitt
                  </option>
                </select>

              </div>

              <!-- Divider -->
              <hr class="mt-4 mb-5">

              <!-- Project cover -->
              <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                  Team cover
                </label>

                <!-- Text -->
                <small class="form-text text-muted">
                  Please use an image no larger than 1200px * 600px.
                </small>

                <!-- Dropzone -->
                <div class="dropzone dropzone-single mb-3" data-toggle="dropzone" data-options='{"url": "https://", "maxFiles": 1, "acceptedFiles": "image/*"}'>

                  <!-- Fallback -->
                  <div class="fallback">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="teamCoverUploads">
                      <label class="custom-file-label" for="teamCoverUploads">Choose file</label>
                    </div>
                  </div>

                  <!-- Preview -->
                  <div class="dz-preview dz-preview-single">
                    <div class="dz-preview-cover">
                      <img class="dz-preview-img" src="data:image/svg+xml,%3csvg3c/svg%3e" alt="..." data-dz-thumbnail>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Divider -->
              <hr class="mt-5 mb-5">

              <div class="row">
                <div class="col-12 col-md-6">

                  <!-- Private team -->
                  <div class="form-group">

                    <!-- Label -->
                    <label class="mb-1">
                      Private team
                    </label>

                    <!-- Text -->
                    <small class="form-text text-muted">
                      If you are available for hire outside of the current situation, you can encourage others to hire you.
                    </small>

                    <!-- SWitch -->
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="switchOne">
                      <label class="custom-control-label" for="switchOne"></label>
                    </div>

                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Warning -->
                  <div class="card bg-light border">
                    <div class="card-body">

                      <!-- Heading -->
                      <h4 class="mb-2">
                        <i class="fe fe-alert-triangle"></i> Warning
                      </h4>

                      <!-- Text -->
                      <p class="small text-muted mb-0">
                        Once a team is made private, you cannot revert it to a public team.
                      </p>

                    </div>
                  </div>

                </div>
              </div> <!-- / .row -->

              <!-- Divider -->
              <hr class="mt-5 mb-5">

              <!-- Buttons -->
              <a href="#" class="btn btn-block btn-primary">
                Create team
              </a>
              <a href="#" class="btn btn-block btn-link text-muted">
                Cancel this team
              </a>

            </form>

          </div>
        </div> <!-- / .row -->
      </div>

    </div> 
@endsection