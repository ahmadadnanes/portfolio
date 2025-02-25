<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(ContactRequest $request){
        Mail::to('ahmadadnanes@gmail.com')->send(new ContactMail($request->name , $request->email , $request->subject));
        return redirect()->back()->with('success', 'Email sent!');
    }
}
