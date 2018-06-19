<?php

use App\User;
use App\TipoSangre;
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
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'Ruben',
            'apepat' => 'Caro',
            'apemat' => 'Arteaga',
            'email' => 'correo@correo.com',
            'password' => bcrypt('secret'),
        ]);

        $tiposSangre = [
            'O negativo', 'O positivo', 'A negativo', 'A positivo', 'B negativo', 'B positivo', 'AB negativo', 'AB positivo'
        ];

        foreach ($tiposSangre as $tipoSangre) {
            TipoSangre::create([
                'nombre' => $tipoSangre
            ]);
        }
    }
}
