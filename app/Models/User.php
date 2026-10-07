<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin(): bool
    {
        return $this->role == 'admin';
    }

    public function isOperator(): bool
    {
        return $this->role == 'operator';
    }


}
