<section class="home-sec-05">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="item">
                  <div class="align-plus">
                    {{-- {{ dd($counterData) }} --}}
                    <h1 class="count" data-number="{{  $counterData['counterValue'] ?? '' }}" ></h1>
                    <h1>+</h1>
                  </div>
                    <h3 class="text">Properties</h3>
                 </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <div class="align-plus">
                    <h1 class="count" data-number="{{$counterData['propertiesTodayCount']  }}"></h1>
                        <h1>+</h1>
                      </div>
                    <h3 class="text">New Listings</h3>
                 </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <div class="align-plus">
                        <h1 class="count" data-number="{{ $counterData['properties_sold'] }}" ></h1>
                        <h1>+</h1>
                      </div>
                    <h3 class="text">Sold Properties</h3>
                 </div>
            </div>
        </div>
    </div>

</section>
