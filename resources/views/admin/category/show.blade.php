@extends('layouts.admin.app')
@section('title', 'Categories - Show')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container">

  <div class="row py-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-between">
      <img src="{{ asset('storage/uploads/proizvodi.jpg') }}" alt="Proizvodi" class="img-thumbnail mb-5 mb-sm-0" width="150" height="150">
      <h1 class="mb-5 mb-sm-0">Show Category : <span>{{ $category->name }}</span></h1>
      <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary">Back to Home</a>
    </div>
  </div>

  <div class="row">
    <div class="offset-2 col-8 d-flex justify-content-center">
      <a href="{{ route('categories.index') }}" class="btn btn-md btn-outline-secondary mr-5">Back to Categories</a>
      <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-md btn-outline-danger">Delete Category</button>
      </form>
    </div>
  </div>

</div>

@endsection