@section('title')
Edit Expense Category
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
      <h2>Edit Expenses  Categry </h2>
      <div class="table-responsive py-2">
        
      
      <div class="row g-2">
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="col-md p-2 py-2">
        
            <form method="POST" action="{{ route('expense-categories.update',$expenseCategory->id) }}">
               @csrf
               @method('PUT')
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="category" id="floatingInputGrid" placeholder=" transaction date" value="{{$expenseCategory->category}}">
            <label for="floatingInputGrid">Expense Catgory</label>
          </div>
        
          <div class="form-floating py-2">
            <input type="text" class="form-control" name="description" id="floatingInputGrid" placeholder=" transaction date" value="{{$expenseCategory->description}}">
            <label for="floatingInputGrid">Description</label>
          </div>
          
          <div class="py-4 w-100">
          <button type="submit" class="btn btn-danger w-100  px-6 py-4">Update Expense Category</button>
        </div>
        </form>
        </div>
       
          <div class="col-md">
          <h2 class="border-bottom border-bottom-2">Recent Expenses</h2>
          <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Category</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($expenseCategories as $expCat)
            <tr>
              <td>{{$expCat->id}}</td>
              <td>{{$expCat->category}}</td>
              <td>{{$expCat->description}}</td>
              <td class="items-center d-flex justify-content-between ml-1">
                  <a href="{{ route('expense-categories.edit', $expCat->id) }}" class="btn btn-warning btn-sm  mb-1">Edit</a>
                  @if(auth()->user()->user_type == 'admin')
                  <form action="{{ route('expense-categories.destroy', $expCat->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
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
              <th scope="col">ID</th>
              <th scope="col">Category</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>
              
            </tr>
          </tfoot>
        </table>
          {{ $expenseCategories->links() }}
          </div>
      
        
      
     </div>
        
     </div>
      </div>
    </main>
  </div>
</div>
@endsection