<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kategori
 * @package App\Models
 * @version March 29, 2022, 6:03 pm UTC
 *
 * @property string $nama_kategori
 */
class Kategori extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'kategori';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_kategori'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_kategori' => 'string',
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
