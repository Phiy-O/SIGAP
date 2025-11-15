<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'location',
        'budget',
        'status', // 'open', 'in_progress', 'completed', 'cancelled'
        'deadline',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'datetime',
            'budget' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function acceptedApplication()
    {
        return $this->hasOne(JobApplication::class)->where('status', 'accepted');
    }
}

