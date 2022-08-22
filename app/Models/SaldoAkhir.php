<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoAkhir extends Model
{
    protected $table = "saldoakhir";
    protected $fillable = [
        'id_persediaan',
        'jumlah',
        'harga'
    ];
    use HasFactory;
}
