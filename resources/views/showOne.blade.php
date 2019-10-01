@extends('layouts.public.app')
@section('title', 'Faros - Product Show')
@section('nav_title', 'Faros')

@section('content')

{{-- Popular Products list start --}}
<div class="container">
  
  <div class="row productHeader justify-content-between align-items-center mb-3">
    <h2 class="mr-5"> Details for : <span>{{ $product->first()->name }}</span> </h2>
    <ul class="d-flex">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('showAll', $product->first()->category_id) }}">{{ $product->first()->category->name }}</a></li>
      <li><a class="disabled-link-primary"><span>{{ $product->first()->name }}</span></a></li>
    </ul>
  </div>
  
  <div class="product mb-5">
    <div class="row">
      <div class="col-md-7 d-flex flex-wrap flex-xl-nowrap images">
        <ol class="imagesNav d-flex flex-xl-column flex-wrap order-xl-0 order-1">
          @foreach($product->first()->images as $image)
            {{-- {{ dd($image) }} --}}
            <li class="shadow"><img class="@if($loop->first) selected @endif" src="{{ asset('storage/images/' . $image->name) }}" alt="{{ $image->name }}">
          @endforeach
        </ol>
        <div class="imageBig d-flex justify-content-between">
          @foreach($product->first()->images as $image)
            <img src="{{ asset('storage/images/' . $image->name) }}" alt="{{ $image->name }}">
          @endforeach
        </div>
      </div>

      <div class="details col-md-5">
        <h2><span>{{ $product->first()->name }}<span></h2>
        <p class="price">{{ $product->first()->formatPrice() }}</p>
        
        <div class="description">
          <h4><span>Description</span></h4>
          <p>
            {{ $product->first()->description }}
          </p>
        </div>

        <div class="dimensions">
          <h4><span>Dimensions</span></h4>
          <ul class="d-flex">
            <li>Width: <span>{{ $product->first()->width }} cm</span></li>
            <li>Height: <span>{{ $product->first()->height }} cm</span></li>
            @if( strtolower($product->first()->category->name) == 'tables')
              <li>Length: <span>{{ $product->first()->length }} cm</span></li>
            @else
              <li>Depth: <span>{{ $product->first()->depth }} cm</span></li>
            @endif
          </ul>
        </div>

        <button type="button" class="btn btn-primary btn-lg btn-block">Buy Now</button>

      </div>
    </div>
  </div>
</div>

{{-- Popular Products list end --}}


@endsection