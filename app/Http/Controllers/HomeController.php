<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chair;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    
    $categories = Category::all();

    return view('home', compact('categories'));

  }

  public function showAll(Category $category){

    $categories = Category::all();

    $chairs = Chair::where('category_id', '=', $category->id)->paginate(12);

    return view('showAll', compact('categories', 'category', 'chairs',));

  }

  public function showOne(Category $category){

    $categories = Category::all();

    return view('showOne', compact('categories', 'category'));

  }

  public function contact(){

    $categories = Category::all();

    return view('contact', compact('categories'));

  }

}
