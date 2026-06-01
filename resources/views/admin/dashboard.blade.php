@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h1><i class="bi bi-speedometer2"></i> Admin Dashboard</h1>
            <p class="lead text-muted">Welcome back! Here's what's happening today.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary hover-lift">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-uppercase mb-1">Students</h6>
                            <h2 class="display-4 mb-0">{{ $studentsCount }}</h2>
                        </div>
                        <i class="bi bi-people-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                    <a href="{{ route('admin.students.index') }}" class="btn btn-light btn-sm mt-3 w-100">
                        <i class="bi bi-arrow-right"></i> View All
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success hover-lift">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-uppercase mb-1">Teachers</h6>
                            <h2 class="display-4 mb-0">{{ $teachersCount }}</h2>
                        </div>
                        <i class="bi bi-person-badge-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                    <a href="{{ route('admin.teachers.index') }}" class="btn btn-light btn-sm mt-3 w-100">
                        <i class="bi bi-arrow-right"></i> View All
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info hover-lift">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-uppercase mb-1">Subjects</h6>
                            <h2 class="display-4 mb-0">{{ \App\Models\Subject::count() }}</h2>
                        </div>
                        <i class="bi bi-book-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                    <a href="{{ route('admin.subjects.index') }}" class="btn btn-light btn-sm mt-3 w-100">
                        <i class="bi bi-arrow-right"></i> View All
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning hover-lift">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-uppercase mb-1">Groups</h6>
                            <h2 class="display-4 mb-0">{{ \App\Models\Group::count() }}</h2>
                        </div>
                        <i class="bi bi-diagram-3-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                    <a href="{{ route('admin.groups.index') }}" class="btn btn-light btn-sm mt-3 w-100">
                        <i class="bi bi-arrow-right"></i> View All
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card hover-lift">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-lightning-fill"></i> Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <a href="{{ route('admin.students.index') }}" class="btn btn-primary w-100 py-3">
                                <i class="bi bi-people-fill"></i> Manage Students
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.teachers.index') }}" class="btn btn-success w-100 py-3">
                                <i class="bi bi-person-badge-fill"></i> Manage Teachers
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.subjects.index') }}" class="btn btn-info w-100 py-3">
                                <i class="bi bi-book-fill"></i> Manage Subjects
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.groups.index') }}" class="btn btn-warning w-100 py-3">
                                <i class="bi bi-diagram-3-fill"></i> Manage Groups
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary w-100 py-3">
                                <i class="bi bi-calendar3"></i> Manage Schedules
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.schedules.create') }}" class="btn btn-dark w-100 py-3">
                                <i class="bi bi-plus-circle-fill"></i> Create Schedule
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection