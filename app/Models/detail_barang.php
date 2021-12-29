<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detail_barang extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'detail_barang';
    protected $primaryKey = 'id_detbg';
    protected $fillable = ['stok_barang','id_barang','id_pengadaan'];
    public function barang()
    {
        return $this->belongsTo(barang::class,'id_barang');
    }
    public function pengadaan()
    {
        return $this->belongsTo(pengadaan::class,'id_pengadaan');
    }
}