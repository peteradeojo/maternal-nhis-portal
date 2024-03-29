<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\Visit;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.patients', ['search' => $request->query('search', null)]);
    }

    public function show(Request $request, $patient)
    {
        $patient = Patients::withTrashed()->with(['insurance', 'category'])->has('insurance')->find($patient);
        if (!$patient) {
            return redirect()->to(route('dashboard'))->withErrors("Patient not found.");
        }

        return view('pages.patient', ['patient' => $patient]);
    }

    public function getPatientVisits(Request $request, Visit $visit)
    {
        $visit->load('documentations');
        return view('pages.visit', ['visit' => $visit]);
    }
}
