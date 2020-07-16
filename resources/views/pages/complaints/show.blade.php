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
                        <span class="badge badge-light shadow-sm text-capitalize">{{ $complaint->status }}</span>
                        @if (Auth::user()->level == 'admin' or Auth::user()->level == 'officer')
                        <hr>
                        <p class="font-weight-bold">Responses</p>
                        @foreach ($complaint->responses as $response)
                        <div class="d-block">
                            <span class="badge badge-light shadow-sm"><span class="text-muted">{{ $response->user->name }} : </span><span class="font-weight-light">{{ $response->response }}</span></span>
                        </div>
                        @endforeach
                        <hr>
                        <label for="response">Write Response</label>
                        <form action="{{ route('complaints.addResponse', $complaint->id) }}" method="post">
                            @csrf
                            <textarea name="response" id="response" rows="4" class="form-control" placeholder="Write your response here" required></textarea>
                            @error('response')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <button type="submit" class="btn btn-success mt-2 btn-block">Submit</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection