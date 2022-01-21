<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class profil extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'profil';
    protected $primaryKey = 'id_profil';
    public $timestamps = false;
    protected $fillable = ['judul_profil','path_profil','id_katprof'];
    public function katprof()
    {
        return $this->belongsTo(katprof::class,'id_katprof');
    }
}