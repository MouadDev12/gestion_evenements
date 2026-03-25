<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Expert::withCount('evenements')->get();
        return view('experts.index', compact('experts'));
    }

    public function show($id)
    {
        $expert = Expert::with('evenements')->findOrFail($id);
        return view('experts.show', compact('expert'));
    }
}
