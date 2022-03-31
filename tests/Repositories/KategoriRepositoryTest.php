<?php namespace Tests\Repositories;

use App\Models\Kategori;
use App\Repositories\KategoriRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KategoriRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KategoriRepository
     */
    protected $kategoriRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kategoriRepo = \App::make(KategoriRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kategori()
    {
        $kategori = Kategori::factory()->make()->toArray();

        $createdKategori = $this->kategoriRepo->create($kategori);

        $createdKategori = $createdKategori->toArray();
        $this->assertArrayHasKey('id', $createdKategori);
        $this->assertNotNull($createdKategori['id'], 'Created Kategori must have id specified');
        $this->assertNotNull(Kategori::find($createdKategori['id']), 'Kategori with given id must be in DB');
        $this->assertModelData($kategori, $createdKategori);
    }

    /**
     * @test read
     */
    public function test_read_kategori()
    {
        $kategori = Kategori::factory()->create();

        $dbKategori = $this->kategoriRepo->find($kategori->id);

        $dbKategori = $dbKategori->toArray();
        $this->assertModelData($kategori->toArray(), $dbKategori);
    }

    /**
     * @test update
     */
    public function test_update_kategori()
    {
        $kategori = Kategori::factory()->create();
        $fakeKategori = Kategori::factory()->make()->toArray();

        $updatedKategori = $this->kategoriRepo->update($fakeKategori, $kategori->id);

        $this->assertModelData($fakeKategori, $updatedKategori->toArray());
        $dbKategori = $this->kategoriRepo->find($kategori->id);
        $this->assertModelData($fakeKategori, $dbKategori->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kategori()
    {
        $kategori = Kategori::factory()->create();

        $resp = $this->kategoriRepo->delete($kategori->id);

        $this->assertTrue($resp);
        $this->assertNull(Kategori::find($kategori->id), 'Kategori should not exist in DB');
    }
}
