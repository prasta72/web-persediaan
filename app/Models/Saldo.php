<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;
    protected $table = 'saldoakhir';
    protected $fillable = [
        'id_persediaan',
        'jumlah',
        'harga'
    ];

    public function persediaan(){
        $this->belongsTo('App\Models\Persediaan', 'id_persediaan');
    }
}
