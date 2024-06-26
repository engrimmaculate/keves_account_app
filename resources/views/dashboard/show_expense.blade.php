@section('title')
Manage Users
@endsection

@extends ('components.layout-main')


@section('content')

<div class="card mt-5">
    <h2 class="card-header">Expenses</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('notes.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong> <br/>
                    {{ $expense->narration }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Expense Class:</strong> <br/>
                    {{ $note->account_type }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection