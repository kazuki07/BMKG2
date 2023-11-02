<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CuacaController extends Controller
{
    public function getDataCuaca()
    {
        $response = Http::get('https://cuaca-endpoint.vercel.app/weather/jawa-barat/depok');

        if ($response->successful()) {
            $data = $response->json();
            // dd($data);
            return view('cuaca', compact('data'));
        } else {
            // Handle kesalahan jika permintaan tidak berhasil
            return response()->json(['error' => 'Gagal mengambil data cuaca'], 500);
        }
    }
}
