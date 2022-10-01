<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HrmAdminSeeder extends Seeder
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

        //  // // create permissions for modules
        //  Permission::create(['name' => 'access hrm']);

        //  // // create permissions for model attendance
        // Permission::create(['name' => 'create attendance']);
        // Permission::create(['name' => 'read attendance']);
        //Permission::create(['name' => 'read all attendance']);
        // Permission::create(['name' => 'update attendance']);
        // Permission::create(['name' => 'delete attendance']);

         $hremployee = Role::findByName('Hrm Admin');
         $hremployee->givePermissionTo('read attendance'); 
        
         
        //  $user = User::find(3);
        // $user->assignRole('Hrm Admin');
    }
}
