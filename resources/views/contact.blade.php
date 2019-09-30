@extends('layouts.public.app')
@section('title', 'Faros - Contact')
@section('nav_title', 'Faros')

@section('content')

<div class="container">
  <div class="contact px-3 px-md-0">
    {{-- Start of contact info --}}
    <div class="row shadow">
      <div class="contactInfo w-100 d-flex flex-wrap">
        <div class="col-12 col-md-6 col-lg-3 d-flex mb-4 mb-xl-0">
          <div class="icon">
            <i class="far fa-clock"></i>
          </div>
          <div class="content">
            <h4>Open hours</h4>
            <p>
              Mon - Fri : 09:00 - 17:00 <br>
              Sat - Sun : Closed
            </p>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 d-flex mb-4 mb-xl-0">
          <div class="icon">
            <i class="fas fa-phone"></i>
          </div>
          <div class="content">
            <h4>Phone number</h4>
            <p>
              +381(11)2406-314 <br>
              +381(63) 289-599
            </p>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 d-flex mb-4 mb-xl-0">
          <div class="icon">
            <i class="far fa-envelope"></i>
          </div>
          <div class="content">
            <h4>Our email</h4>
            <p>office@faros.rs</p>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 d-flex mb-4 mb-xl-0">
          <div class="icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <div class="content">
            <h4>Our location</h4>
            <p>Dimitrija Tucovića 119b, 11000 Beograd</p>
          </div>
        </div>

      </div>
    </div>
    {{-- End of contact info --}}

    {{-- Start of contact form --}}
    <div class="row">
      <div class="contactFormHeader ">
        <h2>Get in touch</h2>
        <p>Write us a letter!</p>
      </div>
    </div>
    <div class="row">
      <div class="d-flex flex-wrap w-100">
        <div id="contactForm" class="col-12 col-lg-6 pl-0 d-flex flex-wrap">
          <form action="" method="">
            
            <div class="form-row">
              <div class="col-12 col-lg-6 mt-4">
                <input type="text" class="form-control form-control-lg shadow" placeholder="Name">
              </div>
              <div class="col-12 col-lg-6 mt-4">
                <input type="text" class="form-control form-control-lg shadow" placeholder="Phone">
              </div>
            </div>

            <div class="form-row mt-4">
              <div class="col-12">
                <input type="email" class="form-control form-control-lg shadow" placeholder="Email">
              </div>
            </div>

            <div class="form-row mt-4">
              <div class="col-12">
                <textarea class="form-control form-control-lg shadow" placeholder="Message" rows="10"></textarea>
              </div>
            </div>

            <button type="submit" class="btn btn-lg btn-primary mt-5">Submit</button>

          </form>
        </div>

        <div class="col-12 col-lg-6 pl-0 pl-lg-4 mt-5 mt-lg-4 contactMap">
          <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=faros%20stolice&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/nordvpn-coupon-code/">nordvpn locations</a></div><style>.mapouter{position:relative;text-align:right;height:400px;width:500px;}.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:500px;}</style></div>
        </div>

      </div>
    </div>
    {{-- End of contact form --}}
  </div>
</div>

@endsection