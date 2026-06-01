@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="bi bi-people-fill"></i> Students Management</h1>
    </div>

    <div class="card hover-lift">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-list-ul"></i> All Students</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Group</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td><strong>#{{ $student->id }}</strong></td>
                                <td>{{ $student->user->name }}</td>
                                <td>{{ $student->user->email }}</td>
                                <td>
                                    @if($student->group)
                                        <span class="badge bg-info">{{ $student->group->name }}</span>
                                    @else
                                        <span class="badge bg-secondary">Not Assigned</span>
                                    @endif
                                </td>
                                <td>
                                    <span
                                        class="badge bg-{{ $student->status === 'approved' ? 'success' : ($student->status === 'rejected' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($student->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @if($student->status === 'pending')
                                            <form action="{{ route('admin.students.approve', $student->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" title="Approve">
                                                    <i class="bi bi-check-circle"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.students.reject', $student->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" title="Reject">
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.students.assign', $student->id) }}"
                                            class="btn btn-sm btn-primary" title="Assign to Group">
                                            <i class="bi bi-person-plus"></i> Assign
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                                    <p class="mt-2">No students found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection