<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\PackagePrice;
use App\Models\Subdivision;
use App\Models\Transportation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'users' => User::count(),
            'customers' => Customer::count(),
            'orders' => Order::count(),
            'transportations' => Transportation::count(),
            'subdivisions' => Subdivision::count(),
            'package_prices' => PackagePrice::count(),
            'employee' => User::all(),
        ];
        return view('admin.dashboard', $data);
    }
}
