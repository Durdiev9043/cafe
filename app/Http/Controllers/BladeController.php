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
        $menus=Menu::all();
        return view('welcome',['cafes'=>$cafes,'menus'=>$menus]);
    }

    public function show($id){
        $cafe=Cafe::all()->where('id', $id)->first();
        $menus=Menu::all()->where('cafe_id',$cafe->id);
        $moves=Move::all()->where('cafe_id',$cafe->id);
        return view('show',['cafe'=>$cafe,'menus'=>$menus,'moves'=>$moves]);
    }
}
