@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          You are logged in! <br>

          Go To <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary m-3">Admin Panel</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection