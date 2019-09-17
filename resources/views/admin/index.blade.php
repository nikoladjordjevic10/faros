@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container">

  <h2 class="py-5 mx-0 my-auto">Welcome to Admin Panel</h2>

  <div class="row">
    <div class="col-md-6">
      <div class="card card-admin mb-5 text-center shadow">
        <div class="card-header">Categories</div>
        <img class="card-img-top" src="{{ asset('storage/images/proizvodi.jpg') }}" alt="Proizvodi" title="Proizvodi">
        <div class="card-body">
          <div class="d-flex justify-content-center align-items-center">
            <div class="btn-group">
              <a href="{{ route('categories.index') }}" class="btn btn-md btn-outline-secondary">Show All</a>
              <a href="{{ route('categories.create') }}" class="btn btn-md btn-outline-secondary">Add New</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-admin mb-5 text-center shadow">
        <div class="card-header">Chairs</div>
        <img class="card-img-top" src="{{ asset('storage/images/stolice.jpg') }}" alt="Stolice" title="Stolice">
        <div class="card-body">
          <div class="d-flex justify-content-center align-items-center">
            <div class="btn-group">
              <a href="{{ route('chairs.index') }}" class="btn btn-md btn-outline-secondary">Show All</a>
              <a href="{{ route('chairs.create') }}" class="btn btn-md btn-outline-secondary">Add New</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-admin mb-5 text-center shadow">
        <div class="card-header">Tables</div>
        <img class="card-img-top" src="{{ asset('storage/images/stolovi.jpg') }}" alt="Stolovi" title="Stolovi">
        <div class="card-body">
          <div class="d-flex justify-content-center align-items-center">
            <div class="btn-group">
              <a href="{{ route('tables.index') }}" class="btn btn-md btn-outline-secondary">Show All</a>
              <a href="{{ route('tables.create') }}" class="btn btn-md btn-outline-secondary">Add New</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-admin mb-5 text-center shadow">
        <div class="card-header">Users</div>
        <img class="card-img-top" src="{{ asset('storage/images/korisnici.jpg') }}" alt="Korisnici" title="Korisnici">
        <div class="card-body">
          <div class="d-flex justify-content-center align-items-center">
            <div class="btn-group">
              <a href="{{ route('users.index') }}" class="btn btn-md btn-outline-secondary">Show All</a>
              <a href="{{ route('users.create') }}" class="btn btn-md btn-outline-secondary">Add New</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection
