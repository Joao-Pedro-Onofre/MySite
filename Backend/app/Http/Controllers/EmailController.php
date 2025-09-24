<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Mail\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function insert(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'address' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max: 5000'],
        ]);

        $msg = Email::create($data);
        Mail::to(env('CONTACT_NOTIFY_TO'))->send(new ContactNotification($msg));

        return response()->json($msg, 201);
    }
}
