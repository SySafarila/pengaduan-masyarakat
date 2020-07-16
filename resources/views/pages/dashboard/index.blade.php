@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <h2 class="card-header text-center text-white bg-primary mb-3">Pages</h2>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-sm-6">
                              <div class="card text-center border-success">
                                <h4 class="card-header text-center text-white bg-success">User List</h4>
                                <div class="card-body">
                                  <p class="card-text">Daftar Pengguna yang terdaftar di APP Pengaduan Masyarakat.</p>
                                  <a href="{{ route('users.index') }}" class="btn btn-outline-success">Pergi!</a>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="card text-center border-danger">
                                  <h4 class="card-header text-center text-white bg-danger">Complaint</h4>
                                <div class="card-body">
                                  <p class="card-text">Kritik dan Saran mengenai keluhan yang terjadi di masyarakat.</p>
                                  <a href="{{ route('complaints.index') }}" class="btn btn-outline-danger">Pergi!</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        {{-- <ul>
                            <li><a href="{{ route('users.index') }}">Users</a></li>
                            <li><a href="{{ route('complaints.index') }}">Complaint's</a></li>
                            
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection