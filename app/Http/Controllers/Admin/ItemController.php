<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ItemRequest;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('code')->get();
        $data = ['items' => $items];
        return view('admin.item.index',$data);
    }

    public function create()
    {
        return view('admin.item.create');
    }

    public function add(ItemRequest $request)
    {
        //DBの追加処理
        // return redirect('admin/item/');
        $posts = $request->all();
        // Item::create($posts);
        return redirect()->route('admin.item.index');
    }

    public function edit(Request $request)
    {
        $item = Item::find($request->id);
        $data = ['item' => $item];
        
        //$_GET['id']のようなもの
        // $data = ['id'=>$request->id];
        return view('admin.item.edit',$data);
    }

    public function update(ItemRequest $request)
    {
        $posts = $request->all();

        Item::find($request->id)->update($posts);
        return redirect()->route('admin.item.edit',['id' => $request->id]);
    }

}
