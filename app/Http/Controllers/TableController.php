<?php

namespace App\Http\Controllers;

use App\Category;
use App\Table;
use App\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TableController extends Controller
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

    $tables = Table::all();

    return view('admin.table.index', compact('tables'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $table = new Table();

    $categories = Category::all();

    return view('admin.table.create', compact('table', 'categories'));

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

    $table = new Table();
    $table->name = request()->name;
    $table->category_id = request()->category_id;
    $table->price = request()->price;
    $table->width = request()->width;
    $table->height = request()->height;
    $table->length = request()->length;
    $table->description = request()->description;
    $table->save();

    $this->storeImages($table);

    return redirect('admin/tables')->with('message', 'Table created successfully');

  }

  public function validateRequest($id = null)
  {

    return request()->validate([
      'name' => 'required|min:3|unique:chairs,name, ' . $id,
      'category_id' => 'required',
      'price' => 'required|numeric',
      'width' => 'required|regex:/[\d-]+/',
      'height' => 'required|regex:/[\d-]+/',
      'length' => 'required|regex:/[\d-]+/',
      'description' => 'required|min:5',
      'image' => 'sometimes|required',
      'image.*' => 'file|image|mimes:jpeg,jpg,png,gif,svg,bmp|max:2048',
    ], [
      'image.*' => 'The selected file(s) must be an image.'
    ]);

  }

  public function validateImages()
  {

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
   * @param  \App\Table  $table
   * @return \Illuminate\Http\Response
   */
  public function show(Table $table)
  {

    $images = Image::where('table_id', '=', $table->id)->orderBy('name')->get();

    return view('admin.table.show', compact('table', 'images'));

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Table  $table
   * @return \Illuminate\Http\Response
   */
  public function edit(Table $table)
  {
    
    $categories = Category::all();

    return view('admin.table.edit', compact('table', 'categories'));

  }

  public function editImages(Table $table)
  {

    $images = Image::where('table_id', '=', $table->id)->orderBy('name')->get();

    return view('admin.table.editImages', compact('table', 'images'));

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Table  $table
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Table $table)
  {
    
    $this->validateRequest($table->id);

    $table->name = request()->name;
    $table->category_id = request()->category_id;
    $table->price = request()->price;
    $table->width = request()->width;
    $table->height = request()->height;
    $table->length = request()->length;
    $table->description = request()->description;
    $table->save();

    $this->storeImages($table);
    
    return redirect('admin/tables/' . $table->id)->with('message', 'Table updated successfully');

  }

  public function storeImages($table)
  {

    if(request()->has('image')){

      $images = Collection::wrap(request()->file('image'));
       
      $images->each(function($image) use($table){

        $imagesStorage = scandir(public_path('storage/images'));
        
        $imageName = $image->getClientOriginalName();

        if (!in_array($imageName, $imagesStorage)) {
         
          $image->move(public_path('storage/images'), $imageName);
  
          Image::create([
            'chair_id' => null,
            'table_id' => $table->id,
            'item_name' => $table->name,
            'name' => $imageName,
            'path' => '/storage/images/' . $imageName,
          ]);
         
        }
       
      });

    }

  }

  public function storeImagesOnly(Table $table)
  {

    $this->validateImages();

    $this->storeImages($table);
   
    return back()->with('message', 'Images updated successfully');
      
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Table  $table
   * @return \Illuminate\Http\Response
   */
  public function destroy(Table $table)
  {
    $images = Image::where('table_id', '=', $table->id)->get();

    foreach($images as $image){

      File::delete(public_path($image->path));

      $image->delete();

    }

    $table->delete();

    return redirect('admin/tables')->with('message', 'Table deleted successfully');
  }

  public function destroyImages(Image $image)
  {

    File::delete(public_path($image->path));

    $image->delete();

    return back()->with('message', 'Image deleted successfully');

  }

}
