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
            <div class="col-md-6 mx-auto col-xs-6 mb-2 mt-4 p-4">
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
            <div class="col-md-6 mx-auto col-xs-6 mb-2 mt-4 p-4">
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
        </div>
    </section>

    <section class="containter-fluid my-5 text-center">
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto mx-4 col-xs-6 mb-2 mt-4 px-4">
                <div class="row">
                    @if (auth()->user()->booking)
                        <a href="{{ route('my.room') }}">
                            <button class="shadow col-lg-12 col-md-8 col-sm-8 col-8 py-5 fontsty btn bg-theme-2">
                                <h2>Room Details</h2>
                            </button>
                        </a>
                    @else
                        <a href="{{ route('reserve') }}">
                            <button class="shadow col-lg-12 col-md-8 col-sm-8 col-8 py-5 fontsty btn bg-theme">
                                <h2>Reserve Room Now</h2>
                            </button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
