<?php

namespace App\Http\Controllers\Admin;

use App\Models\menu;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class menuController extends Controller
{
    public function index(){
        $menu = menu::all();
        return view('admin.menu.index', compact('menu'));
    }

    public function add(){
        $categories = Categories::all();
        return view('admin.menu.add', compact('categories'));
    }

    public function insert(Request $request){
        $menu = new menu();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $mime = $file->getMimeType();
            $data = base64_encode(file_get_contents($file->getRealPath()));
            $menu->image = 'data:'.$mime.';base64,'.$data;
        }
        if($request->hasFile('model')){
            $model = $request->file('model');
            $mime = $model->getMimeType();
            $data = base64_encode(file_get_contents($model->getRealPath()));
            $menu->model = 'data:'.$mime.';base64,'.$data;
        }
        $menu->cate_id = $request->input('cate_id');
        $menu->name = $request->input('name');
        $menu->slug = $request->input('slug');
        $menu->small_description = $request->input('small_description');
        $menu->description = $request->input('description');
        $menu->original_price = $request->input('original_price');
        $menu->menu_price = $request->input('menu_price');
        // $menu->delivery_days = $request->input('delivery_days');
        // $menu->tax = $request->input('tax');
        // $menu->qty = $request->input('qty');
        $menu->status = $request->input('status')== TRUE ? '1' : '0';
        // $menu->trending = $request->input('trending')== TRUE ? '1' : '0';
        // $menu->meta_title = $request->input('meta_title');
        // $menu->meta_description = $request->input('meta_description');
        // $menu->meta_keywords = $request->input('meta_keywords');
        $menu->save();
        return redirect('menu')->with('status', 'menu Added Successfully');
    }

    public function edit($id){
        $menu = menu::find($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id){
        $menu = menu::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $mime = $file->getMimeType();
            $data = base64_encode(file_get_contents($file->getRealPath()));
            $menu->image = 'data:'.$mime.';base64,'.$data;
        }
        if($request->hasFile('model')){
            $model = $request->file('model');
            $mime = $model->getMimeType();
            $data = base64_encode(file_get_contents($model->getRealPath()));
            $menu->model = 'data:'.$mime.';base64,'.$data;
        }

        $menu->name = $request->input('name');
        $menu->slug = $request->input('slug');
        $menu->small_description = $request->input('small_description');
        $menu->description = $request->input('description');
        $menu->original_price = $request->input('original_price');
        $menu->menu_price = $request->input('menu_price');
        // $menu->delivery_days = $request->input('delivery_days');
        // $menu->tax = $request->input('tax');
        // $menu->qty = $request->input('qty');
        $menu->status = $request->input('status')== TRUE ? '1' : '0';
        // $menu->trending = $request->input('trending')== TRUE ? '1' : '0';
        // $menu->meta_title = $request->input('meta_title');
        // $menu->meta_description = $request->input('meta_description');
        // $menu->meta_keywords = $request->input('meta_keywords');
        $menu->update();
        return redirect('menu')->with('status', 'menu Updated Succesfully');
    }
    public function destroy($id){
        $menu = menu::find($id);
        // image/model disimpan sebagai base64 di database, tidak ada file fisik yang dihapus
        $menu->delete();
        return redirect('/menu')->with('status', 'menu Deleted Succesfully');
    }

}
