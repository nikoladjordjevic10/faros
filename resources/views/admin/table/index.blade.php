@extends('layouts.admin.app')
@section('title', 'Tables - Show')
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
      <h1 class="mb-5 mb-sm-0">Tables</h1>
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
          @foreach($tables as $table)
          <tr>
            <th scope="row">{{ $table->id }}</th>
            <td>{{ $table->name }}</td>
            <td>{{ $table->category->name }}</td>
            <td>{{ $table->formatPrice() }}</td>
            <td><a href="{{ route('tables.show', ['table' => $table]) }}" class="btn btn-sm btn-outline-secondary">Show</a></td>
            <td><a href="{{ route('tables.edit', ['table' => $table]) }}" class="btn btn-sm btn-outline-secondary">Edit</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection

