<?php

namespace App\Models;

use App\Models\KeputusanInformasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BuktiPenerimaanInformasi extends Model
{
    use HasFactory;

    protected $table = 'bukti_penerimaaninformasi';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'keputusan_informasi_id',
        'waktu',
        'tgl_penerimaan',
    ];
    // Model BuktiPenerimaanInformasi
    public function keputusanInformasi()
    {
        return $this->belongsTo(KeputusanInformasi::class, 'keputusan_informasi_id');
    }
}
