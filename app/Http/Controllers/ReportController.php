<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Paket',
            'order' => Order::all(),
        ];
        return view('admin.report.index', $data);
    }
    public function export(Request $request)
    {
        // dd($request);
        $from_date = date("d-m-Y", strtotime($request->from_date));
        $to_date = date("d-m-Y", strtotime($request->to_date));
        $data = Order::whereBetween('date', [$from_date, $to_date])->get();

        $pdf = FacadePdf::loadView('admin.report.pdf.pdf', [
            'data' => $data,
            'from_date' => $from_date,
            'to_date' => $to_date,
        ])->setPaper('a4', 'landscape')->setOption(['dpi' => 150, 'defaultFont' => 'arial']);

        return $pdf->stream($from_date . ' sampai ' . $to_date . '.pdf');
    }
}
