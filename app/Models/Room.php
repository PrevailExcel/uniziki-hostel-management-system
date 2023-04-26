<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor_id',
        'num',
    ];

    public function spaces()
    {
        return $this->hasMany(Space::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function hostel()
    {
        return $this->hasOneThrough(Hostel::class, Floor::class);
    }
    
}
