<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_penjualan';
    protected $fillable = [
        'id_penjualan',
        'jumlah_jual',
        'harga_jual',
        'sub_total_jual',       
        'id_obat',       
    ];

    public function penjualan (){
        return $this->belongsTo(Penjualan::class, 'id_penjualan', 'id', 'nonota_jual');
    }

    public function obat (){
        return $this->belongsTo(Obat::class, 'id_obat', 'id','nama_obat');
    }
}
