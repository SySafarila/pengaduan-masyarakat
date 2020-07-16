@extends('layouts.app')

@section('content')
    @if (Auth::user()->level == 'public')
        <x-complaints.publics />
    @endif
    @if (Auth::user()->level == 'officer' or Auth::user()->level == 'admin')
        <x-complaints.officers />
    @endif
@endsection