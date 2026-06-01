@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Add Teacher</h1>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.teachers.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Select User</label>
                            <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror"
                                required>
                                <option value="">-- Select User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="specialty" class="form-label">Specialty</label>
                            <input type="text" name="specialty" id="specialty"
                                class="form-control @error('specialty') is-invalid @enderror"
                                value="{{ old('specialty') }}">
                            @error('specialty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Teacher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection