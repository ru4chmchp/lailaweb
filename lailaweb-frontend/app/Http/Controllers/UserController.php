<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerAddRequest;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct(
        private Customer $customer
    )
    {
        
    }
    public function register()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('account.register', compact('categories'));
    }
    public function login()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('account.login', compact('categories'));
    }
    public function postRegister(CustomerAddRequest $request)
    {
        if ($request->password === $request->re_password) {
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
        } else {
            return redirect()->back()->with('errorRegister', 'Password không khớp');
        }
    }
    public function postLogin(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
    public function profile($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $customers = Customer::find($id)->first();
        return view('account.profile',compact('categories','customers'));
    }
    public function updateProfile($id,Request $request) {
            try {
                DB::beginTransaction();
                $this->customer->find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'address' => $request->address,
                    'phone' => $request->phone
                ]);
                DB::commit();
                return redirect()->back()->with('success', 'Thành công');
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error('Message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
            }
    }
}
