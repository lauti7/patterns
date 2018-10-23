<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MessagesTableSeeder::class);
         $this->call(UserTableSeeder::class);
    }
}
"predis/predis": "^1.1"