<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'family_id',
        'user_id',
        'file_path',
        'caption',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
