@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Edit Teacher</h1>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="user_name" class="form-label">Teacher Name</label>
                            <input type="text" id="user_name" class="form-control" value="{{ $teacher->user->name }}"
                                disabled>
                        </div>

                        <div class="mb-3">
                            <label for="specialty" class="form-label">Specialty</label>
                            <input type="text" name="specialty" id="specialty"
                                class="form-control @error('specialty') is-invalid @enderror"
                                value="{{ old('specialty', $teacher->specialty) }}">
                            @error('specialty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Teacher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection