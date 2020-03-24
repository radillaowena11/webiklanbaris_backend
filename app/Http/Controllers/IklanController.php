<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class IklanController extends Controller
{
    public function iklan() {
        $data = "Data Iklan";
        return response()->json($data, 200);
    }

    public function iklanAuth() {
        $data = "Welcome " . Auth::user()->name;
        return response()->json($data, 200);
    }
}