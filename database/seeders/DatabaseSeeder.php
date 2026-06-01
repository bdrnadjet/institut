<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@institut.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Teacher Users
        $teacher1 = User::create([
            'name' => 'John Smith',
            'email' => 'john.smith@institut.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        $teacher2 = User::create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah.johnson@institut.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        // Create Teacher Profiles
        Teacher::create([
            'user_id' => $teacher1->id,
            'specialty' => 'Mathematics',
        ]);

        Teacher::create([
            'user_id' => $teacher2->id,
            'specialty' => 'Computer Science',
        ]);

        // Create Student Users
        $student1 = User::create([
            'name' => 'Alice Brown',
            'email' => 'alice.brown@student.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        $student2 = User::create([
            'name' => 'Bob Wilson',
            'email' => 'bob.wilson@student.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        // Create Student Profiles
        Student::create([
            'user_id' => $student1->id,
            'status' => 'approved',
            'group_id' => null, // Will be assigned later
        ]);

        Student::create([
            'user_id' => $student2->id,
            'status' => 'pending',
            'group_id' => null,
        ]);

        // Call other seeders
        $this->call([
            SubjectSeeder::class,
            GroupSeeder::class,
        ]);
    }
}
