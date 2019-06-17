<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => '高橋康友',
                'email' => 'rhcp.kdog@gmail.com',
                'password' => '19968628',
            ],
        ]);
    }
}