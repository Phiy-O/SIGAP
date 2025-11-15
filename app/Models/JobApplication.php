<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'pekerja_id',
        'message',
        'status', // 'pending', 'accepted', 'rejected'
        'proof_photo',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function pekerja()
    {
        return $this->belongsTo(User::class, 'pekerja_id');
    }
}

