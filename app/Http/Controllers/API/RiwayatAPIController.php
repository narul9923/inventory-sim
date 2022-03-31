<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRiwayatAPIRequest;
use App\Http\Requests\API\UpdateRiwayatAPIRequest;
use App\Models\Riwayat;
use App\Repositories\RiwayatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RiwayatController
 * @package App\Http\Controllers\API
 */

class RiwayatAPIController extends AppBaseController
{
    /** @var  RiwayatRepository */
    private $riwayatRepository;

    public function __construct(RiwayatRepository $riwayatRepo)
    {
        $this->riwayatRepository = $riwayatRepo;
    }

    /**
     * Display a listing of the Riwayat.
     * GET|HEAD /riwayats
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $riwayats = $this->riwayatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($riwayats->toArray(), 'Riwayats retrieved successfully');
    }

    /**
     * Store a newly created Riwayat in storage.
     * POST /riwayats
     *
     * @param CreateRiwayatAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRiwayatAPIRequest $request)
    {
        $input = $request->all();

        $riwayat = $this->riwayatRepository->create($input);

        return $this->sendResponse($riwayat->toArray(), 'Riwayat saved successfully');
    }

    /**
     * Display the specified Riwayat.
     * GET|HEAD /riwayats/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Riwayat $riwayat */
        $riwayat = $this->riwayatRepository->find($id);

        if (empty($riwayat)) {
            return $this->sendError('Riwayat not found');
        }

        return $this->sendResponse($riwayat->toArray(), 'Riwayat retrieved successfully');
    }

    /**
     * Update the specified Riwayat in storage.
     * PUT/PATCH /riwayats/{id}
     *
     * @param int $id
     * @param UpdateRiwayatAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRiwayatAPIRequest $request)
    {
        $input = $request->all();

        /** @var Riwayat $riwayat */
        $riwayat = $this->riwayatRepository->find($id);

        if (empty($riwayat)) {
            return $this->sendError('Riwayat not found');
        }

        $riwayat = $this->riwayatRepository->update($input, $id);

        return $this->sendResponse($riwayat->toArray(), 'Riwayat updated successfully');
    }

    /**
     * Remove the specified Riwayat from storage.
     * DELETE /riwayats/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Riwayat $riwayat */
        $riwayat = $this->riwayatRepository->find($id);

        if (empty($riwayat)) {
            return $this->sendError('Riwayat not found');
        }

        $riwayat->delete();

        return $this->sendSuccess('Riwayat deleted successfully');
    }
}
