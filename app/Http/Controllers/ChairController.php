<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chair;
use App\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    $this->validateRequest();

    $chair = new Chair();
    $chair->name = request()->name;
    $chair->category_id = request()->category_id;
    $chair->price = request()->price;
    $chair->width = request()->width;
    $chair->height = request()->height;
    $chair->depth = request()->depth;
    $chair->description = request()->description;
    $chair->save();

    $this->storeImages($chair);
    
    return redirect('admin/chairs')->with('message', 'Chair created successfully');

  }

  public function validateRequest($id = null){

    return request()->validate([
      'name' => 'required|min:3|unique:chairs,name, '. $id,
      'category_id' => 'required',
      'price' => 'required|numeric',
      'width' => 'required|regex:/[\d-]+/',
      'height' => 'required|regex:/[\d-]+/',
      'depth' => 'required|regex:/[\d-]+/',
      'description' => 'required|min:5',
      'image' => 'sometimes|required',
      'image.*' => 'file|image|mimes:jpeg,jpg,png,gif,svg,bmp|max:2048',
    ],[
      'image.*' => 'The selected file(s) must be an image.'
    ]);

  }

  public function validateImages(){

    return tap(request()->validate([
      'image' => 'required'
    ]), function(){

      request()->validate([
        'image.*' => 'file|image|mimes:jpeg,jpg,png,gif,svg,bmp|max:2048'
      ], [
        'image.*' => 'The selected file(s) must be an image.'
      ]);

    });

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

  public function editImages(Chair $chair){

    $images = Image::where('item_name', '=', $chair->name)->get();

    return view('admin.chair.editImages', compact('chair', 'images'));

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
    $this->validateRequest($chair->id);
    
    $chair->name = request()->name;
    $chair->category_id = request()->category_id;
    $chair->price = request()->price;
    $chair->width = request()->width;
    $chair->height = request()->height;
    $chair->depth = request()->depth;
    $chair->description = request()->description;
    $chair->save();

    $this->storeImages($chair);
    
    return redirect('admin/chairs/' . $chair->id)->with('message', 'Chair updated successfully');

  }
  
  public function storeImages($chair){

    if(request()->has('image')){

      $images = Collection::wrap(request()->file('image'));
       
      $images->each(function($image) use($chair){

        $imagesStorage = scandir(public_path('storage/images'));
        
        $imageName = $image->getClientOriginalName();

        if (!in_array($imageName, $imagesStorage)) {
         
          $image->move(public_path('storage/images'), $imageName);
  
          Image::create([
            'category_id' => $chair->category->id,
            'item_name' => $chair->name,
            'name' => $imageName,
            'path' => '/storage/images/' . $imageName,
          ]);
         
        }
       
      });

    }

  }

  public function storeImagesOnly(Chair $chair){

    $this->validateImages();

    $this->storeImages($chair);
   
    return back()->with('message', 'Images updated successfully');
      
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Chair  $chair
   * @return \Illuminate\Http\Response
   */
  public function destroy(Chair $chair, Image $image)
  {
    
    $images = Image::where('item_name', '=', $chair->name)->get();

    foreach($images as $image){

      File::delete(public_path($image->path));

      $image->delete();

    }

    $chair->delete();

    return redirect('admin/chairs')->with('message', 'Chair deleted successfully');

  }

  public function destroyImages(Image $image){

    File::delete(public_path($image->path));

    $image->delete();

    return back()->with('message', 'Image deleted successfully');

  }

}
