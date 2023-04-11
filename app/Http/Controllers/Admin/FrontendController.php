<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Rating;
use App\Models\menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $order_pending = Order::where('status', '0');
        $order_complete = Order::where('status', '1');
        $menu = menu::all()->count();
        $categories = Categories::all()->count();
        $users = User::all()->count();
        $rating = Rating::all();
        $rating_count = Rating::all()->count();
        $rating_sum = Rating::all()->sum('stars');
        $pending = $order_pending->count();
        $complete = $order_complete->count();
        if($rating_count >0){
            $rating_avg = $rating_sum / $rating->count();
        }
        else{
            $rating_avg = 0;
        }
        return view('admin.index', compact(
            'menu',
            'categories',
            'users',
            'pending', 
            'complete',
            'rating_avg'
        ));
    }
}
