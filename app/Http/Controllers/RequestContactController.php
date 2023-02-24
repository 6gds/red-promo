<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\ContactRequest as CR;

class RequestContactController extends Controller
{
    public function create(ContactRequest $request){
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
}
