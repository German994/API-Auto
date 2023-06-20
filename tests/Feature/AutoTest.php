<?php

namespace Tests\Feature;

use App\Models\Auto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AutoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_GuardarUno()
    {
        $estructura = [
            "id", "marca", "modelo", "color", "puertas", "cilindrado",
            "automatico", "electrico", "created_at", "updated_at", "deleted_at"
        ];
        $response = $this->get('/api/autos/1');
        $response->assertStatus(200);
        $response->assertJsonCount(11);
        $response->assertJsonStructure($estructura);
    }
    public function test_GuardarUnoQueNoExiste()
    {
        $response = $this->get('/api/autos/5554444');
        $response->assertStatus(404);
    }
    public function test_EliminarUnoQueExiste()
    {
        $response = $this->delete('/api/auto/50001');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "msg" => "Auto 50001 eliminado."
        ]);
        $this->assertDatabaseMissing('autos', [
            'id' => '50001',
            'deleted_at' => null
        ]);
        Auto::withTrashed()->where("id", 50001)->restore();
    }
    public function test_EliminarUnoQueNoExiste()
    {
        $response = $this->delete('/api/autos/5554444');
        $response->assertStatus(404);
    }
    public function test_ModificarUnoQueNoExiste()
    {
        $response = $this->put('/api/auto/5554444');
        $response->assertStatus(404);
    }
    public function test_ModificarUnoQueExiste()
    {
        $estructura = [
            "id", "marca", "modelo", "color", "puertas", "cilindrado",
            "automatico", "electrico", "created_at", "updated_at", "deleted_at"
        ];

        $response = $this->put('/api/autos/50002', [
            'marca' => 'Mercedes',
            'modelo' => 'Sesto Elemento',
            'color' => 'Negro',
            'puertas' => 2,
            'cilindrado' => 25.6,
            'automatico' => false,
            'electrico' => false,
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            'marca' => 'Mercedes',
            'modelo' => 'Sesto Elemento',
            'color' => 'Negro',
            'puertas' => 2,
            'cilindrado' => 25.6,
            'automatico' => false,
            'electrico' => false,
        ]);
    }
    public function test_Guardar()
    {
        $response = $this->post('/api/autos/', [
            'marca' => 'Mercedes',
            'modelo' => 'Sesto Elemento',
            'color' => 'Negro',
            'puertas' => 2,
            'cilindrado' => 25.6,
            'automatico' => false,
            'electrico' => false,
        ]);

        $response->assertStatus(201);
        $response->assertJsonCount(5);
        $this->assertDatabaseHas('autos', [
            'marca' => 'Mercedes',
            'modelo' => 'Sesto Elemento',
            'color' => 'Negro',
            'puertas' => 2,
            'cilindrado' => 25.6,
            'automatico' => false,
            'electrico' => false,
        ]);
    }
}
