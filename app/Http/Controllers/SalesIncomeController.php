<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use App\Models\SalesIncome;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalesIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
        $incomes =SalesIncome::latest()->paginate(6);
        $incomeCategory = IncomeCategory::all();
        return view('dashboard.sales_income',compact('incomes','incomeCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //display create a new resource form
        $incomes =SalesIncome::latest()->paginate(6);
        $salesIncome = SalesIncome::latest()->paginate(6);
        $incomeCategory = IncomeCategory::all();
        return view('dashboard.sales_income',compact('income','salesIncome','incomeCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        $request->validate([
            'voucher_id' =>'required|string|max:255',
            'amount' =>'required|string|max:255',
            'income_stream' =>'required|string|max:255',
            'payment_method' =>'required|string|max:255',
            'transaction_date' =>'required|date',
            'transaction_type' =>'required|string|max:255',
            'period_in_days' =>'required|string|max:255',
            'month_name' =>'required|string|max:255',
            'fiscal_year' =>'required|string|max:255',
            'remarks' =>'required|string|max:255',
        ]);

        SalesIncome::create($request->all());
        $incomes = SalesIncome::latest()->paginate(6);
        return redirect()->route('income.store',compact('incomes'))->with('success', 'Sales Income created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesIncome $income):View
    {
        //
        $salesIncome =SalesIncome::latest()->paginate(6);
        return view('dashboard.view_sales_income', compact('salesIncome','income'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesIncome $income):View
    {
        // 
        $incomes = SalesIncome::latest()->paginate(6);
        $incomeCategory = IncomeCategory::all();
       
        //show edit form with a specific resource for editing

        return view('dashboard.edit_income', compact('incomes','income','incomeCategory'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesIncome $income):RedirectResponse
    {
        // update a specific resource in storage
        $request->validate([
            'voucher_id' =>'required|string|max:255',
            'amount' =>'required|string|max:255',
            'income_stream' =>'required|string|max:255',
            'payment_method' =>'required|string|max:255',
            'transaction_date' =>'required|date',
            'transaction_type' =>'required|string|max:255',
            'period_in_days' =>'required|string|max:255',
            'month_name' =>'required|string|max:255',
            'fiscal_year' =>'required|string|max:255',
            'remarks' =>'required|string|max:255',
        ]);

        $income->update($request->all());
            return redirect()->back()->with('success', 'Sales Income updated successfully.');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesIncome $income):RedirectResponse
    {
        // deletes a specific resource from storage
        // $salesIncome=SalesIncome::where('id',$salesIncome->id);
        $income->delete();
        return redirect()->back()->with('success', 'Sales Income deleted successfully.');
    }
}
