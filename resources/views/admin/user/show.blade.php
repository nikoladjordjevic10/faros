@extends('layouts.admin.app')
@section('title', 'User - Show')
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
      <h1 class="mb-5 mb-sm-0">Show User : <span>{{ $user->FullName }}</span></h1>
      <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary">Back to Home</a>
    </div>
  </div>

  <div class="row pb-5">
    <div class="offset-2 col-8 d-flex justify-content-center">
      <a href="{{ route('users.index') }}" class="btn btn-md btn-outline-secondary mr-5">Back to Users</a>
      <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-md btn-outline-danger">Delete User</button>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="table-responsive shadow mb-5">
      <table class="table table-bordered table-striped">
        <tbody class="thead-dark">
          <tr>
            <th>Id</th>
            <td>{{ $user->id }}</td>
          </tr>
          <tr>
            <th>First Name</th>
            <td>{{ $user->first_name }}</td>
          </tr>
          <tr>
            <th>Last Name</th>
            <td>{{ $user->last_name }}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <th>Username</th>
            <td>{{ $user->username }}</td>
          </tr>
          <tr>
            <th>Role</th>
            <td>{{ $user->role }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection