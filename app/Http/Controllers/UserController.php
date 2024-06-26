<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // check if authenticated user is an administrator
        if(auth()->user()->user_type == 'admin') {

        //show the user resource creation form
        $users = User::latest()->paginate(10);
        $userCount = User::all();
        $data=[];
        $data['active'] =$userCount->where('user_status', 'active')->count();
        $data['inactive'] =$userCount->where('user_status', 'inactive')->count();
        // dd($data);
        return view('auth.users',compact('users','data'));
        } else {
            return redirect()->route('account.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // show the user resource creation form
        return view('auth.create_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // validate the  user form  request
        $validated = $request->validated();

        // create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' =>  bcrypt($validated['password']),
            'user_type' => $validated['user_type'],
            'user_status' => $validated['user_status'],
        ]);

        // login the user
        // auth()->login($user);

        // redirect to the dashboard
        return redirect()->back()->with('success','User has been successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // display a single resource for each of the user resources
        return view('dashboard.user_show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // display a single resource for each of the user resources in a form
        $user = User::find($id);
        $users = User::latest()->paginate(10);
        $userCount = User::all();
        $data=[];
        $data['active'] =$userCount->where('user_status', 'active')->count();
        $data['inactive'] =$userCount->where('user_status', 'inactive')->count();
        return view('auth.edit_user', compact('user', 'users','data'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        // update the user resource 
        $validated = $request->validated();
        $user = User::find($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->user_type = $validated['user_type'];
        $user->password =  bcrypt($validated['password']);
        $user->user_status = $validated['user_status'];
        $user->save();

        // redirect to the dashboard
        return redirect()->back()->with('success','User has been successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete the user  resource from storage
        $user = User::find($id);
        $user->delete();

        // redirect to the dashboard
        return redirect()->back()->with('success','Successfully deleted user resource');
    }

    // login a user
    public function login(Request $request){
        // Validate the form data
        $request->validate([
            'email' =>'required|email',
            'password' => 'required|min:8'
        ]);

        // Attempt to authenticate the user
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard.index');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }
}
