<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    //
    public function index()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'subject'=>'required|string|max:255',
            'message'=>'required|string',
        ]);

        // Mail::send('emails.contact', $data, function ($message) use ($data) {
        //     $message->to('support@vezeeta.com')
        //         ->subject('New Contact Form Submission')
        //         ->from($data['email'], $data['name']);
        // });

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

}
