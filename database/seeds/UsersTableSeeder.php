<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=> 'Phạm Tiến Vượng',
            'email'=>'tienvuong97@gmail.com',
            'password'=>Hash::make('123456'),
            'role'=>'1',
        ]);
    }
}
