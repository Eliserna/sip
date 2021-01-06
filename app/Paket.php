<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Paket extends Model
{
    protected $guarded=[];
    public function kategori()
    {
        return $this->belongsTo(kategori::class,'id_kategori');
    }
}