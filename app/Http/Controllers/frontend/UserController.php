<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Chatbot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }
    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }
    public function chatbot(){
        return view('frontend.chatbot');
    }
    public function chatprocess(Request $request){
        // $input= $request->input('text');
        // $chat = Chatbot::where('queries', 'like', "%$input%")->first();
        // // jika query user sama dengan yang ada dalam database maka akan dibalas sesuai query-nya
        
        //     $data = $chat->replies;
        //     return $data;



        // $chat = Chatbot::where('queries', 'like', "%$sender%")->first();
        // if($chat){
        //     $data = $chat->replies;
        //     return $data;
        // }
        $sender = $request->input('sender');
        $chat = Chatbot::where('queries', 'like', "%$sender%")->first();
        if($chat){
            $data = $chat->replies;
            echo $data;
        }else{
            echo "Maaf, kami tidak paham maksud anda!";
        }

    }
}
