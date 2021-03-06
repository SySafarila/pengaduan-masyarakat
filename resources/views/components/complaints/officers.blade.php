<div class="container">
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('complaints.index') }}" class="btn btn-secondary btn-sm">Pending</a>
            <a href="{{ route('complaints.process') }}" class="btn btn-secondary btn-sm">On Process</a>
            <a href="{{ route('complaints.complete') }}" class="btn btn-secondary btn-sm">Complete</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if (session('status-success'))
                <div class="alert alert-success" role="alert">
                    {{ session('status-success') }}
                </div>
            @endif
            <div class="d-inline-flex align-items-center mb-2">
                <h1>Complaint's</h1>
                <small class="text-muted ml-2 font-weight-lighter">Pending</small>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($complaints as $complaint)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow">
                    <img src="{{ route('get.photo', ['fileName' => $complaint->photo]) }}" class="card-img-top" alt="{{ $complaint->photo }}">
                    <div class="card-body">
                        <p style="white-space: pre;">{{ $complaint->report }}</p>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">{{ $complaint->created_at->diffForHumans() }}</small>
                            <small class="text-muted text-capitalize">Reporter : {{ $complaint->user->name }}</small>
                        </div>
                        <form action="{{ route('complaints.update', $complaint->id) }}" method="post" class="mt-2">
                            @csrf
                            <select name="status" id="status" class="custom-select">
                                <option value="">{{ ucwords($complaint->status) }}</option>
                                <option value="on process">On Process</option>
                            </select>
                            <button type="submit" class="btn btn-block btn-success mt-2">Update</button>
                            <a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-block btn-light mt-2 shadow-sm">See Complaint</a>
                        </form>
                    </div>
                </div>
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