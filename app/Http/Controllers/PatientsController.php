<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.patients', ['search' => $request->query('search', null)]);
    }

    public function show(Request $request, $patient)
    {
        $patient = Patients::withTrashed()->with(['insurance', 'category'])->has('insurance')->where('card_number', $patient)->first();
        if (!$patient) {
            return redirect()->to(route('dashboard'))->withErrors("Patient not found.");
        }

        return view('pages.patient', ['patient' => $patient]);
    }
}
