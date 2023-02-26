<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ReviewImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'filename',
        'path'
    ];

    public function review(): BelongsTo
    {
        return $this->belongsTo(WorkReview::class);
    }

    public function getUrlAttribute()
    {
        return Storage::url($this->path);
    }
}
