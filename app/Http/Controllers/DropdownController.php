<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function hostel(Hostel $hostel)
    {
        return ['hostel' => $hostel, 'floors' => $hostel->floors];
    }

    public function floor(Floor $floor)
    {
        return $floor->rooms;
    }

    public function room(Room $room)
    {
        return $room->price;
    }
}
