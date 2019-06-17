<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();
        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'shoes_id' => 1,
                'comment' => 'コメントです。ナイキのスニーカーです。',
                'created_at' => Carbon::create('2016','1','20'),
            ],
            [
                'user_id' => 1,
                'shoes_id' => 1,
                'comment' => 'コメントです。ナイキのスニーカーですね',
                'created_at' => Carbon::create('2016','2','20'),
            ],
            [
                'user_id' => 1,
                'shoes_id' => 2,
                'comment' => 'コメントです。adidasのスニーカーです。',
                'created_at' => Carbon::create('2016','3','20'),
            ],
        ]);
    }
}
