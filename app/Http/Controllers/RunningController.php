<?php

namespace App\Http\Controllers;

use App\Models\Running;
use Illuminate\Http\Request;

class RunningController extends Controller
{
    public function getRunningText()
    {
        $runnings = Running::all();
        return $runnings;
    }
}
