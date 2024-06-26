<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class ChartOfAccount extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retun the account details from the database and retrieve the account details from 
        // a third-party API
        $accounts = Account::all();

        return view('chart_of_accounts', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // show create account form
        return view('create_account');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate account form request and store account information in storage
        $request->validate([
            'account_number' =>'required|unique:accounts',
            'account_name' =>'required',
            'account_type' =>'required',
            'balance' =>'required|numeric',
        ]);
        // store account information in the database and return to the chart of accounts page with success message
        $account = Account::create($request->all());

        return redirect()->route('chart_of_accounts.index')
            ->with('success', 'Account created successfully'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        // retrieve the resource from the database
        $account = Account::where('id', $account->id)->first();
        return view('edit_account', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        // display the edit resource form
        $account = Account::where('id', $account->id)->first();
        return view('edit_account', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        // update the account with the specified account
        $request->validate([
            'account_number' =>'required',
            'account_name' =>'required',
            'account_type' =>'required',
            'balance' =>'required|numeric',
        ]);

        $account->update($request->all());

        return redirect()->route('chart_of_accounts.index')
            ->with('success', 'Account updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //delete the account
        $account->delete();

        return redirect()->route('chart_of_accounts.index')
            ->with('success', 'Account deleted successfully');
    }
}
