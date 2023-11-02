<?php

namespace App\Http\Controllers;

use App\Models\Pimpinan;
use Illuminate\Http\Request;

class PimpinanController extends Controller
{
    public function getPimpinanData()
    {
        $pimpinans = Pimpinan::all();
        return $pimpinans;
    }
}
