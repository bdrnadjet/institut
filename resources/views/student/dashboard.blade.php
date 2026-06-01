@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h1><i class="bi bi-person-circle"></i> Student Dashboard</h1>
            <p class="lead">Welcome, <strong>{{ auth()->user()->name }}</strong>!</p>
        </div>
    </div>

    @if($student && $student->status === 'approved')
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card hover-lift">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-person-badge"></i> My Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><i class="bi bi-person-fill text-primary"></i> <strong>Name:</strong>
                                    {{ auth()->user()->name }}</p>
                                <p><i class="bi bi-envelope-fill text-primary"></i> <strong>Email:</strong>
                                    {{ auth()->user()->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="bi bi-diagram-3-fill text-primary"></i> <strong>Group:</strong>
                                    @if($student->group)
                                        <span class="badge bg-info">{{ $student->group->name }}</span>
                                    @else
                                        <span class="badge bg-secondary">Not assigned</span>
                                    @endif
                                </p>
                                <p><i class="bi bi-bar-chart-fill text-primary"></i> <strong>Level:</strong>
                                    @if($student->group)
                                        <span class="badge bg-success">{{ $student->group->level }}</span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($schedule && count($schedule) > 0)
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card hover-lift">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-calendar3"></i> My Class Schedule</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><i class="bi bi-calendar-day"></i> Day</th>
                                            <th><i class="bi bi-book"></i> Subject</th>
                                            <th><i class="bi bi-person-badge"></i> Teacher</th>
                                            <th><i class="bi bi-clock"></i> Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($schedule->sortBy('day') as $class)
                                            <tr>
                                                <td><strong>{{ $class->day }}</strong></td>
                                                <td><span class="badge bg-info">{{ $class->subject->name }}</span></td>
                                                <td>{{ $class->teacher->user->name }}</td>
                                                <td><i class="bi bi-clock-fill text-primary"></i> {{ $class->start_time }} -
                                                    {{ $class->end_time }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info mt-4 shadow-sm">
                <i class="bi bi-info-circle-fill"></i> No schedule available yet. Please contact the administrator.
            </div>
        @endif
    @elseif($student && $student->status === 'pending')
        <div class="alert alert-warning mt-4 shadow-sm">
            <i class="bi bi-hourglass-split"></i> Your registration is pending approval. Please wait for the administrator to
            approve your account.
        </div>
    @elseif($student && $student->status === 'rejected')
        <div class="alert alert-danger mt-4 shadow-sm">
            <i class="bi bi-x-circle-fill"></i> Your registration has been rejected. Please contact the administrator for more
            information.
        </div>
    @else
        <div class="alert alert-info mt-4 shadow-sm">
            <i class="bi bi-info-circle-fill"></i> No student profile found. Please contact the administrator.
        </div>
    @endif
@endsection