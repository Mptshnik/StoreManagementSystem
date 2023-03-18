<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttachPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('login', 'super_user')->first();
        $role = Role::create(['name' => 'super_role', 'slug' => 'super-role']);
        $role->permissions()->attach(Permission::all());
        $user->roles()->attach($role);
    }
}
