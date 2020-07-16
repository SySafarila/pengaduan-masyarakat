@extends('layouts.app')

@section('content')
    @if (Auth::user()->level == 'public')
        <x-complaints.publics />
    @endif
    @if (Auth::user()->level == 'officer')
        <x-complaints.officers />
    @endif
@endsection