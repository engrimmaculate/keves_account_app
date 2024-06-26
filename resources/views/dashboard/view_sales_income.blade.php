@section('title')
Manage Users
@endsection

@extends ('components.layout-main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2> Invoice Details View  </h2>
      <div class="table-responsive py-2">
      <div class="row g-2">

      <div class="col-md p-2">
        <form action="{{ route('income.store')}}" method="POST">
        @csrf  
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputGrid" name="voucher_id" placeholder="Voucher or Receipt Number" value="{{$income->voucher_id}}" readonly>
            <label for="floatingInputGrid">Reference / Receipt Number</label>
            
          </div>
          <div class="form-floating py-2">
          <label for="floatingInputGrid">Income Source Code</label>
          <input type="text" class="form-control" id="floatingInputGrid" name="voucher_id" placeholder="Voucher or Receipt Number" value="{{$income->voucher_id}}" readonly>
          </div>
          <!-- <div class="form-floating py-2">
            <input type="text" class="form-control" id="floatingInputGrid" name="income_stream" placeholder="name@example.com" value="">
            <label for="floatingInputGrid">Income Source</label>
          </div> -->
          <div class="form-floating py-2">
          <label for="floatingInputGrid">Amount</label>
            <input type="text" class="form-control" name="amount" id="floatingInputGrid" placeholder="Amount" value="{{$income->amount}}">
            <label for="floatingInputGrid">amount</label>
           
          </div>
          <div class="form-floating py-2">
          <label for="floatingInputGrid">Payment Method</label>
          <input type="text" class="form-control" id="floatingInputGrid" name="payment_method" placeholder="Voucher or Receipt Number" value="{{$income->payment_method}}" readonly>

          </div>
          <div class="form-floating py-2">
            <input type="date" class="form-control" name="transaction_date" id="floatingInputGrid" placeholder="Transaction Date" value="{{$income->transaction_date}}">
            <label for="floatingInputGrid">Transaction Date</label>
          </div>
          <div class="form-floating py-2">
          <label for="floatingInputGrid">Transaction Type</label>
          <input type="date" class="form-control" name="transaction_type" id="floatingInputGrid" placeholder="Transaction Date" value="{{$income->transaction_typ}}">

          </div>
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="period_in_days" id="floatingInputGrid" placeholder="Account Period in Days" value="{{ $income->period_in_days}}" readonly>
            <label for="floatingInputGrid">Period in Days</label>
            
          </div>
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="month_name" id="floatingInputGrid" placeholder="Account Period Calender month" value="{{$income->month_name}}" readonly>
            <label for="floatingInputGrid">Calender Month</label>
            
          </div>
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="fiscal_year" id="floatingInputGrid" placeholder="Fiscal year" value="{{$income->fiscal_year}}" readonly>
            <label for="floatingInputGrid">Fiscal Year</label>
           
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" name="remarks"  id="floatingInputGrid" placeholder="remark" value="{{$income->remarks}}">
            <label for="floatingInputGrid">Remarks</label>
            
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