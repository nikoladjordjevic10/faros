@extends('layouts.public.app')
@section('title', 'Faros - Product Show')
@section('nav_title', 'Faros')

@section('content')

{{-- Popular Products list start --}}
<div class="container">
  
  <div class="row productHeader justify-content-between align-items-center mb-3">
    <h2 class="mr-5"> Details for : <span>{{ 'Bob Mesh White' }}</span> </h2>
    <ul class="d-flex">
      <li><a href="#">Home</a></li>
      <li><a href="#">Office Chairs</a></li>
      <li><a href="#"><span>Bob Mesh White</span></a></li>
    </ul>
  </div>
  
  <div class="product mb-5">
    <div class="row">
      <div class="col-md-7 d-flex flex-wrap flex-xl-nowrap images">
        <ol class="imagesNav d-flex flex-xl-column flex-wrap order-xl-0 order-1">
          <li class="shadow"><img class="selected" src="{{ asset('storage/images/bob_mesh_white_1.jpg') }}" alt="bob_mesh_white_1.jpg">
          </li>
          <li class="shadow"><img src="{{ asset('storage/images/bob_mesh_white_2.jpg') }}" alt="bob_mesh_white_2.jpg">
          </li>
          <li class="shadow"><img src="{{ asset('storage/images/bob_mesh_white_3.jpg') }}" alt="bob_mesh_white_3.jpg">
          </li>
          <li class="shadow"><img src="{{ asset('storage/images/bob_mesh_white_4.jpg') }}" alt="bob_mesh_white_4.jpg">
          </li>
          <li class="shadow"><img src="{{ asset('storage/images/bob_mesh_white_dim.jpg') }}"
              alt="bob_mesh_white_dim.jpg"></li>
        </ol>
        <div class="imageBig d-flex justify-content-between">
          <img src="{{ asset('storage/images/bob_mesh_white_1.jpg') }}" alt="bob_mesh_white_1.jpg">
          <img src="{{ asset('storage/images/bob_mesh_white_2.jpg') }}" alt="bob_mesh_white_2.jpg">
          <img src="{{ asset('storage/images/bob_mesh_white_3.jpg') }}" alt="bob_mesh_white_3.jpg">
          <img src="{{ asset('storage/images/bob_mesh_white_4.jpg') }}" alt="bob_mesh_white_4.jpg">
          <img src="{{ asset('storage/images/bob_mesh_white_dim.jpg') }}" alt="bob_mesh_white_dim.jpg">
        </div>
      </div>

      <div class="details col-md-5">
        <h2><span>Bob Mesh White<span></h2>
        <p class="price">11.280,00 din</p>
        
        <div class="description">
          <h4><span>Description</span></h4>
          <p>
            Office chair made of mesh canvas, metal frame in one piece, pedestal chrome metal star, rubber wheels.
            Lifting and swinging mechanism.
            Load capacity certified at 120 kg.
          </p>
        </div>

        <div class="dimensions">
          <h4><span>Dimensions</span></h4>
          <ul class="d-flex">
            <li>Width: <span>56cm</span></li>
            <li>Height: <span>112-118cm</span></li>
            <li>Depth: <span>70cm</span></li>
          </ul>
        </div>

        <button type="button" class="btn btn-primary btn-lg btn-block">Buy Now</button>

      </div>
    </div>
  </div>
</div>

{{-- Popular Products list end --}}


@endsection