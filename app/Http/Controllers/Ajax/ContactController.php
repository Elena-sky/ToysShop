<?php

namespace App\Http\Controllers\Ajax;

use App\Mail\SendMail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUS;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
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


//        $mailable = new Mailable();
//        $mailable->to = env('MAIL_ADMIN_EMAIL');

        Mail::to(env('MAIL_ADMIN_EMAIL'))->send(new SendMail($dataMail));

//        Mail::send('info.mail', $dataMail, function($message)
//            {
//                $message->to('foo@example.com', 'Джон Смит')->subject('Привет!');
//            });

//       Mail::send('email', array(
//            'name' => $request->get('name'),
//            'email' => $request->get('email'),
//            'user_message' => $request->get('message')
//        ), function($message)
//            {
//                $message->from('saquib.gt@gmail.com');
//                $message->to('saquib.rizwan@cloudways.com', 'Admin')->subject('Cloudways Feedback');
//            });

//        return back()->with('success', 'Thanks for contacting us!');
    }
}
