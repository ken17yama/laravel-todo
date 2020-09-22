<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_user')->insert([
            [
                'user_id' => 1,
                'room_id' => 1,
            ],
            [
                'user_id' => 2,
                'room_id' => 1,
            ],
            [
                'user_id' => 2,
                'room_id' => 2,
            ],
            [
                'user_id' => 2,
                'room_id' => 4,
            ],
            [
                'user_id' => 3,
                'room_id' => 3,
            ],
            [
                'user_id' => 3,
                'room_id' => 4,
            ],
            [
                'user_id' => 4,
                'room_id' => 3,
            ],
            [
                'user_id' => 4,
                'room_id' => 4,
            ],
        ]);
    }
}
