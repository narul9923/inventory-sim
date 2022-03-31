<?php namespace Tests\Repositories;

use App\Models\Riwayat;
use App\Repositories\RiwayatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RiwayatRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RiwayatRepository
     */
    protected $riwayatRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->riwayatRepo = \App::make(RiwayatRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_riwayat()
    {
        $riwayat = Riwayat::factory()->make()->toArray();

        $createdRiwayat = $this->riwayatRepo->create($riwayat);

        $createdRiwayat = $createdRiwayat->toArray();
        $this->assertArrayHasKey('id', $createdRiwayat);
        $this->assertNotNull($createdRiwayat['id'], 'Created Riwayat must have id specified');
        $this->assertNotNull(Riwayat::find($createdRiwayat['id']), 'Riwayat with given id must be in DB');
        $this->assertModelData($riwayat, $createdRiwayat);
    }

    /**
     * @test read
     */
    public function test_read_riwayat()
    {
        $riwayat = Riwayat::factory()->create();

        $dbRiwayat = $this->riwayatRepo->find($riwayat->id);

        $dbRiwayat = $dbRiwayat->toArray();
        $this->assertModelData($riwayat->toArray(), $dbRiwayat);
    }

    /**
     * @test update
     */
    public function test_update_riwayat()
    {
        $riwayat = Riwayat::factory()->create();
        $fakeRiwayat = Riwayat::factory()->make()->toArray();

        $updatedRiwayat = $this->riwayatRepo->update($fakeRiwayat, $riwayat->id);

        $this->assertModelData($fakeRiwayat, $updatedRiwayat->toArray());
        $dbRiwayat = $this->riwayatRepo->find($riwayat->id);
        $this->assertModelData($fakeRiwayat, $dbRiwayat->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_riwayat()
    {
        $riwayat = Riwayat::factory()->create();

        $resp = $this->riwayatRepo->delete($riwayat->id);

        $this->assertTrue($resp);
        $this->assertNull(Riwayat::find($riwayat->id), 'Riwayat should not exist in DB');
    }
}
