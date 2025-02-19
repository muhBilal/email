<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class EmailController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getData()
    {
        $data = DB::table('client')
            ->get();
        return DataTables::of($data)->make(true);
    }

    public function sendEmail(Request $request)
    {
        try {
            $city = $request->city;
            if ($city) {
                $emails = DB::table('client')
                    ->where('city', $city)
                    ->select('email')
                    ->get();
            } else {
                $emails = DB::table('client')
                    ->select('email')
                    ->get();
            }
            $message = 'This is a test email';
            $subject = 'Email Promotion';
            $templateId = 1;

            foreach ($emails as $data) {
                $email = $data->email;
                Mail::to($email)->send(new SendEmail($message, $subject, $templateId));
            }

            return response()->json(['status' => 'success', 'message' => 'Email sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
