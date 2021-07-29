<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-roles', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-roles', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-roles', ['only' => ['destroy']]);
        $this->middleware('permission:read-roles', ['only' => ['index', 'show']]);
    }

    public function index()
    {
        $roles = Role::latest()->get();
        return view('dashboard.roles.index', compact('roles'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        return view('dashboard.roles.edit', compact('permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->update($request->all());
        $role->detachPermissions($request->permission);
        $role->syncPermissions($request->permission);
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => 'Роли',
            'description' => 'Название: ' . $request->name
        ]);
        return redirect()->route('roles.index');
    }
}
