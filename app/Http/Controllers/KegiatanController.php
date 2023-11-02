<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function getKegiatanData()
    {
        $kegiatans = Kegiatan::all();
        return $kegiatans;
    }
}
