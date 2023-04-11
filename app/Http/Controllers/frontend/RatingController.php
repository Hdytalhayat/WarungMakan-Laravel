<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Rating;
use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars = $request->input('menu_rating');
        $menu_id = $request->input('menu_id');
        $menu_check = menu::where('id', $menu_id)->where('status', '0')->first();
        
        if($menu_check ){
            $verified_purchase = Order::where('order.user_id', Auth::id())
                                ->join('order_items', 'order.id', 'order_items.order_id')
                                ->where('order_items.menu_id', $menu_id)
                                ->where('order.status', '1')
                                ->get();
                                // ->where('order.status', '1')
            if($verified_purchase->count() >0 ){
                $rating_check = Rating::where('user_id', Auth::id())->where('menu_id', $menu_id)->first();
                if($rating_check){
                    $rating_check->stars = $stars;
                    $rating_check->update();
                }else{
                    Rating::create([
                        'user_id'=> Auth::id(),
                        'menu_id'=> $menu_id,
                        'stars'=> $stars
                    ]);
                }
                return redirect()->back()->with('status', "Thank you for rating this menu");
            }else{
                return redirect()->back()->with('status', "You have not ordered this menu yet or your order is pending");
            }
        }else{
            return redirect()->back()->with('status', "Link Was broken");
        }
    }
}
