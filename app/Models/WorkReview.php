<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkReview extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "work_id",
        "text",
    ];

    public function work(): BelongsTo
    {
        return $this->belongsTo(Work::class, 'work_id', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ReviewImage::class, 'review_id', 'id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
