<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $runningController = new RunningController();
        $pimpinanController = new PimpinanController();
        $kegiatanController = new KegiatanController();

        $runningData = $runningController->getRunningText();
        $pimpinanData = $pimpinanController->getPimpinanData();
        $kegiatanData = $kegiatanController->getKegiatanData();

        return view('home', compact('runningData', 'pimpinanData', 'kegiatanData'));
    }
}
