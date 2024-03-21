<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpembelian extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian'; 
    protected $fillable = [ 
    'id_pembelian',  
    'id_obat',
    'tgl_kadaluarsa',
    'harga_beli',
    'jumlah_beli',
    'sub_total_beli',
    'persen_margin_jual',
    ];
    public function fdpem(){
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
        }
    public function fdpemb(){
        return $this->belongsTo(Pembelian::class, 'id_pembelian', 'id');
    }    
}
