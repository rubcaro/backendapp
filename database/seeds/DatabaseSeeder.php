<?php

use App\User;
use App\TipoSangre;
use Illuminate\Database\Seeder;
use App\Pregunta;
use App\Alternativa;
use App\Encuesta;
use App\Detalle;
use App\Notificacion;
use App\Respuesta;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Alternativa::truncate();
        Detalle::truncate();
        Encuesta::truncate();
        Notificacion::truncate();
        Pregunta::truncate();
        Respuesta::truncate();
        TipoSangre::truncate();
        User::truncate();

        // $this->call(UsersTableSeeder::class);
        $user = User::create([
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

        $encuesta = new Encuesta();
        $encuesta->nombre = "Nueva encuesta 1";
        $encuesta->user_id = $user->id;
        $encuesta->estado = 1;
        $encuesta->save();

        $cantidadPreguntas = 10;

        $preguntas = factory(Pregunta::class, $cantidadPreguntas)->create([
            'encuesta_id' => $encuesta->id
        ])->each(
            function($pregunta) {
                $cantidadAlternativas = rand(3,5);
                $alternativa = factory(Alternativa::class, $cantidadAlternativas)->create([
                    'pregunta_id' => $pregunta->id
                ]);
            }
        );

        $cantidadRespuestas = 105;

        for ($numeroRespuesta=0; $numeroRespuesta < $cantidadRespuestas; $numeroRespuesta++) { 
            $respuesta = new Respuesta();
            $respuesta->encuesta_id = $encuesta->id;
            $respuesta->save();
            foreach ($encuesta->preguntas as $pregunta) {
                $detalle = new Detalle();
                $detalle->respuesta_id = $respuesta->id;
                $detalle->pregunta_id = $pregunta->id;
                $detalle->alternativa_id = $pregunta->alternativas->random()->id;
                $detalle->save();
            }
        }
    }
}
