<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Floor;
use App\Models\Hostel;
use App\Models\Room;
use App\Models\Space;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'reg_no' => '1234567890',
        ]);

        for ($i = 1; $i < 4; $i++) {
            $hostel = new Hostel();
            $hostel->name = 'Hostel ' . $i;
            $hostel->image = 'hostel-' . $i . 'jpg';
            $hostel->type = rand(0, 1);
            $hostel->save();

            for ($a = 1; $a < rand(2, 4); $a++) {
                $floor = new Floor();
                $floor->hostel_id = $hostel->id;
                $floor->save();

                for ($j = 1; $j < 10; $j++) {
                    $room = new Room();
                    $room->num = $floor->id . rand(20, 99);
                    $room->price = '85000';
                    $room->floor_id = $floor->id;
                    $room->save();

                    for ($k = 1; $k < 4; $k++) {
                        $space = new Space();
                        $space->name = Random::generate(2);
                        $space->room_id = $room->id;
                        $space->save();
                    }
                }
            }
        }
    }
}
