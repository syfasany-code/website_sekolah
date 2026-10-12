<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = [
        'id_kelas',
        'nama_kelas'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id');
    }
}
