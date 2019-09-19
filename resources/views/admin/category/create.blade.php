@extends('layouts.admin.app')
@section('title', 'Categories - Create')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container admin">

  <div class="row py-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-between">
      <img src="{{ asset('storage/images/proizvodi.jpg') }}" alt="Proizvodi" class="img-thumbnail" width="150"
        height="150">
      <h1>Create New Category</h1>
      <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary">Back to Home</a>
    </div>
  </div>

  <div class="row">
    <div class="offset-2 col-8">
      <form action="{{ route('categories.store') }}" method="POST">
        
        @include('admin.category.form')
        
        <button type="submit" class="btn btn-lg btn-primary">Create</button>
      </form>

    </div>
  </div>

</div>

@endsection