<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;

    protected $table = 'penerimaan';

    protected $fillable = [
        "id_persediaan",
        "satuan",
        "harga",
        "jumlah",
        "status",
        "tanggal"
    ];

    public function persediaan()
    {
       return $this->belongsTo('App\Models\Persediaan', 'id_persediaan');
    }
}
