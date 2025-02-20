<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class EmailController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getData()
    {
        $data = DB::table('clients')
            ->get();
        return DataTables::of($data)->make(true);
    }

    public function sendEmail(Request $request)
    {
        try {
            $emailsQuery = DB::table('clients')->select('email');

            if ($request->selectedEmail) {
                $emailsQuery->whereIn('id', $request->selectedEmail);
            } elseif ($request->city) {
                $emailsQuery->where('city', $request->city);
            }

            $emails = $emailsQuery->get();
            $message = 'This is a test email';
            $subject = 'Email Promotion';
            $templateId = 1;

            foreach ($emails as $data) {
                Mail::to($data->email)->send(new SendEmail($message, $subject, $templateId));
            }

            return response()->json(['status' => 'success', 'message' => 'Email sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}