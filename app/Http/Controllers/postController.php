<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function post(){
        $posts=Post::all()->sortBy("category_id");
        $categories=Category::all();
        return view("admin.post",compact("posts","categories"));

    }

    public function createPost(Request $request){
        $request->validate([
            'category_id' => 'required|numeric',
            'post' => 'required',
            'post_content' => 'required',
            'file' =>'mimes:jpg,jpeg,bmp,png,gif|file|required'
        ]);

        $posts = new Post();
        $posts->title=$request->post;
        $posts->category_id=$request->category_id;
        $posts->content=$request->post_content;
        $file = $request->file;
        $name = time() . '.jpg';
        $file->move('images/category/', $name);
        $adres = '/images/category' . '/' . $name;
        $posts->image_url = $adres;
        $posts->save();

        return redirect()->back();

    }

    public function deletePost(Request $request){
        $request->validate([
            'id' => 'distinct'
        ]);
        Post::find($request->id)->delete();
        return response()->json(['Success' => 'success']);

    }

    public function getPost(Request $request){

        $posts = Post::where('id', $request->id)->first();
        return response()->json(['name' => $posts->title,'image'=> $posts->image_url,'id'=>$request->id,'content'=>$posts->content]);
    }

    function updatePost(Request $request)
    {


        $request->validate([
            'post' => 'required',
            'post_content' => 'required',
            'file' => 'mimes:jpg,bmp,png,gif'
        ]);

        $posts =   Post::find($request->id);
        $posts->title = $request->post;
        $posts->content=$request->post_content;


        if ($request->file('fileUpdate')) {

            $file = $request->fileUpdate;
            $name = time() . '.jpg';
            $file->move('images/category/', $name);
            $adres = '/images/category' . '/'.$name;
            $posts->image_url = $adres;

            $posts->save();
        }

        $posts->save();

        return redirect()->back();
    }

    public function active(){
        $id = \request('id');

        $file = Post::find($id);

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

}
