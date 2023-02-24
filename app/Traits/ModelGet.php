<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

    trait ModelGet{
        public static function getActive(){
            return self::where([
                ['a', 1]
                ])->get();
        }

        public static function getActiveSorted(){
            return self::where([
                ['a', 1]
                ])->orderBy('pos', 'asc')
                ->get();
        }
    }

?>
