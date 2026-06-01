@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h1><i class="bi bi-person-workspace"></i> Teacher Dashboard</h1>
            <p class="lead">Welcome, <strong>{{ auth()->user()->name }}</strong>!</p>
        </div>
    </div>

    @if($schedules && count($schedules) > 0)
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary hover-lift">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-check" style="font-size: 3rem;"></i>
                        <h3 class="display-4 mt-3">{{ $schedules->count() }}</h3>
                        <p class="text-uppercase mb-0">Total Classes</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success hover-lift">
                    <div class="card-body text-center">
                        <i class="bi bi-diagram-3" style="font-size: 3rem;"></i>
                        <h3 class="display-4 mt-3">{{ $schedules->unique('group_id')->count() }}</h3>
                        <p class="text-uppercase mb-0">Groups</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info hover-lift">
                    <div class="card-body text-center">
                        <i class="bi bi-book" style="font-size: 3rem;"></i>
                        <h3 class="display-4 mt-3">{{ $schedules->unique('subject_id')->count() }}</h3>
                        <p class="text-uppercase mb-0">Subjects</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card hover-lift">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-calendar3"></i> My Teaching Schedule</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><i class="bi bi-calendar-day"></i> Day</th>
                                        <th><i class="bi bi-book"></i> Subject</th>
                                        <th><i class="bi bi-diagram-3"></i> Group</th>
                                        <th><i class="bi bi-bar-chart"></i> Level</th>
                                        <th><i class="bi bi-clock"></i> Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schedules->sortBy('day') as $class)
                                        <tr>
                                            <td><strong>{{ $class->day }}</strong></td>
                                            <td><span class="badge bg-info">{{ $class->subject->name }}</span></td>
                                            <td><span class="badge bg-primary">{{ $class->group->name }}</span></td>
                                            <td><span class="badge bg-success">{{ $class->group->level }}</span></td>
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
        <div class="alert alert-info shadow-sm">
            <i class="bi bi-info-circle-fill"></i> No teaching schedule assigned yet. Please contact the administrator.
        </div>
    @endif
@endsection