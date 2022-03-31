<?php

namespace App\Repositories;

use App\Models\Riwayat;
use App\Repositories\BaseRepository;

/**
 * Class RiwayatRepository
 * @package App\Repositories
 * @version March 29, 2022, 6:41 pm UTC
*/

class RiwayatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Riwayat::class;
    }
}
