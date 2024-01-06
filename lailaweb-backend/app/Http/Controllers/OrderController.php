<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $productCount = Product::all()->count();
        $categoryCount = Category::all()->count();
        $orderCount = Order::all()->count();
        $customerCount = Customer::all()->count();
        $orders = Order::latest()->paginate(5);
        return view('dashboard', compact('productCount', 'categoryCount', 'orderCount', 'customerCount', 'orders'));
    }
    public function detailOrder($id)
    {
        $orders = Order::find($id);
        $total = $orders->total;
        $customerInfo = $orders->customer;
        return view('admin.order.detail', compact('orders', 'customerInfo', 'total'));
    }
    public function acceptOrder($id, Request $request)
    {
        $order = Order::find($id);
        if ($order) {
            // Kiểm tra xem đối tượng Order tồn tại trước khi thay đổi trạng thái
            $order->status = 1; // Hoặc giá trị bạn muốn cập nhật
            $order->save(); // Lưu thay đổi vào cơ sở dữ liệu

            return redirect()->back()->with('success', 'Đơn hàng đã được chấp nhận.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
        }
    }
}
