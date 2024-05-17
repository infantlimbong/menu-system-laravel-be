<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json(['message' => 'Categories data successfully fetched', 'data' => $categories], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json(['message' => 'Category successfully added', 'data' => $category], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json(['message' => 'Category data successfully fetched', 'data' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json(['message' => 'Category successfully edited', 'data' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category successfully deleted'], 200);
    }

    /**
     * Fetch the count of menus for a specific category.
     */
    public function menusCount(Category $category)
    {
        $count = $category->menus()->count();
        return response()->json(['message' => 'Menu count for category successfully fetched', 'count' => $count], 200);
    }
}
