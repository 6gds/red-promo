<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function page($id){
        return view('pages.work', [
            "work"=>Work::getActive()->where('id', $id)->first()
        ]);
    }

    public function all(){
        return view('pages.works',[
            "works"=>Work::getActiveSorted(),
            "categories"=>Category::getActiveSorted()
        ]);
    }
}
