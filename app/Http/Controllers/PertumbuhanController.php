<?php

namespace App\Http\Controllers;

use App\Models\Pertumbuhan;
use Illuminate\Http\Request;

class PertumbuhanController extends Controller
{
    public function index(Request $request)
    {
        return view('pertumbuhan.index');
    }
}
