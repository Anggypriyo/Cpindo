<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detail_pemesanan extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'detail_pemesanan';
    protected $primaryKey = 'id_detpem';
    protected $fillable = ['total_harga','id_pemesanan','id_menu'];
    public function menu()
    {
        return $this->belongsTo(menu::class,'id_menu');
    }
    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class,'id_pemesanan');
    }
}