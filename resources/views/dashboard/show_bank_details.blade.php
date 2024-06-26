@section('title')
Show Bank Account Details
@endsection

@extends ('components.layout-main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2> Bank Accounts and Balance Details View  </h2>
      <div class="table-responsive py-2">
      <div class="row g-2">

      <div class="col-md p-2 py-2">
        <form class="form-horizontal" action="{{ route('banks.store')}}" method="post">
          @csrf
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="account_no" id="floatingInputGrid" placeholder=" account no " value="{{$bank->account_no}}">
            <label for="floatingInputGrid">Account Number</label>
            @if ($errors->has('account_no'))
                <span class="text-danger">{{ $errors->first('account_no') }}</span>
            @endif
          </div>
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="account_name" id="floatingInputGrid" placeholder=" transaction date" value="{{$bank->account_name}}">
            <label for="floatingInputGrid">Account Name</label>
            @if ($errors->has('account_name'))
                <span class="text-danger">{{ $errors->first('account_name') }}</span>
            @endif
          </div>
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="bank_name" id="floatingInputGrid" placeholder=" transaction date" value="{{$bank->bank_name}}">
            <label for="floatingInputGrid">Bank Name</label>
            @if ($errors->has('bank_name'))
                <span class="text-danger">{{ $errors->first('bank_name') }}</span>
            @endif
          </div>
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="bank_branch" id="floatingInputGrid" placeholder=" bank_branch date" value="{{$bank->bank_branch}}">
            <label for="floatingInputGrid">Bank Branch</label>
            @if ($errors->has('bank_branch'))
                <span class="text-danger">{{ $errors->first('bank_branch') }}</span>
            @endif
          </div>
        
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="account_type" id="floatingInputGrid" placeholder=" transaction date" value="{{$bank->account_type}}">
            <label for="floatingInputGrid">account_type</label>
            @if ($errors->has('account_type'))
                <span class="text-danger">{{ $errors->first('account_type') }}</span>
            @endif
          </div>

          <div class="form-floating py-2">
            <input type="text" class="form-control" name="balance" id="floatingInputGrid" placeholder=" transaction date" value="{{$bank->balance}}">
            <label for="floatingInputGrid">Opening balance / Ledger Balance</label>
            @if ($errors->has('balance'))
                <span class="text-danger">{{ $errors->first('balance') }}</span>
            @endif
          </div>
        </form>
        </div>
        
        
     
      </div>
       
      </div>
        
     </div>
      </div>
    </main>
  </div>
</div>
@endsection