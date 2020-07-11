@if (Auth::user()->level == 'officer')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($complaints as $complaint)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ route('get.photo', ['fileName' => $complaint->photo]) }}" alt="{{ $complaint->photo }}" class="img-fluid">
                            <p class="mb-0 mt-2">{{ $complaint->report }}</p>
                            <small class="text-muted">{{ $complaint->created_at->diffForHumans() }}</small>
                            <br>
                            <small class="text-muted">Reporter : {{ $complaint->user->name }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $complaints->links() }}
        </div>
    </div>
@endif