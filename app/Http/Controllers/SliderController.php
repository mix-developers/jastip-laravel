<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pelanggan',
            'slider' => Slider::all(),
        ];
        return view('admin.slider.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'thumbnail' => ['nullable', 'file', 'mimes:jpg,jpeg,png,bmp,webp'],
        ]);
        if ($request->hasFile('thumbnail')) {
            $filename = Str::random(32) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $file_path = $request->file('thumbnail')->storeAs('public/uploads', $filename);
        }
        $slider = new Slider;
        $slider->name = $request->name;
        $slider->description = $request->description;
        $slider->id_user = Auth::user()->id;
        $slider->thumbnail = isset($file_path) ? $file_path : '';
        if ($slider->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'thumbnail' => ['nullable', 'file', 'mimes:jpg,jpeg,png,bmp,webp'],
        ]);

        $slider = Slider::find($id);

        if ($request->hasFile('thumbnail')) {
            if ($slider->thumbnail != '') {
                Storage::delete($slider->thumbnail);
            }

            $filename = Str::random(32) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $file_path = $request->file('thumbnail')->storeAs('public/uploads', $filename);
        }
        $slider->name = $request->name;
        $slider->description = $request->description;
        $slider->id_user = Auth::user()->id;
        $slider->thumbnail = isset($file_path) ? $file_path : $slider->thumbnail;
        if ($slider->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if ($slider->thumbnail != '') {
            Storage::delete($slider->thumbnail);
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
