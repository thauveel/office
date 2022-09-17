<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hrm\Department;
use App\Models\Hrm\Employee;
use App\Models\Hrm\Job;
use App\Models\Hrm\WorkSite;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(1)->create();

        $superadmin = Role::create(['name' => 'Super-Admin']);
        
        $user = User::find(1);
        $user->assignRole('Super-Admin');

        WorkSite::factory()->count(1)->create();
        Department::factory()->count(2)->create();
        Job::factory()->count(4)->create();
        Employee::factory()->count(10)->create();

    }
}
