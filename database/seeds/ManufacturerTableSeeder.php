<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ManufacturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturer')->truncate();
        DB::table('manufacturer')->insert([
            [
                'name' => 'nike',
                'created_at' => Carbon::create('2016','1','20'),
            ],
            [
                'name' => 'adidas',
                'created_at' => Carbon::create('2016','2','20'),
            ],
            [
                'name' => 'puma',
                'created_at' => Carbon::create('2016','3','20'),
            ],
            [
                'name' => 'reebok',
                'created_at' => Carbon::create('2016','3','20'),
            ],
            [
                'name' => 'asics',
                'created_at' => Carbon::create('2016','3','20'),
            ],
        ]);
    }
}
