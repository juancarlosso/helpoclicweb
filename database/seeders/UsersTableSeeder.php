<?php

namespace Database\Seeders;

use App\Models\User;

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

        User::create([
            'name' => 'Juan Carlos S.O.',
            'email' => 'juan.carlos@jasoluciones.com.mx',
            'password' => 'familia1',
            'activo' => 1,
        ]);

        User::create([
            'name' => 'Victor Sanchez',
            'email' => 'victor.sanchez@helpoasistencia.com',
            'password' => 'victor1360',
            'activo' => 1,
        ]);
    }
}
