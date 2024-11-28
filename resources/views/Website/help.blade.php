@extends('Website.layouts.master')
<style>
    .apartment-help-active::after {
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

      <section class="home-sec-01" style="background-image: url({{ asset('assets/images/help-banner.png')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text">
                        <h2>Help Center </h2>
                        <h1>Apartment One</h1>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="home-sec-02 home-sec-04 help-sec-01 ">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12">
                <div class="img-box">
                    <img src="{{ asset('assets/images/help-sec-01-img.png')}}" alt="">
                </div>

            </div>

            <div class="col-lg-6 col-md-12">
                <div class="text text-left-pading">
                    <h3>What We Do</h3>
                    <h2>Rentals and property<br> management</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>
        </div>
    </div>

</section>


<section class="about-sec-04 help-sec-02">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
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

                <div class="accordion" id="faqAccordion1">

                    <!-- First Accordion Item (Active by default) -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                          Lorem Ipsum Is Simply A Dummy Text Of Printing
                          <span class="ms-auto icon">−</span>
                        </button>
                      </h2>
                      <div id="collapseOne1" class="accordion-collapse collapse show" aria-labelledby="headingOne1" data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                          Lorem Ipsum Is Simply A Dummy Text Of Printing
                        </div>
                      </div>
                    </div>

                    <!-- Second Accordion Item -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                          Lorem Ipsum Is Simply A Dummy Text Of Printing
                          <span class="ms-auto icon">+</span>
                        </button>
                      </h2>
                      <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwo1" data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                          Lorem Ipsum Is Simply A Dummy Text Of Printing
                        </div>
                      </div>
                    </div>

                    <!-- Third Accordion Item -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                          Lorem Ipsum Is Simply A Dummy Text Of Printing
                          <span class="ms-auto icon">+</span>
                        </button>
                      </h2>
                      <div id="collapseThree1" class="accordion-collapse collapse" aria-labelledby="headingThree1" data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                          Lorem Ipsum Is Simply A Dummy Text Of Printing
                        </div>
                      </div>
                    </div>

                    <!-- Fourth Accordion Item -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingFour1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour1" aria-expanded="false" aria-controls="collapseFour1">
                          Lorem Ipsum Is Simply A Dummy Text Of Printing
                          <span class="ms-auto icon">+</span>
                        </button>
                      </h2>
                      <div id="collapseFour1" class="accordion-collapse collapse" aria-labelledby="headingFour1" data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                          Lorem Ipsum Is Simply A Dummy Text Of Printing
                        </div>
                      </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>


<section class="help-sec-03">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>How to Avail Apartment One’s<br> Management Services </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <h2>What Is The Main Criteria to<br> get paid for rentals </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h2>Lorem Is Simply A Dummy Text</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h2>Lorem Is Simply</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  </div>
            </div>
        </div>
    </div>

</section>

<x-properties-component />

<x-testimonials-component />

      @endsection
