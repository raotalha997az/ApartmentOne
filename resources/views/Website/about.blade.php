@extends('Website.layouts.master')
<style>
    .apartment-about-active::after {
content: "";
width: 8px;
height: 5px;
position: absolute;
background-color: #0077B6;
bottom: -5px;
left: 45%;
border-radius: 20px;
}

.header-menu li {
position: relative;
}
</style>
@section('content')

      <section class="home-sec-01" style="background-image: url({{ asset('assets/images/about-us-banner.png') }})">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="text">
                          <h2>About Us</h2>
                          <h1>Apartment One: The<br> Property Solutions</h1>
                      </div>
                  </div>
              </div>
          </div>
  </section>

  <div class="about-counter">
    <x-counter-component :counterData="$counterData" />
  </div>

  <section   ion class="home-sec-02 about-sec-01">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6 col-md-12">
                  <div class="text text-right-pading">
                      <h3>Rental Management</h3>
                      <h2>Global Rental<br> management </h2>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                      @if (Auth::user())
                                            @if (Auth::user()->hasRole('tenant'))
                                                <a href="{{ route('tenant.dashboard') }}" class="t-btn t-btn-blue">Create A Free Account</a>
                                            @elseif(Auth::user()->hasRole('land_lord'))
                                                <a href="{{ route('landlord.dashboard') }}" class="t-btn t-btn-blue">Create A Free Account</a>
                                            @elseif(Auth::user()->hasRole('admin'))
                                                <a href="{{ route('admin.dashboard') }}" class="t-btn t-btn-blue">Create A Free Account</a>
                                            @endif
                                @else
                                    <a href="{{ route('register') }}" class="t-btn t-btn-blue">Create A Free Account</a>
                                @endif
                  </div>
              </div>
              <div class="col-lg-6 col-md-12">
                  <div class="img-box">
                      <img src="{{ asset('assets/images/about-us-sec-01-img-01.png') }}" alt="">
                  </div>

              </div>
          </div>
      </div>

  </section>


  <section class="home-sec-02 home-sec-04  about-sec-02 ">
      <div class="container">
          <div class="row align-items-center">

              <div class="col-lg-6 col-md-12">
                  <div class="img-box">
                      <img src="{{ asset('assets/images/about-us-sec-02-img-01.png') }}" alt="">
                  </div>

              </div>

              <div class="col-lg-6 col-md-12">
                  <div class="text text-left-pading">
                      <h3>Profile Base Listings</h3>
                      <h2>Finding Home With Ease And Faster</h2>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                  </div>
              </div>
          </div>
      </div>

  </section>



  <x-easiest-way-to-commute />


  <x-properties-component :value="$properties" />



  <section class="about-sec-04">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6 col-md-12">
                  <div class="text">
                      <h3>FAQs</h3>
                      <h2>People frequently asked us</h2>
                      <p>Lorem Ipsum is simply dummy text</p>
                  </div>
                  <div class="accordion" id="faqAccordion">

                      <!-- First Accordion Item (Active by default) -->
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Lorem Ipsum Is Simply A Dummy Text Of Printing
                            <span class="ms-auto icon">−</span>
                          </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                          <div class="accordion-body">
                            Lorem Ipsum Is Simply A Dummy Text Of Printing
                          </div>
                        </div>
                      </div>

                      <!-- Second Accordion Item -->
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Lorem Ipsum Is Simply A Dummy Text Of Printing
                            <span class="ms-auto icon">+</span>
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                          <div class="accordion-body">
                            Lorem Ipsum Is Simply A Dummy Text Of Printing
                          </div>
                        </div>
                      </div>

                      <!-- Third Accordion Item -->
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Lorem Ipsum Is Simply A Dummy Text Of Printing
                            <span class="ms-auto icon">+</span>
                          </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                          <div class="accordion-body">
                            Lorem Ipsum Is Simply A Dummy Text Of Printing
                          </div>
                        </div>
                      </div>

                      <!-- Fourth Accordion Item -->
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Lorem Ipsum Is Simply A Dummy Text Of Printing
                            <span class="ms-auto icon">+</span>
                          </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                          <div class="accordion-body">
                            Lorem Ipsum Is Simply A Dummy Text Of Printing
                          </div>
                        </div>
                      </div>

                    </div>
              </div>
              <div class="col-lg-6 col-md-12">
                  <img src="{{ asset('assets/images/about-us-sec-04-img-01.png') }}" alt="">
              </div>
          </div>
      </div>

  </section>

  <section class="about-sec-05">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-12">
          <img src="{{ asset('assets/images/about-sec-05-img-01.png') }}" alt="">
        </div>
        <div class="col-lg-7 col-md-12">
          <div class="text">
            <h2>Our Story</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        </div>
      </div>
    </div>

  </section>

  <x-testimonials-component />

      @endsection
