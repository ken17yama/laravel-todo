<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => 'やまだ家',
                'description' => 'やまだ家のTodoリストです。',
            ],
            [
                'name' => 'やまざき家',
                'description' => 'やまざきのTodoリストです。',
            ],
            [
                'name' => '女優',
                'description' => '女優のTodoリストです。',
            ],
            [
                'name' => '女性',
                'description' => '女性のTodoリストです。',
            ],
        ]);
    }
}
