<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class Image extends Model
{
    use HasFactory;
    use ModelGet;

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id', 'id');
    }
}
