<?php

namespace App\Http\Controllers;

use App\Events\Subscribed;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ServiceRequest as SR;
use App\Http\Requests\WorkRequest as WR;
use App\Models\Comment;
use App\Models\ContactRequest as CR;
use App\Models\ServiceRequest;
use App\Models\Subscriber;
use App\Models\Work;
use App\Models\WorkRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function contactNew(ContactRequest $request){
        $request->authorize();
        $validator = $request->validated();
        $contactRequest = CR::create($validator);
        if ($contactRequest){
            $items = view('ajax.answer_contact')
                        ->render();

            return response()->json([
                'status' => 'success',
                'items' => $items
            ]);
        }
        else{
            return response()->json([
                'status'=>'error'
            ]);
        }
    }

    public function filterNews(Request $request){
        $data = $request->input("new_tag");
        $news = new News;

        if ($data[0] == "all"){
            $items = view('ajax.filter_new',
                          ["news"=>News::all()
                                    ->sortByDesc('created_at')
                          ])
                        ->render();
        }
        else{
            $news = $news->whereHas('tag', function ($query) use ($data) {
                $query->whereIn('name', $data);
            });

            $items = view('ajax.filter_new',
                         ["news"=> $news->get()
                                    ->sortByDesc('created_at')])
                        ->render();
        }

        return response()->json([
            'status' => 'success',
            'items' => $items
        ]);
    }

    public function contactRequestNew(ContactRequest $request){

    }

    public function serviceNew(SR $request, $id){
        $request->authorize();
        $validator = $request->validated();
        $validator["tariff_id"] = $id;

        $workRequest = ServiceRequest::create($validator);
        if ($workRequest){
            $items = view('ajax.answer_service')
                        ->render();

            return response()->json([
                'status' => 'success',
                'items' => $items
            ]);
        }
        else{
            return response()->json([
                'status'=>'error'
            ]);
        }
    }

    // public function workNew (WR $request, $id){
    //     $request->authorize();
    //     $validator = $request->validated();
    //     $validator["work_id"] = $id;

    //     $workRequest = WorkRequest::create($validator);
    //     if ($workRequest){
    //         $items = view('ajax.answer_work')
    //                     ->render();

    //         return response()->json([
    //             'status' => 'success',
    //             'items' => $items
    //         ]);
    //     }
    //     else{
    //         return response()->json([
    //             'status'=>'error'
    //         ]);
    //     }
    // }

    public function commentNew(CommentRequest $request, $id){
        $request->authorize();
        $validate = $request->validated();
        $validate["new_id"] = $id;
        $validate["a"] = 1;

        $comment = Comment::create($validate);
        $items = view('ajax.comments', ["new"=> News::where("id", $id)
                                                        ->first()])
                    ->render();
        $meta = view('ajax.comments__meta',
                     ["new"=> News::where("id", $id)
                                    ->first()])
                    ->render();

        return response()->json([
            "status"=>"success",
            "meta"=> $meta,
            "items"=>$items
        ]);
    }

    public function filterWork(Request $request){
        $data = $request->input('work_category');
        $work = new Work;

        // dd(Work::find(1)
        //     ->categories());

        if ($data[0] == "all"){
            $items = view('ajax.filter_work',
                          ["works"=>Work::getActive()
                                    ->sortBy('pos')
                          ])
                        ->render();
        }
        else{
            $work = $work->whereHas('categories', function($query) use ($data){
                $query->whereIn('name', $data);
                // foreach ($data as $value){
                //     if ($query->where('categories.name', $value))
                //         continue;
                //     else return false;
                // }
            });
            // ->toSql();

            // $work = DB::table('works_categories')
            //             ->join('works', 'works.id', '=', 'works_categories.work_id')
            //             ->join('categories', 'works_categories.category_id', '=', 'categories.id')
            //             ->selectRaw('count(works_categories.category_id)')
            //             ->whereIn('categories.name', $data)
            //             ->groupBy('works_categories.work_id')
            //             ->havingRaw('count(works_categories.category_id) = '.count($data));
                        // ->toSql();

            // dd($work);

            $work = $work->where('a', 1)->get();

            $items = view('ajax.filter_work',
                          ["works"=>$work])
                          ->render();
        }

        return response()->json([
            "status"=>"success",
            "items"=>$items
            ]);
    }

    public function subscribe(Request $request){
        $validator = new Validator();
        $validate = $validator::validate($request->all(), [
            "email"=>"required|unique:subscribers",
        ]);

        $sub = Subscriber::create([
            "email"=>$request->input('email'),
            "a"=>1
        ]);
        event(new Subscribed($sub));

        $items = view("ajax.answer_subscribe")->render();

        return response()->json([
            'status' => 'success',
            'items' => $items
        ]);
    }
}
