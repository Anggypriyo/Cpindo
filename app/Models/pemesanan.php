<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pemesanan extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $timestamps = false;
    protected $fillable = ['bukti_pemesanan','tgl_pemesanan','tgl_pengambilan','status_pemesanan','ket_pemesanan','id_katpem'];
    public function katpem()
    {
        return $this->belongsTo(katpem::class,'id_katpem');
    }
    public function detail_pemesanan()
    {
        return $this->hasMany(detail_pemesanan::class,'id_detpem');
    }
}