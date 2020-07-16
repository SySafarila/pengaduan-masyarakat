@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>User list</h1>

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Name</th>
                            <th scope="col">Level</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $item)
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->nik }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->level }}</td>
                              
                          @endforeach
                        </tbody>
                      </table>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection