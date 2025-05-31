<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $id => $quantity) {
            $item = MenuItem::find($id);
            if ($item) {
                $items[] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $quantity,
                    'image' => $item->image,
                    'subtotal' => $item->price * $quantity
                ];
                $total += $item->price * $quantity;
            }
        }

        return view('cart.index', [
            'items' => $items,
            'total' => $total
        ]);
    }

    public function add(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        $request->session()->put('cart', $cart);

        return back()->with('success', 'Item ditambahkan ke keranjang');
    }

    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity', 1);
        $cart = $request->session()->get('cart', []);

        if ($quantity > 0) {
            $cart[$id] = $quantity;
        } else {
            unset($cart[$id]);
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Keranjang diperbarui');
    }

    public function remove(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Item dihapus dari keranjang');
    }

    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->route('cart')->with('success', 'Keranjang dikosongkan');
    }
}