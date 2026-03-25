<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
use Illuminate\Http\Request;

class AtelierController extends Controller
{
    public function index()
    {
        $ateliers = Atelier::with('evenement')->get();
        return view('ateliers.index', compact('ateliers'));
    }
}
