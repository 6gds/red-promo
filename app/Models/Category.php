<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class Category extends Model
{
    use HasFactory;
    use ModelGet;

    public function works()
    {
        return $this->belongsToMany(Work::class, 'works_categories', 'category_id', 'work_id');
    }
}
