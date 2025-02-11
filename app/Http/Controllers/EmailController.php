<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    public function sendEmail(){
        $data = DB::table('user_emails')
            ->select('email')
            ->get();

        return $data;
    }
}
