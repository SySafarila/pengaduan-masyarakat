@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <img src="{{ route('get.photo', ['fileName' => $complaint->photo]) }}" class="card-img-top" alt="{{ route('get.photo', ['fileName' => $complaint->photo]) }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">{{ $complaint->user->name }}</small>
                            <small class="text-muted">{{ $complaint->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="m-0">{{ $complaint->report }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection