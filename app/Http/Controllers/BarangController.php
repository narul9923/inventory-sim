<?php

namespace App\Http\Controllers;

use App\DataTables\BarangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Repositories\BarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\Gudang;
use App\Models\Kategori;

class BarangController extends AppBaseController
{
    /** @var BarangRepository $barangRepository*/
    private $barangRepository;

    public function __construct(BarangRepository $barangRepo)
    {
        $this->barangRepository = $barangRepo;
    }

    /**
     * Display a listing of the Barang.
     *
     * @param BarangDataTable $barangDataTable
     *
     * @return Response
     */
    public function index(BarangDataTable $barangDataTable)
    {
        return $barangDataTable->render('barangs.index');
    }

    /**
     * Show the form for creating a new Barang.
     *
     * @return Response
     */
    public function create()
    {
        $gudang = Gudang::pluck('nama_gudang', 'id');
        $kategori = Kategori::pluck('nama_kategori','id');
        return view('barangs.create', compact('gudang','kategori'));
    }

    /**
     * Store a newly created Barang in storage.
     *
     * @param CreateBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangRequest $request)
    {
        $input = $request->all();

        $barang = $this->barangRepository->create($input);

        Flash::success('Barang saved successfully.');

        return redirect(route('barangs.index'));
    }

    /**
     * Display the specified Barang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        return view('barangs.show')->with('barang', $barang);
    }

    /**
     * Show the form for editing the specified Barang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gudang = Gudang::pluck('nama_gudang', 'id');
        $kategori = Kategori::pluck('nama_kategori','id');
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        return view('barangs.edit', compact('gudang','kategori'))->with('barang', $barang);
    }

    /**
     * Update the specified Barang in storage.
     *
     * @param int $id
     * @param UpdateBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangRequest $request)
    {
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        $barang = $this->barangRepository->update($request->all(), $id);

        Flash::success('Barang updated successfully.');

        return redirect(route('barangs.index'));
    }

    /**
     * Remove the specified Barang from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        $this->barangRepository->delete($id);

        Flash::success('Barang deleted successfully.');

        return redirect(route('barangs.index'));
    }
}
