<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function akun()
    {
        $user = User::find(Auth::user()->id);
        $data = [
            'title' => 'Akun',
            'user' => $user,
        ];

        return view('admin.user.akun', $data);
    }
    public function index()
    {
        $user = User::where('role', 'admin')->get();
        $data = [
            'title' => 'Akun',
            'user' => $user,
        ];

        return view('admin.user.index', $data);
    }
}
