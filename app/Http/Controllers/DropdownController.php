<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function hostel(Hostel $hostel)
    {
        return $hostel;
    }
}
