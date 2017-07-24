<?php
//use Illuminate\Foundation\Testing\WithoutMiddleware;
//use App\User;
//
//class PruebasTest extends TestCase
//{
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
//
//      use WithoutMiddleware;
//
//    public function testExample()
//    {
//        $this->assertTrue(true);
//    }
//
//    public function testIndex()
//        {
//            $this->json('GET', '/api/holamundo')
//                ->assertResponseOk();
//        }
//
//      public function testStore()
//         {
//             $datos = [
//                 'nombre' => 'Jocxan Eduardo Fragozo',
//                 'apodo' => 'El muerto',
//                 'calificacion'=>10,
//                 'esta_jodido'=>true
//             ];
//
//             $user = User::find(1);
//
//             $this->actingAs($user)
//                 ->json('POST', '/api/holamundo', $datos)
//                 ->assertResponseOk()
//                 ->seeInDatabase('prueba', $datos);
//         }
//
//       public function testUpdate()
//          {
//              $datos = [
//                  'nombre' => 'ocxan Eduardo ',
//                  'apodo' => 'Ya no es el muerto',
//                  'calificacion'=>7,
//                  'esta_jodido'=>true
//              ];
//
//              $user = User::find(1);
//
//              $this->actingAs($user)
//                  ->json('PUT', '/api/holamundo/2', $datos)
//                  ->assertResponseOk()
//                  ->seeInDatabase('prueba', $datos);
//          }
//}
