@section('title')
Manage Users
@endsection

@extends ('components.layout-main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Manage Receipts & Vouchers</h1>
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
          <h4 class="card-title">2100</h4>
          <p class="card-text text-bold text-primary">RECEIPS</p>
          <a href="#" class="btn btn-primary mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" height="20" widhth="30" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 511.99">
            <path fill="#00AB42" fill-rule="nonzero" d="M256 0c70.68 0 134.68 28.67 181.01 74.99 46.32 46.32 74.99 110.32 74.99 181S483.33 390.68 437.01 437c-46.33 46.33-110.33 74.99-181.01 74.99-70.68 0-134.68-28.66-181.01-74.99C28.67 390.68 0 326.67 0 255.99c0-70.68 28.67-134.68 74.99-181C121.32 28.67 185.32 0 256 0z"/>
            <path fill="#d35832" d="M234.68 130.59h42.64c10.11 0 18.38 8.29 18.38 18.39v67.32h67.32c10.11 0 18.38 8.33 18.38 18.38v42.63c0 10.09-8.3 18.38-18.38 18.38H295.7v67.32c0 10.1-8.28 18.39-18.38 18.39h-42.64c-10.1 0-18.38-8.27-18.38-18.39v-67.32h-67.32c-10.08 0-18.38-8.26-18.38-18.38v-42.63c0-10.12 8.27-18.38 18.38-18.38h67.32v-67.32c0-10.12 8.27-18.39 18.38-18.39z"/>
          </svg>
            ADD RECEIPTS
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
          <h4 class="card-title text-2xl text-bold">100</h4>
          <p class="card-text text-bold text-danger">INCOME TYPES</p>
          <a href="{{ route('income-categories.index')}}" class="btn btn-danger">
          <svg xmlns="http://www.w3.org/2000/svg" height="20" widhth="30" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 511.99">
            <path fill="#00AB42" fill-rule="nonzero" d="M256 0c70.68 0 134.68 28.67 181.01 74.99 46.32 46.32 74.99 110.32 74.99 181S483.33 390.68 437.01 437c-46.33 46.33-110.33 74.99-181.01 74.99-70.68 0-134.68-28.66-181.01-74.99C28.67 390.68 0 326.67 0 255.99c0-70.68 28.67-134.68 74.99-181C121.32 28.67 185.32 0 256 0z"/>
            <path fill="#d35832" d="M234.68 130.59h42.64c10.11 0 18.38 8.29 18.38 18.39v67.32h67.32c10.11 0 18.38 8.33 18.38 18.38v42.63c0 10.09-8.3 18.38-18.38 18.38H295.7v67.32c0 10.1-8.28 18.39-18.38 18.39h-42.64c-10.1 0-18.38-8.27-18.38-18.39v-67.32h-67.32c-10.08 0-18.38-8.26-18.38-18.38v-42.63c0-10.12 8.27-18.38 18.38-18.38h67.32v-67.32c0-10.12 8.27-18.39 18.38-18.39z"/>
          </svg>
            ADD INCOME TYPES
          </a>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 card img-fluid flex-row-reverse py-5 px-2 h-50">
        <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96.41 122.88" height="80" widhth="80" class="text-danger">
          <title>bill</title>
          <path d="M65.07,122.88H5.46a5.45,5.45,0,0,1-3.85-1.61A5.36,5.36,0,0,1,0,117.42V5.45A5.35,5.35,0,0,1,1.61,1.61,5.36,5.36,0,0,1,5.46,0H90.87a5.48,5.48,0,0,1,5.45,5.45V91.12a3.1,3.1,0,0,1,.09.61,2.58,2.58,0,0,1-.83,1.86l-28.17,28.5a3.77,3.77,0,0,1-2.34.79ZM27,87.25a12.91,12.91,0,0,1,9.17,3.8l.07.07A13,13,0,1,1,27,87.25Zm0,6.08a6.89,6.89,0,1,1-6.88,6.88A6.89,6.89,0,0,1,27,93.33Zm7.35-.46a10.28,10.28,0,1,0,.06.06l-.06-.06ZM14.88,13.29H29.49a.84.84,0,0,1,.84.84V27.45a.85.85,0,0,1-.84.84H14.88a.85.85,0,0,1-.84-.84V14.13a.84.84,0,0,1,.84-.84ZM78.7,28.1H69.34V13.48H74V24.36H78.7V28.1Zm-11,0H58.35V13.48H63V24.36h4.68V28.1ZM51,28.1V13.48h4.68V28.1Zm-14.2,0V13.48h7.58a4.41,4.41,0,0,1,3,.82,3,3,0,0,1,.9,2.38,4.22,4.22,0,0,1-.58,2.42,2.65,2.65,0,0,1-1.53,1.12v.14C48.05,20.68,49,22,49,24.21A4.13,4.13,0,0,1,48.06,27a3.66,3.66,0,0,1-2.88,1.07Zm6.51-5.83H41.46v2.39h1.8c.66,0,1-.4,1-1.19s-.32-1.2-1-1.2Zm-.36-5.59H41.46v2.18h1.45c.59,0,.89-.36.89-1.09s-.29-1.09-.87-1.09ZM23.52,45.85a1.76,1.76,0,0,1,0-3.51H58.64a1.76,1.76,0,0,1,0,3.51Zm0,26.88a1.75,1.75,0,1,1,0-3.5H72a1.75,1.75,0,0,1,0,3.5Zm0-10.7a1.75,1.75,0,1,1,0-3.5H58.64a1.75,1.75,0,0,1,0,3.5Zm55.8-8.43H17.09V77.54H79.32V53.6ZM17.09,50.1H79.32V37.59H17.09V50.1Zm-1.75-16H81.07a1.75,1.75,0,0,1,1.75,1.75V79.29A1.75,1.75,0,0,1,81.07,81H15.34a1.75,1.75,0,0,1-1.75-1.75V35.83a1.75,1.75,0,0,1,1.75-1.75ZM63,118V96.65a7.37,7.37,0,0,1,7.4-7.4H91.34V5.45a.47.47,0,0,0-.18-.4.52.52,0,0,0-.39-.18H5.41a.47.47,0,0,0-.4.18.63.63,0,0,0-.17.4v112a.41.41,0,0,0,.17.4.55.55,0,0,0,.4.17H63Zm4.89-21.33v17.87L88,94.14H70.4a2.64,2.64,0,0,0-1.77.74,2.52,2.52,0,0,0-.74,1.77Z"/></svg>
        <div class="card-img-overlay">
          <h4 class="card-title text-bold">2100</h4>
          <p class="card-text text-success font-bold">BILL INVOICE</p>
          <a href="#" class="btn btn-success">
          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.88" height="20" widhth="30">
            <defs><style>.cls-1{fill-rule:evenodd;}</style></defs>
            <title>add-plus</title>
            <path class="cls-1" d="M61.44,0A61.44,61.44,0,1,1,0,61.44,61.44,61.44,0,0,1,61.44,0ZM93.79,55.21V67.66a4.63,4.63,0,0,1-4.62,4.62H72.28V89.17a4.63,4.63,0,0,1-4.62,4.62H55.21a4.63,4.63,0,0,1-4.61-4.62V72.28H33.7a4.63,4.63,0,0,1-4.61-4.62V55.21A4.63,4.63,0,0,1,33.7,50.6H50.6V33.7a4.63,4.63,0,0,1,4.61-4.61H67.66a4.63,4.63,0,0,1,4.62,4.61V50.6H89.17a4.63,4.63,0,0,1,4.62,4.61Z"/>
        </svg>
            ADD BILLING
          </a>
        </div>
      </div>
      </div>
      <h2> Edit Income Records : {{$income->voucher_id}}</h2>
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

      <div class="col-md p-2">
        <form action="{{ route('income.update',$income->id)}}" method="POST">
        @csrf  
        @method('PUT')
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputGrid" name="voucher_id" placeholder="Voucher or Receipt Number" value="{{$income->voucher_id}}" readonly>
            <label for="floatingInputGrid">Reference / Receipt Number</label>
            @if ($errors->has('voucher_id'))
                <span class="text-danger">{{ $errors->first('voucher_id') }}</span>
            @endif
          </div>
          <div class="form-floating py-2">
            <select class="form-select  form-control input-group mb-3 py-3" name="income_stream" aria-label="Select-Account">
            <option value="{{$income->income_stream}}"> ... {{$income->income_stream}}... </option>
                @foreach ($incomeCategory as $inc)
                  <option value="{{$inc->id}}">{{$inc->category ." (". $inc->description. " )"}}</option>
                @endforeach  
            </select>
            @if ($errors->has('income_stream'))
                <span class="text-danger">{{ $errors->first('income_stream') }}</span>
            @endif
          </div>
          <!-- <div class="form-floating py-2">
            <input type="text" class="form-control" id="floatingInputGrid" name="income_stream" placeholder="name@example.com" value="">
            <label for="floatingInputGrid">Income Source</label>
          </div> -->
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="amount" id="floatingInputGrid" placeholder="Amount" value="{{$income->amount}}">
            <label for="floatingInputGrid">amount</label>
            @if ($errors->has('amount'))
                <span class="text-danger">{{ $errors->first('amount') }}</span>
            @endif
          </div>
          <div class="form-floating py-2">
          <select class="form-select form-control input-group mb-3 py-3" name="payment_method" aria-label="Select-Account">
              <option value="{{$income->payment_method}}"> ... {{$income->payment_method}}... </option>

              <option value="Cash">Cash</option>
              <option value="cheque">cheque</option>
              <option value="pos">POS</option>
              <option value="bank transfer">Bank Transfer</option>
          </select>
            @if ($errors->has('payment_method'))
                <span class="text-danger">{{ $errors->first('payment_method') }}</span>
            @endif
          </div>
          <div class="form-floating py-2">
            <input type="date" class="form-control" name="transaction_date" id="floatingInputGrid" placeholder="name@example.com" value="{{$income->transaction_date}}">
            <label for="floatingInputGrid">Transaction Date</label>
          </div>
          <div class="form-floating py-2">
    
          <select class="form-select form-control input-group mb-3 py-3" name="transaction_type" aria-label="Select-Account">
              <option value="{{$income->transaction_type}}"> ... {{$income->transaction_type}}... </option> 
              <option > ... Transaction Type ... </option>
              <option value="inflow">In Flow (Credit) </option>
              <option value="out flow">Out Flow (Debit) </option>
          </select>
            @if ($errors->has('transaction_type'))
                <span class="text-danger">{{ $errors->first('transaction_type') }}</span>
            @endif
          </div>
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="period_in_days" id="floatingInputGrid" placeholder="Account Period in Days" value="{{ '1 - ' . cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'))  }}" readonly>
            <label for="floatingInputGrid">Period in Days</label>
            @if ($errors->has('period_in_days'))
                <span class="text-danger">{{ $errors->first('period_in_days') }}</span>
            @endif
          </div>
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="month_name" id="floatingInputGrid" placeholder="Account Period Calender month" value="{{date('M').' - '. date('Y')}}" readonly>
            <label for="floatingInputGrid">Calender Month</label>
            @if ($errors->has('month_name'))
                <span class="text-danger">{{ $errors->first('month_name') }}</span>
            @endif
          </div>
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="fiscal_year" id="floatingInputGrid" placeholder="Fiscal year" value="{{'Jan -01- '. date('Y') . ' - Dec-30-'.date('Y') }}" readonly>
            <label for="floatingInputGrid">Fiscal Year</label>
            @if ($errors->has('fiscal_year'))
                <span class="text-danger">{{ $errors->first('fiscal_year') }}</span>
            @endif
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" name="remarks"  id="floatingInputGrid" placeholder="remark" value="{{$income->remarks}}">
            <label for="floatingInputGrid">Remarks</label>
            @if ($errors->has('remarks'))
                <span class="text-danger">{{ $errors->first('remarks') }}</span>
            @endif
          </div>
          <div class="py-4 w-100">
          <button type="submit" class="btn btn-danger w-100  px-6 py-4">Save & Post </button>
          </div>
        </form>
      </div>
        
      <div class="col-md">
        <table class="table table-striped table-sm text-center align-content-center justify-content-center align-items-middle">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Invoice No</th>
              <th scope="col">Amount</th>
              <th scope="col">Transaction Type</th>
              <th scope="col">Method</th>
              <th scope="col">remark</th>
              <td scope="col">Action</td>
              
            </tr>
          </thead>
          <tbody>
            @foreach($incomes as $income)
            <tr>
              <td class="py-2">{{$income->id}}</td>
              <td class="py-2">{{$income->voucher_id}}</td>
              <td class="py-2">{{$income->amount}}</td>
              <td class="py-2">{{$income->transaction_type}}</td>
              <td class="py-2">{{$income->payment_method}}</td>
              <td class="py-2">{{$income->remarks}}</td>
              <td class="d-flex justify-content-between items-center py-4">
                <a href="{{route('income.show', $income->id)}}" class="btn btn-primary btn-sm mr-1">View</a>
                <a href="{{route('income.edit', $income->id)}}" class="btn btn-warning btn-sm mr-1">Edit</a>
                @if(auth()->user()->user_type == 'admin')
                  <form action="{{route('income.destroy', $income->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                @endif
              </td>
            </tr>
            <!-- <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr> -->
            @endforeach
          </tbody>
          <tfoot>
            <tr>
            <th scope="col">ID</th>
              <th scope="col">Invoice No</th>
              <th scope="col">Amount</th>
              <th scope="col">Transaction Type</th>
              <th scope="col">Method</th>
              <th scope="col">remark</th>
              <td scope="col">Action</td>
              
            </tr>
          </tfoot>
        </table>
        {{ $incomes->links() }}
      </div>
     </div>
        
     </div>
      </div>
    </main>
  </div>
</div>
@endsection