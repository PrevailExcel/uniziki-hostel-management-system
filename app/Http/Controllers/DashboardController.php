<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
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

}
