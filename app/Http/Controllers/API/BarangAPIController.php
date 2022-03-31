<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangAPIRequest;
use App\Http\Requests\API\UpdateBarangAPIRequest;
use App\Models\Barang;
use App\Repositories\BarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BarangController
 * @package App\Http\Controllers\API
 */

class BarangAPIController extends AppBaseController
{
    /** @var  BarangRepository */
    private $barangRepository;

    public function __construct(BarangRepository $barangRepo)
    {
        $this->barangRepository = $barangRepo;
    }

    /**
     * Display a listing of the Barang.
     * GET|HEAD /barangs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $barangs = $this->barangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($barangs->toArray(), 'Barangs retrieved successfully');
    }

    /**
     * Store a newly created Barang in storage.
     * POST /barangs
     *
     * @param CreateBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangAPIRequest $request)
    {
        $input = $request->all();

        $barang = $this->barangRepository->create($input);

        return $this->sendResponse($barang->toArray(), 'Barang saved successfully');
    }

    /**
     * Display the specified Barang.
     * GET|HEAD /barangs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Barang $barang */
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            return $this->sendError('Barang not found');
        }

        return $this->sendResponse($barang->toArray(), 'Barang retrieved successfully');
    }

    /**
     * Update the specified Barang in storage.
     * PUT/PATCH /barangs/{id}
     *
     * @param int $id
     * @param UpdateBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var Barang $barang */
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            return $this->sendError('Barang not found');
        }

        $barang = $this->barangRepository->update($input, $id);

        return $this->sendResponse($barang->toArray(), 'Barang updated successfully');
    }

    /**
     * Remove the specified Barang from storage.
     * DELETE /barangs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Barang $barang */
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            return $this->sendError('Barang not found');
        }

        $barang->delete();

        return $this->sendSuccess('Barang deleted successfully');
    }
}
