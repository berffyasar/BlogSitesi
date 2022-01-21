<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Iletisim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class iletisimController extends Controller
{
    public function iletisimIndex(){
        $iletisims=Iletisim::all();
        return view("admin.iletisim",compact('iletisims'));
    }
    public function deleteIletisim(Request $request){
        $request->validate([
            'id' => 'distinct'
        ]);
        Iletisim::find($request->id)->delete();
        return response()->json(['Success' => 'success']);

    }

    public function getContent(Request $request){

        $content = Iletisim::where('id', $request->id)->first();
        $content->okundu=1;
        $content->save();
        return response()->json(['content' => $content->message]);
    }

}
