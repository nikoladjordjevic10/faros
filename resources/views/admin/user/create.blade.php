@extends('layouts.admin.app')
@section('title', 'User - Create')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container admin">

  <div class="row py-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-between">
      <img src="{{ asset('storage/images/korisnici.jpg') }}" alt="Korisnici" class="img-thumbnail mb-5 mb-sm-0" width="150"
        height="150">
      <h1 class="mb-5 mb-sm-0">Create New User</h1>
      <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary">Back to Home</a>
    </div>
  </div>

  <div class="row">
    <div class="offset-2 col-8 create-chair">
      <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        
        @include('admin.user.form')

        <button type="submit" class="btn btn-lg btn-primary mt-4">Create User</button>
      </form>

    </div>
  </div>

</div>

@endsection
