<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::where('name', '!=', 'super_role')->with('permissions')->paginate(5);

        return view('role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('role.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $role = Role::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);

        $role->givePermissionsTo($request->permissions);

        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        if ($role->name === 'super_role') return redirect()->back();

        return view('role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        if ($role->name === 'super_role') return redirect()->back();

        $permissions = Permission::all();
        return view('role.edit', compact('permissions', 'role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);

        $role->refreshPermissions($request->permissions);

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
