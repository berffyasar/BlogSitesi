<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Iletisim;
use App\Models\Post;
use Illuminate\Http\Request;


class frontController extends Controller
{

    public function index(){

        return view('front.anasayfa');
    }

    public function about(){
        $about=About::find(1);
        return view('front.about',compact("about"));
    }

    public function commination(){

        return view('front.iletisim');
    }

    public function category(){
        $categories=Category::all();

        return view("front.category",compact('categories'));
    }

    public function makaleler(){
        $post=Post::all()->last();
        return view('front.makaleler',compact("post"));
    }

    public function makalelerGet($id){
        $post=Post::where("id",$id)->first();
        return view('front.makaleler',compact("post"));
    }
    public function icerik($id){
        $posts=Post::where("category_id",$id)->get();


        return view('front.icerik',compact("posts"));
    }
    public function sendMesage(Request $request){


        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'message'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);

        $obj=new Iletisim();
        $obj->name=$request->name;
        $obj->surname=$request->surname;
        $obj->message=$request->message;
        $obj->mail=$request->email;
        $obj->phone=$request->phone;

        $obj->save();
        return redirect()->back()->with('message', 'Mesajınız gönderilmiştir mailinize cevap gelecek');

    }
}
