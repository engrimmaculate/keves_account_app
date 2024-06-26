<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $expenseCategory =ExpenseCategory::latest()->paginate(5);
        return view('dashboard.expense_category', compact('expenseCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //show create expense category form
        $expenseCategory =ExpenseCategory::paginate(5);
        // 'expenseCategory' => DB::table('expense_categories')->paginate(15);
        return view('dashboard.expense_category',compact('expenseCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // store new expense category resource in storage
        $request->validate([
            'category' =>'required|string|max:255',
            'description' =>'required|string|max:255',
        ]);

        ExpenseCategory::create($request->all());
        return redirect()->back()
            ->with('success', 'Expense Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory):View
    {
        //show the expense categories in the database
        $expenseCategory = ExpenseCategory::all();
        return view('dashboard.expense_category', compact('expenseCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseCategory $expenseCategory):View
    {
        // show specifice expense category from storage if available
        // $expenseCategory = ExpenseCategory::where('id',$expenseCategory->id);
        $expenseCategories = ExpenseCategory::latest()->paginate(6);

        return view('dashboard.edit_expense_category', compact('expenseCategory','expenseCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpenseCategory $expenseCategory):RedirectResponse
    {
        // update a specific resource in storage
        $request->validate([
            'category' =>'required|string|max:255',
            'description' =>'required|string|max:255',
        ]);

        $expenseCategory->update($request->all());
        return redirect()->back()
            ->with('success', 'Expense Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategory $expenseCategory):RedirectResponse
    {
        // delete a specific resource from storage
        $expenseCategory->delete();
        return redirect()->back()
            ->with('success', 'Expense Category deleted successfully.');
    }
}
