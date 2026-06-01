<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['name' => 'Group A', 'level' => 'Beginner'],
            ['name' => 'Group B', 'level' => 'Intermediate'],
            ['name' => 'Group C', 'level' => 'Advanced'],
            ['name' => 'Group D', 'level' => 'Beginner'],
            ['name' => 'Group E', 'level' => 'Intermediate'],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
