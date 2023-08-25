<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class SaveItem extends Controller
{
    public function index(){
        return view('welcome', ['listItems'=>ListItem::where('is_complate', 0)->get()]);
    }
    public function complateItem($id){
        $newitemList = ListItem::find($id);
        // dd($newitemList);
        $newitemList->is_complate = 1;
        $newitemList->save();
        return redirect('/');
    }
    public function saveItem(Request $request){
        // dd($request->all()); S
        $itemList = new ListItem();
        $itemList -> name = $request->listenItem;
        $itemList -> is_complate = 0;
        $itemList -> save();
        return redirect('/');
    }
}
