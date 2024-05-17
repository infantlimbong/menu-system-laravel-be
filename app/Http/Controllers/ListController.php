<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;

class ListController extends Controller
{
    public function category_index()
    {
        $categories = Category::all();
        return response()->json(['message' => 'Categories data successfully fetched', 'data' => $categories], 200);
    }

    public function menu_index()
    {
        $menus = Menu::all();
        return response()->json(['message' => 'Menus data successfully fetched', 'data' => $menus], 200);
    }

    // public function best_selling_index()
    // {
        
    // }
}
