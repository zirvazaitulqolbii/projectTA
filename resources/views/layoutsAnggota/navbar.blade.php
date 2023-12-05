<nav class="layout-navbar container-xxl navbar  -navbar-theme" id="layout-navbar">
    {{-- <div class="layout-menu-toggle navbar-nav align-items">
              <a class="nav-item nav-link" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div> --}}

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->

            <ul class="navbar-nav flex-row align-items-right" style="margin-left: auto">
                <!-- Place this tag where you want the button to render. -->
                {{-- <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li> --}}

                <!-- User -->
                {{-- <li class="nav-item navbar-dropdown dropdown-user dropdown "> --}}
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow d-flex" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        <div class="d-flex align-items-right"> <!-- Menggunakan d-flex untuk mengatur posisi avatar -->
                            <div class="flex-grow-1 text-end">
                                <!-- Menggunakan flex-grow-1 untuk mengatur posisi avatar -->
                                <span class="fw-semibold d-block">John Doe</span>
                                <small class="text-muted">Admin</small>
                            </div>
                            <div class="flex-shrink-0 ms-3"> <!-- Memindahkan avatar ke kanan dengan flex-shrink-0 -->
                                <div class="avatar avatar-online">
                                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                {{-- <div class="d-flex"> --}}
                                <div class="flex-shrink-0 ms-3">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">John Doe</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                                {{-- </div> --}}
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-cog me-2"></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="d-flex align-items-center align-middle">
                                    <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                    <span class="flex-grow-1 align-middle">Billing</span>
                                    <span
                                        class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="auth-login-basic.html">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
</nav>
