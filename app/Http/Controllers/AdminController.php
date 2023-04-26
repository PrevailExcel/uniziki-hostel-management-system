<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hostel;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{    
    public function show()
    {
        $stat['hostels'] = Hostel::count();
        $stat['users'] = User::count();
        $stat['rooms'] = Room::count();
        $bookings = Booking::all();
        $users = User::take(5)->get();
        return view('admin.dashboard', compact('stat','bookings', 'users'));
    }
    
    public function hostels()
    {
        $hostels = Hostel::all();
        return view('admin.hostels', compact('hostels'));
    }
}
