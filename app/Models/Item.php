<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class Item extends Model
{
    use HasFactory;
    use ModelGet;

    public function works()
    {
        return $this->belongsToMany(Work::class, 'works_items', 'item_id', 'work_id');
    }
}
