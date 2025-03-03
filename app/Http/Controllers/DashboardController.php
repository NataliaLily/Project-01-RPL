<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function simpan(Request $request): RedirectResponse
    {
        dd("Data yang anda Kirim", $request->all());
    }
}
