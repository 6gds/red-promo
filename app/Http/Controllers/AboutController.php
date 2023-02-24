<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\Partner;
use App\Models\Team;
use App\Models\Value;

class AboutController extends Controller
{
    public function page(){
        return view('pages.about', [
            "achievements"=>Achievement::getActiveSorted(),
            "partners"=>Partner::getActiveSorted(),
            "teams"=>Team::getActiveSorted(),
            "values"=>Value::getActiveSorted(),
        ]);
    }
}
