<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        return view('');
    }

    public function getData(){
        $data = DB::table('user_emails')
            ->get();
    }

    public function sendEmail()
    {
        $emails = DB::table('user_emails')
            ->select('email')
            ->where('id', 1)
            ->get();
        $message = 'This is a test email';
        $subject = 'Test Email';

        foreach ($emails as $data) {
            $email = $data->email;
            Mail::to($email)->send(new SendEmail($message, $subject));
        }

        return "Emails have been sent to all users!";
    }
}
