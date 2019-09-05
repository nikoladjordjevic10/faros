<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chair;
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

    return view('admin.chair.create', compact('categories'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
       
    $data = request()->validate([
      'name' => 'required|min:3|unique:chairs,name',
      'category_id' => 'required',
      'price' => 'required|numeric',
      'width' => 'required|regex:/[\d-]+/',
      'height' => 'required|regex:/[\d-]+/',
      'depth' => 'required|regex:/[\d-]+/',
      'description' => 'required|min:5'
    ]);

    
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
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Chair  $chair
   * @return \Illuminate\Http\Response
   */
  public function edit(Chair $chair)
  {
      //
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
      //
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
}
