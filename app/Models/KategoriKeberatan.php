<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKeberatan extends Model
{
    use HasFactory;

    protected $table = 'kategori_keberatan';

    // Field yang boleh diisi (disesuaikan dengan tabel)
    protected $fillable = ['jenis_keberatan'];

    // Relasi dengan keberatan_informasi
    public function keberatanInformasi()
    {
        return $this->hasMany(KeberatanInformasi::class, 'kategori_keberatan_id');
    }
}
