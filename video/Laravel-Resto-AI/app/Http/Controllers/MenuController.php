<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::paginate(12);
        $categories = Category::all();
        
        return view('menu.index', [
            'menuItems' => $menuItems,
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $menuItem = MenuItem::with('category')->findOrFail($id);
        $relatedItems = MenuItem::where('category_id', $menuItem->category_id)
                              ->where('id', '!=', $id)
                              ->take(4)
                              ->get();
        
        // Tambah view count
        $menuItem->increment('views');
        
        return view('menu.detail', [
            'menuItem' => $menuItem,
            'relatedItems' => $relatedItems
        ]);
    }

    public function categories()
    {
        $categories = Category::with(['menuItems' => function($query) {
            $query->orderBy('views', 'desc');
        }])->get();
        
        return view('categories', ['categories' => $categories]);
    }
}