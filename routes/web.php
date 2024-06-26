<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BalanceSheetController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BeginningBalanceController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OpenningBalanceController;
use App\Http\Controllers\PettyCash;
use App\Http\Controllers\PettyCashController;
use App\Http\Controllers\ProfitorLossController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SalesIncomeController;
use App\Http\Controllers\UserController;
use App\Models\Account;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


Route::get('/', [LoginController::class,'index'])->name('login');

Route::post('/login', [LoginController::class,'login'])->name('auth.login');

// --------------------------- Auth Required  -------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::resource('receipts', ReceiptController::class)->missing(function (Request $request) {
        return Redirect::route('receipts.index');
    });
    Route::resource('accounts', AccountController::class)->missing(function (Request $request) {
        return Redirect::route('accounts.index');
    });

    // ========= Dashboard =============================
    Route::get('/dahboard', [LoginController::class,'dashboard'])->name('account.dashboard');
    Route::get('/logout', [LoginController::class,'logout'])->name('auth.logout');

    
    // ========= User Routes =============================
    
    Route::resource('users', UserController::class)->missing(function (Request $request) {
        return Redirect::route('users.index');
    });
    // ============ Income Routes =============================
   
    Route::resource('/income', SalesIncomeController::class)->missing(function (Request $request) {
        return Redirect::route('income.index');
    });

    // ============ Expense Routes =============================
    Route::resource('/expenses', ExpenseController::class)->missing(function (Request $request) {
        return Redirect::route('expense.index');
    });

    // ============= Bank Acount Routes =============================
    Route::resource('/banks', BankAccountController::class)->missing(function (Request $request) {
        return Redirect::route('expense.index');
    });

    // ============= Income Category Routes =============================
    Route::resource('/income-categories', IncomeCategoryController::class)->missing(function (Request $request) {
        return Redirect::route('income-categories.index');
    });

    // ============= Expense Category Routes =============================
    Route::resource('/expense-categories', ExpenseCategoryController::class)->missing(function (Request $request) {
        return Redirect::route('expense-categories.index');
    });

    // ============= BalanceSheet Routes =================
    Route::resource('/balance-sheet', BalanceSheetController::class)->missing(function (Request $request) {
        return Redirect::route('balance-sheet.index');
    });
    // ================= Generate Balance SHeet Report Routes =================
    Route::post('/balance-sheet-genarate-report', [BalanceSheetController::class,'generateBalanceSheetReport'])->name('balancesheet.generateReport');


    // ============= Profit and Loss Routes =================
    Route::resource('/profitor-loss', ProfitorLossController::class)->missing(function (Request $request) {
        return Redirect::route('profitor-loss.index');
    });

    
    // ================= Generate Profit Or Loss Report Routes =================
    Route::post('/profits-or-loss-genarate-report', [ProfitorLossController::class,'generateProfitOrLossReport'])->name('profitsorloss.generateReport');


    // ================= Petty Cash Routes =================
    Route::resource('/petty-cash', PettyCashController::class)->missing(function (Request $request) {
        return Redirect::route('petty-cash.index');
    });

      // ================= Show Post Petty Cash report Routes =================
      Route::get('/show-pettycash-post-report/{petty_cash}/edit', [PettyCashController::class,'showPettyCashPost'])->name('pettycash.showPettyCashPost');

      // ================= Post Petty Cash report Routes =================
      Route::post('/pettycash-post-report', [PettyCashController::class,'postPettyCashReport'])->name('pettycash.postPettyCashReport');

    // // ================= Opening Balance Routes =================
    // Route::resource('/opening-balance', OpenningBalanceController::class)->missing(function (Request $request) {
    //     return Redirect::route('petty-cash.index');
    // });


    // ================= Generate Petty Cash report Routes =================
    Route::post('/pettycash-genarate-report', [PettyCashController::class,'generatePettycashReport'])->name('pettycash.generateReport');

    // ================= Beginning Balance Routes =================
    Route::resource('/beginning-balance', BeginningBalanceController::class)->missing(function (Request $request) {
        return Redirect::route('beginning-balance.index');
    });


    // dashboard routes 
    // =================================================================
    // Route::get('/dashboard', function () {
    //     return view('dashboard.index');
    // });
    
    // Route::get('/vouchers', function () {
    //     return view('dashboard.vouchers');
    // });
    
    
    // Route::get('/add_receipts', function () {
    //     return view('dashboard.add_receipts');
    // });
    
    // Route::get('/add_expenses', function () {
    //     return view('dashboard.add_expenses');
    // });
    
    // Route::get('/pettycash', function () {
    //     return view('dashboard.pettycash');
    // });

    // =================================================================
});





 
