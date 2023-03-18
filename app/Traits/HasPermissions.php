<?php

namespace App\Traits;

use App\Models\Permission;
use Illuminate\Support\Facades\Log;

trait HasPermissions
{
    public function hasPermission($permission)
    {
        return (bool) $this->permissions->where('slug', $permission)->count();
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission)
    {
        $permission = Permission::where('slug', $permission)->with('roles')->first();

        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function givePermissionsTo(array $permissions)
    {
        $permissions = Permission::whereIn('slug', $permissions)->get();

        if($permissions === null) {
            return $this;
        }
        $this->permissions()->attach($permissions);
        return $this;
    }

    public function deletePermissions(array $permissions )
    {
        $permissions = Permission::whereIn('slug', $permissions)->get();
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(array $permissions )
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
}
