@extends('layouts.admin.app')
@section('title', 'Categories - Show')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container">

  <div class="row py-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-between">
      <img src="{{ asset('storage/images/proizvodi.jpg') }}" alt="Proizvodi" class="img-thumbnail mb-5 mb-sm-0">
      <h1 class="mb-5 mb-sm-0">Categories</h1>
      <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary">Back to Home</a>
    </div>
  </div>

  <div class="row">
    <div class="table-responsive shadow mb-5">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Models Count</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
            <td>0</td>
            <td><a href="{{ route('categories.show', ['category' => $category]) }}" class="btn btn-sm btn-outline-secondary">Show</a></td>
            <td><a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-sm btn-outline-secondary">Edit</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection

