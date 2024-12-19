<header class="topbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="d-flex align-items-center">
        <!-- Menu Toggle Button -->
        <div class="topbar-item">
          <button type="button" class="button-toggle-menu me-2">
            <iconify-icon icon="solar:hamburger-menu-broken"
              class="fs-24 align-middle"></iconify-icon>
          </button>
        </div>

        <!-- Menu Toggle Button -->
        <div class="topbar-item">
          <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">{{ $title ?? 'Larkon' }}
          </h4>
        </div>
      </div>

      <div class="d-flex align-items-center gap-1">

        <!-- Theme Color (Light/Dark) -->
        <div class="topbar-item">
          <button type="button" class="topbar-button" id="light-dark-mode">
            <iconify-icon icon="solar:moon-bold-duotone" class="fs-24 align-middle"></iconify-icon>
          </button>
        </div>

        <!-- Theme Setting -->
        <div class="topbar-item d-none d-md-flex">
          <button type="button" class="topbar-button" id="theme-settings-btn"
            data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
            aria-controls="theme-settings-offcanvas">
            <iconify-icon icon="solar:settings-bold-duotone"
              class="fs-24 align-middle"></iconify-icon>
          </button>
        </div>


        <!-- User -->
        <div class="dropdown topbar-item">
          <a type="button" class="topbar-button" id="page-header-user-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center">
              <img class="rounded-circle" width="32" src="/images/users/avatar-blank.png"
                alt="avatar-3">
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">
              {{ Auth::user()->name }}
            </h6>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="dropdown-item text-danger">
                <i class="bx bx-log-out fs-18 align-middle me-1"></i><span
                  class="align-middle">Logout</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
