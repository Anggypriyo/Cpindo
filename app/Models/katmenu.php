<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class katmenu extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'kategori_menu';
    protected $primaryKey = 'id_katmenu';
    public $timestamps = false;
    protected $fillable = ['nama_katmenu'];
    public function menu()
    {
        return $this->hasMany(menu::class,'id_menu');
    }
}