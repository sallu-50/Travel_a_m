<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function check(Request $request)
    {
        return view('status-check');
    }
}
