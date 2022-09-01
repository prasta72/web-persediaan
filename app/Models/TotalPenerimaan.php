<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalPenerimaan extends Model
{
    use HasFactory;
    protected $table = "total_penerimaan";

    protected $fillable = [
        'id_persediaan',
        'jumlah',
        'harga'
    ];

    public function penerimaan(){
       return $this->belongsTo('App\Models\Persediaan', 'id_persediaan');
    }
}
