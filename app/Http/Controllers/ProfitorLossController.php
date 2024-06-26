<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\PettyCash;
use App\Models\ProfitorLoss;
use App\Models\SalesIncome;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use function Laravel\Prompts\table;

class ProfitorLossController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // display the resource list for the current account and the current fiscal year business
        return view('dashboard.profitOrLoss');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfitorLoss $profitorLoss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfitorLoss $profitorLoss)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfitorLoss $profitorLoss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfitorLoss $profitorLoss)
    {
        //
    }

    // prepare Profit or Loss from the busiess performance monitoring
    
    public function generateProfitOrLossReport(Request $request):View
     {
        // generate peety cash report for a  month starting from now and ending
        $pettyreport = $request->validate([
            'start_date' =>'required|date',
            'end_date' => 'required|date',
        ]);
        $startDate = $request->start_date;
        $endDate = $request->end_date;      
        $petty_reports = PettyCash::whereBetween('transaction_date', [$startDate, $endDate])->get();
       
        $income_reports =DB::table('sales_incomes')
                                    ->join('income_categories', 'sales_incomes.income_stream', '=', 'income_categories.id')
                                    ->select('income_stream', DB::raw('SUM(amount) as amount'),'income_categories.category')
                                    ->where('transaction_date', '>=', $startDate)
                                    ->where('transaction_date', '<=', $endDate)
                                    ->groupBy('income_stream')
                                    ->get(['income_stream', 'amount']);
        $expense_reports =DB::table('expenses')
                            ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
                            ->select('expense_category_id', DB::raw('SUM(amount) as amount'),'expense_categories.category')
                            ->where('transaction_date', '>=', $startDate)
                            ->where('transaction_date', '<=', $endDate)
                            ->groupBy('expense_category_id')
                            ->get(['expense_category_id', 'amount']);
        // dd($income_reports,$expense_reports);
        $data=[];
        $data['income'] = $income_reports->pluck('amount')->sum();
        $data['expenses'] = $expense_reports->pluck('amount')->sum();
        $data['balance'] = $petty_reports->pluck('balance')->sum();
        $data['closing_bal'] = $data['income'] - $data['expenses'];
        $data['start_date'] =$startDate;
        $data['end_date'] =$endDate;
        // dd($data,$income_reports,$expense_reports);
        return view('profit-loss_report.profit_loss_report', compact('petty_reports','data','income_reports','expense_reports'));

     }

    
      
}
