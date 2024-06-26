<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\SalesIncome;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // display bank account form with current account information and balance   
        $bankAccounts = BankAccount::latest()->paginate(6);
        $bankList = BankAccount::all()->count();
        $totalBalance = BankAccount::all()->pluck('balance')->sum();
        $incomeCount = SalesIncome::all()->count();
        return view('dashboard.bank_accounts', compact('bankAccounts','bankList','totalBalance','incomeCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        // display the form for creating a new resource bank account create_bank_account
        $bankAccounts = BankAccount::latest()->paginate(6);
        $bankList = BankAccount::all()->count();
        $totalBalance = BankAccount::all()->pluck('balance')->sum();
        // $bal =$totalBalance->sum();
        return view('dashboard.bank_accounts',compact('bankAccounts','bankList','totalBalance'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // store the resource in storage
        $request->validate([
            'account_no' =>'required|unique:bank_accounts,account_number',
            'account_name' =>'required',
            'bank_name' =>'required',
            'bank_branch' =>'required',
            'account_type' =>'required',
            'balance' =>'required|numeric',
        ]);

        BankAccount::create($request->all());
        $accounts = BankAccount::latest()->paginate(6);
        return redirect()->route('banks.index')->with('success', 'Bank Account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BankAccount $bank):View
    {
        // display the a specific bank accou t resource
        // dd($bankAccount);
        // $bankAccounts = BankAccount::latest()->paginate(6);
        return view('dashboard.show_bank_details', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankAccount $bank):View
    {
        // dd($bankAccounts);
        // show edit form with a epecific bank account resource
        $bankAccounts = BankAccount::latest()->paginate(6);
        return view('dashboard.edit_bank_account', compact('bank','bankAccounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankAccount $bank):RedirectResponse
    {
        // update a specific resource bank account account
        $request->validate([
            'account_name' =>'required',
            'bank_name' =>'required',
            'bank_branch' =>'required',
            'account_type' =>'required',
            'balance' =>'required|numeric',
        ]);

        $bank->update($request->all());
        return redirect()->back()->with('success', 'Bank Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankAccount $bank):RedirectResponse
    {
        //delete  a specific resource from storage 
        $bank->delete();
        return redirect()->route('banks.index')->with('success', 'Bank Account deleted successfully.');

    }
}
