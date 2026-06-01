@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Edit Schedule</h1>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="group_id" class="form-label">Group</label>
                            <select name="group_id" id="group_id"
                                class="form-select @error('group_id') is-invalid @enderror" required>
                                <option value="">-- Select Group --</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" {{ old('group_id', $schedule->group_id) == $group->id ? 'selected' : '' }}>
                                        {{ $group->name }} ({{ $group->level }})
                                    </option>
                                @endforeach
                            </select>
                            @error('group_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subject_id" class="form-label">Subject</label>
                            <select name="subject_id" id="subject_id"
                                class="form-select @error('subject_id') is-invalid @enderror" required>
                                <option value="">-- Select Subject --</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('subject_id', $schedule->subject_id) == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">Teacher</label>
                            <select name="teacher_id" id="teacher_id"
                                class="form-select @error('teacher_id') is-invalid @enderror" required>
                                <option value="">-- Select Teacher --</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id', $schedule->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->user->name }} @if($teacher->specialty)({{ $teacher->specialty }})@endif
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="day" class="form-label">Day</label>
                            <select name="day" id="day" class="form-select @error('day') is-invalid @enderror" required>
                                <option value="">-- Select Day --</option>
                                <option value="Monday" {{ old('day', $schedule->day) == 'Monday' ? 'selected' : '' }}>Monday
                                </option>
                                <option value="Tuesday" {{ old('day', $schedule->day) == 'Tuesday' ? 'selected' : '' }}>
                                    Tuesday</option>
                                <option value="Wednesday" {{ old('day', $schedule->day) == 'Wednesday' ? 'selected' : '' }}>
                                    Wednesday</option>
                                <option value="Thursday" {{ old('day', $schedule->day) == 'Thursday' ? 'selected' : '' }}>
                                    Thursday</option>
                                <option value="Friday" {{ old('day', $schedule->day) == 'Friday' ? 'selected' : '' }}>Friday
                                </option>
                                <option value="Saturday" {{ old('day', $schedule->day) == 'Saturday' ? 'selected' : '' }}>
                                    Saturday</option>
                                <option value="Sunday" {{ old('day', $schedule->day) == 'Sunday' ? 'selected' : '' }}>Sunday
                                </option>
                            </select>
                            @error('day')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="time" name="start_time" id="start_time"
                                        class="form-control @error('start_time') is-invalid @enderror"
                                        value="{{ old('start_time', $schedule->start_time) }}" required>
                                    @error('start_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="time" name="end_time" id="end_time"
                                        class="form-control @error('end_time') is-invalid @enderror"
                                        value="{{ old('end_time', $schedule->end_time) }}" required>
                                    @error('end_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection