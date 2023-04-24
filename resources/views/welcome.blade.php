@extends('layouts.master')
@section('title')
    Home
@endsection
@section('body')
    {{-- Hero --}}
    <div class="container-fluid">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1">Unizik Hostel Management Portal</h1>
                <p class="lead">Search, select, reserve and pay for your bed space of choice, with utmost ease! No Paper
                    trails, No physical meeting, just at your fingertips.
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mt-lg-5 mb-lg-3">
                    <button type="button" class="btn btn-primary bg-theme btn-lg px-4 me-md-2 border-0">Create Account</button>
                    <button type="button" class="btn btn-primary bg-theme-2 btn-lg px-4 border-0">Login</button>
                </div>
            </div>
            <div class="col-lg-5 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="{{ asset('assets/images/hostel-exterior-1.jpg') }}" id="bannerImage"
                    alt="" width="720" style="height:420px !important;">
            </div>
        </div>
    </div>

    {{-- Features --}}
    <section class="pt-5">
        <div class="px-4 py-5" id="hanging-icons">
            <h4 class="py-4 text-center"><small style="font-size: 20px;" class="pb-2 text-theme">
                    The new system possesses the following features</small>
                <br>
                <span class="pb-1">Discover how this system makes life easier for <b class="text-theme">Hostel
                        Management</b>
                    With Automations</span>
            </h4>
            <div class="bg-light py-5 service-11">
                <div class="container">
                    <!-- Row  -->
                    <div class="row">

                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div class="icon-round text-center d-inline-block rounded-circle bg-theme-2">
                                            F</div>
                                    </div>
                                    <h6 class="font-weight-medium text-dark fw-3"><b>
                                            Fast Speed</b></h6>
                                    <p class="mt-3">
                                        Light-weight framework ensuring speedy loading. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div class="icon-round text-center d-inline-block rounded-circle bg-theme-2">
                                            S</div>
                                    </div>
                                    <h6 class="font-weight-medium text-dark fw-3"><b>Safe and Secure</b></h6>
                                    <p class="mt-3"> Employing encrypted communication to ensure security.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div class="icon-round text-center d-inline-block rounded-circle bg-theme-2">
                                            A</div>
                                    </div>
                                    <h6 class="font-weight-medium text-dark fw-3"><b>
                                            Accessible</b></h6>
                                    <p class="mt-3">Pre-designed to be accessed from any location. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div class="icon-round text-center d-inline-block rounded-circle bg-theme-2">
                                            E</div>
                                    </div>
                                    <h6 class="font-weight-medium text-dark fw-3"><b>
                                            Easy Hostel Booking</b></h6>
                                    <p class="mt-3">Easy for students to book hostel rooms of choice. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div class="icon-round text-center d-inline-block rounded-circle bg-theme-2">
                                            G</div>
                                    </div>
                                    <h6 class="font-weight-medium text-dark fw-3"><b>
                                            Generate Reports</b></h6>
                                    <p class="mt-3">Quickly Generate information & print reports from database.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div class="icon-round text-center d-inline-block rounded-circle bg-theme-2">
                                            P</div>
                                    </div>
                                    <h6 class="font-weight-medium text-dark fw-3"><b>
                                            Pay with Crypto</b></h6>
                                    <p class="mt-3">You can pay online or with crypto immediately</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3 text-center">
                            <a class="btn bg-theme text-white border-0 btn-md" href="#f11"><span>View
                                    Details</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- List --}}
    <section class="py-5 bg-white">
        <div class="container pt-5 pb-3">
            <h1 class="display-5 fw-800 lh-3 mt-5 pb-2">
                Take a gimplse into our Spaces
            </h1>
            <div class="row pt-3">
                @foreach ([1, 2, 3, 4, 5, 6] as $space)
                    <div class="col-md-4 col-sm-6 col-xs-6 col-6 mb-3">
                        <div class="product-grid5">
                            <div class="product-image5">
                                <a href="{{ 'ambualance.details' }}" style="overflow:hidden !important;">
                                    <img class="pic-1 fill-image" style="height: 250px !important;"
                                        src="{{ asset('assets/images/'.$space.'.jpg') }}">
                                    <img class="pic-2 fill-image" style="height: 250px !important;"
                                        src="{{ asset('assets/images/'.$space.'.jpg') }}">
                                </a>
                                <ul class="social">
                                    <li class="shadow"><a href="" data-tip="Add to Wishlist"><i
                                                class="fa fa-shopping-bag"></i></a></li>
                                    <li class="shadow"><a href="" data-tip="Add to Cart"><i
                                                class="fa fa-hospital-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="center tex-center btn btn-dark bg-theme border-0 px-4">View All</button>

        </div>
    </section>

    {{-- How it works --}}
    <section class="bg-theme" id="how">
        <div class="container py-5">

            <h1 class="display-5 fw-800 lh-3 mt-5 pb-3">
                How it works
            </h1>

            <div class="row py-3 mb-5 g-4">
                <div class="col bg-light mx-3 p-4 shadow">
                    <i class="fs-2 mb-3 fa fa-hand-pointer-o text-theme-2 circle-icon"></i>
                    <p class="fw-bold">Create account or login to your dashboard</p>
                </div>
                <div class="col bg-light mx-3 p-4 shadow">
                    <i class="fs-2 mb-3 fa fa-eye text-theme-2 circle-icon"></i>
                    <p class="fw-bold">Checkout the space you want to book</p>
                </div>
                <div class="col bg-light mx-3 p-4 shadow">
                    <i class="fs-2 mb-3 fa fa-credit-card text-theme-2 circle-icon"></i>
                    <p class="fw-bold">Make payment with cash or crypto</p>
                </div>
                <div class="col bg-light mx-3 p-4 shadow">
                    <i class="fs-2 mb-3 fa fa-space-shuttle text-theme-2 circle-icon"></i>
                    <p class="fw-bold">You'll have your room waiting for you</p>
                </div>
            </div>
        </div>
    </section>




    <script>
        var images = [
            "assets/images/1.jpg",
            "assets/images/2.jpg",
            "assets/images/3.jpg",
            "assets/images/6.jpg",
            "assets/images/4.jpg",
            "assets/images/5.jpg",
        ];

        function changeImage() {
            var i = 0;
            var inter = setInterval(function() {
                if (i < images.length) {
                    document.getElementById("bannerImage").src = images[i];
                    // alert(images[i]);
                    i++;
                } else {
                    i = 0;
                    document.getElementById("bannerImage").src = images[i];
                    // alert(images[i]);
                    i++;
                }
            }, 2000);
        }
        changeImage()
    </script>
@endsection
