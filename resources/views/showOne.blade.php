@extends('layouts.public.app')
@section('title', 'Faros - Product Show')
@section('nav_title', 'Faros')

@section('content')

{{-- Popular Products list start --}}
<div class="container">
  <div class="row">
    <div class="product my-5">
      <h1 class="text-center mb-5"> Details for : <span>{{ 'Bob Mesh White' }}</span> </h1>
      <div class="col-12 col-md-7 d-flex flex-wrap flex-xl-nowrap images">
        <ol class="imagesNav d-flex flex-xl-column flex-wrap order-xl-0 order-1">
          <li class="shadow selected"><img class="small" src="{{ asset('storage/images/bob_mesh_white_1.jpg') }}" alt="bob_mesh_white_1.jpg">
          </li>
          <li class="shadow"><img class="small" src="{{ asset('storage/images/bob_mesh_white_2.jpg') }}" alt="bob_mesh_white_2.jpg">
          </li>
          <li class="shadow"><img class="small" src="{{ asset('storage/images/bob_mesh_white_3.jpg') }}" alt="bob_mesh_white_3.jpg">
          </li>
          <li class="shadow"><img class="small" src="{{ asset('storage/images/bob_mesh_white_4.jpg') }}" alt="bob_mesh_white_4.jpg">
          </li>
          <li class="shadow"><img class="small" src="{{ asset('storage/images/bob_mesh_white_dim.jpg') }}"
              alt="bob_mesh_white_dim.jpg"></li>
        </ol>
        <div class="imageBig d-flex justify-content-between">
          <img class="big opaque" src="{{ asset('storage/images/bob_mesh_white_1.jpg') }}" alt="bob_mesh_white_1.jpg">
          <img class="big" src="{{ asset('storage/images/bob_mesh_white_2.jpg') }}" alt="bob_mesh_white_2.jpg">
          <img class="big" src="{{ asset('storage/images/bob_mesh_white_3.jpg') }}" alt="bob_mesh_white_3.jpg">
          <img class="big" src="{{ asset('storage/images/bob_mesh_white_4.jpg') }}" alt="bob_mesh_white_4.jpg">
          <img class="big" src="{{ asset('storage/images/bob_mesh_white_dim.jpg') }}" alt="bob_mesh_white_dim.jpg">
        </div>
      </div>

      <div class="details col-12 col-md-5">
        <h2>Bob Mesh White</h2>
      </div>
    </div>
  </div>
</div>

{{-- Popular Products list end --}}


@endsection