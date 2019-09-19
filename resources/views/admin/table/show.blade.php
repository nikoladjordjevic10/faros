@extends('layouts.admin.app')
@section('title', 'Table - Show')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container admin">

    @if(session('message'))
      <div class="alert alert-success alert-custom">
          {{ session('message') }}
      </div>
    @endif

  <div class="row py-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-between">
      <img src="{{ asset('storage/images/stolovi.jpg') }}" alt="Stolovi" class="img-thumbnail mb-5 mb-sm-0" width="150" height="150">
      <h1 class="mb-5 mb-sm-0">Show Table : <span>{{ $table->name }}</span></h1>
      <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary">Back to Home</a>
    </div>
  </div>

  <div class="row pb-5">
    <div class="offset-2 col-8 d-flex justify-content-center">
      <a href="{{ route('tables.index') }}" class="btn btn-md btn-outline-secondary mr-5">Back to Tables</a>
      <form action="{{ route('tables.destroy', ['table' => $table]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-md btn-outline-danger">Delete Table</button>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="table-responsive shadow mb-5">
      <table class="table table-bordered table-striped">
        <tbody class="thead-dark">
          <tr>
            <th>Id</th>
            <td>{{ $table->id }}</td>
          </tr>
          <tr>
            <th>Name</th>
            <td>{{ $table->name }}</td>
          </tr>
          <tr>
            <th>Category name</th>
            <td>{{ $table->category->name }}</td>
          </tr>
          <tr>
            <th>Price</th>
            <td>{{ $table->formatPrice() }}</td>
          </tr>
          <tr>
            <th>Dimensions W / H / L</th>
            <td>{{ $table->dimensions() }}</td>
          </tr>
          <tr>
            <th>Description</th>
            <td>{{ $table->description }}</td>
          </tr>
          <tr>
            <th>Images</th>
            <td>
              @if(count($images) > 0)
                @foreach($images as $image)
                  <img src="{{ asset('storage/images/'. $image->name) }}" alt="{{ $image->name }}" title="{{ $image->name }}" width="150">
                @endforeach
              @else
                <span>* No images available at the moment *</span>
              @endif
            </td>
          </tr>
          <tr>
              <th></th>
              <td>
                  <a href="{{ route('tables.editImages', ['table' => $table]) }}" class="btn btn-md btn-outline-primary">Edit Images</a>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection