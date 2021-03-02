<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Pembayaran extends Model
{
    protected $fillable = [
        'id_pemesanan', 'status','img', 'pelunasan'
    ];
    protected $guarded=[];
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class,'id_pemesanan');
    }
}