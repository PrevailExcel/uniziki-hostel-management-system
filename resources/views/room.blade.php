@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Room Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="container">
        <div class="row px-auto mt-5">
            @if ($booking)
                <div class="col-md-8 offset-md-2">
                    @if (!$booking->confirmed)
                        <div class="alert alert-info px-lg-5 text-center">
                            <b>Payment have not been confirmed</b>
                            <p>Ref: {{ $booking->ref }}</p>
                        </div>
                    @endif
                    <h3 class="pb-3 border-bottom">Details</h3>
                    <h5>Hostel: <b>{{ $booking->room->floor->hostel->name }}</b></h5>
                    <h5>Room: <b>Room {{ $booking->room->num }}</b></h5>
                    <h5>Space: <b>
                            @if (!$booking->confirmed)
                                <span class="text-theme bg-light p-2">
                                    Once confirmed, space will be allocated to you
                                </span>
                            @else
                                {{ $booking->space->name }}
                            @endif
                        </b></h5>
                    <h5>Duration: <b>1 Academic Year</b></h5>
                    <h5>Payment Type: <b class="capitalize">{{ $booking->type }}</b></h5>
                    <h5>Price in Naira: <b>₦{{ number_format($booking->room->price) }}</b></h5>
                    <h5>Ref: <b>{{ $booking->ref }}</b></h5>
                    @if ($booking->type == 'crypto')
                        <h5>Proof of payment: <img src="{{ $booking->pop }}" height="220" width="220">
                        </h5>
                    @endif
                    @if ($booking->confirmed)
                        <div class="card shadow my-5 py-3">
                            <div class="card-body">
                                <h3 class="">Add review</h3>
                                <p class="pb-3 border-bottom">Take a moment to drop a review of your experience so far. Rate
                                    from <b>1 - 10</b></p>
                                <form class="needs-validation" method="POST" action="{{ route('checkout.card') }}">

                                    <div class="input form-group mb-3">
                                        <label for="reg_no">Cleaniness</label>
                                        <input id="reg_no" type="number" max="10" maxlength="2" min="1"
                                            minlength="1" required class="form-control" name="cleaniness">
                                    </div>
                                    <div class="input form-group mb-3">
                                        <label for="reg_no">Comfort</label>
                                        <input id="reg_no" type="number" max="10" maxlength="2" min="1"
                                            minlength="1" required class="form-control" name="comfort">
                                    </div>
                                    <div class="input form-group mb-3">
                                        <label for="reg_no">Safety</label>
                                        <input id="reg_no" type="number" max="10" maxlength="2" min="1"
                                            minlength="1" required class="form-control" name="safety">
                                    </div>
                                    <div class="input form-group mb-3">
                                        <label for="reg_no">Convenience</label>
                                        <input id="reg_no" type="number" max="10" maxlength="2" min="1"
                                            minlength="1" required class="form-control" name="convenience">
                                    </div>

                                    <button type="submit" class="btn bg-theme text-white">Add review</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    @endsection
