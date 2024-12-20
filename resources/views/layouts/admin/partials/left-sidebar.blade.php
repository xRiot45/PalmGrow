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
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Dashboard </span>
        </a>
      </li>
      {{-- Dashboard --}}

      {{-- Pengguna --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pengguna.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="ph:users-three-fill"></iconify-icon>
          </span>
          <span class="nav-text"> Pengguna </span>
        </a>
      </li>
      {{-- Pengguna --}}

      {{-- Kebun --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.kebun.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="maki:garden"></iconify-icon>
          </span>
          <span class="nav-text"> Kebun </span>
        </a>
      </li>
      {{-- Kebun --}}

      {{-- Petugas --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.petugas.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="healthicons:officer"></iconify-icon>
          </span>
          <span class="nav-text"> Petugas </span>
        </a>
      </li>

      {{-- Produksi --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.produksi.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="material-symbols:factory"></iconify-icon>
          </span>
          <span class="nav-text"> Produksi </span>
        </a>
      </li>

      {{-- Distribusi --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.distribusi.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="lsicon:distribution-filled"></iconify-icon>
          </span>
          <span class="nav-text"> Distribusi </span>
        </a>
      </li>

      {{-- Laporan Kebun --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.laporan.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="lsicon:report-filled"></iconify-icon>
          </span>
          <span class="nav-text"> Laporan Kebun </span>
        </a>
      </li>

      {{-- Pembayaran --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pembayaran.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="tdesign:undertake-transaction-filled"></iconify-icon>
          </span>
          <span class="nav-text"> Pembayaran </span>
        </a>
      </li>

      {{-- Kategori Panen --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.kategori-panen.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="material-symbols:category"></iconify-icon>
          </span>
          <span class="nav-text"> Kategori Panen </span>
        </a>
      </li>
    </ul>
  </div>
</div>
