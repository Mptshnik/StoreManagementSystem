<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRoles
{
    public function giveRolesTo(array $roles)
    {
        $roles = Role::whereIn('slug', $roles)->get();

        if($roles === null) {
            return $this;
        }
        $this->roles()->attach($roles);
        return $this;
    }

    public function refreshRoles(array $roles)
    {
        $this->roles()->detach();
        return $this->giveRolesTo($roles);
    }

    public function hasRole(... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
}
