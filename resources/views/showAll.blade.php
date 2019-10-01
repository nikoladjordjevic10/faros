@extends('layouts.public.app')
@section('title', 'Faros - Category Show')
@section('nav_title', 'Faros')

@section('content')

{{-- Popular Products list start --}}
<div class="container">
  <div class="row productHeader justify-content-between align-items-center mt-3 pl-4">
    <h1> {{ $category->name }} </h1>
    <ul class="d-flex">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a class="disabled-link-primary">{{ $category->name }}</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="productsList category w-100">
      <ul class="d-flex flex-wrap">
        
        @foreach($products as $product)
        <div class="col-xl-4 col-md-6 mb-5">
          <li class="shadow mx-auto">
            <a href="{{ route('showOne', ['category' =>$category, $product->id]) }}">
              <div class="productsListImage" style="background-image: url({{ asset('storage/images/'. $product->images->first()->name) }})">
                <div class="productsListBg">
                </div>
                <div class="productsListLinks">
                  <a href="{{ route('showOne', ['category' =>$category, $product->id]) }}"><i class="fas fa-plus details"></i></a>
                </div>
              </div>
            </a>
            <div class="productsListInfo">
              <a href="{{ route('showOne', ['category' =>$category, $product->id]) }}">
                <h4>{{ $product->name }}</h4>
              </a>
              <p>{{ $product->formatPrice() }}</p>
            </div>
          </li>
        </div>
        @endforeach

      </ul>
    </div>
  </div>
</div>

{{ $products->links() }}
{{-- Popular Products list end --}}


@endsection