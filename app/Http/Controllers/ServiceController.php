<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function page($id){
        return view('pages.service', [
            "service"=>Service::getActive()->where('id', $id)->first(),
            "partners"=>Partner::getActiveSorted()
        ]);
    }

    public function all(){
        return view('pages.services', [
            "services"=>Service::getActiveSorted()
        ]);
    }
}
