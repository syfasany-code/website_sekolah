<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;
    protected $primaryKey = 'id_siswa';
    protected $table = 'siswa';
    public $incrementing = true;

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'tahun_masuk'
    ];
}
