<?php

use Illuminate\Database\Seeder;
use App\Messages;
use Carbon\Carbon;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Messages::truncate(); //para que no se repitan los datos cada vez que ejucatomos los seeders

        for ($i=1; $i < 101 ; $i++) {
            Messages::create([
                'nombre' => "Usuario {$i}",
                'email' => "usu{$i}@mail.com",
                'mensaje' => "Este es el mensaje {$i}",
                'created_at' => Carbon::now()->subDays(100)->addDays($i)
            ]);
        }


    }
}
