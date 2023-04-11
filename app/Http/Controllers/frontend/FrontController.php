<?php

namespace App\Http\Controllers\frontend;

use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        $featured_menu  = menu::all();
        $categories  = Categories::all();
        return view('frontend.index' , compact('featured_menu', 'categories'));
    }
    public function about(){
        return view('frontend.about');
    }
    public function categories(){
        $categories = Categories::where('status', '0')->get();
        return view('frontend.categories', compact('categories'));
    }
    public function viewcategories($slug){
        if(Categories::where('slug', $slug)->exists()){ 
            $categories = Categories::where('slug', $slug)->first();
            $menu = menu::where('cate_id', $categories->id)->where('status', '0')->get();
            return view('frontend.menu.index', compact('categories', 'menu'));
        }else{
            return redirect('/')->with('status', 'Page Not Found');
        }
    }
    public function viewmenu($cate_slug, $menu_slug){
        if(Categories::where('slug', $cate_slug)->exists()){ 
            if(menu::where('slug', $menu_slug)->exists()){
                $menu =  menu::where('slug', $menu_slug)->first();
                $rating = Rating::where('menu_id', $menu->id)->get();
                $rating_sum = Rating::where('menu_id', $menu->id)->sum('stars');
                $user_rating = Rating::where('menu_id', $menu->id)->where('user_id', Auth::id())->first();
                $review = Review::where('menu_id', $menu->id)->get();
                if($rating->count() > 0){
                    $rating_avg = $rating_sum / $rating->count();
                }else{
                    $rating_avg = 0;
                }
                return view('frontend.menu.view', compact('menu', 'rating', 'rating_avg', 'user_rating', 'review'));
            }else{
                return redirect('/')->with('status', 'Page Not Found');
            }
        }else{
            return redirect('/')->with('status', 'Page Not Found');
        }
        
    }
    public function menuajax(){
        $menu = menu::where('status', '0')->get();
        $data = [];
        foreach($menu as $item){
            $data[] = $item['name'];
            
        }
        return $data;
    }
    public function search(Request $request)
    {
        $search = $request->input('menu_name');
        if($search != ''){
            $menu = menu::where('name', 'like', "%$search%")->first();
            if($menu){
                return redirect('view-categories/'.$menu->Categories->slug.'/'.$menu->slug);
            }else{
                return redirect()->back()->with('status', 'No menu matched');
            }
            


        }else{
            return redirect()->back();
        }
    }
    public function model($id){
        $menu = menu::where('id', $id)->first();
        return view('frontend.model', compact('menu'));
    }
}
    
