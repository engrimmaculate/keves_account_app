<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
  <img class="mb" src="{{asset('assets/logo.jpg')}}" alt="KEVES INN & SUITES" width="200px" height="80px">
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-80 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap px-2">
      <a class="nav-link px-3 btn btn-danger text-white font-bold" href="{{ route('auth.logout')}}">Sign out</a>
    </div>
  </div>
</header>
