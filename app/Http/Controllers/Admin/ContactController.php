<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function onContactSend(Request $request){

        $ContactArray = json_decode($request->getContent(),true);

        $name = $ContactArray['name'] ?? null;
        $email = $ContactArray['email'] ?? null;
        $message = $ContactArray['message'] ?? null;

        $result = Contact::insert([
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ]);

        if ($result === true) {
            return 1;
        } else {
            return 0;
        }

    } // end method

}
