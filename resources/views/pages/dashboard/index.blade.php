@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1>Pages</h1>
                        <ul>
                            <li><a href="{{ route('users.index') }}">Users</a></li>
                            <li><a href="{{ route('complaints.index') }}">Complaint's</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection