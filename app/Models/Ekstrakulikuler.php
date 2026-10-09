<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    /** @use HasFactory<\Database\Factories\EkstrakulikulerFactory> */
    use HasFactory;
    protected $table = 'ekstrakulikuler';
    protected $primaryKey = 'id_ekstrakulikuler';
    protected $typeKey = 'string';

    protected $fillable = [
        'nama_ekskul',
        'slug',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
