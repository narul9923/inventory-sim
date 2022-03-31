<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Gudang;

class GudangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_gudang()
    {
        $gudang = Gudang::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/gudangs', $gudang
        );

        $this->assertApiResponse($gudang);
    }

    /**
     * @test
     */
    public function test_read_gudang()
    {
        $gudang = Gudang::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/gudangs/'.$gudang->id
        );

        $this->assertApiResponse($gudang->toArray());
    }

    /**
     * @test
     */
    public function test_update_gudang()
    {
        $gudang = Gudang::factory()->create();
        $editedGudang = Gudang::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/gudangs/'.$gudang->id,
            $editedGudang
        );

        $this->assertApiResponse($editedGudang);
    }

    /**
     * @test
     */
    public function test_delete_gudang()
    {
        $gudang = Gudang::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/gudangs/'.$gudang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/gudangs/'.$gudang->id
        );

        $this->response->assertStatus(404);
    }
}
