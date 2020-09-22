<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'title' => '犬を飼う',
                'parent_id' => Null,
                'room_id' => 1,
            ],
            [
                'title' => 'お気に入りのコーギーを探す',
                'parent_id' => 1,
                'room_id' => 1,
            ],
            [
                'title' => 'ブリーダーに連絡する',
                'parent_id' => 2,
                'room_id' => 1,
            ],
            [
                'title' => '冷蔵庫を買う',
                'parent_id' => Null,
                'room_id' => 1,
            ],
            [
                'title' => 'やまだ家に嫁ぐ',
                'parent_id' => Null,
                'room_id' => 2,
            ],
            [
                'title' => '美の追求',
                'parent_id' => Null,
                'room_id' => 3,
            ],
        ]);
    }
}
