<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\BeginningBalance;
use App\Models\PettyCash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\PettyCashPostRequest;
use App\Models\Account;
use App\Models\Expense;
use App\Models\ExpenseCategory;

class PettyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // display the resource listing page
        $data=[];
        $banks = BankAccount::all();
        $bankList = BankAccount::all()->count();
        $bankAccounts = BankAccount::latest()->paginate(6);
        $totalBalance = BankAccount::all()->pluck('balance')->sum();
        $pettyCashes = PettyCash::latest()->paginate(6);
        $data['sumCredit'] = PettyCash::all()->pluck('cash_in');
        $data['sumDebit'] = PettyCash::all()->pluck('cash_out')->sum();
        $balances = BeginningBalance::latest()->paginate(6);
        $opnbal = BeginningBalance::latest()->get()->first();
        $openingbalance = $opnbal->opening_balance;
        // get petty cash opening balance
        $pt =  PettyCash::latest()->get()->first();
        if(!empty( $pt['balance'])){
             $bal = $pt->balance;
             return view('dashboard.pettycash', compact('bankList','totalBalance','bankAccounts','data','banks','pettyCashes','bal','openingbalance'));
        }else{
            $bal = BeginningBalance::latest()->get()->first();
            $bal = $bal->opening_balance;
            return view('dashboard.pettycash', compact('bankList','totalBalance','bankAccounts','data','banks','pettyCashes','bal','openingbalance'));
        }
        
        
       
        return view('dashboard.pettycash', compact('bankList','totalBalance','bankAccounts','data','banks','pettyCashes','bal','openingbalance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // diaplay the form for creating a new resource petty cash transfer account
        return view('dashboard.pettycash_create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // store the resource petty cash transactions in storage
       $data = $request->validate([
            'cash_in' =>'required|string',
            'cash_out' => 'required|string',
            'transaction_date' =>'required|date',
            'particulars' => 'required|string',
            'opening_balance' =>'required|string',
            'closed_balance' => 'required|string',
            'balance' =>'required|string',
            'acct_period' => 'required|string',
            'voucher_no' => 'required|integer|unique:petty_cashes,Voucher_no',
        ]);
        // dd(str_replace(',','',$data['opening_balance']));
        
        $data['opening_balance'] =str_replace(',','',$data['opening_balance']);
        // dd($data);
        $pt =  PettyCash::latest()->get()->first();
        // dd($pt);
        if($pt === null){
            $data['opening_balance'] =$data['opening_balance']; 
            // dd($data['opening_balance']);
            // if($data['cash_out']  == 0){
            //     $data['cash_out'] ='';
            // }else if($data['cash_in'] == 0){
            //     $data['cash_in'] ='';
            // }
        if( $data['cash_out']  == 0 && $data['cash_in'] > 0){
            
            $data['balance'] = floatval($data['opening_balance'])+ intval($data['cash_in']);
        }else{
            $data['balance'] = $data['opening_balance'] -  $data['cash_out'];
        }
        // dd($data);
        PettyCash::create($data);

        return redirect()->back()->with('success', 'Petty Cash transaction added successfully.');
        }else{
        $pt_bal = $pt->balance;
        if(empty($pt_bal)){
            $bal = $bg_bal = BeginningBalance::latest()->get()->first();
            $data['opening_balance'] =(int)$data['opening_balance']/100; 
        }else{
          // dd($data['opening_balance']);
        if( $data['cash_out']  == 0){
            $data['balance'] = $data['opening_balance'] + $data['cash_in'];
        }else{
        $data['balance'] = floatval($data['opening_balance'] )- $data['cash_out'];
        }
        // dd($data);
        PettyCash::create($data);

        return redirect()->back()->with('success', 'Petty Cash transaction added successfully.'); 
        }
        
    }
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id)
    {
        // dd($id);
        //display a specific resource petty cash transaction
        $pettyCash = PettyCash::findOrFail($id);
        // dd($pettyCash);
        $data=[];
        $banks = BankAccount::all();
        $bankList = BankAccount::all()->count();
        $bankAccounts = BankAccount::latest()->paginate(6);
        $totalBalance = BankAccount::all()->pluck('balance')->sum();
        $pettyCashes = PettyCash::latest()->paginate(6);
        $data['sumCredit'] = PettyCash::all()->pluck('cash_in')->sum();
        $data['sumDebit'] = PettyCash::all()->pluck('cash_out')->sum();
        return view('dashboard.petty_cash_show', compact('pettyCash','bankList','totalBalance','pettyCashes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //display a specific resource for editing
        $pettyCash = PettyCash::findOrFail($id);
        $data=[];
        $banks = BankAccount::all();
        $bankList = BankAccount::all()->count();
        $bankAccounts = BankAccount::latest()->paginate(6);
        $totalBalance = BankAccount::all()->pluck('balance')->sum();
        $pettyCashes = PettyCash::latest()->paginate(6);
        $data['sumCredit'] = PettyCash::all()->pluck('cash_in')->sum();
        $data['sumDebit'] = PettyCash::all()->pluck('cash_out')->sum();
        return view('dashboard.petty_cash_edit', compact('pettyCash','bankList','totalBalance','pettyCashes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update  aspecific resource petty ash transaction in storage
        $request->validate([
            'cash_in' =>'required|string',
            'cash_out' => 'required|string',
            'transaction_date' =>'required|date',
            'particulars' => 'required|string',
            'opening_balance' =>'required|string',
            'closed_balance' => 'required|string',
            'balance' =>'required|string',
            'acct_period' => 'required|string',
            'voucher_no' => 'required|string',
        ]);

        $pettyCash = PettyCash::findOrFail($id);
        $pettyCash->update($request->all());
        return redirect()->back()->with('success', 'Petty Cash transaction updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete a specific resource from storage
        $pettyCash = PettyCash::findOrFail($id);
        $pettyCash->delete();
        return redirect()->back()->with('success', 'Petty Cash transaction deleted successfully.');
    }

    /**
     * Set Petty Cash Book form for a specific fiscal year
     */

     public function showPettycashReportForm():View
     {
        return view('dashboard.pettycashreport');
     }
     /**
     * Generate Petty Cash Book for a specific fiscal year in a calender month between two dates
     */
     public function generatePettycashReport(Request $request):View
     {
        // generate peety cash report for a  month starting from now and ending
        $pettyreport = $request->validate([
            'start_date' =>'required|date',
            'end_date' => 'required|date',
        ]);
        $startDate = $request->start_date;
        $endDate = $request->end_date;        
        $petty_reports = PettyCash::whereBetween('transaction_date', [$startDate, $endDate])->get();
        $close_bal_report = PettyCash::whereBetween('transaction_date', [$startDate, $endDate])->get();
        // dd($petty_reports);
        $opnbal = BeginningBalance::latest()->get()->first();
        $openingbalance = $opnbal->opening_balance;
        $data=[];
        $data['open_balance'] = $openingbalance;
        $data['cl_bal'] = $petty_reports->pluck('balance')->first();
        $data['cash_in_total'] = $petty_reports->pluck('cash_in')->sum();
        $data['cash_out_total'] = $petty_reports->pluck('cash_out')->sum();
        $data['balance'] = $petty_reports->pluck('balance')->sum();
        $data['closing_bal'] = $data['cash_in_total'] - $data['cash_out_total'];
        $data['start_date'] =$startDate;
        $data['end_date'] =$endDate;
        // dd($data);

        return view('pettycash_report.pettycash_report', compact('petty_reports','data'));

     }

    //  diasplay post petty cash report form with a specific expense resource

    public function showPettyCashPost (Request $request, $id):View
    {
       
        $pettyCash = PettyCash::findOrFail($id);
        $data=[];
        $expenseCategory =ExpenseCategory::orderby('created_at')->get();
        $account = Account::all();
        $banks = BankAccount::all();
        $bankList = BankAccount::all()->count();
        $bankAccounts = BankAccount::latest()->paginate(6);
        $totalBalance = BankAccount::all()->pluck('balance')->sum();
        $pettyCashes = PettyCash::latest()->paginate(6);
        $data['sumCredit'] = PettyCash::all()->pluck('cash_in')->sum();
        $data['sumDebit'] = PettyCash::all()->pluck('cash_out')->sum();
        return view('dashboard.pettycash_post_to_journal', compact('pettyCash','bankList','totalBalance','pettyCashes','account','expenseCategory'));

    }

    /**
     * Post  Petty Cash Book for a specific Resource or fiscal year in a calender month between two dates
     */

     public function postPettyCashReport(PettyCashPostRequest $request){
        // dd($request);
        $pettycash = $request->validated();
        // $pettyCash = PettyCash::findOrFail($id);
        // dd($pettycash);
        $expense = new Expense;
        $expense->account_type=$request->account_type;
        $expense->expense_category_id=$request->expense_category_id;
        if ($request->cash_in == '0') {
            $amount = $request->cash_out;
        } else {
            $amount = $request->cash_in;
        }
        $expense->amount=$amount;
        $expense->description=$request->particulars;
        $expense->transaction_date=$request->transaction_date;
        $expense->remarks=$request->particulars;
        $expense->voucher_no=$request->voucher_no;
        $expense->pettycash_id=$request->pettycash_id;
        // dd($expense);
        $expense->save();
        $pettyCash = PettyCash::findOrFail($request->pettycash_id);
        $pettyCash->post_status='posted';
        $pettyCash->save();
        // $pettyCash->update($request->all());
        // $expense->create($request->all());
        return redirect()->back()->with('success', 'Petty Cash Report has been successfully Posted to Journal');
     }
}
