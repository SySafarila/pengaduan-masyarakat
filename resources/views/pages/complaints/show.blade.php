@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
                <div class="card border-0 shadow">
                    <img src="{{ route('get.photo', ['fileName' => $complaint->photo]) }}" class="card-img-top" alt="{{ route('get.photo', ['fileName' => $complaint->photo]) }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">{{ $complaint->user->name }}</small>
                            <small class="text-muted">{{ $complaint->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="m-0">{{ $complaint->report }}</p>
                        <span class="badge badge-light shadow-sm text-capitalize">{{ $complaint->status }}</span>
                        <hr>
                        <p class="font-weight-bold">Responses</p>
                        @foreach ($complaint->responses as $response)
                        <div class="d-block">
                            <span class="badge badge-light shadow-sm"><span class="text-muted">{{ $response->user->name }} : </span><span class="font-weight-light">{{ $response->response }}</span></span>
                        </div>
                        @endforeach
                        @if ($complaint->responses->count() == 0)
                            <p class="m-0 text-muted">Empty</p>
                        @endif
                        @if (Auth::user()->level == 'admin' or Auth::user()->level == 'officer')
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
            @if (Auth::user()->level == 'admin' or Auth::user()->level == 'officer')
            <div class="col-md-5">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <form action="{{ route('complaints.update', $complaint->id) }}" method="post" class="mt-2">
                            @csrf
                            <h1>Status</h1>
                            <select name="status" id="status" class="custom-select">
                                <option value="">{{ ucwords($complaint->status) }}</option>
                                <option value="on process">On Process</option>
                            </select>
                            <button type="submit" class="btn btn-block btn-success mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection