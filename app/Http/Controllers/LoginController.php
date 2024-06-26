<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\BankAccount;
use App\Models\Expense;
use App\Models\LastLogin;
use App\Models\Receipt;
use App\Models\SalesIncome;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }
    // register a user
    public function register(Request $request){
        // register a user
         // Validate the form data
         $validator = $request->validate([
            'name' =>'required|string',
            'email' =>'required|email',
            'password' => 'required|min:8',
        ]);
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Authenticate the user
        auth()->login($user);
        // track the user as logged in user 
        $track_user = LastLogin::create([
            'user_id' => auth()->user()->user_id,
            'last_login' => Carbon::now(),
            'user_ip' => $request->ip(),
        ]);
        // Redirect to the dashboard
        return redirect()->route('account.dashboard',compact('track_user'));

    }
     // login a user
     public function login(Request $request){
        // Validate the form data
        $validator = $request->validate([
            'email' =>'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to authenticate the user
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            // get the Authenticatd user
            $loggedUser = Auth::user()->id;
            // check if the user is already logged in before continuing
            $check_user = LastLogin::where('user_id', $loggedUser)->first();
            // dd(date_parse($check_user->last_login),date('d'));
        if(!empty($check_user)){
            $tdy = date_parse($check_user->last_login);
        
            // dd($tdy['day'],date('d'));
            if($check_user && $tdy['day'] == date('d')){

                $check_user->update([
                    'last_login' => Carbon::now(),
                    'user_ip' => $request->ip(),
                ]);
                   
                
            }}
            else{
                // track the user as logged in user 
                $track_user = LastLogin::create([
                    'user_id' => Auth::user()->id,
                    'last_login' => Carbon::now(),
                    'user_ip' => $request->ip(),
                ]);
               
            }
            
        
            return redirect()->route('account.dashboard','track_user');
        } else {
            $validator['emailPassword'] = 'Email address or password is incorrect.';
            return back()->withErrors($validator);
        }
    }

    // Dashboard route after login

    public function dashboard(Request $request){
        // Validate the form data
        if(Auth::check() & Auth::user()->user_status == 'active') {
       $accounts = Account::all();
       $expenses = Expense::latest()->paginate(8);
       $incomes = SalesIncome::latest()->paginate(8);
       $receipts = Receipt::all();
       $incomeCount=SalesIncome::all()->count();
       $expenseCount=Expense::all()->count();
       $totalExpenses = Expense::all()->pluck('amount')->sum();
       $totalIncome = SalesIncome::all()->pluck('amount')->sum();
       $totalAccount = BankAccount::all()->pluck('balance')->sum();
       $loggedinUser = LastLogin::latest()->paginate(10);
       return view('dashboard.index',compact('accounts','incomes','expenses','receipts','incomeCount','expenseCount','totalIncome','totalExpenses','totalAccount','loggedinUser'));
        }
        else{
            return redirect()->route('login')->with('error', 'Your Account is not activated yet. Please contact the admin to activate it.');
        }

    }

    // logout a user
    public function logout(User $user){
        auth()->logout();
        return redirect()->route('login')->with('error', 'You are now logged out');
    }
}
