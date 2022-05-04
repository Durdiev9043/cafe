<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Menu;
use App\Models\Move;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CafeController extends Controller
{

    public function index()
    {
        $cafes=Cafe::all();
        return view('cafe.index',['cafes'=>$cafes]);
    }

    public function create()
    {
        return view('cafe.create');
    }

    public function store(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $file_name = $uuid . '-' . time() . '.' . $request->img->getClientOriginalName();
        $request->img->move(public_path('/images/'), $file_name);
        Cafe::create([
            'name'=>$request->name,
            'user_id'=>$request->user_id,
            'phone'=>$request->phone,
            'img'=>'images/'.$file_name,
        ]);
        return redirect()->route('admin.cafe.index');
    }

    public function show($id)
    {
        $cafe=Cafe::all()->where('id',$id)->first();
        $menus=Menu::all()->where('cafe_id',$id);
        $moves=Move::all()->where('cafe_id',$id);

        return view('cafe.show',['menus'=>$menus,'cafe'=>$cafe,'moves'=>$moves]);
    }


    public function edit(Cafe $cafe)
    {
        return view('cafe.edit',['cafe'=>$cafe]);
    }


    public function update(Request $request, Cafe $cafe)
    {
        $cafe->update($request->all());
        return redirect()->route('admin.cafe.index');
    }

    public function destroy(Cafe $cafe)
    {
        $cafe->delete();
        return redirect()->back();
    }
}
