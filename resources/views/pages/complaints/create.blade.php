@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status-success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status-success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('complaints.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="report">The Report's</label>
                                <textarea name="report" id="report" rows="5" class="form-control @error('report') is-invalid @enderror" required>{{ old('report') }}</textarea>
                                @error('report')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{ old('photo') }}" required>
                                    <label class="custom-file-label text-truncate" style="padding-right: 4.5rem;" for="photo">Choose image</label>
                                </div>
                                @error('photo')
                                <div class="invalid-feedback" style="display: unset;">
                                    {{ $message }}
                                </div>
                                @enderror
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
                                <script>
                                    $(document).ready(function () {
                                        bsCustomFileInput.init()
                                    });
                                </script>
                            </div>
                            <button type="submit" class="btn btn-success">Send</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection