@section('title')
Edit Expenses
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
      <h2>Edit Expenses  </h2>
      <div class="table-responsive py-2">
        
      
      <div class="row g-2">
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
            <div class="col-md  py-2">
            <form method="POST" action="{{ route('expenses.update',$expense->id) }}">
               @csrf
               @method('PUT')
              <div class="form-floating">
                <select class="form-select" id="floatingSelectGrid" name="account_type">
                <option >Account Type(Unit)</option>
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
                <input type="date" class="form-control" name="transaction_date" value="{{$expense->transaction_date}}" id="floatingInputGrid" placeholder=" transaction date" value="">
                <label for="floatingInputGrid">Transaction Date</label>
                @if ($errors->has('transaction_date'))
                  <span class="text-danger">{{ $errors->first('transaction_date') }}</span>
                @endif
              </div>
              <div class="form-floating py-2">
                <select class="form-select" id="floatingSelectGrid" value="{{$expense->narration}}" name="narration">
                  <option selected>.. Select Category ..</option>
                  @foreach ($expenseCategory as $expense)
                  <option value="{{$expense->id}}">{{$expense->category}}</option>
                  @endforeach  
                </select>
                <label for="floatingSelectGrid">Select Naration (Expense Category )</label>
                @if ($errors->has('narration'))
                  <span class="text-danger">{{ $errors->first('narration') }}</span>
                @endif
              </div>
              <div class="form-floating py-2">
                <input type="amount" value="{{ $expense->amount}}" class="form-control" id="floatingInputGrid" name="amount" placeholder="enter expense amount" >
                <label for="floatingInputGrid">Amount</label>
                
                @if ($errors->has('amount'))
                  <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
              </div>
              <div class="form-floating py-2">
              <input type="text" class="form-control" value="{{$expense->description}}" id="floatingInputGrid" name="description" placeholder="Description ">
                <label for="floatingSelectGrid"> Expense Description</label>
                @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
              </div>
              <div class="form-floating py-2">
                <input type="text" class="form-control" value="{{$expense->remarks}}" id="floatingInputGrid" name="remarks" placeholder="Remarks ">
                <label for="floatingInputGrid">Remark</label>
                @if ($errors->has('remarks'))
                  <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
              </div>
              <div class="py-4 w-100 py-2">
              <button  type="submit" class="btn btn-danger w-100  px-6 py-4">Update Expense Changes</button>
              </div>
            </form>
            </div>
       
          <div class="col-md">
            <h2 class="border-bottom border-bottom-2">Recent Expenses</h2>
            <table class="table table-striped table-sm text-center">
              <thead>
                <tr>
                  <th scope="col fw-bold text-center" align="center">ID</th>
                  <th scope="col fw-bold text-center" align="center">description</th>
                  <th scope="col fw-bold text-center" align="center">account_type</th>
                  <th scope="col fw-bold text-center" align="center">amount</th>
                  <th scope="col fw-bold text-center" align="center">narration</th>
                  <th scope="col fw-bold text-center" align="center">remarks</th>
                  <th scope="col fw-bold text-center" align="center">transaction_date</th>
                </tr>
              </thead>
              <tbody>
            
              @foreach ($expenses  as $expense)
              <tr>
                  <td>{{ $expense->id }} </td>
                  <td>{{ $expense->description }}</td>
                  <td>{{ $expense->account_type }}</td>
                  <td>{{ $expense->amount }}</td>
                  <td>{{ $expense->narration }}</td>
                  <td>{{ $expense->remarks }}</td>
                  <td>{{ $expense->transaction_date }}</td>
                </tr>
              @endforeach
              
                
                
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Account Type</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Date</th>
                  <th scope="col">remark</th>
                  
                </tr>
              </tfoot>
            </table>
            {{ $expenses->links() }}
          </div>
      
        </div>
      
     </div>
        
     </div>
      </div>
    </main>
  </div>
</div>
@endsection