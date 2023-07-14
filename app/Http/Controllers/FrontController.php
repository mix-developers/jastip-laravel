<?php

namespace App\Http\Controllers;

use App\Models\Subdivision;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'subdivision' => Subdivision::all(),
        ];
        return view('pages.index', $data);
    }
}
