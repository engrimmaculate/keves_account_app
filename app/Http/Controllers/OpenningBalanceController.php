<?php

namespace App\Http\Controllers;

use App\Models\OpenningBalance;
use App\Models\BankAccount;
use App\Models\PettyCash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OpenningBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // display the list of resource listings for the Account Openning Balance
        $data=[];
        $banks = BankAccount::all();
        $bankList = BankAccount::all()->count();
        $bankAccounts = BankAccount::latest()->paginate(6);
        $totalBalance = BankAccount::all()->pluck('balance')->sum();
        $pettyCashes = PettyCash::latest()->paginate(6);
        $data['sumCredit'] = PettyCash::all()->pluck('cash_in')->sum();
        $data['sumDebit'] = PettyCash::all()->pluck('cash_out')->sum();
        return view('dashboard.pettycash', compact('bankList','totalBalance','bankAccounts','data','banks'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        // display the form for creating a new resource opening balance and bank account
        $data=[];
        $banks = BankAccount::all();
        $bankList = BankAccount::all()->count();
        $bankAccounts = BankAccount::latest()->paginate(6);
        $totalBalance = BankAccount::all()->pluck('balance')->sum();
        $pettyCashes = PettyCash::latest()->paginate(6);
        $data['sumCredit'] = PettyCash::all()->pluck('cash_in')->sum();
        $data['sumDebit'] = PettyCash::all()->pluck('cash_out')->sum();
        return view('dashboard.pettycash_opening_balance', compact('bankList','totalBalance','bankAccounts','data','banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // store a new resource Openining balance in storage
         $request->validate([
            'bank_account_id' =>'required|exists:bank_accounts,id',
            'description' =>'required|string',
            'opening_balance' => 'required|string',
            'closing_balance' => 'required|string',
            'starts_on' => 'required|date',
            'ends_on' => 'required|date',
            'period_in_days' =>'required|string',
            'calender_month' => 'required|string',
            'fiscal_year' =>'required|string',
            'status' => 'required|string',
        ]);
        dd($_POST);
    // BankAccount::create($request->all());
        OpenningBalance::create($request->all());
        return redirect()->back()->with('success', 'Petty Cash Opening Balance added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(OpenningBalance $openningBalance):View
    {
        // display a specific resource of openning balance
        $pettyCash = OpenningBalance::latest()->paginate(6);
        return view('dashboard.pettycash_show', compact('pettyCash','openningBalance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OpenningBalance $openningBalance):View
    {
        //
        $bankAccounts = OpenningBalance::latest()->paginate(6);
        return view('dashboard.edit_bank_account', compact('bank','bankAccounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OpenningBalance $openningBalance):RedirectResponse
    {
        //
        $openningBalance->update($request->all());
        return redirect()->back()->with('success', 'Bank Account updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OpenningBalance $openningBalance)
    {
        //
    }
}
