@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row mb-3">
        <div class="col">
            <a href="{{ route('complaints.index') }}" class="btn btn-secondary btn-sm">Pending</a>
            <a href="{{ route('complaints.process') }}" class="btn btn-secondary btn-sm">On Process</a>
            <a href="{{ route('complaints.complete') }}" class="btn btn-secondary btn-sm">Complete</a>
        </div>
    </div> --}}
    <div class="row">
        <div class="col">
            @if (session('status-success'))
                <div class="alert alert-success" role="alert">
                    {{ session('status-success') }}
                </div>
            @endif
            <h1>My Complaint's</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($complaints as $complaint)
            <div class="col-md-4 mb-4">
                <a href="{{ route('complaints.show', $complaint->id) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow">
                        <img src="{{ route('get.photo', ['fileName' => $complaint->photo]) }}" class="card-img-top" alt="{{ $complaint->photo }}">
                        <div class="card-body">
                            <p>{{ $complaint->report }}</p>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">{{ $complaint->created_at->diffForHumans() }}</small>
                                <span class="badge badge-pill @if($complaint->status == 'complete') badge-success @else badge-dark @endif">{{ $complaint->status }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        @if ($complaints->count() == 0)
            <h1 class="text-muted">Empty</h1>
        @endif
    </div>
    <div class="row justify-content-center">
        {{ $complaints->links() }}
    </div>
</div>
@endsection