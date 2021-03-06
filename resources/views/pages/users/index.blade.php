@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center shadow">
              <h2 class="text-white card-header bg-success border-success mb-3">Users list</h2>
                <div class="card-body">
                    

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
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->level }}</td>
                          </tr>
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