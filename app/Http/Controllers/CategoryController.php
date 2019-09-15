<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

  public function __construct()
  { 
    
    $this->middleware('auth');

  }
    
  public function index()
  {

    $categories = Category::all();

    return view('admin.category.index', compact('categories'));

  }

  public function create()
  {

    $category = new Category();

    return view('admin.category.create', compact('category'));

  }

  public function store()
  {

    Category::create(request()->validate([
      'name' => 'required|min:3|unique:categories,name'
    ]));

    return redirect('admin/categories')->with('message', 'Category created successfully');

  }

  public function show(Category $category)
  {

    return view('admin.category.show', compact('category'));

  }

  public function edit(Category $category)
  {

    return view('admin.category.edit', compact('category'));

  }

  public function update(Category $category)
  {

    $category->update(request()->validate([
      'name' => 'required|min:3|unique:categories,name'
    ]));

    return redirect('admin/categories')->with('message', 'Category updated successfully');

  }

  public function destroy(Category $category)
  {

    $category->delete();

    return redirect('admin/categories')->with('message', 'Category deleted successfully');

  }

}
