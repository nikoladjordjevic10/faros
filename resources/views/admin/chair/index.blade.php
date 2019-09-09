@extends('layouts.admin.app')
@section('title', 'Chairs - Show')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container">

  <div class="row py-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-between">
      <img src="{{ asset('storage/images/stolice.jpg') }}" alt="Stolice" class="img-thumbnail mb-5 mb-sm-0" width="150" height="150">
      <h1 class="mb-5 mb-sm-0">Chairs</h1>
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
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach($chairs as $chair)
          <tr>
            <th scope="row">{{ $chair->id }}</th>
            <td>{{ $chair->name }}</td>
            <td>{{ $chair->category->name }}</td>
            <td>{{ $chair->formatPrice() }}</td>
            <td><a href="{{ route('chairs.show', ['chair' => $chair]) }}" class="btn btn-sm btn-outline-secondary">Show</a></td>
            <td><a href="{{ route('chairs.edit', ['chair' => $chair]) }}" class="btn btn-sm btn-outline-secondary">Edit</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection

