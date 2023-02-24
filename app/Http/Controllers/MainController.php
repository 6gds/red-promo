<?php

namespace App\Http\Controllers;

use App\Models\Fact;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Review;
use App\Models\Service;
use App\Models\Value;
use App\Models\News;
use App\Models\Work;

class MainController extends Controller
{
    public function page(){
        return view('pages.index', [
            "values"=>Value::getActiveSorted(),
            "services"=>Service::getActiveSorted(),
            "works"=>Work::getActiveSorted(),
            "partners"=>Partner::getActiveSorted(),
            "reviews"=>Review::getActiveSorted(),
            "facts"=>Fact::getActiveSorted(),
            "news"=>News::getActive()->sortByDesc('created_at')->take(3),
            "values"=>Value::getActiveSorted(),
        ]);
    }
}
