@extends('layouts.app')

@section('title', 'Patients')
@section('content')
    <h1 class="py-4">Patients</h1>
    @livewire('patients', ['search' => $search])
@endsection
