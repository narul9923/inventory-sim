<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Barang;

class BarangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_barang()
    {
        $barang = Barang::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/barangs', $barang
        );

        $this->assertApiResponse($barang);
    }

    /**
     * @test
     */
    public function test_read_barang()
    {
        $barang = Barang::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/barangs/'.$barang->id
        );

        $this->assertApiResponse($barang->toArray());
    }

    /**
     * @test
     */
    public function test_update_barang()
    {
        $barang = Barang::factory()->create();
        $editedBarang = Barang::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/barangs/'.$barang->id,
            $editedBarang
        );

        $this->assertApiResponse($editedBarang);
    }

    /**
     * @test
     */
    public function test_delete_barang()
    {
        $barang = Barang::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/barangs/'.$barang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/barangs/'.$barang->id
        );

        $this->response->assertStatus(404);
    }
}
