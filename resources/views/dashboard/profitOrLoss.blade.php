@section('title')
Profits | Loss Report
@endsection

@extends ('components.layout-main')

@section('content')   
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> PROFITS or LOSS</h1>
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
              <!-- filter form for profits or loss report -->
              
              <div class="col-md-8 p-2 py-2">
              <h2 class="text-danger fw-normal">Select Profits or Loss Report to Generate</h2>
              <form class="form-horizontal" action="{{ route('profitsorloss.generateReport')}}" method="post">
                  @csrf
                  
                  <div class="form-floating py-2">
                    <input type="date" class="form-control" name="start_date" id="floatingInputGrid" placeholder=" account no " value="">
                    <label for="floatingInputGrid">Start Date</label>
                    @if ($errors->has('start_date'))
                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                    @endif
                  </div>
                 
                  
                  <div class="form-floating py-2">
                    <input type="date" class="form-control" name="end_date" id="floatingInputGrid" placeholder=" account no " value="">
                    <label for="floatingInputGrid">Ending  Date</label>
                    @if ($errors->has('end_date'))
                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
                    @endif
                  </div>

                  <div class="py-4 w-100">
                  <button type="submit" class="btn btn-danger w-100  px-6 py-4">Generate Profits & Loss Report</button>
                </div>
                  </div>
              </form>
            </div>
          
     </div>
      </div>
    </main>
  </div>
</div>
@endsection