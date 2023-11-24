<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.patients', ['search' => $request->query('search', null)]);
    }
}
