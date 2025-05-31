<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        // Validasi sederhana
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Simpan order ke DB jika mau (belum dibuat)
        // Kosongkan keranjang
        session()->forget('cart');

        return redirect('/')->with('success', 'Pesanan berhasil dibuat! Terima kasih.');
    }
}

