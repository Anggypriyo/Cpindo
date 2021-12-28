<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class katprof extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'kategori_profil';
    protected $primaryKey = 'id_katprof';
    public $timestamps = false;
    protected $fillable = ['nama_katprof'];
    public function profil()
    {
        return $this->hasMany(profil::class,'id_profil');
    }
}