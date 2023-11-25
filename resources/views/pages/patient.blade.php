@extends('layouts.app')

@section('title', 'Patients :: ' . $patient->name)
@section('content')
    <h1>
        {{ $patient->name }}</h1>

    <div class="pb-4">
        <p><b>Name:</b> {{ $patient->name }}</p>
        <p><b>Card Number:</b> {{ $patient->card_number }} ({{ $patient->category->name }})</p>
        <p><b>Gender:</b> {{ $patient->gender }}</p>
        <p><b>Date of Birth:</b> {{ $patient->dob ?? 'Not provided' }}</p>
        <p><b>Registration Date:</b> {{ $patient->created_at->format('Y-m-d') }}</p>
    </div>

    <div class="py-4">
        <h2>Insurance Details</h2>
        <p><b>HMO: </b>{{ $patient->insurance?->hmo_name }}</p>
        <p><b>Company: </b>{{ $patient->insurance?->hmo_company }}</p>
        <p><b>Identification No.: </b>{{ $patient->insurance?->hmo_id_no }}</p>
        <p><b>Verification Status: </b> {{ Status::tryFrom($patient->insurance->status)?->name }} @if ($patient->insurance->status != Status::active->value)
                <a href="" class="btn bg-theme">Verify</a>
            @endif
        </p>
    </div>
@endsection
