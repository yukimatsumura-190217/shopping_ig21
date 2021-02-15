<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        //ログイン後のユーザの取得
        $this->middleware(function($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    
    public function index(Request $request)
    {
        $data = [];
        if ($request->session()->has('user_items')) {
            $user_items = UserItem::sessionValues($request);

            //SELECT * FROM items WHERE id IN (xx, xx, xx);
            $items = Item::whereIn('id', array_keys($user_items))->get();
            $data = [
                'user_items' => $user_items,
                'items' => $items,
            ];
        }
        return view('cart.index', $data);
    }

    public function add(Request $request)
    {
        $item = Item::find($request->id);
        if (isset($item->id)) UserItem::addCart($request, $this->user, $item);
        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $item = Item::find($request->id);
        UserItem::removeCart($request, $this->user, $item);
        return redirect()->route('cart.index');
    }

    public function clear(Request $request)
    {
        UserItem::clearCart($request);
        return redirect()->route('cart.index');
    }

}