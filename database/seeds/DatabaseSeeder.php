<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         factory(\App\User::class)->create([
             'email' => 'r.baelde@temper.works',
             'password' => bcrypt('secret123'),
             'name' => 'Robert'
         ]);

        factory(\App\User::class)->create([
            'email' => 'k.nijveldt@temper.works',
            'password' => bcrypt('gamemaster'),
            'name' => 'Kim'
        ]);
    }
}
