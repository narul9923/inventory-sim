<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Gudang
 * @package App\Models
 * @version March 29, 2022, 6:06 pm UTC
 *
 * @property string $nama_gudang
 */
class Gudang extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'gudang';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_gudang'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_gudang' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
