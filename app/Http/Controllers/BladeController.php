<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Menu;
use App\Models\Move;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BladeController extends Controller
{
    public function cafe(){
        $cafes=Cafe::all()->where('status',1);
        $menus=DB::table('cafes')->select('*')
            ->join('menus', 'cafes.id', '=', 'menus.cafe_id')
            ->get();
        return view('welcome',['cafes'=>$cafes,'menus'=>$menus]);
    }

    public function show($id){
        $cafe=Cafe::all()->where('id', $id)->first();
        $menus=Menu::all()->where('cafe_id',$cafe->id);
        $moves=DB::table('moves')->where('cafe_id',$id)->where('to_date','>',date('Y-m-d'))->take(2)->get();
//        DB::table('menus')->where('cafe_id',$id)->get();
        return view('show',['cafe'=>$cafe,'menus'=>$menus,'moves'=>$moves]);
    }
}
