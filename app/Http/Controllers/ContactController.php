<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    function index() 
    {
        return view('business-casual/contact');
    }

    public function store(Request $request) { 
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        
        return response()->json(['success'=>'Form is successfully submitted!']);
  
    }
}

?>