<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'penerimaan';

    public function persediaan()
    {
       return $this->belongsTo('App\Models\Persediaan', 'id_persediaan');
    }
}
