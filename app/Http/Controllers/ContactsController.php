<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Service;

class ContactsController extends Controller
{
    public function page(){
        return view('pages.contacts', [
           "contact"=>Contact::getActive()->first(),
           "services"=>Service::all()
        ]);
    }
}
