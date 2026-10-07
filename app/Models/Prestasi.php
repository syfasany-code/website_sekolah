<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    /** @use HasFactory<\Database\Factories\PrestasiFactory> */
    use HasFactory;

    protected $table = 'prestasi';
    protected $primaryKey = 'id_prestasi';

    protected $fillable = [
        'judul',
        'nama_peraih',
        'kategori',
        'tingkat',
        'juara',
        'tanggal',
        'deskripsi',
        'foto',
    ];

}
