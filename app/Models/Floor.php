<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
     
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }

}
