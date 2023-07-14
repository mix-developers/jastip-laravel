<?php

namespace App\Http\Controllers;

use App\Models\Subdivision;
use Illuminate\Http\Request;

class SubdivisionController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Cabang',
            'subdivision' => Subdivision::all(),
        ];
        return view('admin.subdivision.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        $subdivision = new Subdivision;
        $subdivision->name = $request->name;
        $subdivision->phone = $request->phone;
        $subdivision->address = $request->address;
        $subdivision->manager = $request->manager;
        $subdivision->description = $request->description;
        if ($subdivision->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        $subdivision = Subdivision::find($id);
        $subdivision->name = $request->name;
        $subdivision->phone = $request->phone;
        $subdivision->address = $request->address;
        $subdivision->manager = $request->manager;
        $subdivision->description = $request->description;
        if ($subdivision->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function destroy($id)
    {
        $subdivision = Subdivision::find($id);
        $subdivision->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
