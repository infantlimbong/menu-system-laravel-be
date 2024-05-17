<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return response()->json(['message' => 'Menus data successfully fetched', 'data' => $menus], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'category_id' => 'required',
            'chinese_menu' => 'required',
            'indonesian_menu' => 'nullable',
            'english_menu' => 'nullable',
            'small_price' => 'nullable',
            'medium_price' => 'nullable',
            'large_price' => 'nullable',
            'stock' => 'nullable',
            'chinese_desc' => 'nullable',
            'indonesian_desc' => 'nullable',
            'english_desc' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'best_selling' => 'nullable|boolean',
        ]);

        // Store the image file
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $url = Storage::url($imagePath);
            $imagePath = Str::after($url, 'public/');
        } else {
            $imagePath = null;
        }

        // Create the menu with the uploaded foto path
        $menu = Menu::create([
            'category_id' => $request->category_id,
            'chinese_menu' => $request->chinese_menu,
            'indonesian_menu' => $request->indonesian_menu,
            'english_menu' => $request->english_menu,
            'small_price' => $request->small_price,
            'medium_price' => $request->medium_price,
            'large_price' => $request->large_price,
            'stock' => $request->stock,
            'chinese_desc' => $request->chinese_desc,
            'indonesian_desc' => $request->indonesian_desc,
            'english_desc' => $request->english_desc,
            'image' => $imagePath,
            'best_selling' => $request->best_selling,
        ]);

        return response()->json(['message' => 'Menu successfully created', 'data' => $menu], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return response()->json(['message' => 'Menu data successfully fetched', 'data' => $menu], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all());
        return response()->json(['message' => 'Menu successfully updated', 'data' => $menu], 200);
    }

    /**
     * Edit the specified resource image.
     */
    public function editImage(Request $request, Menu $menu)
    {
        // Validate incoming request data
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the new image file
        if ($request->hasFile('image')) {
            // Delete previous image
            Storage::delete($menu->image);

            $imagePath = $request->file('image')->store('public/images');
            $url = Storage::url($imagePath);
            $imagePath = Str::after($url, 'public/');

            // Update menu with the new image path
            $menu->image = $imagePath;
            $menu->save();

            return response()->json(['message' => 'Menu image successfully updated', 'data' => $menu], 200);
        }

        return response()->json(['message' => 'No new image provided'], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // Delete menu image
        Storage::delete($menu->image);

        $menu->delete();
        return response()->json(['message' => 'Menu successfully deleted'], 200);
    }
}