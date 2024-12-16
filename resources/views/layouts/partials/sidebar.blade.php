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

      <li class="menu-title">General</li>

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

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarProducts">
          <span class="nav-icon">
            <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Products </span>
        </a>
        <div class="collapse" id="sidebarProducts">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'products', 'list']) }}">List</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'products', 'grid']) }}">Grid</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'products', 'detail']) }}">Details</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'products', 'edit']) }}">Edit</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'products', 'create']) }}">Create</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarCategory">
          <span class="nav-icon">
            <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Category </span>
        </a>
        <div class="collapse" id="sidebarCategory">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'category', 'list']) }}">List</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'category', 'edit']) }}">Edit</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'category', 'create']) }}">Create</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarInventory" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarInventory">
          <span class="nav-icon">
            <iconify-icon icon="solar:box-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Inventory </span>
        </a>
        <div class="collapse" id="sidebarInventory">
          <ul class="nav sub-navbar-nav">

            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'inventory', 'warehouse']) }}">Warehouse</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'inventory', 'received-orders']) }}">Received
                Orders</a>
            </li>

          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarOrders" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarOrders">
          <span class="nav-icon">
            <iconify-icon icon="solar:bag-smile-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Orders </span>
        </a>
        <div class="collapse" id="sidebarOrders">
          <ul class="nav sub-navbar-nav">

            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'orders', 'list']) }}">List</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'orders', 'details']) }}">Details</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'orders', 'cart']) }}">Cart</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'orders', 'checkout']) }}">Check Out</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarPurchases" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarPurchases">
          <span class="nav-icon">
            <iconify-icon icon="solar:card-send-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Purchases </span>
        </a>
        <div class="collapse" id="sidebarPurchases">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'purchase', 'list']) }}">List</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'purchase', 'order']) }}">Order</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'purchase', 'return']) }}">Return</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarAttributes" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarAttributes">
          <span class="nav-icon">
            <iconify-icon icon="solar:confetti-minimalistic-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Attributes </span>
        </a>
        <div class="collapse" id="sidebarAttributes">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'attributes', 'list']) }}">List</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'attributes', 'edit']) }}">Edit</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'attributes', 'create']) }}">Create</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarInvoice" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarInvoice">
          <span class="nav-icon">
            <iconify-icon icon="solar:bill-list-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Invoices </span>
        </a>
        <div class="collapse" id="sidebarInvoice">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'invoice', 'list']) }}">List</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'invoice', 'details']) }}">Details</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['general', 'invoice', 'create']) }}">Create</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['general', 'settings']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Settings </span>
        </a>
      </li>

      <li class="menu-title mt-2">Users</li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['users', 'pages-profile']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Profile </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarRoles" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarRoles">
          <span class="nav-icon">
            <iconify-icon icon="solar:user-speak-rounded-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Roles </span>
        </a>
        <div class="collapse" id="sidebarRoles">
          <ul class="nav sub-navbar-nav">
            <ul class="nav sub-navbar-nav">
              <li class="sub-nav-item">
                <a class="sub-nav-link"
                  href="{{ route('third', ['users', 'role', 'list']) }}">List</a>
              </li>
              <li class="sub-nav-item">
                <a class="sub-nav-link"
                  href="{{ route('third', ['users', 'role', 'edit']) }}">Edit</a>
              </li>
              <li class="sub-nav-item">
                <a class="sub-nav-link"
                  href="{{ route('third', ['users', 'role', 'create']) }}">Create</a>
              </li>
            </ul>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['users', 'pages-permission']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:checklist-minimalistic-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Permissions </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarCustomers" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarCustomers">
          <span class="nav-icon">
            <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Customers </span>
        </a>
        <div class="collapse" id="sidebarCustomers">
          <ul class="nav sub-navbar-nav">

            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['users', 'customer', 'list']) }}">List</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['users', 'customer', 'details']) }}">Details</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarSellers" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarSellers">
          <span class="nav-icon">
            <iconify-icon icon="solar:shop-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Sellers </span>
        </a>
        <div class="collapse" id="sidebarSellers">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['users', 'seller', 'list']) }}">List</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['users', 'seller', 'details']) }}">Details</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['users', 'seller', 'edit']) }}">Edit</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['users', 'seller', 'create']) }}">Create</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="menu-title mt-2">Other</li>



      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['other', 'pages-review']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Reviews </span>
        </a>
      </li>

      <li class="menu-title mt-2">Other Apps</li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['apps', 'chat']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:chat-round-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Chat </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['apps', 'email']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:mailbox-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Email </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['apps', 'calendar']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:calendar-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Calendar </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['apps', 'todo']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:checklist-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Todo </span>
        </a>
      </li>

      <li class="menu-title mt-2">Support</li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['support', 'help-center']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:help-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Help Center </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['support', 'faqs']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:question-circle-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> FAQs </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['support', 'privacy-policy']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:document-text-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Privacy Policy </span>
        </a>
      </li>

      <li class="menu-title mt-2">Custom</li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarPages" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarPages">
          <span class="nav-icon">
            <iconify-icon icon="solar:gift-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Pages </span>
        </a>
        <div class="collapse" id="sidebarPages">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['custom', 'pages', 'starter']) }}">Welcome</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['custom', 'pages', 'coming-soon']) }}">Coming Soon</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['custom', 'pages', 'timeline']) }}">Timeline</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['custom', 'pages', 'pricing']) }}">Pricing</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['custom', 'pages', 'maintenance']) }}">Maintenance</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['custom', 'pages', 'error-404']) }}">404 Error</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['custom', 'pages', 'error-404-alt']) }}">404 Error
                (alt)</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarAuthentication" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarAuthentication">
          <span class="nav-icon">
            <iconify-icon icon="solar:lock-keyhole-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Authentication </span>
        </a>
        <div class="collapse" id="sidebarAuthentication">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link" href="{{ route('second', ['auth', 'login']) }}">Sign
                In</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link" href="{{ route('second', ['auth', 'register']) }}">Sign
                Up</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('second', ['auth', 'reset-password']) }}">Reset
                Password</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link" href="{{ route('second', ['auth', 'lock-screen']) }}">Lock
                Screen</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('second', ['custom', 'widgets']) }}">
          <span class="nav-icon">
            <iconify-icon icon="solar:atom-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text">Widgets</span>
          <span class="badge bg-info badge-pill text-end">9+</span>
        </a>
      </li>

      <li class="menu-title mt-2">Components</li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarBaseUI" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarBaseUI">
          <span class="nav-icon">
            <iconify-icon icon="solar:bookmark-square-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Base UI </span>
        </a>
        <div class="collapse" id="sidebarBaseUI">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'accordion']) }}">Accordion</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'alerts']) }}">Alerts</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'avatar']) }}">Avatar</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'badge']) }}">Badge</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'breadcrumb']) }}">Breadcrumb</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'buttons']) }}">Buttons</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'cards']) }}">Card</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'carousel']) }}">Carousel</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'collapse']) }}">Collapse</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'dropdown']) }}">Dropdown</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'list-group']) }}">List Group</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'modal']) }}">Modal</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'tabs']) }}">Tabs</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'offcanvas']) }}">Offcanvas</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'pagination']) }}">Pagination</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'placeholder']) }}">Placeholders</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'popovers']) }}">Popovers</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'progress']) }}">Progress</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'scrollspy']) }}">Scrollspy</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'spinners']) }}">Spinners</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'toasts']) }}">Toasts</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'ui', 'tooltips']) }}">Tooltips</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarExtendedUI" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarExtendedUI">
          <span class="nav-icon">
            <iconify-icon icon="solar:case-round-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Advanced UI </span>
        </a>
        <div class="collapse" id="sidebarExtendedUI">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'advanced', 'rating']) }}">Ratings</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'advanced', 'sweet-alerts']) }}">Sweet
                Alert</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'advanced', 'swiper-slider']) }}">Swiper
                Slider</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'advanced', 'scrollbar']) }}">Scrollbar</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'advanced', 'toastify']) }}">Toastify</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarCharts" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarCharts">
          <span class="nav-icon">
            <iconify-icon icon="solar:pie-chart-2-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Charts </span>
        </a>
        <div class="collapse" id="sidebarCharts">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-area']) }}">Area</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-bar']) }}">Bar</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-bubble']) }}">Bubble</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-candlestick']) }}">Candlestick</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-column']) }}">Column</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-heatmap']) }}">Heatmap</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-line']) }}">Line</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-mixed']) }}">Mixed</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-timeline']) }}">Timeline</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-boxplot']) }}">Boxplot</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-treemap']) }}">Treemap</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-pie']) }}">Pie</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-radar']) }}">Radar</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-radialbar']) }}">RadialBar</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-scatter']) }}">Scatter</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'charts', 'apex-polar-area']) }}">Polar
                Area</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarForms" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarForms">
          <span class="nav-icon">
            <iconify-icon icon="solar:book-bookmark-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Forms </span>
        </a>
        <div class="collapse" id="sidebarForms">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'basic']) }}">Basic Elements</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'checkbox-radio']) }}">Checkbox
                &amp; Radio</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'choice-select']) }}">Choice
                Select</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'clipboard']) }}">Clipboard</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'flatepicker']) }}">Flatepicker</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'validation']) }}">Validation</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'wizard']) }}">Wizard</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'file-upload']) }}">File
                Upload</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'editors']) }}">Editors</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'input-mask']) }}">Input Mask</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'forms', 'range-slider']) }}">Slider</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarTables" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarTables">
          <span class="nav-icon">
            <iconify-icon icon="solar:tuning-2-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Tables </span>
        </a>
        <div class="collapse" id="sidebarTables">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'tables', 'basic']) }}">Basic Tables</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'tables', 'gridjs']) }}">Grid Js</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarIcons" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarIcons">
          <span class="nav-icon">
            <iconify-icon icon="solar:ufo-2-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Icons </span>
        </a>
        <div class="collapse" id="sidebarIcons">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'icons', 'boxicons']) }}">Boxicons</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'icons', 'solar']) }}">Solar Icons</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarMaps" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarMaps">
          <span class="nav-icon">
            <iconify-icon icon="solar:streets-map-point-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Maps </span>
        </a>
        <div class="collapse" id="sidebarMaps">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'maps', 'google']) }}">Google Maps</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link"
                href="{{ route('third', ['components', 'maps', 'vector']) }}">Vector Maps</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0);">
          <span class="nav-icon">
            <iconify-icon icon="solar:volleyball-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text">Badge Menu</span>
          <span class="badge bg-danger badge-pill text-end">1</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link menu-arrow" href="#sidebarMultiLevelDemo" data-bs-toggle="collapse"
          role="button" aria-expanded="false" aria-controls="sidebarMultiLevelDemo">
          <span class="nav-icon">
            <iconify-icon icon="solar:share-circle-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Menu Item </span>
        </a>
        <div class="collapse" id="sidebarMultiLevelDemo">
          <ul class="nav sub-navbar-nav">
            <li class="sub-nav-item">
              <a class="sub-nav-link" href="javascript:void(0);">Menu Item 1</a>
            </li>
            <li class="sub-nav-item">
              <a class="sub-nav-link  menu-arrow" href="#sidebarItemDemoSubItem"
                data-bs-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="sidebarItemDemoSubItem">
                <span> Menu Item 2 </span>
              </a>
              <div class="collapse" id="sidebarItemDemoSubItem">
                <ul class="nav sub-navbar-nav">
                  <li class="sub-nav-item">
                    <a class="sub-nav-link" href="javascript:void(0);">Menu Sub item</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link disabled" href="javascript:void(0);">
          <span class="nav-icon">
            <iconify-icon icon="solar:user-block-rounded-bold-duotone"></iconify-icon>
          </span>
          <span class="nav-text"> Disable Item </span>
        </a>
      </li>
    </ul>
  </div>
</div>
