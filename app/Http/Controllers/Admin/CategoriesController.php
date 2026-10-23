<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
//use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }
    public function add(){
        return view('admin.categories.add');
    }

    public function insert(Request $request){
        $categories = new Categories();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $mime = $file->getMimeType();
            $data = base64_encode(file_get_contents($file->getRealPath()));
            $categories->image = 'data:'.$mime.';base64,'.$data;
        }
        $categories->name = $request->input('name');
        $categories->slug = $request->input('slug');
        $categories->description = $request->input('description');
        $categories->status = $request->input('status') == TRUE ? '1' : '0';
        // $categories->popular = $request->input('popular') == TRUE ? '1' : '0';
        // $categories->meta_title = $request->input('meta_title');
        // $categories->meta_descrip = $request->input('meta_description');
        // $categories->meta_keywords = $request->input('meta_keywords');
        $categories->save();
        return redirect('/categories')->with("status", "Categories Added Succesfully");

    }
    public function edit($id){
        $categories = Categories::find($id);
        return view('admin.categories.edit', compact('categories'));
    }
    public function update(Request $request, $id){
        $categories = Categories::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $mime = $file->getMimeType();
            $data = base64_encode(file_get_contents($file->getRealPath()));
            $categories->image = 'data:'.$mime.';base64,'.$data;
        }
        $categories->name = $request->input('name');
        $categories->slug = $request->input('slug');
        $categories->description = $request->input('description');
        $categories->status = $request->input('status') == TRUE ? '1' : '0';
        // $categories->popular = $request->input('popular') == TRUE ? '1' : '0';
        // $categories->meta_title = $request->input('meta_title');
        // $categories->meta_descrip = $request->input('meta_description');
        // $categories->meta_keywords = $request->input('meta_keywords');
        $categories->update();
        return redirect('/categories')->with('status', 'Categories Updated Succesfully');
    }

    public function destroy($id){
        $categories = Categories::find($id);
        // image disimpan sebagai base64 di database, tidak ada file fisik yang dihapus
        $categories->delete();
        return redirect('/categories')->with('status', 'Categories Deleted Succesfully');
    }
}
