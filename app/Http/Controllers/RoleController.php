<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('role-view');

        $roles = Role::withTrashed()->where('name', '!=', 'super-admin')->get();
        return view('pages.role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('role-create');

        return view('pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('role-create');

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'min:3', 'unique:roles,name'],
        ], [
            'unique' => 'This role already exist'
        ]);

        Role::create([
            'name' => str_slug($request->name, '-'),
        ]);

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('permission-grant');

        $permissions = Permission::all();
        $permissions = $permissions
        ->groupBy(function ($item, $key) {
            return str_before($item['name'], '-', 0);
        });

        return view('pages.role.show', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('role-edit');

        return view('pages.role.edit', ['role' => $role ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('role-edit');

        // Grant Permission for Role
        if ($this->is_previous_route('roles.show')) {
            $permissions = $request->except('_token', '_method');

            $role->syncPermissions($permissions);

            return redirect()->route('roles.index');
        }

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'min:3', "unique:roles,name,$role->id,id"],
        ], [
            'unique' => 'This role already exist'
        ]);

        $role->update([
            'name' => str_slug($request->name, '-'),
        ]);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('role-delete');

        // Restore Deleted role
        if ($role->trashed()) {
            $role->restore();
        }
        else {
            $role->delete();
        }

        return back();
    }
}
