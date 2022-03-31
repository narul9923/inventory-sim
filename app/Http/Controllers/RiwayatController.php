<?php

namespace App\Http\Controllers;

use App\DataTables\RiwayatDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRiwayatRequest;
use App\Http\Requests\UpdateRiwayatRequest;
use App\Repositories\RiwayatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\Barang;
use App\Models\User;

class RiwayatController extends AppBaseController
{
    /** @var RiwayatRepository $riwayatRepository*/
    private $riwayatRepository;

    public function __construct(RiwayatRepository $riwayatRepo)
    {
        $this->riwayatRepository = $riwayatRepo;
    }

    /**
     * Display a listing of the Riwayat.
     *
     * @param RiwayatDataTable $riwayatDataTable
     *
     * @return Response
     */
    public function index(RiwayatDataTable $riwayatDataTable)
    {
        return $riwayatDataTable->render('riwayats.index');
    }

    /**
     * Show the form for creating a new Riwayat.
     *
     * @return Response
     */
    public function create()
    {
        $barang = Barang::pluck('nama_barang', 'id');
        $user = User::pluck('name','id');
        return view('riwayats.create', compact('barang','user'));
    }

    /**
     * Store a newly created Riwayat in storage.
     *
     * @param CreateRiwayatRequest $request
     *
     * @return Response
     */
    public function store(CreateRiwayatRequest $request)
    {
        $input = $request->all();

        $riwayat = $this->riwayatRepository->create($input);

        Flash::success('Riwayat saved successfully.');

        return redirect(route('riwayats.index'));
    }

    /**
     * Display the specified Riwayat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $riwayat = $this->riwayatRepository->find($id);

        if (empty($riwayat)) {
            Flash::error('Riwayat not found');

            return redirect(route('riwayats.index'));
        }

        return view('riwayats.show')->with('riwayat', $riwayat);
    }

    /**
     * Show the form for editing the specified Riwayat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barang = Barang::pluck('nama_barang', 'id');
        $user = User::pluck('name','id');
        $riwayat = $this->riwayatRepository->find($id);

        if (empty($riwayat)) {
            Flash::error('Riwayat not found');

            return redirect(route('riwayats.index'));
        }

        return view('riwayats.edit', compact('barang','user'))->with('riwayat', $riwayat);
    }

    /**
     * Update the specified Riwayat in storage.
     *
     * @param int $id
     * @param UpdateRiwayatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRiwayatRequest $request)
    {
        $riwayat = $this->riwayatRepository->find($id);

        if (empty($riwayat)) {
            Flash::error('Riwayat not found');

            return redirect(route('riwayats.index'));
        }

        $riwayat = $this->riwayatRepository->update($request->all(), $id);

        Flash::success('Riwayat updated successfully.');

        return redirect(route('riwayats.index'));
    }

    /**
     * Remove the specified Riwayat from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $riwayat = $this->riwayatRepository->find($id);

        if (empty($riwayat)) {
            Flash::error('Riwayat not found');

            return redirect(route('riwayats.index'));
        }

        $this->riwayatRepository->delete($id);

        Flash::success('Riwayat deleted successfully.');

        return redirect(route('riwayats.index'));
    }
}
