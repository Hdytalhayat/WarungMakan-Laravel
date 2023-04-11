<?php

namespace App\Http\Controllers\frontend;

use id;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\menu;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart_item = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cart_item'));
    }
    public function order(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->first_name = $request->input('fname');
        $order->last_name = $request->input('lname');

        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        
            foreach($cartitems_total as $item){
                if ($item->menu->menu_price == NULL){
                    $total += $item->menu->original_price * $item->menu_qty;
                }
                else{
                    $total += $item->menu->menu_price * $item->menu_qty;
                }
                
            }
        
        
        $order->total_price = $total;

        $order->tracking_no = $order->first_name.rand(1111, 9999);
        $order->save();

        $order->id;
        $cart_item = Cart::where('user_id', Auth::id())->get();
            foreach($cart_item as $item){
                if ($item->menu->menu_price == NULL){
                    Orderitem::create([
                        'order_id' => $order->id,
                        'menu_id' => $item->menu_id,
                        'qty' => $item->menu_qty,
                        'price' => $item->menu->original_price*$item->menu_qty,
                    ]);
                }
                else{
                    Orderitem::create([
                        'order_id' => $order->id,
                        'menu_id' => $item->menu_id,
                        'qty' => $item->menu_qty,
                        'price' => $item->menu->menu_price*$item->menu_qty,
                    ]);
                }
                
    
            }
        
        if(Auth::user()->address == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->last_name = $request->input('lname');
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);
        return redirect('my-order')->with('status', 'order placed successfully');
    }
    public function gopay(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item){
            if ($item->menu->menu_price == NULL){
                $total_price += $item->menu->original_price * $item->menu_qty;
            }
            else{
                $total_price += $item->menu->menu_price * $item->menu_qty;
            }
        }
        $fname = $request->input('fname');
        $lname = $request->input('lname');

        return response()->json([
            'fname'=>$fname,
            'lname'=>$lname,
            'total_price'=>$total_price,
        ]);
    }
}
