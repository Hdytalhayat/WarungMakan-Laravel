<?php

namespace App\Http\Controllers\frontend;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\menu;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }
    public function addwish(Request $request)
    {
        $menu_id = $request->input('menu_id');
        if(Auth::check()){
            $menu_check = menu::where('id', $menu_id)->first();
            if($menu_check){
                if(Wishlist::where('menu_id', $menu_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' =>$menu_check->name." already added to wishlist"]);
                }else{
                    $wish = new Wishlist();
                    $wish->menu_id = $menu_id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json(['status' =>$menu_check->name." added to wishlist"]);
                }
            }
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function deleteitem(Request $request)
    {
        if(Auth::check()){
            $menu_id = $request->input('menu_id');
            if(Wishlist::where('menu_id', $menu_id)->where('user_id', Auth::id())->exists()){
                $wish_item = Wishlist::where('menu_id', $menu_id)->where('user_id', Auth::id())->first();
                $wish_item ->delete();
                return response()->json(['status' =>" menu Deleted Successfully"]);
            }
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function wishlistcount()
    {
        $wishlistcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$wishlistcount]);
    }
}
