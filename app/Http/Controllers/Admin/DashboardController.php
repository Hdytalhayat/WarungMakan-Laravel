<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Chatbot;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function view($id)
    {
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }
    public function chat(){
        $chat = Chatbot::all();
        return view('admin.chat.index', compact('chat'));
    }
    public function addchat(){
        return view('admin.chat.add');
    }
    public function insertchat(Request $request){
        $chat = new Chatbot();
        $chat->queries = $request->input('queries');
        $chat->replies = $request->input('replies');
        $chat->save();
        return redirect('chat')->with('status', 'Chat Added Successfully');
    }
}
