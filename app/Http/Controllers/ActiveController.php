<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveController extends Controller
{
    public function create($id){
        return view('menu.create',['id'=>$id]);
    }

    public function map($id){

        return view('move.create',['id'=>$id]);
    }
}
