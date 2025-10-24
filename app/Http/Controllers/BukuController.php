<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $data_buku = Buku::all()->sortByDesc('id'); // urutkan berdasarkan terbaru
        return view('buku.index', compact('data_buku'));
    }

}
