@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Add Group</h1>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.groups.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Group Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <input type="text" name="level" id="level"
                                class="form-control @error('level') is-invalid @enderror" value="{{ old('level') }}"
                                required>
                            @error('level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.groups.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Group</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection