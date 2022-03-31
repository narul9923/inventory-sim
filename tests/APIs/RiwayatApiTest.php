<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Riwayat;

class RiwayatApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_riwayat()
    {
        $riwayat = Riwayat::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/riwayats', $riwayat
        );

        $this->assertApiResponse($riwayat);
    }

    /**
     * @test
     */
    public function test_read_riwayat()
    {
        $riwayat = Riwayat::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/riwayats/'.$riwayat->id
        );

        $this->assertApiResponse($riwayat->toArray());
    }

    /**
     * @test
     */
    public function test_update_riwayat()
    {
        $riwayat = Riwayat::factory()->create();
        $editedRiwayat = Riwayat::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/riwayats/'.$riwayat->id,
            $editedRiwayat
        );

        $this->assertApiResponse($editedRiwayat);
    }

    /**
     * @test
     */
    public function test_delete_riwayat()
    {
        $riwayat = Riwayat::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/riwayats/'.$riwayat->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/riwayats/'.$riwayat->id
        );

        $this->response->assertStatus(404);
    }
}
