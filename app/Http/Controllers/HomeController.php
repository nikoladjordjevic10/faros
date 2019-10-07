<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chair;
use App\Exceptions\NoProductsException;
use App\Table;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
  public function index($category_id = 1)
  { 
    
    $defaultCategory = Category::find($category_id);
    
    if(strtolower($defaultCategory->name) == 'tables'){
      $popularProducts = Table::where('category_id', $defaultCategory->id)->with('images')->get()->random(4);
      $newProducts = Table::where('category_id', $defaultCategory->id)->with('images')->get()->sortByDesc('created_at')->slice(0, 4);
    } else {
      $popularProducts = Chair::where('category_id', $defaultCategory->id)->with('images')->get()->random(4);
      $newProducts = Chair::where('category_id', $defaultCategory->id)->with('images')->get()->sortByDesc('created_at')->slice(0, 4);
    }

    $categories = Category::all();

    return view('home', compact('categories', 'defaultCategory', 'popularProducts', 'newProducts'));

  }

  public function indexAjax(Request $request)
  {

    if($request->has('id')){
      $defaultCategory = Category::find($request->id);
    }

    try {

      if(strtolower($defaultCategory->name) == 'tables'){
        $popularProducts = Table::where('category_id', $defaultCategory->id)->with('images')->get()->random(4);
        $newProducts = Table::where('category_id', $defaultCategory->id)->with('images')->get()->sortByDesc('created_at')->slice(0, 4);
      } else {
        $popularProducts = Chair::where('category_id', $defaultCategory->id)->with('images')->get()->random(4);
        $newProducts = Chair::where('category_id', $defaultCategory->id)->with('images')->get()->sortByDesc('created_at')->slice(0, 4);
      }
  
      if($newProducts->count() > 0 && $popularProducts->count() > 0){
        return response()->json(['defaultCategory' => $defaultCategory, 'popularProducts' => $popularProducts, 'newProducts' => $newProducts]);  
      } 

    } catch(Exception $e){
      
      throw new NoProductsException($e->getMessage());

    }
    
  }

  public function showAll(Category $category)
  {

    $categories = Category::all();

    if(strtolower($category->name) == 'tables'){
      $products = Table::where('category_id', '=', $category->id)->with('images')->paginate(12);
    } else {
      $products = Chair::where('category_id', '=', $category->id)->with('images')->paginate(12);
    }
    
    return view('showAll', compact('categories', 'category', 'products'));

  }

  public function showOne(Category $category, $product_id)
  {

    $categories = Category::all();
    
    if(strtolower($category->name) == 'tables'){
      $product = Table::where('id', $product_id)->with('images')->get();
    } else {
      $product = Chair::where('id', $product_id)->with('images')->get();
    }
    
    return view('showOne', compact('categories', 'category', 'product'));

  }

  public function contact()
  {

    $categories = Category::all();

    return view('contact', compact('categories'));

  }

}
