<?php

namespace App\Http\Controllers;

use App\Models\Move;
use Illuminate\Http\Request;

class MoveController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('move.create');
    }


    public function store(Request $request)
    {
        Move::create($request->all());
        return redirect()->route('admin.cafe.show',$request->cafe_id)->with('success','Saqlandi');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $move=Move::all()->where('id',$id)->first();
        return view('move.edit',['move'=>$move]);
    }


    public function update(Request $request, Move $move)
    {

        $move->update($request->all());
        return redirect()->route('admin.cafe.show',$move->cafe_id)->with('success','Saqlandi');
    }


    public function destroy(Move $move)
    {

        $move->delete();
        return redirect()->back()->with('success','O`chirildi');
    }
}
