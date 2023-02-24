<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class Suggest extends Model
{
    use HasFactory;
    use ModelGet;

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
