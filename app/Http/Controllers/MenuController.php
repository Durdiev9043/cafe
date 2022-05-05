<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{

    public function index()
    {
        //
    }
 function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $uuid = Str::uuid()->toString();
        $fileName = $uuid . '-' . time() . '.' . $request->img->extension();
        $request->img->move(public_path('../storage/app/public/posts'), $fileName);
        Menu::create([
            'cafe_id'=>$request->cafe_id,
            'name'=>$request->name,
            'count'=>$request->count,
            'oneness'=>$request->oneness,
            'summ'=>$request->summ,
            'img' => '../storage/app/public/posts/'.$fileName,
        ]);
        return redirect()->route('admin.cafe.show',$request->cafe_id);
    }


    public function show($id)
    {
        //
    }


    public function edit(Menu $menu)
    {
        return view('menu.edit',['menu'=>$menu]);
    }


    public function update(Request $request, Menu $menu)
    {
        if($request->hasFile('img')){

            $uuid = Str::uuid()->toString();
            $file_name = $uuid . '-' . time() . '.' . $request->img->getClientOriginalName();
            $request->img->move(public_path('/images/'), $file_name);
        }
        $menu->update([
            'name'=>$request->name,
            'count'=>$request->count,
            'oneness'=>$request->oneness,
            'summ'=>$request->summ,
            'img'=>'images/'.$file_name,
        ]);
        return redirect()->route('admin.cafe.show',$request->cafe_id);
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back();
    }
}
