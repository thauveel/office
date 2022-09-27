<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // // create permissions for modules
        // Permission::create(['name' => 'access hrm']);

        // // create permissions for model worksite
        // Permission::create(['name' => 'create worksite']);
        // Permission::create(['name' => 'read worksite']);
        // Permission::create(['name' => 'update worksite']);
        // Permission::create(['name' => 'delete worksite']);

        // // create permissions for model department
        // Permission::create(['name' => 'create department']);
        // Permission::create(['name' => 'read department']);
        // Permission::create(['name' => 'update department']);
        // Permission::create(['name' => 'delete department']);

        // // create permissions for model job
        // Permission::create(['name' => 'create job']);
        // Permission::create(['name' => 'read job']);
        // Permission::create(['name' => 'update job']);
        // Permission::create(['name' => 'delete job']);

        // // create permissions for model employee
        // Permission::create(['name' => 'create employee']);
        // Permission::create(['name' => 'read employee']);
        // Permission::create(['name' => 'update employee']);
        // Permission::create(['name' => 'delete employee']);

         // // create permissions for model shift
        // Permission::create(['name' => 'create shift']);
        // Permission::create(['name' => 'read shift']);
        // Permission::create(['name' => 'update shift']);
        // Permission::create(['name' => 'delete shift']);
        
         // // create permissions for model duty
        // Permission::create(['name' => 'create duty']);
        // Permission::create(['name' => 'read duty']);
        // Permission::create(['name' => 'update duty']);
        // Permission::create(['name' => 'delete duty']);

        // create permissions for model house
        // Permission::create(['name' => 'create house']);
        // Permission::create(['name' => 'read house']);
        // Permission::create(['name' => 'update house']);
        // Permission::create(['name' => 'delete house']);
        // // create permissions for model resident
        // Permission::create(['name' => 'create resident']);
        // Permission::create(['name' => 'read resident']);
        // Permission::create(['name' => 'update resident']);
        // Permission::create(['name' => 'delete resident']);

        // create roles and assign existing permissions
        $superadmin = Role::create(['name' => 'Super-Admin']);

        // $hrmadmin = Role::create(['name' => 'hrm admin']);
        // $hrmadmin->givePermissionTo('access hrm', 'create worksite','read worksite', 'update worksite', 'delete worksite', 'create department','read department', 'update department', 'delete department', 'create job','read job', 'update job', 'delete job'); 
        // //                                 // 'create house', 'read house', 'update house', 'delete house',
        //                                 // 'create resident', 'read resident', 'update resident', 'delete resident');

        // // create demo users
        $user = User::find(1);
        $user->assignRole('Super-Admin');
        //$user->assignRole('admin');
        
    }
}
