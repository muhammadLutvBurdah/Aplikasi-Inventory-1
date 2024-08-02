<header class="app-header bg-gradient" style="position: sticky; top: 0; z-index: 1000;">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="nav-item align-items-center d-flex">
          <h6>Halo, {{ ucwords(Auth::user()->name) }}</h6>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          <!-- <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a> -->
          <li class="nav-item dropdown">
            <div class="message-body">
              <form id="logout-form" action="{{ __('logout') }}" method="POST" class="d-flex align-items-center gap-3 dropdown-item">
                @csrf
                <button class="btn btn-block bg-primary ms-3">Logout</button>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>

<style>
  .navbar {
    width: 138%;
    
  }
  #logout-form button {
    width: 10rem;
    text-align: center;
  }
  #logout-form button:hover {
    background-color: blue;
    color: white;
  }
  .navbar {
    box-shadow: 0 4px 2px -2px gray;
  }
</style>
