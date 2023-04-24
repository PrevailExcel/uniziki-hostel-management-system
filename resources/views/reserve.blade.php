@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Select hostel</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="container">
        <div class="row px-auto mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow p-3 mt-5 mx-auto text-dark">
                    <h3 class="title my-4 pb-2 border-bottom">Reserve Hostel and bed space</h3>
                    @foreach ($hostels as $hostel)
                        <div class="card p-3 mt-5 mx-auto text-dark">
                            <div class="card-head">
                                <h4>{{ $hostel->name }}</h4>
                            </div>
                            <img class="img-fluid mx-auto img-thumbnail"
                                src="{{ asset('assets/images/hostel-exterior-1.jpg') }}" style="height: 150px;" />
                            <div class="card-body">
                                <b>{{ $hostel->floors }}</b> Floors, Type: <b>
                                    @if ($hostel->type == true)
                                        Male
                                    @else
                                        Female
                                    @endif
                                </b>,
                                Campus: <b>Main Ifite Campus</b>
                            </div>
                            <div class="card-footer bg-white text-center justify-content-center">
                                <button class="btn bg-theme btn-lg text-white select-hostel" data-id="{{ $hostel->id }}"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Select {{ $hostel->name }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reserve room and space in <span class="hos-name"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('reserve') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Floor</label>
                            <select class="form-select" aria-label="Select Gender" name="floor">
                                {{-- @for ($i = 1; $i < 4; $i++)
                                    @php
                                        $getFloor = new \App\Http\Controllers\DashboardController();
                                        $floor = $getFloor->floor($i);
                                    @endphp
                                    <option>{{ $floor }} floor</option>
                                @endfor --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Room</label>
                            <select class="form-select" aria-label="Select Gender" name="room">
                                @for ($i = 1; $i < 40; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Payment Option</label>
                            <select class="form-select" aria-label="Select Gender" name="type">
                                <option>Card</option>
                                <option>Crypto Payment</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="save_history_or_note" class="btn bg-theme text-white">Make Payment</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function getFloor(floor) {
            if (floor == 1) {
                return ''
            } else if(floor == 2) {

            }
            switch (parseInt(floor)) {
                case 1:
                    return 'Ground';
                    break;
                case 2:
                    return 'First';
                    break;
                case 3:
                    return 'Second';
                    break;
                case 4:
                    return 'Third';
                    break;
                case 5:
                    return 'Fourth';
                    break;
                default:
                    return 'Gnd';
                    break;
            }
        }
        $('.select-hostel').on('click', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "hostel/" + id,
                type: "GET",
                success: function(hostel) {
                    console.log(hostel)
                    $('.hos-name').text = hostel.name
                    console.log(hostel.name)
                        for (let floor = 1; floor < hostel.floors; floor++) {
                            floor = getFloor(floor)
                            $('select[name=floor]').append('<option>'+floor+'</option>')
                            console.log(floor)
                        }
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });
    </script>
@endsection
