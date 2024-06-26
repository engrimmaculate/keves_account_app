<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Account;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View as ViewView;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // display list of expenses resource
        $expenses = Expense::latest()->paginate(6);
        $expenseCategory =ExpenseCategory::orderby('created_at')->get();
        $account = Account::all();
        $exp_count = Expense::all()->count();
        $expCat_count = ExpenseCategory::all()->count();
        $totalExpenses = Expense::all()->pluck('amount')->sum();

        return view('dashboard.expenses', compact('expenses','expenseCategory','account','exp_count','expCat_count','totalExpenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data =[];
        $expenses = Expense::latest()->paginate(6);
        $expenseCategory =ExpenseCategory::orderby('created_at')->get();
        $account = Account::all();
        $data['exp_count'] = Expense::all()->count();
        $data['expCat_count'] = ExpenseCategory::all()->count();
        $data['totalExpenses'] = Expense::all()->pluck('amount')->sum();
        // display expense form for creating a new resource
        return view('dashboard.add_expenses', compact('expenses', 'expenseCategory','account','data'));
    }

    public function retrieve()
    {
    return DB::table('expense_categories')
    ->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request):RedirectResponse
    {
        // store newly created expense resource
        
        $data=$request->validate([
            'account_type' =>'required|not_in:0',
            'description' => 'required|string|max:255',
            'amount' =>'required|string|max:255',
            'expense_category_id' => 'required|not_in:0',
            'remarks' =>'required|string',
            'transaction_date' => 'required|date',
        ]);
        
           
        // echo dd($request->all());
        $expense = Expense::create($data);
        return redirect()->back()->with('success', 'Expense added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
        // display list of expenses resource
        $expenses = Expense::all();
        $expenseCategory =ExpenseCategory::orderby('created_at')->get();
        $account = Account::all();
        return view('dashboard.expenses', compact('expenses','account','expenseCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Expense $expense):View
    {
        //
         // display list of expenses resource
         $expenseCategory =ExpenseCategory::orderby('created_at')->get();
         $account = Account::all();
        //  $expense = Expense::where('id', $request->id);
       
         $expenses = Expense::paginate(6); 
        //   dd($expense);
         return view('dashboard.edit_expense', compact('expense','expenses','account','expenseCategory'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense):RedirectResponse
    {
        //
        // update specific resource
        $validator = $request->validate([
            'account_type' =>'required|string|max:200',
            'description' => 'required|string|max: 255',
            'amount' =>'required|string|max:255',
            'narration' => 'required|string|max:255',
            'remarks' =>'required|string',
            'transaction_date' => 'required|date',
        ]);
        
        $expense->update($request->all());
        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense):RedirectResponse
    {
        //destroy specific resource
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
    }
}
