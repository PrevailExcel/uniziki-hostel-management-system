@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
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
            <div class="col-md-3 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h4>Hostels</h4>
                        <span>{{$stat['hostels']}}</span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-3 text-center bg-dark">
                        <i class="fa fa-users circle-icon text-white py-auto fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h4>Users</h4>
                        <span>{{$stat['users']}}</span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-3 text-center bg-theme-2">
                        <i class="fa fa-users circle-icon text-white py-auto fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h4>Rooms</h4>
                        <span>{{$stat['rooms']}}</span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-3 text-center bg-secondary">
                        <i class="fa fa-users circle-icon text-white py-auto fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h4>Payments</h4>
                        <span>₦{{number_format(0)}}</span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-3 text-center bg-theme">
                        <i class="fa fa-users circle-icon text-white py-auto fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="containter-fluid my-5">
        <div class="row g-2">
            <div class="col-md-6 px-2">
                <div class="card shadow-sm border-0">
                    <h2 class="card-header bg-light">Recent Users</h2>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Reg Number</th>
                                        <th scope="col">Booked</th>
                                        <th scope="col">Registered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->first_name }} {{$user->surname}}</td>
                                            <td>{{ $user->reg_no }}</td>
                                            <td>false</td>
                                            <td>{{ $user->created_at->format('d M, y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-2">
                <div class="card shadow-sm border-0">
                    <h2 class="card-header bg-light">Rooms Booked</h2>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Hostel</th>
                                        <th scope="col">Num</th>
                                        <th scope="col">Space</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->ambulance->name }}</td>
                                            <td>{{ $booking->ambulance->hospital->name }}</td>
                                            <td>{{ $booking->user->name }}</td>
                                            <td>{{ $booking->location }}</td>
                                            <td>{{ $booking->type }}</td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
