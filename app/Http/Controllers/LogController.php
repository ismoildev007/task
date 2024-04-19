<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $log = Log::latest()->paginate(20);
        return view('log')->with('logs', $log);
    }
}
