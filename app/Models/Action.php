<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class Action extends Model
{
    use HasFactory;
    use ModelGet;

    public function tariffs()
    {
        return $this->belongsToMany(Tariff::class, 'tariffs_actions', 'action_id', 'tariff_id');
    }
}
