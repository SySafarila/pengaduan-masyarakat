@if (Auth::user()->level == 'officer')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Complaint's</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($complaints as $complaint)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <img src="{{ route('get.photo', ['fileName' => $complaint->photo]) }}" class="card-img-top" alt="{{ $complaint->photo }}">
                        <div class="card-body">
                            <p>{{ $complaint->report }}</p>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">{{ $complaint->created_at->diffForHumans() }}</small>
                                <small class="text-muted">Reporter : {{ $complaint->user->name }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $complaints->links() }}
        </div>
    </div>
@endif