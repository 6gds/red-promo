<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class Tariff extends Model
{
    use HasFactory;
    use ModelGet;

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class, 'tariffs_actions', 'tariff_id', 'action_id');
    }

    public function actionInfo($id){
        $str = $this->actions()->where('actions.id', $id)->first();

        if (isset($str)){
            $tariff_action = TariffAction::where([
                ['tariff_id', $this->id],
                ['action_id', $id],
                ['a', '1']
            ])->first();

            if ($tariff_action)
                return $tariff_action->info;
            else return 'Нет';
        }
        else {
            return 'Нет';
        }
    }
}
