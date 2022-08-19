<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Persediaan extends Model
{
    use HasFactory;

    protected $table = "persediaan";

    protected $fillable = [
        'id_rekening',
        'name',
        'satuan',
        'harga',
        'total_persediaan',
        'total_harga',
        'tanggal'

    ];

    public function penerimaan()
    {
        return $this->hasMany('App\Models\Penerimaan', 'id_persediaan');
    }

    public function rekening()
    {
        return $this->belongsTo('App\Models\Rekening', 'id_rekening');
    }
}
