@extends('layouts.admin.app')
@section('title', 'Users - Show')
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
      <img src="{{ asset('storage/images/korisnici.jpg') }}" alt="Korisnici" class="img-thumbnail mb-5 mb-sm-0" width="150" height="150">
      <h1 class="mb-5 mb-sm-0">Users</h1>
      <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary">Back to Home</a>
    </div>
  </div>

  <div class="row">
    <div class="table-responsive shadow mb-5">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->role }}</td>
            <td><a href="{{ route('users.show', ['user' => $user]) }}" class="btn btn-sm btn-outline-secondary">Show</a></td>
            <td><a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-sm btn-outline-secondary">Edit</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection

