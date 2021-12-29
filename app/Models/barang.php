<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class barang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;
    protected $fillable = ['nama_barang','foto_barang','id_katbar'];
    public function kategori_barang()
    {
        return $this->belongsTo(katbar::class,'id_katbar');
    }
    public function detail_barang()
    {
        return $this->hasMany(detail_barang::class,'id_detbg');
    }
}