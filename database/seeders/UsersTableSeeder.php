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
            'email' => 'a1@aa.com',
            'password' => 'a123456',
        ]);

        DB::table('users')->insert([
            'email' => 'b1@bb.com',
            'password' => 'b123456',
        ]);
    }
}
