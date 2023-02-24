<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class Comment extends Model
{
    use HasFactory;
    use ModelGet;

    public $fillable = ["new_id", "author", "text", "a"];

    public function new()
    {
        return $this->belongsTo(News::class, 'new_id', 'id');
    }
}
