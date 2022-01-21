<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function out(){
        if (        Auth::check()
        ){
            Auth::logout();
        }
        return redirect()->route("index");
    }
    public function register(){

        return view("auth.register");

    }

    public function index(){

        return view("admin.index");
    }

    public function category(){
        $categories=Category::all();
        return view("admin.category",compact("categories"));
    }

    public function createCategory(Request $request){

        $request->validate([
            'category' => 'required',
            'file' => 'mimes:jpg,bmp,png,gif|required'
        ]);

        $category = new Category;
        $category->name=$request->category;
        $file = $request->file;
        $name = time() . '.jpg';
        $file->move('images/category/', $name);
        $adres = '/images/category' . '/' . $name;
        $category->image_url = $adres;
        $category->save();

        return redirect()->back();

    }

    public function deleteCategory(Request $request){
        $request->validate([
            'id' => 'distinct'
        ]);
        Category::find($request->id)->delete();
        return response()->json(['Success' => 'success']);

    }

    public function getCategory(Request $request){

        $category = Category::where('id', $request->id)->first();
        return response()->json(['name' => $category->name,'image'=> $category->image_url,'id'=>$request->id]);
    }

    function updateCategory(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'file' => 'mimes:jpg,bmp,png,gif',
            'name'=>'required'
        ]);

        $category =   Category::find($request->id);
        $category->name = $request->name;

        if ($request->file('fileUpdate')) {

            $file = $request->fileUpdate;
            $name = time() . '.jpg';
            $file->move('images/category/', $name);
            $adres = '/images/category' . '/'.$name;
            $category->image_url = $adres;

            $category->save();
        }

        $category->save();

        return redirect()->back();
    }

    public function active(){
        $id = \request('id');

        $file = Category::find($id);

        $new_is_archive_value=0;
        if ($file->is_active == 1) {
            $new_is_archive_value = 0;
        } else {
            $new_is_archive_value = 1;

        }

        $file->is_active = $new_is_archive_value;
        $file->save();
        return redirect()->back();
    }

    public function indexAbout(){
        $about=About::find(1);
        return view("admin.about",compact('about'));
    }

    public function aboutUpdate(Request $request){

        $request->validate([
            'title1' => 'required',
            'title2' => 'required',
            'content1'=>'required',
            'content2'=>'required',
        ]);

        $about=About::find(1);
        $about->title_1=$request->title1;
        $about->title_2=$request->title2;
        $about->content_1=$request->content1;
        $about->content_2=$request->content2;
        $about->save();

        return view("admin.about",compact('about'));

    }



}
