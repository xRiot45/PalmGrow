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
        <a class="nav-link" href="{{ route('petugas.dashboard.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Dashboard </span>
        </a>
      </li>
      {{-- Dashboard --}}

      {{-- Laporan Kebun --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('petugas.laporan.index') }}">
          <span class="nav-icon">
            <iconify-icon icon="lsicon:report-filled"></iconify-icon>
          </span>
          <span class="nav-text"> Laporan Kebun </span>
        </a>
      </li>
    </ul>
  </div>
</div>
