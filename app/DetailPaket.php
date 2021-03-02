<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class DetailPaket extends Model
{
    protected $fillable = [
        'id_paket', 'tipe','content'
    ];
    protected $guarded=[];
    public function paket()
    {
        return $this->belongsTo(Paket::class,'id_paket');
    }
}