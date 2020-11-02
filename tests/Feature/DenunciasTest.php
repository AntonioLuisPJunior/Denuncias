<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Denuncia;

class DenunciasTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('denuncias.index');
    }

    public function testDenunciaStore()
    {
        // $this->withoutExceptionHandling();
        $response = $this->withHeaders([
        ])->post('/denuncia/store',[
            'den_localizacao' => 'Rua 03, Quadra 04, Casa 02, Conj Habitacional Turu',
            'den_quantidade_pessoas' => '499'
        ]);
        $this->assertCount(1, Denuncia::all());
    }

    public function testDenunciaStoreValidation()
    {
        $response = $this->withHeaders([
        ])->post('/denuncia/store',[
            'den_observacao' => '1234567890123456789012345678901',
            'den_localizacao' => 'a',
            'den_quantidade_pessoas' => '4asas'
        ]);              
        $response->assertSessionHasErrors(['den_observacao','den_localizacao','den_quantidade_pessoas']);
    }

    public function testDenunciaTable()
    {
        Denuncia::create([
            'den_localizacao' => 'muita gente na rua',
            'den_quantidade_pessoas' => '500',
        ]);
        // $this->withoutExceptionHandling();
        $this->assertDatabaseHas('denuncias', [
            'den_localizacao' => 'muita gente na rua',
            'den_quantidade_pessoas' => '500',
        ]);
    }

}
