<?php

namespace App\Repositories;

use App\Models\Gudang;
use App\Repositories\BaseRepository;

/**
 * Class GudangRepository
 * @package App\Repositories
 * @version March 29, 2022, 6:06 pm UTC
*/

class GudangRepository extends BaseRepository
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
        return Gudang::class;
    }
}
