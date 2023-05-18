<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function onContactSend(Request $request){

        $ContactArray = json_decode($request->getContent(),true);

        $name = $ContactArray['name'];
        $email = $ContactArray['email'];
        $message = $ContactArray['message'];

        $result = Contact::insert([
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ]);

        if ($result == true) {
            return 'Thanks for Contact EasyStanding.';
        } else {
            return 0;
        }

    } // end method
}
