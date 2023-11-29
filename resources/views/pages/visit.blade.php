@extends('layouts.app')

@section('title', $visit->patient->name . ':' . $visit->created_at)
@section('content')
    <h1>
        {{ $visit->patient->name }}</h1>

    @foreach ($visit->documentations as $doc)
        {{-- @dump($doc) --}}
        <div>
            <p>Date: {{ $doc->created_at }}</p>
            <p>Diagnosis: {{ join(', ', $doc->diagnosis->map(fn($d) => trim($d->diagnoses))->all()) }} </p>
            <div class="py-2"></div>
            <p><u>Tests Taken</u>: @if ($doc->tests->count() == 0)
                    No tests
                @else
                    <ol>
                        @foreach ($doc->tests as $t)
                            <li>{{ $t->name }}</li>
                        @endforeach
                    </ol>
                @endif
            </p>
            <div class="py-2"></div>
            <p><u>Drugs administered:</u>
                @if ($doc->prescriptions->count() == 0)
                    No prescriptions
                @else
                    <ol>
                        @foreach ($doc->prescriptions as $p)
                            <li>
                                {{ $p->name }}
                                {{ $p->route }}
                                {{ $p->dosage }}
                                {{ $p->frequency }}
                                {{ $p->duration }}
                            </li>
                        @endforeach
                    </ol>
                @endif
            </p>
        </div>
    @endforeach
@endsection
