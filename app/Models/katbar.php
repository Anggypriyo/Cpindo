<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class katbar extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'kategori_barang';
    protected $primaryKey = 'id_katbar';
    public $timestamps = false;
    protected $fillable = ['nama_katbar'];
    public function barang()
    {
        return $this->hasMany(barang::class,'id_barang');
    }
}