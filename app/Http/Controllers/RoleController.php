<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tables\Roles;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create roles', ['only' => ['create', 'store']]);
        $this->middleware('can:read roles',   ['only' => ['show', 'index']]);
        $this->middleware('can:update roles',   ['only' => ['edit', 'update']]);
        $this->middleware('can:delete roles',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index', [
            'roles' => Roles::class,
            'permissions' => Permission::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array|min:1',
        ]);

        $role = Role::create($validatedData);
        $role->syncPermissions($request->permissions);

        Toast::title(__('role created'))->autoDismiss(3);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array|min:1',
        ]);

        $role->update($validatedData);
        $role->syncPermissions($request->permissions);

        Toast::title(__('role_updated'))->autoDismiss(3);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        Toast::title(__('role_deleted'))->autoDismiss(3);
        return redirect()->back();
    }
}
