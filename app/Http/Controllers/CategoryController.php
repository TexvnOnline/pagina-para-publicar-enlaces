<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'permission:categories.index',
            'permission:categories.store',
            'permission:categories.create',
            'permission:categories.destroy',
            'permission:categories.update',
            'permission:categories.edit',
        ]);
    }
    public function index()
    {
        $categories = Category::paginate(15);
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        $all_categories = Category::all();
        return view('admin.category.create', compact('all_categories'));
    }
    public function store(Request $request, Category $category)
    {
        $request->validate([
            'meta_title'=> 'required',
            'meta_description'=> 'required',
            'title'=> 'required',
            'description'=> 'required',
        ]);

        $category->my_store($request);
        return redirect()->route('categories.index')->with('toast_success', '¡Categoría creada con éxito!');
    }
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }
    public function edit(Category $category)
    {
        $all_categories = Category::all();
        return view('admin.category.edit', compact('category', 'all_categories'));
    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'meta_title'=> 'required',
            'meta_description'=> 'required',
            'title'=> 'required',
            'description'=> 'required',
        ]);
        $category->my_update($request);
        return redirect()->route('categories.index')->with('toast_success', '¡Categoría actualizada con éxito!');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('toast_success', '¡Categoría eliminada con éxito!');
    }
}
