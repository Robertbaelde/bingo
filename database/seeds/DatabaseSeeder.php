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
             'password' => bcrypt('secret'),
             'name' => 'Robert'
         ]);

         factory(\App\Game::class)->create([
             'active' => true
         ]);

    }
}
