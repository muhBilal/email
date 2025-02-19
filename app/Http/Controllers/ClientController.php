<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    public function importFile(Request $request)
    {
        try {
            Excel::import(new ClientsImport, $request->file('file'));
            return response()->json(['status' => 'success', 'message' => 'Data imported successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
