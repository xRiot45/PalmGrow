<div class="main-nav">
  <!-- Sidebar Logo -->
  <div class="logo-box">
    <a href="{{ route('admin.dashboard.index') }}" class="logo-dark">
      <img src="/images/logo-sm.png" class="logo-sm" alt="logo sm">
      <img src="/images/logo-dark.png" class="logo-lg" alt="logo dark">
    </a>

    <a href="{{ route('admin.dashboard.index') }}" class="logo-light">
      <img src="/images/logo-sm.png" class="logo-sm" alt="logo sm">
      <img src="/images/logo-light.png" class="logo-lg" alt="logo light">
    </a>
  </div>

  <!-- Menu Toggle Button (sm-hover) -->
  <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
    <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone"
      class="button-sm-hover-icon"></iconify-icon>
  </button>

  <div class="scrollbar" data-simplebar>
    <ul class="navbar-nav" id="navbar-nav">

      <li class="menu-title">Menu</li>

      {{-- Dashboard --}}
      <li class="nav-item pb-2">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Dashboard </span>
        </a>
      </li>
      {{-- Dashboard --}}

      {{-- Pengguna --}}
      <li class="nav-item py-1">
        <a class="nav-link" href="{{ route('admin.pengguna.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="ph:users-three-fill"></iconify-icon>
          </span>
          <span class="nav-text"> Pengguna </span>
        </a>
      </li>
      {{-- Pengguna --}}

      {{-- Kebun --}}
      <li class="nav-item py-1">
        <a class="nav-link" href="{{ route('admin.kebun.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="maki:garden"></iconify-icon>
          </span>
          <span class="nav-text"> Kebun </span>
        </a>
      </li>
      {{-- Kebun --}}

      {{-- Petugas --}}
      <li class="nav-item py-1">
        <a class="nav-link" href="{{ route('admin.petugas.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="healthicons:officer"></iconify-icon>
          </span>
          <span class="nav-text"> Petugas </span>
        </a>
      </li>

      {{-- Laporan --}}
      <li class="nav-item pb-1">
        <a class="nav-link" href="{{ route('admin.laporan.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="lsicon:report-filled"></iconify-icon>
          </span>
          <span class="nav-text"> Laporan </span>
        </a>
      </li>

      {{-- Produksi --}}
      <li class="nav-item py-1">
        <a class="nav-link" href="{{ route('admin.produksi.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="material-symbols:factory"></iconify-icon>
          </span>
          <span class="nav-text"> Produksi </span>
        </a>
      </li>

      {{-- Distribusi --}}
      <li class="nav-item py-1">
        <a class="nav-link" href="{{ route('admin.distribusi.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="lsicon:distribution-filled"></iconify-icon>
          </span>
          <span class="nav-text"> Distribusi </span>
        </a>
      </li>

      {{-- Pembayaran --}}
      <li class="nav-item py-1">
        <a class="nav-link" href="{{ route('admin.pembayaran.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="tdesign:undertake-transaction-filled"></iconify-icon>
          </span>
          <span class="nav-text"> Pembayaran </span>
        </a>
      </li>

      {{-- Kategori Panen --}}
      <li class="nav-item py-1">
        <a class="nav-link" href="{{ route('admin.kategori-panen.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="material-symbols:category"></iconify-icon>
          </span>
          <span class="nav-text"> Kategori Panen </span>
        </a>
      </li>

      <li class="menu-title mt-3">Laporan</li>



      {{-- Laporan Pengguna --}}
      <li class="nav-item pb-1">
        <a class="nav-link" href="{{ route('admin.laporan-pengguna.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="fa6-solid:users-viewfinder"></iconify-icon>
          </span>
          <span class="nav-text"> Laporan Pengguna </span>
        </a>
      </li>

      {{-- Laporan Kebun --}}
      <li class="nav-item pb-1">
        <a class="nav-link" href="{{ route('admin.laporan-kebun.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="game-icons:farmer"></iconify-icon>
          </span>
          <span class="nav-text"> Laporan Kebun </span>
        </a>
      </li>

      {{-- Laporan Petugas --}}
      <li class="nav-item pb-1">
        <a class="nav-link" href="{{ route('admin.laporan-petugas.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="clarity:employee-group-solid"></iconify-icon>
          </span>
          <span class="nav-text"> Laporan Petugas </span>
        </a>
      </li>

      {{-- Laporan Produksi --}}
      <li class="nav-item pb-1">
        <a class="nav-link" href="{{ route('admin.laporan-produksi.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="fluent:production-checkmark-24-filled"></iconify-icon>
          </span>
          <span class="nav-text"> Laporan Produksi </span>
        </a>
      </li>

      {{-- Laporan Distribusi --}}
      <li class="nav-item pb-1">
        <a class="nav-link" href="{{ route('admin.laporan-distribusi.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="hugeicons:distribution"></iconify-icon>
          </span>
          <span class="nav-text"> Laporan Distribusi </span>
        </a>
      </li>

      {{-- Laporan Pembayaran --}}
      <li class="nav-item pb-1">
        <a class="nav-link" href="{{ route('admin.laporan-pembayaran.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="tabler:cash-register"></iconify-icon>
          </span>
          <span class="nav-text"> Laporan Pembayaran </span>
        </a>
      </li>
    </ul>
  </div>
</div>
