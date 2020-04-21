<?php

namespace App\Http\Controllers;
use App\Blog;
use App\About;
use App\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class BusinessController extends Controller
{
    public function home(){
        return view('business-casual/home');
    }

    public function about(){
        $team = About::all();
        return view('business-casual/about',['team'=>$team]);
    }

    public function blog(){
        $posts = Blog::all();
        return view('business-casual/blog',['posts'=>$posts]);
    }

    public function contact(){
        return view('business-casual/contact');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
        'name'     =>  'required',
        'email'  =>  'required|email',
        'mensaje' =>  'required'
        ]);

        $data = array(
            'name'      =>  $request->name,
            'mensaje'   =>   $request->mensaje,
            'phone'   =>   $request->phone
        );

        Mail::to('16030802@itcelaya.edu.mx')->send(new SendMail($data));
        return back()->with('success', 'Thanks for contacting us!');
    }

    public function store(Request $request) { 
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->mensaje = $request->mensaje;
        $contact->save();
        return response()->json(['success'=>'Form is successfully submitted!']);
    }
}
