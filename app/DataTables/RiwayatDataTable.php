<?php

namespace App\DataTables;

use App\Models\Riwayat;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RiwayatDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'riwayats.datatables_actions')
        ->addColumn('barang_id', function($certif){
            if (!empty($certif->barang_id)) {
                return $certif->barang->nama_barang;
            }else{
                return '';
            }
        })
        ->addColumn('user_id', function($certif){
            if (!empty($certif->user_id)) {
                return $certif->users->name;
            }else{
                return '';
            }
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Riwayat $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Riwayat $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'barang_id' => ['searchable' => false, 'title' => 'Nama Barang'],
            'user_id' => ['searchable' => false, 'title' => 'Nama User'],
            'jumlah' => ['searchable' => false],
            'tipe' => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'riwayats_datatable_' . time();
    }
}
