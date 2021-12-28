<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menu extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    public $timestamp = false;
    protected $fillable = ['nama_menu','harga_menu','foto_menu','id_katmenu'];
    public function katmenu()
    {
        return $this->belongsTo(katmenu::class,'id_katmenu');
    }
}