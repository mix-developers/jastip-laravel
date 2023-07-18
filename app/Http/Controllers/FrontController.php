<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PackagePrice;
use App\Models\Subdivision;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'subdivision' => Subdivision::all(),
            'package_price' => PackagePrice::all(),
        ];
        return view('pages.index', $data);
    }
    public function status($resi)
    {
        $order = Order::where('resi', $resi)->first();

        $order_status = OrderStatus::with(['orders', 'status', 'user'])->where('id_order', $order->id)->get();

        $data = [
            'title' => 'Status Paket',
            'order' => $order,
            'order_status' => $order_status,
        ];
        return view('pages.status', $data);
    }
    public function search_resi(Request $request)
    {
        $request->validate([
            'resi' => ['required']
        ]);
        $order = Order::where('resi', 'like', '%' . $request->resi . '%')->first();
        if ($order != null) {
            $order_status = OrderStatus::with(['orders', 'status', 'user'])->where('id_order', $order->id)->get();
        } else {
            $order_status = '';
        }
        $data = [
            'title' => 'Status Paket',
            'order' => $order,
            'order_status' => $order_status,
        ];

        return view('pages.status', $data);
    }
}
