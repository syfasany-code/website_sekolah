<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'judul',
        'keterangan',
        'file',      // atau 'gambar' (samakan dengan DB)
        'tanggal',
        'id_user'
    ];

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
