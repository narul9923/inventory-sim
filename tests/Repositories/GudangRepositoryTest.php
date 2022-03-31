<?php namespace Tests\Repositories;

use App\Models\Gudang;
use App\Repositories\GudangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class GudangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var GudangRepository
     */
    protected $gudangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->gudangRepo = \App::make(GudangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_gudang()
    {
        $gudang = Gudang::factory()->make()->toArray();

        $createdGudang = $this->gudangRepo->create($gudang);

        $createdGudang = $createdGudang->toArray();
        $this->assertArrayHasKey('id', $createdGudang);
        $this->assertNotNull($createdGudang['id'], 'Created Gudang must have id specified');
        $this->assertNotNull(Gudang::find($createdGudang['id']), 'Gudang with given id must be in DB');
        $this->assertModelData($gudang, $createdGudang);
    }

    /**
     * @test read
     */
    public function test_read_gudang()
    {
        $gudang = Gudang::factory()->create();

        $dbGudang = $this->gudangRepo->find($gudang->id);

        $dbGudang = $dbGudang->toArray();
        $this->assertModelData($gudang->toArray(), $dbGudang);
    }

    /**
     * @test update
     */
    public function test_update_gudang()
    {
        $gudang = Gudang::factory()->create();
        $fakeGudang = Gudang::factory()->make()->toArray();

        $updatedGudang = $this->gudangRepo->update($fakeGudang, $gudang->id);

        $this->assertModelData($fakeGudang, $updatedGudang->toArray());
        $dbGudang = $this->gudangRepo->find($gudang->id);
        $this->assertModelData($fakeGudang, $dbGudang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_gudang()
    {
        $gudang = Gudang::factory()->create();

        $resp = $this->gudangRepo->delete($gudang->id);

        $this->assertTrue($resp);
        $this->assertNull(Gudang::find($gudang->id), 'Gudang should not exist in DB');
    }
}
