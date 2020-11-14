<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Map -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" rel="stylesheet" />
      
    <!-- Title -->
    <title>Dashkit</title>

  </head>
  <body>


    <div class="main-content ">

      

      <div class="container-lg">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">

            <!-- Form -->
            <form class="tab-content py-6" id="wizardSteps">
              <div class="tab-pane fade show active" id="wizardStepOne" role="tabpanel" aria-labelledby="wizardTabOne">

                <!-- Header -->
                <div class="row justify-content-center">
                  <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Pretitle -->
                    <h6 class="mb-4 text-uppercase text-muted">
                      Step 1 of 3
                    </h6>

                    <!-- Title -->
                    <h1 class="mb-3">
                      Let’s start with the basics.
                    </h1>

                    <!-- Subtitle -->
                    <p class="mb-5 text-muted">
                      Understanding the type of team you're creating help us to ask all the right questions.
                    </p>

                  </div>
                </div> <!-- / .row -->

                <!-- Team name -->
                <div class="form-group">

                  <!-- Label -->
                  <label>
                    Team name
                  </label>

                  <!-- Input -->
                  <input type="text" class="form-control">

                </div>

                <!-- Team description -->
                <div class="form-group">

                  <!-- Label -->
                  <label class="mb-1">
                    Team description
                  </label>

                  <!-- Text -->
                  <small class="form-text text-muted">
                    This is how others will learn about the project, so make it good!
                  </small>

                  <!-- Quill -->
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
                    <option data-avatar-src="assets/img/avatars/profiles/avatar-1.jpg">Dianna Smiley</option>
                    <option data-avatar-src="assets/img/avatars/profiles/avatar-2.jpg">Ab Hadley</option>
                    <option data-avatar-src="assets/img/avatars/profiles/avatar-3.jpg">Adolfo Hess</option>
                    <option data-avatar-src="assets/img/avatars/profiles/avatar-4.jpg">Daniela Dewitt</option>
                  </select>

                </div>

                <!-- Divider -->
                <hr class="my-5">

                <!-- Footer -->
                <div class="row align-items-center">
                  <div class="col-auto">

                    <!-- Button -->
                    <button class="btn btn-lg btn-white" type="reset">Cancel</button>

                  </div>
                  <div class="col text-center">

                    <!-- Step -->
                    <h6 class="text-uppercase text-muted mb-0">Step 1 of 3</h6>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <a class="btn btn-lg btn-primary" data-toggle="wizard" href="#wizardStepTwo">Continue</a>

                  </div>
                </div>

              </div>
              <div class="tab-pane fade" id="wizardStepTwo" role="tabpanel" aria-labelledby="wizardTabTwo">

                <!-- Header -->
                <div class="row justify-content-center">
                  <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Pretitle -->
                    <h6 class="mb-4 text-uppercase text-muted">
                      Step 2 of 3
                    </h6>

                    <!-- Title -->
                    <h1 class="mb-3">
                      Next, let’s upload some files.
                    </h1>

                    <!-- Subtitle -->
                    <p class="mb-5 text-muted">
                      We need to style your team page and make sure you have all your starting files.
                    </p>

                  </div>
                </div> <!-- / .row -->

                <!-- Project cover -->
                <div class="form-group">

                  <!-- Label -->
                  <label class="mb-1">
                    Project cover
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
                        <input type="file" class="custom-file-input" id="projectCoverUploads">
                        <label class="custom-file-label" for="projectCoverUploads">Choose file</label>
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

                <!-- Starting files -->
                <div class="form-group">

                  <!-- Label -->
                  <label class="mb-1">
                    Starting files
                  </label>

                  <!-- Text -->
                  <small class="form-text text-muted">
                    Upload any files you want to start the projust with.
                  </small>

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
                          <li class="list-group-item px-0">
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
                                <p class="small text-muted mb-0" data-dz-size></p>

                              </div>
                              <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">

                                  <!-- Toggle -->
                                  <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe fe-more-vertical"></i>
                                  </a>

                                  <!-- Menu -->
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
                </div>

                <!-- Divider -->
                <hr class="my-5">

                <!-- Footer -->
                <div class="row align-items-center">
                  <div class="col-auto">

                    <!-- Button -->
                    <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepOne">Back</a>

                  </div>
                  <div class="col text-center">

                    <!-- Step -->
                    <h6 class="text-uppercase text-muted mb-0">Step 2 of 3</h6>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <a class="btn btn-lg btn-primary" data-toggle="wizard" href="#wizardStepThree">Continue</a>

                  </div>
                </div>

              </div>
              <div class="tab-pane fade" id="wizardStepThree" role="tabpanel" aria-labelledby="wizardTabThree">

                <!-- Header -->
                <div class="row justify-content-center">
                  <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Pretitle -->
                    <h6 class="mb-4 text-uppercase text-muted">
                      Step 3 of 3
                    </h6>

                    <!-- Title -->
                    <h1 class="mb-3">
                      Let’s get some last details.
                    </h1>

                    <!-- Subtitle -->
                    <p class="mb-5 text-muted">
                      Setting up tags, dates, and permissions makes sure to keep your team organized and safe.
                    </p>

                  </div>
                </div> <!-- / .row -->

                <!-- Project tags -->
                <div class="form-group">

                  <!-- Label -->
                  <label>
                    Project tags
                  </label>

                  <!-- Select -->
                  <select class="form-control" data-toggle="select" multiple>
                    <option>CSS</option>
                    <option>HTML</option>
                    <option>JavaScript</option>
                    <option>Bootstrap</option>
                  </select>

                </div>

                <div class="row">
                  <div class="col-12 col-md-6">

                    <!-- Start date -->
                    <div class="form-group">

                      <!-- Label -->
                      <label>
                        Start date
                      </label>

                      <!-- Input -->
                      <input type="text" class="form-control" data-toggle="flatpickr">

                    </div>

                  </div>
                  <div class="col-12 col-md-6">

                    <!-- Start date -->
                    <div class="form-group">

                      <!-- Label -->
                      <label>
                        End date
                      </label>

                      <!-- Input -->
                      <input type="text" class="form-control" data-toggle="flatpickr">

                    </div>

                  </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr class="mt-5 mb-5">

                <div class="row">
                  <div class="col-12 col-md-6">

                    <!-- Private project -->
                    <div class="form-group">

                      <!-- Label -->
                      <label class="mb-1">
                        Private project
                      </label>

                      <!-- Text -->
                      <small class="form-text text-muted">
                        If you are available for hire outside of the current situation, you can encourage others to hire you.
                      </small>

                      <!-- Switch -->
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
                          Once a project is made private, you cannot revert it to a public project.
                        </p>

                      </div>
                    </div>

                  </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr class="my-5">

                <!-- Footer -->
                <div class="row align-items-center">
                  <div class="col-auto">

                    <!-- Button -->
                    <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepTwo">Back</a>

                  </div>
                  <div class="col text-center">

                    <!-- Step -->
                    <h6 class="text-uppercase text-muted mb-0">Step 3 of 3</h6>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <button class="btn btn-lg btn-primary" type="submit">Create</button>

                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>

    </div> <!-- / .main-content -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
    <script src="./assets/js/theme.min.js"></script>
    <script src="./assets/js/dashkit.min.js"></script>


  </body>
</html>
