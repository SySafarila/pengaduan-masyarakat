<div class="container">
    <div class="row">
        <div class="col">
            @if (session('status-success'))
                <div class="alert alert-success" role="alert">
                    {{ session('status-success') }}
                </div>
            @endif
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
                        <form action="{{ route('complaints.update', $complaint->id) }}" method="post" class="mt-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" id="status" class="custom-select">
                                <option value="">{{ ucwords($complaint->status) }}</option>
                                <option value="on process">On Process</option>
                                <option value="complete">Complete</option>
                            </select>
                            <button type="submit" class="btn btn-block btn-success mt-2">Update</button>
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