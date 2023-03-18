<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('login', '!=', 'super_user')->with('roles')->with('permissions')->paginate(10);

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('user.create', compact('roles', 'permissions'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        if ($request->roles) {
            $user->giveRolesTo($request->roles);
        }

        if ($request->permissions) {
            $user->givePermissionsTo($request->permissions);
        }

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('user.edit', compact('roles', 'permissions', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        if ($request->roles) {
            $user->refreshRoles($request->roles);
        }

        if ($request->permissions) {
            $user->refreshPermissions($request->permissions);
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    public function resetPassword(ResetPasswordRequest $request, User $user)
    {
        $user->password = $request->validated('password');
        $user->save();

        $request->session()->flash('reset_password', 'Пароль успешно изменен');

        return redirect()->route('users.show', $user);
    }
}
