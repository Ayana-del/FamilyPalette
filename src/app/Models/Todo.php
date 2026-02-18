<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_id',
        'title',
        'is_completed',
        'due_date',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
