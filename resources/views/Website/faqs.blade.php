@extends('Website.layouts.master')
@section('content')

<section class="home-sec-01" style="background-image: url({{ asset('assets/images/faqs-main-banner.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>FAQs </h2>
                    <h1>People frequently Asks</h1>      
                </div>
            </div>
        </div>
    </div>  
</section>

<section class="about-sec-04 help-sec-02 faqs-sec-01">
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

<section class="home-sec-02 home-sec-04 home-sec-06 ">
    <div class="container">
        <div class="row align-items-center">



            <div class="col-lg-6 col-md-12">
                <div class="text text-right-pading">
                    <h3>About</h3>
                    <h2>Here Luxury Meets Lifestyle</h2>
                    <p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <a href="#" class="t-btn t-btn-blue">Learn More</a>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="img-box">
                    <img src="{{ asset('assets/images/home-sec-06-img.png')}}" alt="">
                </div>

            </div>
        </div>
    </div>

</section>



<x-news-letters/>

@endsection