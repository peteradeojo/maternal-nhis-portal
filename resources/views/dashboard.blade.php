@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="row start evenly">
        <div class="col-sm-3 p-1">
            <div class="card">
                <div class="head">
                    Out Patients
                </div>
                <div class="body">
                    <p>{{ $outpatients }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 p-1">
            <div class="card">
                <div class="head">
                    Admissions
                </div>
                <div class="body">
                    <p>{{ $admissions }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 p-1">
            <div class="card">
                <div class="head">
                    New Registrations
                </div>
                <div class="body">
                    <p>{{ $new_patients }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-10"></div>
    <h3>Today's Visits</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Card Number</th>
                <th>Category</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visits as $v)
                <tr>
                    <td><a href="{{ route('patient', $v->patient) }}">{{ $v->patient->name }}</a></td>
                    <td>{{ $v->patient->card_number }}</td>
                    <td>{{ $v->patient->category->name }}</td>
                    <td>{{ $v->created_at->format('d/m/Y h:i A') }}</td>
                    <td><a href="{{route('visits.patient', $v)}}">View</a></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    {{ $visits->links('components.pagination') }}
                </td>
            </tr>
        </tfoot>
    </table>
@endsection
