@section('title')
Beginning Balance Management
@endsection

@extends ('components.layout-main')

@section('content') 
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> PETTY CASH BOOK </h1>
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

      

    
      <h2>PETTY CASH BOOK OPENING BALANCE</h2>
      <div class="table-responsive py-2">
          @if(session('success'))
              <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            @endif
            @if (session('error'))
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
            @endif
           
          <div class="row g-2">
            <div class="col-md p-2 py-2">
                <form class="form-horizontal" action="{{ route('beginning-balance.update',$beginningBalance->id)}}" method="post">
                    @csrf
                    @Method("PUT")
                    <div class="form-floating py-2">
                        <select class="form-select  form-control input-group mb-3 py-3" name="bank_account_id" aria-label="Select-Account">
                            <option value="{{$beginningBalance->bank_account_id}}"> ... Selected ||  {{$beginningBalance->bank_account_id}} ... </option>
                                @foreach ($banks as $bank)
                                <option value="{{$bank->id}}">{{$bank->bank_name ." (". $bank->account_no. " )"}}</option>
                                @endforeach  
                        </select>
                        <label for="floatingInputGrid">Select Openining Account</label>
                        @if ($errors->has('account_no'))
                            <span class="text-danger">{{ $errors->first('account_no') }}</span>
                        @endif
                    </div>
                    <div class="form-floating py-2">
                        <input type="text" class="form-control" name="description" id="floatingInputGrid" placeholder=" description  " value="{{ $beginningBalance->description}}">
                        <label for="floatingInputGrid">Account Description</label>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-floating py-2">
                        <input type="text" class="form-control" name="opening_balance" id="floatingInputGrid" placeholder=" transaction date" value="{{ $beginningBalance->opening_balance}}">
                        <label for="floatingInputGrid">Opening  Balance</label>
                        @if ($errors->has('opening_balance'))
                            <span class="text-danger">{{ $errors->first('opening_balance') }}</span>
                        @endif
                    </div>
                    <div class="form-floating py-2">
                        <input type="text" class="form-control" name="closing_balance" id="floatingInputGrid" placeholder=" Closing Balance" value="{{ $beginningBalance->closing_balance}}">
                        <label for="floatingInputGrid">Closing  Balance</label>
                        @if ($errors->has('closing_balance'))
                            <span class="text-danger">{{ $errors->first('closing_balance') }}</span>
                        @endif
                    </div>
                    <div class="form-floating py-2">
                        <input type="date" class="form-control" name="starts_on" id="floatingInputGrid" placeholder=" Starts date" value="{{ $beginningBalance->starts_on}}">
                        <label for="floatingInputGrid">Periods Starts on</label>
                        @if ($errors->has('starts_on'))
                            <span class="text-danger">{{ $errors->first('starts_on') }}</span>
                        @endif
                    </div>
                    <div class="form-floating py-2">
                        <input type="date" class="form-control" name="ends_on" id="floatingInputGrid" placeholder=" Ends  date" value="{{ $beginningBalance->ends_on}}">
                        <label for="floatingInputGrid">Periods Ends on</label>
                        @if ($errors->has('ends_on'))
                            <span class="text-danger">{{ $errors->first('ends_on') }}</span>
                        @endif
                    </div>
                    <div class="form-floating py-2">
                        <input type="text" class="form-control" name="period_in_days" id="floatingInputGrid" placeholder="Account Period in Days" value="{{ $beginningBalance->period_in_days}}" readonly>
                        <label for="floatingInputGrid">Period in Days</label>
                        @if ($errors->has('period_in_days'))
                            <span class="text-danger">{{ $errors->first('period_in_days') }}</span>
                        @endif
                    </div>
                    <div class="form-floating py-2">
                        <input type="text" class="form-control" name="calender_month" id="floatingInputGrid" placeholder="Account Period Calender month" value="{{ $beginningBalance->calender_month}}" readonly>
                        <label for="floatingInputGrid">Calender Month</label>
                        @if ($errors->has('month_name'))
                            <span class="text-danger">{{ $errors->first('month_name') }}</span>
                        @endif
                    </div>
                    <div class="form-floating py-2">
                        <input type="text" class="form-control" name="fiscal_year" id="floatingInputGrid" placeholder="Fiscal year" value="{{ $beginningBalance->fiscal_year }}" readonly>
                        <label for="floatingInputGrid">Fiscal Year</label>
                        @if ($errors->has('fiscal_year'))
                            <span class="text-danger">{{ $errors->first('fiscal_year') }}</span>
                        @endif
                    </div>
                    <div class="form-floating py-2">
                        <select class="form-select  form-control input-group mb-3 py-3" name="status" aria-label="Select-Account">
                            <option value="{{$beginningBalance->status}}"> ... Selected || {{$beginningBalance->status}} ... </option>
                            <option value="active">Active</option>    
                            <option value="closed">Close</option>
                        </select>
                        <label for="floatingInputGrid">Select Openining Account</label>
                        @if ($errors->has('account_no'))
                            <span class="text-danger">{{ $errors->first('account_no') }}</span>
                        @endif
                    </div>
                    <div class="py-4 w-100">
                        <button type="submit" class="btn btn-danger w-100  px-6 py-4">Set Beginning Balance</button>
                    </div>
                </form>
            </div>
            <div class="col-md">
                <h2 class="border-bottom border-bottom-2">PETTY CASH BOOK TRANSACTION </h2>
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">AccountID No</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Business Month</th>
                        <th scope="col">Fiscal Year</th>
                        <th scope="col">Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($balances as $balance)
                    <tr>
                        <td>{{$balance->id}}</td>
                        <td>
                            {{$balance->bank_account_id}}
                        </td>
                        <td>
                            {{$balance->description}}
                        </td>
                        <td>{{$balance->opening_balance}}</td>
                        <td>{{$balance->calender_month}}</td>
                        <td>{{$balance->status}}</td>
                        <!-- <td>{{$balance->balance}}</td> -->
                        <td class="items-center d-flex justify-content-between ml-1">
                        <a href="{{ route('banks.show', $balance->id) }}" class="btn btn-info btn-sm btn-md mb-1">View</a>
                            <a href="{{ route('banks.edit', $balance->id) }}" class="btn btn-warning btn-sm btn-md mb-1">Edit</a>
                            <form action="{{ route('banks.destroy', $balance->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">AccountID No</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Business Month</th>
                        <th scope="col">Fiscal Year</th>
                        <th scope="col">Action</th>
                        
                </tr>
                    </tfoot>
                </table>
                {{ $balances->links() }}
            </div>
         </div> 
    </div>
        
     </div>
      </div>
    </main>
  </div>
</div>
@endsection