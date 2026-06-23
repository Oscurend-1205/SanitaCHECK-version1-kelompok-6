<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = \App\Models\Fasilitas::all();
        return view('admin.fasilitas', compact('fasilitas'));
    }
}
