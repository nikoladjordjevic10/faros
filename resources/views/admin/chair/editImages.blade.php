@extends('layouts.admin.app')
@section('title', 'Chair - Show Images')
@section('nav_title', 'Dashboard')

@section('content')
<div class="container">

  @if(session('message'))
  <div class="alert alert-success alert-custom">
    {{ session('message') }}
  </div>
  @endif

  <div class="row py-5">
    <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-between">
      <img src="{{ asset('storage/images/stolice.jpg') }}" alt="Stolice" class="img-thumbnail mb-5 mb-sm-0" width="150"
        height="150">
      <h1 class="mb-5 mb-sm-0">Show Chairs Images : <span>{{ $chair->name }}</span></h1>
      <a href="{{ route('chairs.show', ['chair' => $chair]) }}" class="btn btn-md btn-outline-secondary">Back to
        Chair</a>
    </div>
  </div>

  @if($images->count() > 0)
  <div class="row d-flex justify-content-center align-items-center">
    @foreach($images as $image)
    <form action="{{ route('chairs.destroyImages', ['image' => $image]) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="card card-admin mr-4 mb-4 shadow">
        <img class="card-img-top card-chairImages" src="{{ asset('storage/images/'. $image->name) }}"
          alt="{{ $image->name }}" title="{{ $image->name }}">
        <div class="card-body">
          {{-- <input type="hidden" name="image_id" value="{{ $image->id }}"> --}}
          <button type="submit" class="btn btn-md btn-outline-danger">Delete Image</button>
        </div>
      </div>
    </form>
    @endforeach
  </div>
  @endif

<div class="row">
  <div class="offset-2 col-8">
    <form action="{{ route('chairs.storeImagesOnly', ["chair" => $chair]) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="custom-file mt-3 mb-1">
        <input type="file"
          class="custom-file-input @if($errors->has('image.*') || $errors->has('image')) is-invalid @endif" id="image"
          name="image[]" multiple>
        <label for="image" class="custom-file-label"><span class="custom-text-label">Select images</span></label>

        @if($errors->any())
        <span class="invalid-feedback admin" role="alert">
          <strong>{{ $errors->first('image.*') }}</strong>
          <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
      </div>

      <button type="submit" class="btn btn-md btn-primary mt-4">Upload Images</button>
    </form>

  </div>
</div>

</div>

@endsection