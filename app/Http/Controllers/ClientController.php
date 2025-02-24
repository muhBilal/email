<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Models\Client;
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

    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            $client = Client::find($id);
            $client->delete();
            return response()->json(['status' => 'success', 'message' => 'Data deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $client = new Client();
            $client->first_name = $request->firstName;
            $client->last_name = $request->lastName;
            $client->email = $request->email;
            $client->phone_number = $request->phone;
            $client->city = $request->city;
            $client->save();
            return redirect()->route('emailIndex')
                ->with('success', 'client berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('emailIndex')
                ->with('error', 'client gagal ditambahkan.');
        }
    }

    public function get(Request $request)
    {
        try {
            $id = $request->id;
            $client = Client::find($id);
            return response()->json(['status' => 'success', 'data' => $client]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        try {
            $client = Client::find($request->id);
            $client->first_name = $request->update_firstName;
            $client->last_name = $request->update_lastName;
            $client->email = $request->update_email;
            $client->phone_number = $request->update_phone;
            $client->city = $request->update_city;
            $client->save();
            return redirect()->route('emailIndex')
            ->with('success', 'client berhasil update.');
        } catch (\Exception $e) {
            return redirect()->route('emailIndex')
                ->with('error', 'client gagal update.');
        }
    }
}
