<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan jika tidak menggunakan nama default
    protected $table = 'pengunjung'; // Jika nama tabel sesuai, baris ini bisa diabaikan

    // Jika ingin mengizinkan mass assignment
    protected $fillable = [
        'ip_address', // Tambahkan field lain sesuai dengan yang ada di tabel
    ];
}
