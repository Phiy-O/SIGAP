<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role', // 'user' or 'pekerja'
        'address',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isSuperAdmin()
    {
        return $this->role === 'superadmin';
    }

    public function isAdmin()
    {
        return $this->role === 'admin' || $this->role === 'superadmin';
    }

    public function isPekerja()
    {
        return $this->role === 'pekerja';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function canSwitchRole()
    {
        // User biasa dan Pekerja bisa switch role, admin tidak
        return in_array($this->role, ['user', 'pekerja']);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'user_id');
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'pekerja_id');
    }
}

