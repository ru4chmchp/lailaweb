<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function __construct
    (
        private Customer $customer
    )
    {
        
    }
    public function index() {
        $customers = $this->customer->paginate(5);
        return view('admin.customer.index', compact('customers'));
    }
    public function edit($id) {
        $customers = $this->customer->find($id);
        return view('admin.customer.edit',compact('customers'));
    }
    public function update($id, Request $request) {
        try {
            DB::beginTransaction();
            $this->customer->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            DB::commit();
            return redirect()->route('customers.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
        }
    }
    public function destroy($id) {
        try {
            $this->customer->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }
}
