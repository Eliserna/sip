<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Pemesanan extends Model
{
    protected $fillable = [
        'id_user', 'id_paket','qty', 'status'
    ];
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class,'id_paket');
    }
    public function pembayaran(){
        return $this->hasOne(Pembayaran::class,'id_pemesanan');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'id_user');
    }
}