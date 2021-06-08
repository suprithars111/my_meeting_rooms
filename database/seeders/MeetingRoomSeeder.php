<?php

namespace Database\Seeders;

use App\Models\MeetingRoom;
use Illuminate\Database\Seeder;

class MeetingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MeetingRoom::factory()
            ->count(5)
            ->create();
    }
}
