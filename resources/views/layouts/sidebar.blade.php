<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="/dashboard" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="../../assets/img/avatars/logosma.jpg" alt class="w-px-40 h-auto rounded-circle" />
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Koperasi</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ request()->url() === url('/dashboard') ? 'active' : '' }}">
        <a href="/dashboard" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      @if (Auth::user()->role == 'anggota' || Auth::user()->role == 'kepala_sekolah')
      <li hidden class="menu-item {{ request()->url() === url('/user') ? 'active' : '' }}">
        <a href="/user" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="user">User</div>
        </a>
      </li>
      @else
      <li class="menu-item {{ request()->url() === url('/user') ? 'active' : '' }}">
        <a href="/user" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="user">User</div>
        </a>
      </li>
      @endif

      <!-- Layouts -->
      {{--  @if (Auth::user()->role == 'anggota' || Auth::user()->role == 'kepala_sekolah')
      <li hidden class="menu-item {{ request()->url() === url('/simpanan') ? 'active' : '' }}">
        <a href="/simpanan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="simpanan">Simpanan</div>
        </a>
      </li>  --}}
      {{--  @else  --}}
      <li class="menu-item {{ request()->url() === url('/simpanan') ? 'active' : '' }}">
        <a href="/simpanan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="simpanan">Simpanan</div>
        </a>
      </li>
      {{--  @endif  --}}
      @if (Auth::user()->role == 'kepala_sekolah')
      <li hidden class="menu-item {{ request()->url() === url('/pinjaman') ? 'active' : '' }}">
        <a href="/pinjaman" class="menu-link">
          <i class="menu-icon tf-icons bx bx-add-to-queue"></i>
          <div data-i18n="pinjaman">Pinjaman</div>
        </a>
      </li>
      @else
      <li class="menu-item {{ request()->url() === url('/pinjaman') ? 'active' : '' }}">
        <a href="/pinjaman" class="menu-link">
          <i class="menu-icon tf-icons bx bx-add-to-queue"></i>
          <div data-i18n="pinjaman">Pinjaman</div>
        </a>
      </li>
      @endif
      @if (Auth::user()->role == 'kepala_sekolah')
      <li hidden class="menu-item {{ request()->url() === url('/cicilan') ? 'active' : '' }}">
        <a href="/cicilan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-right-down-arrow-circle"></i>
          <div data-i18n="cicilan">Cicilan</div>
        </a>
      </li>
      @else
      <li class="menu-item {{ request()->url() === url('/cicilan') ? 'active' : '' }}">
        <a href="/cicilan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-right-down-arrow-circle"></i>
          <div data-i18n="cicilan">Cicilan</div>
        </a>
      </li>
      @endif

      @if (Auth::user()->role == 'kepala_sekolah')
      <li hidden class="menu-item {{ request()->url() === url('/pengajuan') ? 'active' : '' }}">
        <a href="/pengajuan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-plus"></i>
          <div data-i18n="pengajuan">Pengajuan Pinjaman</div>
        </a>
      </li>
      @else
      <li  class="menu-item {{ request()->url() === url('/pengajuan') ? 'active' : '' }}">
        <a href="/pengajuan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-plus"></i>
          <div data-i18n="pengajuan">Pengajuan Pinjaman</div>
        </a>
      </li>
      @endif
      @if (Auth::user()->role == 'anggota')
      <li hidden class="menu-item {{ request()->url() === url('/laporan-shu') ? 'active' : '' }}">
        <a href="/laporan-shu" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan SHU</div>
        </a>
      </li>
      @else
      <li  class="menu-item {{ request()->url() === url('/laporan-shu') ? 'active' : '' }}">
        <a href="/laporan-shu" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan SHU</div>
        </a>
      </li>
      @endif
      @if (Auth::user()->role == 'anggota' || Auth::user()->role == 'admin')
      <li hidden class="menu-item {{ request()->url() === url('/cetakuser') ? 'active' : '' }}">
        <a href="/cetakuser" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan Data Anggota</div>
        </a>
      </li>
      @else
      <li  class="menu-item {{ request()->url() === url('/cetakuser') ? 'active' : '' }}">
        <a href="/cetakuser" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan Data Anggota</div>
        </a>
      </li>
      @endif
      @if (Auth::user()->role == 'anggota' || Auth::user()->role == 'admin')
      <li hidden class="menu-item {{ request()->url() === url('/cetaksimpanan') ? 'active' : '' }}">
        <a href="/cetaksimpanan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan Simpanan</div>
        </a>
      </li>
      @else
      <li  class="menu-item {{ request()->url() === url('/cetaksimpanan') ? 'active' : '' }}">
        <a href="/cetaksimpanan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan Simpanan</div>
        </a>
      </li>
      @endif
      @if (Auth::user()->role == 'anggota' || Auth::user()->role == 'admin')
      <li hidden class="menu-item {{ request()->url() === url('/cetakpinjaman') ? 'active' : '' }}">
        <a href="/cetakpinjaman" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan Pinjaman</div>
        </a>
      </li>
      @else
      <li  class="menu-item {{ request()->url() === url('/cetakpinjaman') ? 'active' : '' }}">
        <a href="/cetakpinjaman" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan Pinjaman</div>
        </a>
      </li>
      @endif
      @if (Auth::user()->role == 'anggota' || Auth::user()->role == 'admin')
      <li hidden class="menu-item {{ request()->url() === url('/cetakcicilan') ? 'active' : '' }}">
        <a href="/cetakcicilan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan Cicilan</div>
        </a>
      </li>
      @else
      <li  class="menu-item {{ request()->url() === url('/cetakcicilan') ? 'active' : '' }}">
        <a href="/cetakcicilan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="cetak-laporan">Laporan Cicilan</div>
        </a>
      </li>
      @endif
      {{--  @if (Auth::user()->role == 'kepala_sekolah' || Auth::user()->role == 'admin')
      <li hidden class="menu-item {{ request()->url() === url('/history') ? 'active' : '' }}">
        <a href="/history" class="menu-link">
          <i class="menu-icon tf-icons bx bx-plus"></i>
          <div data-i18n="history">Cicilan</div>
        </a>
      </li>
      @else
      <li  class="menu-item {{ request()->url() === url('/history') ? 'active' : '' }}">
        <a href="/history" class="menu-link">
          <i class="menu-icon tf-icons bx bx-plus"></i>
          <div data-i18n="history">Cicilan Pinjaman</div>
        </a>
      </li>
      @endif  --}}
    </ul>
  </aside>
