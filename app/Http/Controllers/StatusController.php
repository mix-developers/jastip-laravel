<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Status Pengiriman',
            'statuses' => Status::all(),
        ];
        return view('admin.statuses.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);
        $statuses = new Status();
        $statuses->status = $request->status;
        if ($statuses->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);
        $statuses = Status::find($id);

        $statuses->status = $request->status;
        if ($statuses->save()) {
            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function destroy($id)
    {
        $statuses = Status::find($id);

        $statuses->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
