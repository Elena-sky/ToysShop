<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\User;
use Illuminate\Http\Request;
use App\ContactUS;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    /**
     * Sending a letter of contact form.
     *
     * @param Request $request
     */
    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required'
        ]);

        $user_id = ($request->id) ? $request->id : '';
        $dataMail = ['name' => $request->name, 'email' => $request->email, 'user_id' => $user_id,
            'subject' => $request->subject, 'message' => $request->message];

        $mail = ContactUS::create($dataMail);
        $dataMail['mail_id'] = $mail->id;

        Mail::to(Config::get('constants.mail.email_address'))
            ->send(new SendMail($dataMail));
    }
}
