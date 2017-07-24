<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MarcadoresTest extends TestCase
{

    public function testIndex(){
     $this->json('GET','/api/marcadores')
     ->assertResponseOk();
    }

    public function testStore()
    {
        $data = [
            'titulo' => 'Titulo',
            'snippet' => 'Esta es una Descripcion',
            'latitud' => 24.804419,
            'longitud' => -107.402453,
            'draggable' => true,
            'flat' => true,
            'rotation' => 90.0,
            'z_index' => 1.0,
            'icon' => null,
            'type' => 3
        ];

        $this->json('POST','api/marcadores',$data)
            ->assertResponseOk()
            ->seeInDatabase('marcadores',$data);
    }

    public function testUpdate(){
        $data = [
            'titulo' => 'Titulo',
            'snippet' => 'Esta es una Descripcion',
            'latitud' => 24.804419,
            'longitud' => -107.402453,
            'draggable' => true,
            'flat' => true,
            'rotation' => 90.0,
            'z_index' => 1.0,
            'icon' => null,
            'type' => 3
        ];

        $this->json('PUT','api/marcadores/1',$data)
            ->assertResponseOk()
            ->seeInDatabase('marcadores',$data);
    }
}
