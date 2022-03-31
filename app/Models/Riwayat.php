<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Riwayat
 * @package App\Models
 * @version March 29, 2022, 6:41 pm UTC
 *
 * @property \App\Models\Barang $barang
 * @property \App\Models\User $users
 * @property integer $barang_id
 * @property integer $user_id
 * @property string $jumlah
 * @property string $tipe
 */
class Riwayat extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'riwayat';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'barang_id',
        'user_id',
        'jumlah',
        'tipe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'barang_id' => 'integer',
        'user_id' => 'integer',
        'jumlah' => 'string',
        'tipe' => 'string',
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
    public function barang()
    {
        return $this->belongsTo(\App\Models\Barang::class, 'barang_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
