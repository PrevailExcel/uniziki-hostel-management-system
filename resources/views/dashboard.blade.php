@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>


    <section class="containter-fluid">
        <div class="row gx-2">
            <div class="col-md-4 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-9 col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h4>Status</h4>
                        <h6>Paid/Active</h6>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-4 p-3 text-center bg-dark">
                        <i class="fa fa-users circle-icon text-white py-auto fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-9 col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h4>Room</h4>
                        <h6>D10/Unallocated</h6>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-4 p-3 text-center bg-theme-2">
                        <i class="fa fa-ambulance circle-icon text-white py-auto fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-9 col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h4>Bookings</h4>
                        <h6>567</h6>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-4 p-3 text-center bg-theme">
                        <i class="fa circle-icon text-white py-auto fs-3 fw-bold">₦</i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="containter-fluid my-5 text-center">
        <div class="row gx-2">
            <div class="col-md-4 mx-auto mx-4 col-xs-6 mb-2 mt-4 p-4">
                <div class="row">
                    <button class="shadow col-lg-125 col-md-8 col-sm-8 col-8 p-4 fontsty btn btn-primary">
                        Check out spaces
                    </button>
                </div>
            </div>
            <div class="col-md-4 mx-auto mx-4 col-xs-6 mb-2 mt-4 p-4">
                <div class="row">
                    <button class="shadow col-lg-125 col-md-8 col-sm-8 col-8 p-4 fontsty btn btn-success">
                        Room management 
                    </button>
                </div>
            </div>
            <div class="col-md-4 mx-auto mx-4 col-xs-6 mb-2 mt-4 p-4">
                <div class="row">
                    <button class="shadow col-lg-125 col-md-8 col-sm-8 col-8 p-4 fontsty btn btn-danger">
                        Manage Payments
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
