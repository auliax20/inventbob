<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karcis extends Model
{
    use HasFactory;
    protected $table = 'karcis';
    protected $fillable = ['nama', 'warna', 'isi', 'no_seri', 'kategori_id'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
