<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGudangAPIRequest;
use App\Http\Requests\API\UpdateGudangAPIRequest;
use App\Models\Gudang;
use App\Repositories\GudangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GudangController
 * @package App\Http\Controllers\API
 */

class GudangAPIController extends AppBaseController
{
    /** @var  GudangRepository */
    private $gudangRepository;

    public function __construct(GudangRepository $gudangRepo)
    {
        $this->gudangRepository = $gudangRepo;
    }

    /**
     * Display a listing of the Gudang.
     * GET|HEAD /gudangs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $gudangs = $this->gudangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($gudangs->toArray(), 'Gudangs retrieved successfully');
    }

    /**
     * Store a newly created Gudang in storage.
     * POST /gudangs
     *
     * @param CreateGudangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGudangAPIRequest $request)
    {
        $input = $request->all();

        $gudang = $this->gudangRepository->create($input);

        return $this->sendResponse($gudang->toArray(), 'Gudang saved successfully');
    }

    /**
     * Display the specified Gudang.
     * GET|HEAD /gudangs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Gudang $gudang */
        $gudang = $this->gudangRepository->find($id);

        if (empty($gudang)) {
            return $this->sendError('Gudang not found');
        }

        return $this->sendResponse($gudang->toArray(), 'Gudang retrieved successfully');
    }

    /**
     * Update the specified Gudang in storage.
     * PUT/PATCH /gudangs/{id}
     *
     * @param int $id
     * @param UpdateGudangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGudangAPIRequest $request)
    {
        $input = $request->all();

        /** @var Gudang $gudang */
        $gudang = $this->gudangRepository->find($id);

        if (empty($gudang)) {
            return $this->sendError('Gudang not found');
        }

        $gudang = $this->gudangRepository->update($input, $id);

        return $this->sendResponse($gudang->toArray(), 'Gudang updated successfully');
    }

    /**
     * Remove the specified Gudang from storage.
     * DELETE /gudangs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Gudang $gudang */
        $gudang = $this->gudangRepository->find($id);

        if (empty($gudang)) {
            return $this->sendError('Gudang not found');
        }

        $gudang->delete();

        return $this->sendSuccess('Gudang deleted successfully');
    }
}
