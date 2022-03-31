<?php

namespace App\Http\Controllers;

use App\DataTables\GudangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGudangRequest;
use App\Http\Requests\UpdateGudangRequest;
use App\Repositories\GudangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GudangController extends AppBaseController
{
    /** @var GudangRepository $gudangRepository*/
    private $gudangRepository;

    public function __construct(GudangRepository $gudangRepo)
    {
        $this->gudangRepository = $gudangRepo;
    }

    /**
     * Display a listing of the Gudang.
     *
     * @param GudangDataTable $gudangDataTable
     *
     * @return Response
     */
    public function index(GudangDataTable $gudangDataTable)
    {
        return $gudangDataTable->render('gudangs.index');
    }

    /**
     * Show the form for creating a new Gudang.
     *
     * @return Response
     */
    public function create()
    {
        return view('gudangs.create');
    }

    /**
     * Store a newly created Gudang in storage.
     *
     * @param CreateGudangRequest $request
     *
     * @return Response
     */
    public function store(CreateGudangRequest $request)
    {
        $input = $request->all();

        $gudang = $this->gudangRepository->create($input);

        Flash::success('Gudang saved successfully.');

        return redirect(route('gudangs.index'));
    }

    /**
     * Display the specified Gudang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gudang = $this->gudangRepository->find($id);

        if (empty($gudang)) {
            Flash::error('Gudang not found');

            return redirect(route('gudangs.index'));
        }

        return view('gudangs.show')->with('gudang', $gudang);
    }

    /**
     * Show the form for editing the specified Gudang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gudang = $this->gudangRepository->find($id);

        if (empty($gudang)) {
            Flash::error('Gudang not found');

            return redirect(route('gudangs.index'));
        }

        return view('gudangs.edit')->with('gudang', $gudang);
    }

    /**
     * Update the specified Gudang in storage.
     *
     * @param int $id
     * @param UpdateGudangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGudangRequest $request)
    {
        $gudang = $this->gudangRepository->find($id);

        if (empty($gudang)) {
            Flash::error('Gudang not found');

            return redirect(route('gudangs.index'));
        }

        $gudang = $this->gudangRepository->update($request->all(), $id);

        Flash::success('Gudang updated successfully.');

        return redirect(route('gudangs.index'));
    }

    /**
     * Remove the specified Gudang from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gudang = $this->gudangRepository->find($id);

        if (empty($gudang)) {
            Flash::error('Gudang not found');

            return redirect(route('gudangs.index'));
        }

        $this->gudangRepository->delete($id);

        Flash::success('Gudang deleted successfully.');

        return redirect(route('gudangs.index'));
    }
}
