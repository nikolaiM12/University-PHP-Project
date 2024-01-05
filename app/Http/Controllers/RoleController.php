<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\IRoleService;
use App\Services\Interfaces\IPermissionService;

class RoleController extends Controller
{
    protected IRoleService $roleService;
    protected IPermissionService $permissionService;
    public function __construct(IRoleService $roleService, IPermissionService $permissionService)
    {
        $this->middleware('auth');
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        $role = $this->roleService->GetAllRoles();
        return view('role.index', compact("role"))->with('page', request()->input('page'));
    }

    public function create()
    {
        $permission = $this->permissionService->GetAllPermission();
        return view('role.create', ['permission' => $permission]);
    }

    public function store(Request $request)
    {
        $role = $this->roleService->CreateRole($request->all());
        return redirect()->route('role.index')->with('success','Role created successfully');
    }

    public function edit($id)
    {
        $permission = $this->permissionService->GetAllPermission();
        $role = $this->roleService->GetRoleById($id);
        return view('role.edit', ['role' => $role, 'permission' => $permission]);
    }

    public function update(Request $request, $id)
    {
        $role = $this->roleService->UpdateRole($id, $request->all());
        return redirect()->route('role.index')->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        $role = $this->roleService->DeleteRole($id);
        return redirect()->route('role.index', compact('role'))->with('success','Role deleted successfully');
    }
}
