<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    

   

    public function registration_show()
    {
        return view('layout.registration');
    }

    public function registration_add(Request $request)
    {
        // $this ->validate($request,[
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users|max:255',
        //     'password' => 'required|min:8|confirmed',
        // ]);
        $validatedData=$request->all();
        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = hash::make($validatedData['password']);
        $user->save();
// dd("hello");
        return redirect('login')->with('success', 'Registration successful! Please log in.');
        
    }

    public function show_login()
    {
        return view('layout.login');
    }


    public function login_add(Request $request)
{

$credentials = $request->validate([
    'email' => 'required',
    'password' => 'required',
]);

$user = User::where('email', $credentials['email'])->first();

// dd($user);
if ($user) {
    session::put('loginID', $user->email);
    session::put('userid', $user->id);
// dd("hello");
// return redirect()->route('post');
return redirect()->to('home');
   
} else {

    return redirect()->to('login');
}

}

public function logout() {
    session()->flush(); // This will clear all session data
    return redirect()->to('login');
}
}