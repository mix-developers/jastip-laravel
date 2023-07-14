<?php

namespace App\Http\Controllers;

use App\Models\Transportation;
use Illuminate\Http\Request;

class TransportationController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Transportasi',
            'transportation' => Transportation::all(),
        ];
        return view('admin.transportation.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $transportation = new Transportation;
        $transportation->name = $request->name;
        $transportation->type = $request->type;
        $transportation->phone = $request->phone;
        $transportation->description = $request->description;
        if ($transportation->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $transportation = Transportation::find($id);
        $transportation->name = $request->name;
        $transportation->type = $request->type;
        $transportation->phone = $request->phone;
        $transportation->description = $request->description;
        if ($transportation->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function destroy($id)
    {
        $transportation = Transportation::find($id);
        $transportation->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
