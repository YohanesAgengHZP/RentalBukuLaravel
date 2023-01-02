<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category',['categories' => $categories]);
    }

    public function add()
    {
        // $categories = Category::all();
        return view('category-add');
    }

    public function addProcess(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Category Added Sucessfully');
    }

    public function editProcess($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('category-edit',['category'=>$category]);
    }

    public function updateProcess(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::where('slug',$slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category Updated Sucessfully');
    }

    public function deleteProcess($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('category-delete',['category' => $category]);
    
    }

    public function destroyProcess($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Sucessfully');
    }

    public function deletedCategory()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('deleted-list',['deletedCategories' => $deletedCategories]);
    }

    public function restoreCategory($slug)
    {
        $category = Category::withTrashed()->where('slug',$slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category Restored Sucessfully');
    }
}
