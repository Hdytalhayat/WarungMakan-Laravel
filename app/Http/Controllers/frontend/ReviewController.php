<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class ReviewController extends Controller
{
    public function add($menu_slug)
    {
        $menu = menu::where('slug', $menu_slug)->where('status', '0')->first();
        if($menu){
            $menu_id = $menu->id;
            $review = Review::where('user_id', Auth::id())->where('menu_id', $menu_id)->first();
            if($review){
                return view('frontend.reviews.edit', compact('review'));
            }else{
                $verified_purchase = Order::where('order.user_id', Auth::id())
                ->join('order_items', 'order.id', 'order_items.order_id')
                ->where('order_items.menu_id', $menu_id)
                ->get();
                return view('frontend.reviews.index', compact('menu', 'verified_purchase'));
            }
            
        }else{
            return redirect()->back()->with('status', "Link Was broken");
        }
    }
    public function create(Request $request)
    {
        $menu_id = $request->input('menu_id');
        $menu = menu::where('id', $menu_id)->where('status', '0')->first();
        if($menu){
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id'=> Auth::id(),
                'menu_id'=> $menu_id,
                'reviews'=> $user_review
            ]);
            $categories_slug = $menu->Categories->slug;
            $menu_slug = $menu->slug;
            if($new_review){
                return redirect('view-categories/'.$categories_slug.'/'.$menu_slug)->with('status', 'Thank you for give a review');
            }
        }else{
            return redirect()->back()->with('status', "Link Was broken");
        }
    }
    public function edit($menu_slug)
    {
        $menu = menu::where('slug', $menu_slug)->where('status', '0')->first();
        if($menu){
            $menu_id = $menu->id;
            $review = Review::where('user_id', Auth::id())->where('menu_id', $menu_id)->first();
            if($review){
                return view('frontend.reviews.edit', compact('review'));
            }else{
                return redirect()->back()->with('status', "Link Was broken");
            }
        }else{
            return redirect()->back()->with('status', "Link Was broken");
        }
    }
    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if($user_review != ''){
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if($review){
                $review->reviews = $request->input('user_review');
                $review->update();
                return redirect('view-categories/'.$review->menu->Categories->slug.'/'.$review->menu->slug)->with('status', "Review Updated Successfully");
            }else{
                return redirect()->back()->with('status', "Link Was broken");
            }
        }else{
            return redirect()->back()->with('status', "You cannot submit an empty review");
        }
    }
}
