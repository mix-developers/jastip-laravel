<?php

namespace App\Http\Controllers;

use App\Models\PackagePrice;
use App\Models\Subdivision;
use Illuminate\Http\Request;

class PackagePriceController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Paket Harga',
            'package_price' => PackagePrice::all(),
            'subdivision' => Subdivision::all(),
        ];
        return view('admin.package_price.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
        ]);

        $package_price = new PackagePrice;
        $package_price->name = $request->name;

        $package_price->price = $request->price;
        $package_price->id_subdivision = $request->id_subdivision;
        if ($package_price->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
        ]);

        $package_price = PackagePrice::find($id);
        $package_price->name = $request->name;

        $package_price->price = $request->price;
        $package_price->id_subdivision = $request->id_subdivision;
        if ($package_price->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function destroy($id)
    {
        $package_price = PackagePrice::find($id);
        $package_price->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
