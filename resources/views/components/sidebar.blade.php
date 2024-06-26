<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar py-5 collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item h-4">
            <a class="nav-link active" aria-current="page" href="{{ route('account.dashboard')}}">
              <span data-feather="home" class="align-text-bottom"></span>
             
            </a>
          </li>
          <li class="nav-item h-4">
            <a class="nav-link active" aria-current="page" href="{{ route('account.dashboard')}}">
              
             
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('account.dashboard')}}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('accounts.index')}}">
              <span data-feather="user" class="align-text-bottom"></span>
             Manage  Account
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('income.index')}}">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Manage Sales & Receipts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Manage Billing & Purchases
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('expenses.index')}}">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Manage Expenses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('banks.index')}}">
              <span data-feather="layers" class="align-text-bottom"></span>
              Bank Accounts
            </a>
          </li>
        </ul>
        @if(auth()->user()->user_type == 'admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Admin Area</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Manage Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Track User Login
            </a>
          </li>
        </ul>
        @endif
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('petty-cash.index') }}">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Petty Cash
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('balance-sheet.index') }}">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Balance Sheet
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profitor-loss.index') }}">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Profit & Loss
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Manage Accounting Period
            </a>
          </li>
        </ul>
      </div>
    </nav>
