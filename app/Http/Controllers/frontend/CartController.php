<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request){
        $menu_id = $request->input('menu_id');
        $menu_qty = $request->input('menu_qty');
        

        if(Auth::check()){
            
            $menu_check = menu::where('id', $menu_id)->first();
            
            if($menu_check){
                if(Cart::where('menu_id', $menu_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' =>$menu_check->name." already added to cart"]);
                }
                else{
                    $cart_item = new Cart();
                    $cart_item->user_id = Auth::id();
                    $cart_item->menu_id = $menu_id;
                    $cart_item->menu_qty = $menu_qty;
                    $cart_item->save();
                    return response()->json(['status' =>$menu_check->name." added to cart"]);
                }        
            }
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function viewCart(){
        $cart_item = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cart_item'));
    }

    public function deleteitem(Request $request){
        if(Auth::check()){
            $menu_id = $request->input('menu_id');
            if(Cart::where('menu_id', $menu_id)->where('user_id', Auth::id())->exists()){
                $cart_item = Cart::where('menu_id', $menu_id)->where('user_id', Auth::id())->first();
                $cart_item ->delete();
                return response()->json(['status' =>" menu Deleted Successfully"]);
            }
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function updateitem(Request $request){       
        $menu_id = $request->input('menu_id');
        $menu_qty = $request->input('menu_qty');
        if(Auth::check()){
            if(Cart::where('menu_id', $menu_id)->where('user_id', Auth::id())->exists()){
                $cart = Cart::where('menu_id', $menu_id)->where('user_id', Auth::id())->first();
                $cart->menu_qty =  $menu_qty;
                $cart->update();
                return response()->json(['status' =>"Quantity Updated"]);
            }
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function cartcount()
    {
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }
}