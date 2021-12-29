<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengadaan extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'pengadaan';
    protected $primaryKey = 'id_pengadaan';
    public $timestamps = false;
    protected $fillable = ['bukti_pengadaan','tgl_pengadaan','status_pengadaan','ket_pengadaan'];
    
    public function detail_pengadaan()
    {
        return $this->hasMany(detail_pengadaan::class,'id_detpg');
    }
}