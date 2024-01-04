<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register() {
        $categories = Category::where('parent_id', 0)->get();
        return view('account.register',compact('categories'));
    }
    public function login() {
        $categories = Category::where('parent_id', 0)->get();
        return view('account.login',compact('categories'));
    }
    public function postRegister(Request $request) {
        $request->merge([
            'password' => Hash::make($request->password)
        ]);
        try {
            Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

        } catch (\Throwable $th) {

        }
        return redirect()->route('login');
    }
    public function postLogin(Request $request) 
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('home');
        }else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
    public function logout() {
        Auth::logout();
        return redirect()->back();
    }
    public function profile() {
        
    }
}
