<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
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
         Permission::create(['name' => 'access hrm']);

         // // create permissions for model attendance
        Permission::create(['name' => 'create attendance']);
        Permission::create(['name' => 'read attendance']);
        Permission::create(['name' => 'update attendance']);
        Permission::create(['name' => 'delete attendance']);

         $hremployee = Role::create(['name' => 'Hrm Employee']);
         $hremployee->givePermissionTo('access hrm', 'read attendance'); 
        
         
         $user = User::find(2);
        $user->assignRole('Hrm Employee');
    }
}
