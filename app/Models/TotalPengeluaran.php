<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalPengeluaran extends Model
{
    use HasFactory;
    protected $table = 'table_totalpengeluaran';

    protected $fillable = [
        'id_persediaan',
        'jumlah',
        'harga',
    ];

    public function persediaan()
    {
        return $this->belongsTo('App\Models\Persediaan', 'id_persediaan');
    }
}
