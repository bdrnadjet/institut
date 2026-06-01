<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Group;
use App\Models\Schedule;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();
        return view('admin.dashboard', compact('studentsCount', 'teachersCount'));
    }

    // Student Management
    public function students()
    {
        $students = Student::with('user')->get();
        return view('admin.students.index', compact('students'));
    }

    public function approveStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Student approved.');
    }

    public function rejectStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Student rejected.');
    }

    public function assignStudentForm($id)
    {
        $student = Student::with('user', 'group')->findOrFail($id);
        $groups = Group::all();
        return view('admin.students.assign', compact('student', 'groups'));
    }

    public function assignStudent(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
        ]);

        $student->update($validated);
        return redirect()->route('admin.students.index')->with('success', 'Student assigned to group successfully.');
    }

    // Teachers Management
    public function teachers()
    {
        $teachers = Teacher::with('user')->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function createTeacher()
    {
        $users = User::whereDoesntHave('teacher')->where('role', 'teacher')->get();
        return view('admin.teachers.create', compact('users'));
    }

    public function storeTeacher(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id|unique:teachers,user_id',
            'specialty' => 'nullable|string|max:255',
        ]);

        Teacher::create($validated);
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function editTeacher($id)
    {
        $teacher = Teacher::with('user')->findOrFail($id);
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function updateTeacher(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $validated = $request->validate([
            'specialty' => 'nullable|string|max:255',
        ]);

        $teacher->update($validated);
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroyTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully.');
    }

    // Subjects Management
    public function subjects()
    {
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function createSubject()
    {
        return view('admin.subjects.create');
    }

    public function storeSubject(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subjects,name',
        ]);

        Subject::create($validated);
        return redirect()->route('admin.subjects.index')->with('success', 'Subject created successfully.');
    }

    public function editSubject($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.edit', compact('subject'));
    }

    public function updateSubject(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subjects,name,' . $id,
        ]);

        $subject->update($validated);
        return redirect()->route('admin.subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroySubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('admin.subjects.index')->with('success', 'Subject deleted successfully.');
    }

    // Groups Management
    public function groups()
    {
        $groups = Group::withCount('students')->get();
        return view('admin.groups.index', compact('groups'));
    }

    public function createGroup()
    {
        return view('admin.groups.create');
    }

    public function storeGroup(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:groups,name',
            'level' => 'required|string|max:255',
        ]);

        Group::create($validated);
        return redirect()->route('admin.groups.index')->with('success', 'Group created successfully.');
    }

    public function editGroup($id)
    {
        $group = Group::findOrFail($id);
        return view('admin.groups.edit', compact('group'));
    }

    public function updateGroup(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:groups,name,' . $id,
            'level' => 'required|string|max:255',
        ]);

        $group->update($validated);
        return redirect()->route('admin.groups.index')->with('success', 'Group updated successfully.');
    }

    public function destroyGroup($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->route('admin.groups.index')->with('success', 'Group deleted successfully.');
    }

    // Schedules Management
    public function schedules()
    {
        $schedules = Schedule::with(['group', 'subject', 'teacher.user'])->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function createSchedule()
    {
        $groups = Group::all();
        $subjects = Subject::all();
        $teachers = Teacher::with('user')->get();
        return view('admin.schedules.create', compact('groups', 'subjects', 'teachers'));
    }

    public function storeSchedule(Request $request)
    {
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Schedule::create($validated);
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function editSchedule($id)
    {
        $schedule = Schedule::with(['group', 'subject', 'teacher'])->findOrFail($id);
        $groups = Group::all();
        $subjects = Subject::all();
        $teachers = Teacher::with('user')->get();
        return view('admin.schedules.edit', compact('schedule', 'groups', 'subjects', 'teachers'));
    }

    public function updateSchedule(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $schedule->update($validated);
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroySchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
