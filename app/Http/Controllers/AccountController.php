<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\SalesIncome;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():RedirectResponse
    {
        //display the resource
        $accounts = Account::all();
        $incomeCount = SalesIncome::all()->count();
        $expenseCount = Expense::all()->count();
        $incomes = SalesIncome::latest()->paginate(6);
        $expenses = Expense::latest()->paginate(6);
        $totalIncome = SalesIncome::all()->pluck('amount')->sum();
        return redirect()->route('account.dashboard');
        // return view('dashboard.index', compact('accounts','totalIncome','incomeCount','expenseCount','incomes','expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //display the form for creating a new resource
        return view('dashboard.add_account');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store new resource
        $request->validate([
            'description' =>'required|string|max:255',
            'account_type' =>'required|string|max:255',
            'balance' =>'required|numeric',
        ]);

        Account::create($request->all());
        return redirect()->route('dashboard.index')->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        // Get the resource from the account
        return view('dashboard.accounts', compact('account'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //show the form for editing the specified resource
        $account = Account::where('id',$account->id);
        return view('dashboard.edit_account', compact('account'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //update the account with the specified account
        $request->validate([
            'account_no' =>'required|string|max:255',
            'description' =>'required|numeric',
            'account_type' =>'required',
            'balance' =>'required|numeric',
        ]);
        $account = Account::where('id',$account->id);
        $request->validate([
            'name' =>'required|string|max:255',
            'balance' =>'required|numeric',
        ]);

        $account->update($request->all());
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //delete a specific resource from storage
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
