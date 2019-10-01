@extends('layouts.public.app')
@section('title', 'Faros - Furniture Showroom')
@section('nav_title', 'Faros')

@section('content')
{{-- Slider start --}}
<div class="container sliderContainer mt-3">
  <div id="img_1" class="row slider shadow">
    <div class="col-6 sliderText d-flex flex-column justify-content-around">
      <p>Faros Store</p>
      <p>Office Chairs</p>
      <p><a href="{{ route('showAll', 1) }}">Discover now</a></p>
    </div>
    <div class="col-6">
      <div class="sliderImage" style="background-image: url(../storage/images/BOB_R_HB.png)"></div>
    </div>
  </div>

  <div id="img_2" class="row slider shadow">
    <div class="col-6 sliderText d-flex flex-column justify-content-around">
      <p>Faros Store</p>
      <p>Modern Chairs</p>
      <p><a href="{{ route('showAll', 2) }}">Discover now</a></p>
    </div>
    <div class="col-6">
      <div class="sliderImage" style="background-image: url(../storage/images/twist.png)"></div>
    </div>
  </div>

  <div id="img_3" class="row slider shadow">
    <div class="col-6 sliderText d-flex flex-column justify-content-around">
      <p>Faros Store</p>
      <p>Club Chairs</p>
      <p><a href="{{ route('showAll', 5) }}">Discover now</a></p>
    </div>
    <div class="col-6">
      <div class="sliderImage" style="background-image: url(../storage/images/E07.png)"></div>
    </div>
  </div>

  <a class="previous"><i class="fas fa-chevron-left fa-3x"></i></a>
  <a class="next"><i class="fas fa-chevron-right fa-3x"></i></a>
</div>
{{-- Slider end --}}

{{-- About us start --}}
<div class="container">
  <div class="row">
    <div class="aboutUs text-center w-100">
      <h3>Faros Furniture Showroom</h3>
      <p>We offer a large selection of chairs, for offices, study rooms, living rooms and dining rooms.</p>
      <p>Our products have a <span>24-month</span> warranty. Upon expiry of the warranty, you are provided with service
        and all spare parts.</p>
      <p>Delivery and installation on the territory of Belgrade are free of charge. For other cities, we send goods by
        post express.</p>
      <p>If you order our products through the online store, it is possible to pay on delivery or via bank account.
        Shipping cost <span>240 din</span> per order.</p>
    </div>
  </div>
</div>
{{-- About us end --}}

{{-- Popular Products navigation start--}}
<div class="row products shadow">
  <div class="container">
    <div class="products d-flex flex-wrap align-items-center">
      <div class="col-lg-3 col-md-12">
        <h3>Popular Products</h3>
      </div>
      <div class="col-lg-9 col-md-12 text-nowrap">
        @if(count($categories) > 0)
        <ul class="d-flex flex-column flex-md-row justify-content-sm-end align-items-center m-0">
          @foreach($categories as $category)
          <li><a href="{{ route('home') }}"
              class="@if($category->id == $defaultCategory->id) disabled-link-dark @endif">{{ $category->name }}</a>
          </li>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>
</div>
{{-- Popular Products navigation end --}}

{{-- Popular Products list start --}}
<div class="container">
  <div class="row">
    <div class="productsList w-100">
      <ul class="d-flex flex-wrap">

        @foreach($popularProducts as $popularProduct)
        <div class="col-xl-3 col-md-6 mt-4">
          <li class="shadow mx-auto">
            <a href="{{ route('showOne', [$popularProduct->category_id, $popularProduct->id]) }}">
              <div class="productsListImage"
                style="background-image: url({{ asset('storage/images/'. $popularProduct->images->first()->name) }})">
                <div class="productsListBg">
                </div>
                <div class="productsListLinks">
                  <a href="{{ route('showOne', [$popularProduct->category_id, $popularProduct->id]) }}"><i class="fas fa-plus details"></i></a>
                </div>
              </div>
            </a>
            <div class="productsListInfo">
              <a href="{{ route('showOne', [$popularProduct->category_id, $popularProduct->id]) }}">
                <h4>{{ $popularProduct->name }}</h4>
              </a>
              <p>{{ $popularProduct->formatPrice() }}</p>
            </div>
          </li>
        </div>
        @endforeach

      </ul>
    </div>
  </div>
</div>
{{-- Popular Products list end --}}

{{-- New Products navigation start--}}

<div class="row products shadow">
  <div class="container">
    <div class="products d-flex flex-wrap align-items-center">
      <div class="col-lg-3 col-md-12">
        <h3>New Products</h3>
      </div>
      <div class="col-lg-9 col-md-12 text-nowrap">
        @if(count($categories) > 0)
        <ul class="d-flex flex-column flex-md-row justify-content-sm-end align-items-center m-0">
          @foreach($categories as $category)
          <li><a href="{{ route('home') }}"
              class="@if($category->id == $defaultCategory->id) disabled-link-dark @endif">{{ $category->name }}</a>
          </li>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>
</div>
{{-- New Products navigation end--}}

{{-- New Products list start --}}
<div class="container">
  <div class="row">
    <div class="productsList w-100">
      <ul class="d-flex flex-wrap">

        @foreach($newProducts as $newProduct)
        <div class="col-xl-3 col-md-6 mt-4">
          <li class="shadow mx-auto">
            <a href="{{ route('showOne', [$newProduct->category_id, $newProduct->id]) }}">
              <div class="productsListImage"
                style="background-image: url({{ asset('storage/images/'. $newProduct->images->first()->name) }})">
                <div class="productsListBg">
                </div>
                <div class="productsListLinks">
                  <a href="{{ route('showOne', [$newProduct->category_id, $newProduct->id]) }}"><i class="fas fa-plus details"></i></a>
                </div>
              </div>
            </a>
            <div class="productsListInfo">
              <a href="{{ route('showOne', [$newProduct->category_id, $newProduct->id]) }}">
                <h4>{{ $newProduct->name }}</h4>
              </a>
              <p>{{ $newProduct->formatPrice() }}</p>
            </div>
          </li>
        </div>
        @endforeach

      </ul>
    </div>
  </div>
</div>
{{-- New Products list end --}}
@endsection