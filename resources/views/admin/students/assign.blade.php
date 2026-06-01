@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Assign Student to Group</h1>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="mb-4">
                        <h5>Student Information</h5>
                        <p><strong>Name:</strong> {{ $student->user->name }}</p>
                        <p><strong>Email:</strong> {{ $student->user->email }}</p>
                        <p><strong>Status:</strong>
                            <span
                                class="badge bg-{{ $student->status === 'approved' ? 'success' : ($student->status === 'rejected' ? 'danger' : 'warning') }}">
                                {{ ucfirst($student->status) }}
                            </span>
                        </p>
                        <p><strong>Current Group:</strong> {{ $student->group ? $student->group->name : 'Not assigned' }}
                        </p>
                    </div>

                    <hr>

                    <form action="{{ route('admin.students.assign.store', $student->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="group_id" class="form-label">Select Group</label>
                            <select name="group_id" id="group_id"
                                class="form-select @error('group_id') is-invalid @enderror" required>
                                <option value="">-- Select Group --</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" {{ old('group_id', $student->group_id) == $group->id ? 'selected' : '' }}>
                                        {{ $group->name }} ({{ $group->level }})
                                    </option>
                                @endforeach
                            </select>
                            @error('group_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Assign to Group</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection