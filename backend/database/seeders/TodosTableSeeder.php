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
            [
                'title' => '引っ越し先に申し込む',
                'parent_id' => 1,
                'room_id' => 1,
            ],
            [
                'title' => 'ケージを買う',
                'parent_id' => 1,
                'room_id' => 1,
            ],
            [
                'title' => 'ブリーダーに生まれたら連絡してもらう',
                'parent_id' => 3,
                'room_id' => 1,
            ],
            [
                'title' => '尻尾を切るかどうか連絡する',
                'parent_id' => 9,
                'room_id' => 1,
            ],
            [
                'title' => '引っ越し先のサイズを計測する',
                'parent_id' => 4,
                'room_id' => 1,
            ],
            [
                'title' => '受け取りの方法を連絡する',
                'parent_id' => 3,
                'room_id' => 1,
            ],
            [
                'title' => 'お気に入りの冷蔵庫を見つける',
                'parent_id' => 4,
                'room_id' => 1,
            ],
            [
                'title' => '敷金を払う',
                'parent_id' => 7,
                'room_id' => 1,
            ],
        ]);
    }
}
