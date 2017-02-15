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
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$ynclutNGo37RW.B24ZpU7u7/tYs0q7zv/ouIXo84LnOqWvPGoTuzO',
            'header_img' => '/img/default_header.jpg',
        ]);
    }
}
