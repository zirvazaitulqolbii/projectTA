<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="/login" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <span class="app-brand-logo demo">
                        <img src="../../assets/img/avatars/logosma.jpg" alt class="w-px-40 h-auto rounded-circle" />
                    </span>
                      <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                          <g id="Icon" transform="translate(27.000000, 15.000000)">
                            <g id="Mask" transform="translate(0.000000, 8.000000)">
                              <mask id="mask-2" fill="white">
                                <use xlink:href="#path-1"></use>
                              </mask>
                              <use fill="#696cff" xlink:href="#path-1"></use>
                              <g id="Path-3" mask="url(#mask-2)">
                                <use fill="#696cff" xlink:href="#path-3"></use>
                                <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                              </g>
                              <g id="Path-4" mask="url(#mask-2)">
                                <use fill="#696cff" xlink:href="#path-4"></use>
                                <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                              </g>
                            </g>
                            <g
                              id="Triangle"
                              transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                            >
                              <use fill="#696cff" xlink:href="#path-5"></use>
                              <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Koperasi</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Selamat datang!!</h4>
              <p class="mb-4">Silahkan registrasi terlebih dahulu!</p>

              <form id="formAuthentication" class="mb-3" action="/registrasiProses" method="POST">
               @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    @error('nama') is-invalid @enderror
                    id="nama"
                    name="nama"
                    value="{{old('nama')}}"
                    placeholder="Enter Your username"
                    autofocus
                  />
                  @error('nama')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text"
                 class="form-control"
                  @error('email') is-invalid @enderror
                  id="email"
                  name="email"
                  value="{{old('email')}}"
                  placeholder="Enter Your email" />
                  @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
                {{--  <form id="formAuthentication" class="mb-3" action="index.html" method="POST">  --}}
                    <div class="mb-3">
                      <label for="nip" class="form-label">NIP</label>
                      <input
                        type="text"
                        class="form-control"
                        @error('nip') is-invalid @enderror
                        id="nip"
                        name="nip"
                        value="{{old('nip')}}"
                        placeholder="Enter Your NIP"
                        autofocus
                      />
                      @error('nip')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Hp</label>
                        <input
                          type="text"
                          class="form-control"
                          @error('no_hp') is-invalid @enderror
                          id="no_hp"
                          name="no_hp"
                          value="{{old('no_hp')}}"
                          placeholder="Enter Your Number Telphone"
                          autofocus
                        />
                        @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input
                          type="text"
                          class="form-control"
                          @error('alamat') is-invalid @enderror
                          id="alamat"
                          name="alamat"
                          value="{{old('alamat')}}"
                          placeholder="Enter Your Address"
                          autofocus
                        />
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <!-- ... Bagian sebelumnya ... -->

<div class="mb-3">
  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
  <div class="d-flex">
    <div class="form-check form-check-inline">
      <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin_laki" value="L" @if(old('jenis_kelamin') == 'Laki-Laki') checked @endif>
      <label class="form-check-label" for="jenis_kelamin_laki">Laki-Laki</label>
    </div>
    <div class="form-check form-check-inline">
      <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin_perempuan" value="P" @if(old('jenis_kelamin') == 'Perempuan') checked @endif>
      <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
    </div>
    @error('jenis_kelamin')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
</div>

<!-- ... Bagian setelahnya ... -->

                      <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input
                          type="date"
                          class="form-control"
                          @error('tanggal_masuk') is-invalid @enderror
                          id="tanggal_masuk"
                          name="tanggal_masuk"
                          value="{{old('tanggal_masuk')}}"
                          placeholder="Enter Your "
                          autofocus
                        />
                        @error('tanggal_masuk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      @error('password') is-invalid @enderror
                      value="{{old('password')}}"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password Confirmation</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password_confirmation"
                        class="form-control"
                        @error('password_confirmation')
                            is-invalid
                        @enderror
                        name="password_confirmation"
                        value="{{ old('password_confirmation') }}"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                <div class="mb-3">
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Anda sudah memiliki akun?</span>
                <a href="/">
                  <span>login</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
