@extends('layouts.admin.app')
@section('title', 'Chair - Create')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container">

  <div class="row py-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-between">
      <img src="{{ asset('storage/uploads/stolice.jpg') }}" alt="Stolice" class="img-thumbnail mb-5 mb-sm-0" width="150"
        height="150">
      <h1 class="mb-5 mb-sm-0">Create New Chair</h1>
      <a href="{{ route('admin') }}" class="btn btn-md btn-outline-secondary">Back to Home</a>
    </div>
  </div>

  <div class="row">
    <div class="offset-2 col-8 create-chair">
      <form action="{{ route('chairs.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name" class="label-admin">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name" placeholder="Enter name" value="{{ old('name')}}" autocomplete="on">
          <small id="name" class="form-text text-muted">Must be unique chair name</small>

          @error('name')
            <span class="invalid-feedback admin" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="category_id" class="label-admin">Category</label>
            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
              <option value="">Choose category...</option>
              @foreach($categories as $category)
                @if(Str::contains($category->name, 'chairs'))
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
              @endforeach
            </select>

            @error('category_id')
              <span class="invalid-feedback d-block admin" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group col-md-6">
            <label for="price" class="label-admin">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" aria-describedby="price" placeholder="Enter price" value="{{ old('price')}}" autocomplete="on">

            @error('price')
              <span class="invalid-feedback admin" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="width" class="label-admin">Width</label>
            <input type="text" class="form-control @error('width') is-invalid @enderror" id="width" name="width" aria-describedby="width" placeholder="Enter width" value="{{ old('width')}}" autocomplete="on">

            @error('width')
              <span class="invalid-feedback admin" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="height" class="label-admin">Height</label>
            <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" aria-describedby="height" placeholder="Enter height" value="{{ old('height')}}" autocomplete="on">

            @error('height')
              <span class="invalid-feedback admin" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="depth" class="label-admin">Depth</label>
            <input type="text" class="form-control @error('depth') is-invalid @enderror" id="depth" name="depth" aria-describedby="depth" placeholder="Enter depth" value="{{ old('depth')}}" autocomplete="on">

            @error('depth')
              <span class="invalid-feedback admin" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        
        <div class="form-group col-md-6 p-0">
          <label for="description" class="label-admin">Description</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10">{{ old('description') }}</textarea>

          @error('description')
            <span class="invalid-feedback admin" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
          
        <div class="custom-file mt-3 mb-1">
          <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="validatedCustomFile" multiple>
          <label for="validatedCustomFile" class="custom-file-label">Select images</label>

          @error('file')
            <span class="invalid-feedback admin" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-primary mt-4">Create Chair</button>
      </form>

    </div>
  </div>

</div>

@endsection

{{-- <div class="form-group pb-3">
  <label for="file" class="label-admin">Select images</label>
  <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file" multiple>

  @error('description')
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div> --}}