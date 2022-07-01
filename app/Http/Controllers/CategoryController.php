<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['categories'] = Category::paginate(13);
        return view('category.list', $data);
    }

    public function create()
    {

        return view('category.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20'
        ]);
        $category = new Category();

        $category->name = $request->post('name');
        $category->save();
        return back()->with('message', 'Category is created');
    }

    public function edit($id)
    {

        $data['category'] = Category::findOrFail($id);


        return view('category.edit', $data);
    }

    public function update(Request $request, $categoryId)
    {
        $request->validate([
            'name' => 'required|max:20'
        ]);
        $category = Category::find($categoryId);
        $category->name = $request->post('name');
        $category->save();
        return back()->with('message', 'Category is edited');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('message', 'Category is deleted');
    }
}
