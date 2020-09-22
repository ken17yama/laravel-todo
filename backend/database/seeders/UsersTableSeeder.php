<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'yamada',
                'email' => 'yamada@example.com',
                'password' => bcrypt('yamada'),
            ],
            [
                'name' => 'yamazaki',
                'email' => 'yamazaki@example.com',
                'password' => bcrypt('yamazaki'),
            ],
            [
                'name' => 'nagasawa',
                'email' => 'nagasawa@example.com',
                'password' => bcrypt('nagasawa'),
            ],
            [
                'name' => 'matsu',
                'email' => 'matsu@example.com',
                'password' => bcrypt('matsu'),
            ],
        ]);
    }
}
