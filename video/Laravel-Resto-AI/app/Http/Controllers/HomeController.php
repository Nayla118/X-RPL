<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('menuItems')->take(4)->get();
        $popularItems = MenuItem::orderBy('views', 'desc')->take(6)->get();
        
        return view('home', [
            'categories' => $categories,
            'popularItems' => $popularItems
        ]);
    }
}