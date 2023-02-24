<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Traits\ModelGet;

class Service extends Model
{
    use HasFactory;
    use ModelGet;


    public function steps()
    {
        return $this->hasMany(Step::class, 'service_id', 'id');
    }

    /**
     * Get all of the suggests for the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suggests()
    {
        return $this->hasMany(Suggest::class, 'service_id', 'id');
    }

    /**
     * Get all of the tariffs for the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tariffs()
    {
        return $this->hasMany(Tariff::class, 'service_id', 'id')
                ->orderBy("pos", "asc");
    }

    public function actions(){
        return DB::table('actions')
                ->join('tariffs_actions', 'actions.id', '=', 'tariffs_actions.action_id')
                ->join('tariffs', 'tariffs_actions.tariff_id', '=', 'tariffs.id')
                ->selectRaw('distinct actions.*')
                ->where([
                    ['tariffs.service_id', $this->id],
                    ['tariffs_actions.a', '1']
                ])
                ->get();
    }
}
