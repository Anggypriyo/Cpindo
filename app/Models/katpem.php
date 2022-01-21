<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class katpem extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'kategori_pemesanan';
    protected $primaryKey = 'id_katpem';
    public $timestamps = false;
    protected $fillable = ['nama_katpem','harga_katpem'];
    public function pemesanan()
    {
        return $this->hasMany(pemesanan::class,'id_pemesanan');
    }
}