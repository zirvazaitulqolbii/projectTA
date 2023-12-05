<?php

namespace App\Http\Controllers;

use App\Models\Pinjamas;
use Illuminate\Http\Request;

class PengajuanPinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.master');
    }
    public function dashboard()
    {
        $pinjamans = Pinjamans::all(); // Mengambil semua data pinjaman
        $totalPinjaman = $pinjamans->sum('nominal'); // Menghitung total pinjaman

        return view('dashboard', compact('pinjaman', 'totalPinjaman'));
    }

    public function dashboard_page()
    {
        return view('dashboard.content');
    }
}
