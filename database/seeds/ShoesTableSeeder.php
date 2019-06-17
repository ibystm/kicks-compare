<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoes')->truncate();
        DB::table('shoes')->insert([
            [
                'name' => 'Air max 95',
                'manufacturer_id' => 1,
                'created_at' => Carbon::create('2016','1','20'),
                'image_url' => 'vans_slipon_triplewhite.png',
            ],
            [
                'name' => 'Air max 720',
                'manufacturer_id' => 1,
                'created_at' => Carbon::create('2016','2','20'),
                'image_url' => 'vans_canvas.png',
            ],
            [
                'name' => 'Tubular X',
                'manufacturer_id' => 2,
                'created_at' => Carbon::create('2016','3','20'),
                'image_url' => 'vans_canvas_tripleblack.png',
            ],
        ]);

    }
}
