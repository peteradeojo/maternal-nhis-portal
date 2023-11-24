@extends('layouts.app')

@section('title', 'Patients')
@section('content')
    @livewire('patients', ['search' => $search])
@endsection
