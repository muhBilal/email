<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EmailTemplateController extends Controller
{
    public function index()
    {
        return view('pages/email-template/index');
    }

    public function getData()
    {
        $data = DB::table('email_templates')
            ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('emailTemplates.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            EmailTemplate::create($request->all());
            return redirect()->route('email-template.index')
                ->with('success', 'Template berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('email-template.index')
                ->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $template = EmailTemplate::findOrFail($id);
            return response()->json($template);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'content' => 'required|string|max:255',
            ]);

            $template = EmailTemplate::findOrFail($id);
            $template->update($request->all());
            return redirect()->route('email-template.index')
                ->with('success', 'Template berhasil di update.');
        } catch (\Exception $e) {
            return redirect()->route('email-template.index')
                ->with('error', 'Template gagal di update.');
        }
    }

    public function destroy($id)
    {
        try {
            $template = EmailTemplate::findOrFail($id);
            $template->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Template berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
