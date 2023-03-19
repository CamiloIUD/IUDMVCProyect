<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(['success' => true, 'data' => $categories]);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Categoria no encontrada'], 404);
        }
        return response()->json(['success' => true, 'data' => $category]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:120|unique:categories,name',
            'description' => 'max:250'
        ]);

        $category = Category::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description']
        ]);

        return response()->json(['success' => true, 'data' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Categoria no encontrada'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:120|unique:categories,name,'.$id,
            'description' => 'max:250'
        ]);

        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->save();

        return response()->json(['success' => true, 'data' => $category]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Categoria no encontrada'], 404);
        }

        $category->delete();

        return response()->json(['success' => true, 'message' => 'Categoria eliminada exitosamente']);
    }
}