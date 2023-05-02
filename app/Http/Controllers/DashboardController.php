<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Http\Request;
use Nette\Utils\Random;

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

    public function pop(Request $request)
    {
        $user = auth()->user();
        if ($request->hasFile('image')) {
            $file = request()->file('image');
            $file->store('pop', ['disk' => 'public']);
            $image = url('storage/pop') . '/' . $file->hashName();
        }

        if (!$user->room) {
        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->room_id = $request->room;
        $booking->ref = Random::generate(12,'0-9a-f');
        $booking->pop = $image;
        $booking->type = 'crypto';
        $booking->save();
        }

        return redirect()->route('my.room')->with('pending', 'Admin will confirm payment and approve as soon as possible');
        
    }


    public function card(Request $request)
    {
        $user = auth()->user();
        $room = Room::find($request->room);
        if (!$user->room) {
        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->room_id = $request->room;
        $booking->ref = Random::generate(12,'0-9a-f');
        $booking->type = 'card';
        $booking->space_id = $room->spaces->where('filled', false)->first()->id;
        $booking->confirmed = true;
        $booking->save();
        }

        return redirect()->route('my.room')->with('pending', 'Admin will confirm payment and approve as soon as possible');
        
    }

    public function myRoom()
    {
        $user = auth()->user();

        $booking = $user->booking;

        return view('room', compact('booking'));
    }
}
