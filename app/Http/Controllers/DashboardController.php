<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function floor(int $floor)
    {
        switch ($floor) {
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
                return 'Ground';
                break;
        }
    }
    
    public function show()
    {
        return view('dashboard');
    }

    public function reserve()
    {
        $hostels = Hostel::all();
        return view('reserve', compact('hostels'));
    }

    public function checkout()
    {
        $type = request()->type ?? 'card';
        $room = Room::findOrFail(request()->room);
        return view('checkout', compact('type', 'room'));
    }
}
