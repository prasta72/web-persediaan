<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $table = "rekening";

    protected $fillable = [
        'rekening',
        'uraian'
    ];
    
    public function persediaan()
    {
        return $this->hasMany('App\Models\Persediaan', 'id_rekening');
    }
}
