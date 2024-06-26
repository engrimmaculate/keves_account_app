<?php

namespace App\Http\Controllers;

use App\Models\BeginningBalance;
use App\Models\OpenningBalance;
use App\Models\BankAccount;
use App\Models\PettyCash;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BeginningBalanceController extends Controller
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
        $balances = BeginningBalance::latest()->paginate(6);
        return view('dashboard.pettycash', compact('bankList','totalBalance','bankAccounts','data','banks','balances'));
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
        // $balances = BeginningBalance::latest()->paginate(6);
        $balances = BeginningBalance::paginate(6);
        return view('dashboard.pettycash_opening_balance', compact('bankList','totalBalance','bankAccounts','data','banks','balances'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        // store a new resource Openining balance in storage
        $data = $request->validate([
            'bank_account_id' =>'required|string',
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
        // echo dd($request->bank_account_id);
        $current_balance = BeginningBalance::where(['status',$request->status])->get();
        // dd($current_balance);
        $dt = DB::table('beginning_balances')->where('bank_account_id',$request->bank_account_id)->orWhere('status','active')->first();
        // dd($dt);
        $mnt = Carbon::now()->monthName;
        if(!empty($dt)){
            $strt = $dt->starts_on;
        $strt = strtotime($strt);
        $strtime = date('F',$strt);
        // echo dd($mnt,$strtime,$strt);
        if($mnt != $strtime){
            // $balances = BeginningBalance::latest()->paginate(6)->with('bankAccount:account_no,bank_name,account_name')->get();
            $balances = BeginningBalance::find(1)->paginate(6)->all();
            return redirect()->back()->with('success', 'You cannot have Two Opeining balances in a given month.');

        }else{
            // dd($data);
            BeginningBalance::create($data);
            // dd(BeginningBalance::create($request->all()));
            $balances = BeginningBalance::latest()->paginate(6)->all();
            return redirect()->back()->with('success', 'Petty Cash Opening Balance Was Set successfully.');
        
        }
        }
        
        BeginningBalance::create($data);
        // dd(BeginningBalance::create($request->all()));
        $balances = BeginningBalance::latest()->find(1)->bankAccount()->paginate(6)->all();
        return redirect()->back()->with('success', 'Petty Cash Opening Balance Was Set successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BeginningBalance $beginningBalance):View
    {
        //
        return view('dashboard.show_beginning_balance', compact('beginningBalance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BeginningBalance $beginningBalance):View
    {
        // display the form for editing the specified resource beginning balance
        $data=[];
        $banks = BankAccount::all();
       
        $balances = BeginningBalance::latest()->paginate(6);
        return view('dashboard.edit_beginning_balance', compact('banks','balances','beginningBalance'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BeginningBalance $beginningBalance)
    {
        //
        $data = $request->validate([
            'bank_account_id' =>'required|string',
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
        $beginningBalance->update($data);
        return redirect()->back()->with('success', 'Beginning Balance Was  updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BeginningBalance $beginningBalance)
    {
        // Delete the resource from storage
        $beginningBalance->delete();
        return redirect()->back()->with('success', 'Beginning Balance Was Deleted successfully.');
    }
}
