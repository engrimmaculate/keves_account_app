@section('title')
Post | Petty Cash | Journal
@endsection

@extends ('components.layout-main')

@section('content')  
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-bg-danger  p-2">POST PETTY CASH BOOK MANAGER</h1>
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
      <h2 class="ml-5 text-bg-danger text-center p-2">POST PETTY CASH BOOK RECORD TO JOURNAL</h2>
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
           
          <div class="row g-2 justify-content-center align-items-center">
            <div class="col-md-8 p-2 py-2">
              <form class="form-horizontal" action="{{ route('pettycash.postPettyCashReport')}}" method="post">
                @csrf
                <div class="form-floating">
                    <select class="form-select" id="floatingSelectGrid" name="account_type">
                    <option value="">Account Type(Unit)</option>
                    @foreach ($account as $acct)
                    <option value="{{$acct->id}}">{{$acct->account_type ." (". $acct->account_no. " )"}}</option>
                    @endforeach  
                    </select>
                    <label for="floatingSelectGrid">Expenses Category</label>
                    @if ($errors->has('account_type'))
                    <span class="text-danger">{{ $errors->first('account_type') }}</span>
                    @endif
                </div>
                <div class="form-floating py-2">
                    <select class="form-select" id="floatingSelectGrid" name="expense_category_id">
                    <option value=""> .. Select Category ..</option>
                    @foreach ($expenseCategory as $expense)
                    <option value="{{$expense->id}}">{{$expense->category}}</option>
                    @endforeach  
                    </select>
                    <label for="floatingSelectGrid">Select  (Expense Category )</label>
                    @if ($errors->has('expense_category_id'))
                    <span class="text-danger">{{ $errors->first('expense_category_id') }}</span>
                    @endif
                </div>
                <div class="form-floating py-2">
                  <input type="date" class="form-control" name="transaction_date" id="floatingInputGrid" placeholder=" account no " value="{{$pettyCash->transaction_date}}">
                  <label for="floatingInputGrid">Date Of Transaction</label>
                  @if ($errors->has('transaction_date'))
                      <span class="text-danger">{{ $errors->first('transaction_date') }}</span>
                  @endif
                </div>
                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="particulars" id="floatingInputGrid" placeholder=" transaction date" value="{{$pettyCash->particulars}}">
                  <label for="floatingInputGrid">Particulars / Items</label>
                  @if ($errors->has('particulars'))
                      <span class="text-danger">{{ $errors->first('particulars') }}</span>
                  @endif
                </div>
                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="pettycash_id" id="floatingInputGrid" placeholder=" Petty cash ID" value="{{$pettyCash->id}}">
                  <label for="floatingInputGrid">PETTY CASH ID</label>
                  @if ($errors->has('pettycash_id'))
                      <span class="text-danger">{{ $errors->first('pettycash_id') }}</span>
                  @endif
                </div>
                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="voucher_no" id="floatingInputGrid" placeholder=" Petty Cash Invoice Voucher No" value="{{$pettyCash->voucher_no}}">
                  <label for="floatingInputGrid">PETTY CASH VOUCHER NO</label>
                  @if ($errors->has('voucher_no'))
                      <span class="text-danger">{{ $errors->first('voucher_no') }}</span>
                  @endif
                </div>
                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="cash_in" id="floatingInputGrid" placeholder=" Cash In" value="{{$pettyCash->cash_in}}">
                  <label for="floatingInputGrid">Cash In (CREDIT)</label>
                  @if ($errors->has('cash_in'))
                      <span class="text-danger">{{ $errors->first('cash_in') }}</span>
                  @endif
                </div>
                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="cash_out" id="floatingInputGrid" placeholder=" Cash Out" value="{{$pettyCash->cash_out}}">
                  <label for="floatingInputGrid">Cash Out (DEBIT)</label>
                  @if ($errors->has('cash_out'))
                      <span class="text-danger">{{ $errors->first('cash_out') }}</span>
                  @endif
                </div>
              
                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="opening_balance" id="floatingInputGrid" placeholder=" transaction date" value="{{$pettyCash->opening_balance}}">
                  <label for="floatingInputGrid">Openinning Balance</label>
                  @if ($errors->has('opening_balance'))
                      <span class="text-danger">{{ $errors->first('opening_balance') }}</span>
                  @endif
                </div>
                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="closed_balance" id="floatingInputGrid" placeholder=" transaction date" value="{{$pettyCash->closed_balance}}">
                  <label for="floatingInputGrid">Closing Balance</label>
                  @if ($errors->has('closed_balance'))
                      <span class="text-danger">{{ $errors->first('closed_balance') }}</span>
                  @endif
                </div>
                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="acct_period" id="floatingInputGrid" placeholder=" transaction date" value="{{$pettyCash->acct_period}}">
                  <label for="floatingInputGrid">Account Period</label>
                  @if ($errors->has('acct_period'))
                      <span class="text-danger">{{ $errors->first('acct_period') }}</span>
                  @endif
                </div>
                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="voucher_no" id="floatingInputGrid" placeholder=" transaction date" value="{{$pettyCash->voucher_no}}">
                  <label for="floatingInputGrid">Voucher No.</label>
                  @if ($errors->has('voucher_no'))
                      <span class="text-danger">{{ $errors->first('voucher_no') }}</span>
                  @endif
                </div>

                <div class="form-floating py-2">
                  <input type="text" class="form-control" name="balance" id="floatingInputGrid" placeholder=" transaction date" value="{{$pettyCash->balance}}">
                  <label for="floatingInputGrid">Petty Cash Book Balance </label>
                  @if ($errors->has('balance'))
                      <span class="text-danger">{{ $errors->first('balance') }}</span>
                  @endif
                </div>
                
                <div class="py-4 w-100">
                <button type="submit" class="btn btn-danger w-100  px-6 py-4">POST PETTY CASH TO JOURNAL</button>
              </div>
              </form>
            </div>
              
            
        
          </div>
     </div>
      </div>
    </main>
  </div>
</div>
@endsection