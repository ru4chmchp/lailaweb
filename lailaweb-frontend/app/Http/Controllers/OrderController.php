<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function __construct(
        private Order $order
    ) {
    }
    public function checkout(Request $request)
    {
        try {
            $carts = session()->get('cart');
            DB::beginTransaction();
            $total = 0;
            $orderDetails = []; // Mảng để lưu thông tin chi tiết của từng sản phẩm trong đơn hàng
    
            // Tạo đơn hàng và lấy order_id
            $order = $this->order->create([
                'customer_id' => auth()->id(),
                'status' => 0,
                'total' => $total,
                'reminder' => $request->reminder
            ]);
    
            foreach ($carts as $productId => $item) {
                $quantity = intval($item['quantity']);
                $price = intval($item['price']);
                $subtotal = $quantity * $price;
                $total += $subtotal;
    
                $orderDetails[] = [
                    'order_id' => $order->id, // Thêm order_id vào thông tin chi tiết sản phẩm
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    // Bất kỳ thông tin chi tiết sản phẩm nào khác bạn muốn lưu
                ];
            }
    
            // Attach thông tin chi tiết sản phẩm vào đơn hàng
            $order->products()->attach($orderDetails);
    
            $order->total = $total; // Cập nhật tổng tiền sau khi đã tính toán
            $order->save();
    
            DB::commit();
            return redirect()->back()->with('success','Bạn đã đặt hàng thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
        }
    }
    
}
