<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class Tag extends Model
{
    use HasFactory;
    use ModelGet;

    public function news()
    {
        return $this->hasMany(News::class, 'tag_id', 'id');
    }
}
