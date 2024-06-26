@section('title')
Create User Account
@endsection

@extends ('components.layout-main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Manage Expenses</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>

      

      <div class="row d-flex justify-content-around -pb-5 space-x-2 mb-5">
        <div class="col-md-3 col-sm-6  card img-fluid flex-row-reverse py-5 px-2 h-50">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" height="80" widhth="80"  shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 296.938">
                <path fill="#427D2A" d="M55.708 0H512v253.196l-32.271.146 2.253-185.798.086-2.218c.019-16.411-13.279-29.735-29.691-29.754l-396.669-.156V0z"/>
                <path fill="#427D2A" d="M0 60.065h456.298v236.873H0z"/><path fill="#87CC71" d="M382.151 96.888c-.241 17.62 15.287 33.558 33.564 33.777v93.72c-19.252-.241-35.187 15.287-35.406 36.278H76.733c.242-19.252-15.29-35.191-33.563-35.41v-93.72c19.325.219 35.273-15.3 35.492-34.645h303.489z"/>
                <circle fill="#427D2A" transform="rotate(-61.974 264.087 -101.323) scale(17.72889)" r="3.938"/>
                </svg>
            </span>
            
            <div class="card-img-overlay">
            <h4 class="card-title">{{$data['active']}}</h4>
            <p class="card-text text-bold text-primary">ACTIVE USERS</p>
            <a href="{{ route('expenses.create')}}" class="btn btn-primary mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" widhth="30" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 511.99">
                <path fill="#00AB42" fill-rule="nonzero" d="M256 0c70.68 0 134.68 28.67 181.01 74.99 46.32 46.32 74.99 110.32 74.99 181S483.33 390.68 437.01 437c-46.33 46.33-110.33 74.99-181.01 74.99-70.68 0-134.68-28.66-181.01-74.99C28.67 390.68 0 326.67 0 255.99c0-70.68 28.67-134.68 74.99-181C121.32 28.67 185.32 0 256 0z"/>
                <path fill="#d35832" d="M234.68 130.59h42.64c10.11 0 18.38 8.29 18.38 18.39v67.32h67.32c10.11 0 18.38 8.33 18.38 18.38v42.63c0 10.09-8.3 18.38-18.38 18.38H295.7v67.32c0 10.1-8.28 18.39-18.38 18.39h-42.64c-10.1 0-18.38-8.27-18.38-18.39v-67.32h-67.32c-10.08 0-18.38-8.26-18.38-18.38v-42.63c0-10.12 8.27-18.38 18.38-18.38h67.32v-67.32c0-10.12 8.27-18.39 18.38-18.39z"/>
            </svg>
            USERS
            </a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6   card img-fluid flex-row-reverse px-2 py-5 h-50">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <span>
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="80" widhth="80" viewBox="0 0 81.28 122.88" class="flex-end">
                <defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>payment</title>
                <path class="cls-1" d="M0,49.17,49.6,0,81.28,31.13l-5.11,2.38-22-21.59-.26-.27a5.06,5.06,0,0,0-7.15.16l-1.79,1.86-.06-.06-8.4,8.9L4.34,53.42,0,49.17ZM13.41,76.85l-.3,1.92c-.79,5.12-2.07,13.44-2.59,16.38a2.18,2.18,0,0,1-.17.51,1.29,1.29,0,0,1-.26.42,19.68,19.68,0,0,0-1.61,2.39,6.65,6.65,0,0,0-.76,1.89,2.23,2.23,0,0,0,0,1,1.73,1.73,0,0,0,.48.79C13.08,107.05,18.26,112,23,117a6.54,6.54,0,0,0,5.34,1.68,31.75,31.75,0,0,0,5.3-1.15,43.8,43.8,0,0,0,5.54-1.61,15.85,15.85,0,0,0,4.9-3l4.08-4.26a1.37,1.37,0,0,1,.19-.22l0,0c.12-.12.47-.47,1-.94l0,0c2.7-2.64,6-5.89,4.13-8.59l-1.37-1.37-1,.9L49.8,99.53c-.7.61-1.35,1.19-1.94,1.77a2.11,2.11,0,0,1-3-3c.63-.63,1.39-1.31,2.18-2l.1-.08c2.65-2.35,5.68-5,4.2-7.2l-1.61-1.61c-.38.39-.78.76-1.18,1.13s-1,.92-1.52,1.36L46.9,90c-.68.6-1.32,1.16-1.91,1.75a2.11,2.11,0,0,1-3-3c.61-.61,1.36-1.28,2.15-2l.12-.11c2.65-2.34,5.68-5,4.21-7.2-.56-.55-1.13-1.1-1.67-1.67l-4.48,4.48a2.11,2.11,0,0,1-3-3l9-9a7.51,7.51,0,0,0,1.89-2.88,4.36,4.36,0,0,0,.08-2.8,3.8,3.8,0,0,0-.37-.79,3.69,3.69,0,0,0-.52-.66,3.48,3.48,0,0,0-.67-.53,4,4,0,0,0-.78-.36,4.34,4.34,0,0,0-2.79.1,8.14,8.14,0,0,0-2.94,2L20.59,86.06a2.11,2.11,0,0,1-3-3l.94-.93-5.16-5.27Zm10.15.28L36.42,64.27l-.24-.07A9.18,9.18,0,1,1,47.87,58a8.27,8.27,0,0,1,1.41.33h0a8,8,0,0,1,1.65.76,8.1,8.1,0,0,1,1.45,1.14l0,0a7.7,7.7,0,0,1,.54.6L65.12,48.41a6,6,0,0,1,.1-8.43L54.06,28.58a6,6,0,0,1-8.44-.09h0L15,59.9A6,6,0,0,1,15,68.33l8.61,8.8Zm30.78-8.58v0a11.7,11.7,0,0,1-3,4.85l-1.47,1.46,1.74,1.74.16.18.14.19a6.16,6.16,0,0,1,.52,7.14l.05,0a2.91,2.91,0,0,1,.33.26l1.7,1.71a.93.93,0,0,1,.16.18l.13.17a6.48,6.48,0,0,1,1.42,4.23A7,7,0,0,1,55,94.19l1.69,1.68.16.19.12.17c4.14,5.66-.68,10.37-4.57,14.17-.26.31-.69.69-1,1-1.36,1.42-3,3.34-4.4,4.6-3.92,3.55-7.78,4.5-12.25,5.59a32.67,32.67,0,0,1-6.12,1.27,10.61,10.61,0,0,1-8.52-2.9L5.33,105.18a5.8,5.8,0,0,1-1.59-2.55,6.49,6.49,0,0,1-.08-3.08v0a10.41,10.41,0,0,1,1-2.74A19.92,19.92,0,0,1,6.52,93.9c.38-2.17,1.21-7.7,2-12.78.45-3.05.89-5.92,1.22-8L1.43,64.63,50.6,15h0L78.83,43.85,54.34,68.55Z"/>
            </svg>
            </span>
            <div class="card-img-overlay">
            <h4 class="card-title text-2xl text-bold">{{$data['inactive']}}</h4>
            <p class="card-text text-bold text-danger">INACTIVE USERS</p>
            <a href="{{ route('expense-categories.create')}}" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" widhth="30" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 511.99">
                <path fill="#00AB42" fill-rule="nonzero" d="M256 0c70.68 0 134.68 28.67 181.01 74.99 46.32 46.32 74.99 110.32 74.99 181S483.33 390.68 437.01 437c-46.33 46.33-110.33 74.99-181.01 74.99-70.68 0-134.68-28.66-181.01-74.99C28.67 390.68 0 326.67 0 255.99c0-70.68 28.67-134.68 74.99-181C121.32 28.67 185.32 0 256 0z"/>
                <path fill="#d35832" d="M234.68 130.59h42.64c10.11 0 18.38 8.29 18.38 18.39v67.32h67.32c10.11 0 18.38 8.33 18.38 18.38v42.63c0 10.09-8.3 18.38-18.38 18.38H295.7v67.32c0 10.1-8.28 18.39-18.38 18.39h-42.64c-10.1 0-18.38-8.27-18.38-18.39v-67.32h-67.32c-10.08 0-18.38-8.26-18.38-18.38v-42.63c0-10.12 8.27-18.38 18.38-18.38h67.32v-67.32c0-10.12 8.27-18.39 18.38-18.39z"/>
            </svg>
                INACTIVE USERS
            </a>
            </div>
        </div>
      </div>
      <div class="table-responsive py-2">
      @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
      <div class="row g-2">
            <div class="col-md p-2 py-2">
            <form action="{{ route('users.store' )}}" method="POST">
                @csrf
                
                <h1 class="h3 mb-3 fw-bold text-danger">User Creation Form</h1>
                @if($errors->has('emailPassword'))
                
                <div class="alert alert-warning alert-dismissible fade show textt-danger" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <strong class="text-danger">Login Error!<br /></strong> <span class="text-danger">{{ $errors->first('emailPassword') }}</span> <br /><span>{{ $errors->first('password') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif
                    <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name@example.com">
                <label for="floatingInput text-danger" >FULLNAME</label>
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                </div>
                <div class="form-floating mb-2">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput text-danger" >Email address</label>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                </div>
                <div class="form-floating mb-2">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword text-danger">Password</label>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                </div>
                <div class="form-floating mb-2">
                <input type="password" class="form-control" name="password_confirmation" id="floatingPassword" placeholder="Confirm Password">
                <label for="floatingPassword text-danger">Confirm Password</label>
                @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
                </div>
                <div class="form-floating mb-2">
                    <select class="form-select" id="floatingSelectGrid" name="user_type">
                        <option value="">Choose User Type ( User Role )</option>
                        <option value="admin">Admin</option>
                        <option value="accountant">Accountant</option>
                        <option value="auditor">Auditor</option>
                        <option value="user">User</option>
                    </select>
                    <label for="floatingPassword text-danger">User Type</label>
                    @if ($errors->has('user_type'))
                    <span class="text-danger">{{ $errors->first('user_type') }}</span>
                    @endif
                </div>
                <div class="form-floating mb-2">
                    <select class="form-select" id="floatingSelectGrid" name="user_status">
                        <option value="">Choose User Status ( User Role )</option>
                        <option value="active">Active</option>
                        <option value="inactive">In Active</option>
                    </select>
                <label for="floatingPassword text-danger">User Status</label>
                @if ($errors->has('user_status'))
                <span class="text-danger">{{ $errors->first('user_status') }}</span>
                @endif
                </div>
                <button class="w-100 btn btn-lg btn-danger" type="submit">CREATE USER</button>
                
            </form>
            </div>
       
          <div class="col-md">
          <h2 class="border-bottom border-bottom-2">Admin Users</h2>
          <table class="table table-striped table-sm text-center">
            <thead>
              <tr>
                <th scope="col fw-bold text-center" align="center">ID</th>
                <th scope="col fw-bold text-center" align="center">FULLNAME</th>
                <th scope="col fw-bold text-center" align="center">EMAIL</th>
                <th scope="col fw-bold text-center" align="center">USER TYPE ( ROLE ) </th>
                <th scope="col fw-bold text-center" align="center">STATUS</th>
                <th scope="col fw-bold text-center" align="center">Action</th>
              </tr>
            </thead>
            <tbody>
           
            @foreach ($users  as $user)
            <tr>
                <td>{{ $user->id }} </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user_type }}</td>
                <td>
                    @if( $user->user_status == 'active')
                     <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm">{{ $user->user_status }}</a>
                    @else
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-danger btn-sm">{{ $user->user_status }}</a>
                    @endif
                
                </td>
                <td>
                    @if (auth()->user()->user_type == 'admin')
                  <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are You Sure you want to Delete This User ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                  @endif
                </td>
              </tr>
            @endforeach
            
              
              
            </tbody>
            <tfoot>
            <tr>
                <th scope="col fw-bold text-center" align="center">ID</th>
                <th scope="col fw-bold text-center" align="center">FULLNAME</th>
                <th scope="col fw-bold text-center" align="center">EMAIL</th>
                <th scope="col fw-bold text-center" align="center">USER TYPE ( ROLE ) </th>
                <th scope="col fw-bold text-center" align="center">STATUS</th>
                <th scope="col fw-bold text-center" align="center">Action</th>
              </tr>
            </tfoot>
          </table>
          {{ $users->links() }}
          </div>
        </div>
      </div>
      <div class="col-md justify-content-center align-items-center d-flex">
      <p class="mt-5 mb-3  text-muted flex-row ">&copy; Keves INN & Suites {{ date("Y") }}</p>
      </div>
      
      </div>
      
    </main>

@endsection