@extends('layouts.admin.app')
@section('title', 'Chair - Show')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container">

  <div class="row py-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-between">
      <img src="{{ asset('storage/images/stolice.jpg') }}" alt="Stolice" class="img-thumbnail mb-5 mb-sm-0" width="150" height="150">
      <h1 class="mb-5 mb-sm-0">Show Chair : {{ $chair->name }}</h1>
      <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary">Back to Home</a>
    </div>
  </div>

  <div class="row">
    <div class="table-responsive shadow mb-5">
      <table class="table table-bordered table-striped">
        <tbody class="thead-dark">
          <tr>
            <th>Id</th>
            <td>{{ $chair->id }}</td>
          </tr>
          <tr>
            <th>Name</th>
            <td>{{ $chair->name }}</td>
          </tr>
          <tr>
            <th>Category name</th>
            <td>{{ $chair->category->name }}</td>
          </tr>
          <tr>
            <th>Price</th>
            <td>{{ $chair->formatPrice() }}</td>
          </tr>
          <tr>
            <th>Dimensions W/H/D</th>
            <td>{{ $chair->dimensions() }}</td>
          </tr>
          <tr>
            <th>Description</th>
            <td>{{ $chair->description }}</td>
          </tr>
          <tr>
            <th>Images</th>
            <td>
              @foreach($images as $image)
                <img src="{{ asset('storage/images/'. $image->name)  }}" alt="{{ $image->name }}" title="{{ $image->name }}" width="150">
              @endforeach
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
