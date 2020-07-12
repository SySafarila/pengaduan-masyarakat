@if (Auth::user()->level == 'officer')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-inline-flex align-items-center">
                    <h1>Complaint's</h1>
                    <small class="text-muted ml-2 font-weight-lighter">On Process</small>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($complaints as $complaint)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <img src="{{ route('get.photo', ['fileName' => $complaint->photo]) }}" class="card-img-top" alt="{{ $complaint->photo }}">
                        <div class="card-body">
                            <p>{{ $complaint->report }}</p>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">{{ $complaint->created_at->diffForHumans() }}</small>
                                <small class="text-muted text-capitalize">Reporter : {{ $complaint->user->name }}</small>
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