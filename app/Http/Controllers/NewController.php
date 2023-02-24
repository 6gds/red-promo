<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function page($id){
        return view('pages.new', [
            "tags"=>Tag::getActiveSorted(),
            "new"=>News::getActive()->where('id', $id)->first(),
        ]);
    }

    public function all(){
        return view('pages.news', [
            "tags"=>Tag::getActiveSorted(),
            "news"=>News::getActive()->sortByDesc('created_at'),
            // "news"=>News::where('a', '=', 1)
            //             ->get()

        ]);
    }
}
