<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MainController extends Controller
{
    public function contact(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $message = $request->get('message');

        $contact = new Contact();
        $contact->name = $name;
        $contact->email = $email;
        $contact->message = $message;
        $contact->save();

        return Redirect::back()->withErrors(['msg', 'OK']);
    }
}
