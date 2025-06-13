<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'jumlahBerita' => Berita::count(),
            'jumlahUser' => User::count(),
        ]);
    }
}
