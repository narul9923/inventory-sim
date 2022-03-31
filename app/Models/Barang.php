<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Barang
 * @package App\Models
 * @version March 29, 2022, 6:30 pm UTC
 *
 * @property \App\Models\Kategori $kategori
 * @property \App\Models\Gudang $gudang
 * @property string $nama_barang
 * @property integer $kategori_id
 * @property string $jumlah_barang
 * @property integer $gudang_id
 */
class Barang extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'barang';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_barang',
        'kategori_id',
        'jumlah_barang',
        'gudang_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_barang' => 'string',
        'kategori_id' => 'integer',
        'jumlah_barang' => 'string',
        'gudang_id' => 'integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function gudang()
    {
        return $this->belongsTo(\App\Models\Gudang::class, 'gudang_id', 'id');
    }
}
