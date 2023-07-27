<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
use QrCode;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Paket',
            'order' => Order::all(),
        ];
        return view('admin.order.index', $data);
    }
    public function update_status()
    {
        $data = [
            'title' => 'Cek Resi',
        ];
        return view('admin.order.status.update_status', $data);
    }
    public function invoice()
    {
        $data = [
            'title' => 'Invoice',
            'order' => Order::all(),
        ];
        return view('admin.order.invoice.index', $data);
    }
    public function show($resi)
    {
        $order = Order::where('resi', $resi)->first();
        $order_status = OrderStatus::with(['orders', 'status', 'user'])->where('id_order', $order->id)->get();

        $data = [
            'title' => 'Daftar Paket',
            'order' => $order,
            'order_status' => $order_status,
        ];
        return view('admin.order.show', $data);
    }
    public function cek_resi(Request $request)
    {

        $order = Order::where('resi', $request->resi)->first();
        if ($order != null) {
            $order_status = OrderStatus::with(['orders', 'status', 'user'])->where('id_order', $order->id)->get();

            $data = [
                'title' => 'Daftar Paket',
                'order' => $order,
                'order_status' => $order_status,
            ];
            return view('admin.order.show', $data);
        } else {
            $data = [
                'title' => 'Paket tidak tersedia',
            ];
            return view('admin.order.status.not_found', $data);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_customer' => ['required'],
            'id_subdivision_from' => ['required'],
            'id_subdivision_to' => ['required'],
            'id_transportation' => ['required'],
            'price' => ['required'],
            'wight_item' => ['required'],
            'thumbnail' => ['nullable', 'file', 'mimes:jpg,jpeg,png,bmp'],
        ]);
        $milliseconds = round(microtime(true) * 1000);
        $order = new Order;
        $order->id_customer = $request->id_customer;
        $order->id_subdivision_from = $request->id_subdivision_from;
        $order->id_subdivision_to = $request->id_subdivision_to;
        $order->id_transportation = $request->id_transportation;
        $order->price = $request->price;
        $order->date_estimate = $request->date_estimate;
        $order->wight_item = $request->wight_item;
        $order->description = $request->description;
        $order->date = date('d-m-Y');
        $order->resi = 'AKC' . $milliseconds;
        $order->save();

        if ($request->hasFile('thumbnail')) {
            $filename = Str::random(32) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $file_path = $request->file('thumbnail')->storeAs('public/uploads', $filename);
        }

        $order_status = new OrderStatus();
        $order_status->orders()->associate($order);
        $order_status->id_status = 1;
        $order_status->id_user = Auth::user()->id;
        $order_status->date = date('d-m-Y');
        $order_status->thumbnail = isset($file_path) ? $file_path : '';


        if ($order_status->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function storeStatus(Request $request)
    {
        $request->validate([
            'id_status' => ['required'],
            'id_order' => ['required'],
            'thumbnail' => ['nullable', 'file', 'mimes:jpg,jpeg,png,bmp'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $filename = Str::random(32) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $file_path = $request->file('thumbnail')->storeAs('public/uploads', $filename);
        }

        $order_status = new OrderStatus();
        $order_status->id_order = $request->id_order;
        $order_status->id_status = $request->id_status;
        $order_status->id_user = Auth::user()->id;
        $order_status->date = date('d-m-Y');
        $order_status->thumbnail = isset($file_path) ? $file_path : '';

        if ($order_status->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_customer' => ['required'],
            'id_subdivision_from' => ['required'],
            'id_subdivision_to' => ['required'],
            'id_transportation' => ['required'],
            'price' => ['required'],
            'wight_item' => ['required'],
        ]);

        $order = Order::find($id);
        $order->id_customer = $request->id_customer;
        $order->id_subdivision_from = $request->id_subdivision_from;
        $order->id_subdivision_to = $request->id_subdivision_to;
        $order->id_transportation = $request->id_transportation;
        $order->price = $request->price;
        $order->date_estimate = $request->date_estimate;
        $order->wight_item = $request->wight_item;
        if ($order->save()) {

            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
    public function destroyStatus($id)
    {
        $status = OrderStatus::find($id);
        if ($status->thumbnail != '') {
            Storage::delete($status->thumbnail);
        }
        $status->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus status');
    }
    public function print($id)
    {
        $order = Order::where('id', $id)
            ->first();
        $qr = base64_encode(QrCode::format('svg')->size(80)->errorCorrection('H')->generate($order->resi));
        $pdf = PDF::loadview('admin/order/print', ['order' => $order, 'qr' => $qr])->setPaper(array(0, 0, 160, 330));
        return $pdf->stream('order_' . $id . '.pdf');
    }
    public function printInvoice($id)
    {
        $order = Order::where('id', $id)
            ->first();
        $qr = base64_encode(QrCode::format('svg')->size(80)->errorCorrection('H')->generate($order->resi));
        $pdf = PDF::loadview('admin/order/invoice/print', ['order' => $order, 'qr' => $qr])->setPaper("A4", "portrait");
        return $pdf->stream('invoice_' . $order->resi . '.pdf');
    }
}
