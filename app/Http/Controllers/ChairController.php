<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chair;
use App\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ChairController extends Controller
{

  public function __construct()
  { 
    
    $this->middleware('auth');

  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {   

    $chairs = Chair::all();

    return view('admin.chair.index', compact('chairs'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $categories = Category::all();

    $chair = new Chair();

    return view('admin.chair.create', compact('categories', 'chair'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) 
  {
    
    $chair = Chair::create(tap(request()->validate([
      'name' => 'required|min:3|unique:chairs,name',
      'category_id' => 'required',
      'price' => 'required|numeric',
      'width' => 'required|regex:/[\d-]+/',
      'height' => 'required|regex:/[\d-]+/',
      'depth' => 'required|regex:/[\d-]+/',
      'description' => 'required|min:5',
    ]), function(){

      if(request()->hasFile('images')){
        request()->validate([
          'images.*' => 'file|image|mimes:jpeg,jpg,png,gif,svg,bmp|max:2048',
        ]);
      }

    }));

    $this->storeImages($chair);
    
    return redirect('admin/chairs');

  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Chair  $chair
   * @return \Illuminate\Http\Response
   */
  public function show(Chair $chair)
  {

    $images = Image::where('item_name', '=', $chair->name)->get();

    return view('admin.chair.show', compact('chair', 'images'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Chair  $chair
   * @return \Illuminate\Http\Response
   */
  public function edit(Chair $chair)
  {

    $categories = Category::all();
      
    return view('admin.chair.edit', compact('chair', 'categories'));

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Chair  $chair
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Chair $chair)
  {

    $chair->update(tap(request()->validate([
      'name' => 'required|min:3|unique:chairs,name,'.$chair->id,
      'category_id' => 'required',
      'price' => 'required|numeric',
      'width' => 'required|regex:/[\d-]+/',
      'height' => 'required|regex:/[\d-]+/',
      'depth' => 'required|regex:/[\d-]+/',
      'description' => 'required|min:5',
    ]), function(){

      if(request()->hasFile('images')){
        request()->validate([
          'images.*' => 'file|image|mimes:jpeg,jpg,png,gif,svg,bmp|max:2048',
        ]);
      }

    }));

    $this->storeImages($chair);
    
    return redirect('admin/chairs');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Chair  $chair
   * @return \Illuminate\Http\Response
   */
  public function destroy(Chair $chair)
  {
      //
  }

  public function storeImages($chair){

    if(request()->has('images')){

      $images = Collection::wrap(request()->file('images'));

      $images->each(function($image) use($chair){

        $image_name = $image->getClientOriginalName();
       
        $image->move(public_path('storage/images'), $image_name);

        Image::create([
          'category_id' => $chair->category->id,
          'item_name' => $chair->name,
          'name' => $image_name,
        ]);
       
      });

    }

  }

}
