<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable=['id_paket','qty','status'];
    public function paket()
    {
        return $this->belongsTo(Paket::class,'id_paket');
    }
}
