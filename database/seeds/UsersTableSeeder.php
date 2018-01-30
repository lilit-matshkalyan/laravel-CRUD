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
        DB::table('users')->insert([
            'name' => "Lilit",
            'email' => "lil.matshkalyan@gmail.com",
            'status' => "enable",
            'password' => bcrypt('megatexam123'),
        ]);
    }
}
