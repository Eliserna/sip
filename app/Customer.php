<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    protected $fillable = [
        'id','id_user', 'alamat','telp'
    ];
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class,'id_pemesanan');
    }
}